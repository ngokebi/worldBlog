<?php

class Comment
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }

    public function all_comment()
    {
        $sql = "SELECT * FROM comments";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }

    public function create_comment($user_id, $comments, $post_id)
    {
        $status = "Default";
        $sql = "INSERT INTO comments (user_id, comment, post_id, created_at, status) VALUES (:user_id, :comment, :post_id, now(), :status)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':comment', $comments);
        $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->bindValue(':status', $status, PDO::PARAM_STR);
        $stmt->execute();
        $lastInsertId = $this->conn->lastInsertId();
        if ($lastInsertId) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_comment($id)
    {
        $sql = "DELETE FROM comments WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function approve_comment($id)
    {
        $status = "Active";
        $sql = "UPDATE comments SET status = :status WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":status", $status, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function disapprove_comment($id)
    {
        $status = "Inactive";
        $sql = "UPDATE comments SET status = :status WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":status", $status, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function time_elapsed_string($time)
    {
        $time_difference = time() - $time;

        if ($time_difference < 1) {
            return 'less than 1 second ago';
        }
        $condition = array(
            12 * 30 * 24 * 60 * 60 =>  'year',
            30 * 24 * 60 * 60       =>  'month',
            24 * 60 * 60            =>  'day',
            60 * 60                 =>  'hour',
            60                      =>  'minute',
            1                       =>  'second'
        );

        foreach ($condition as $secs => $str) {
            $d = $time_difference / $secs;

            if ($d >= 1) {
                $t = round($d);
                return 'about ' . $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
            }
        }
    }
}
