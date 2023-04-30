<?php

class Post
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }

    public function all_posts()
    {
        $status = "Active";
        $sql = "SELECT * FROM posts WHERE status = :status";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':status', $status, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }

    public function create_posts($title, $slug, $short_desc, $long_desc, $author, $main_image, $cat_id, $user_id)
    {
        $views = 0;
        $status = "Active";
        $sql = "INSERT INTO posts (title, slug, short_desc, long_desc, author, main_image, cat_id, views, status, uploaded_by, created_at) 
        VALUES (:title, :slug, :short_desc, :long_desc, :author, :main_image, :cat_id, :views, :status, :uploaded_by, now())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':slug', $slug, PDO::PARAM_STR);
        $stmt->bindValue(':short_desc', $short_desc, PDO::PARAM_STR);
        $stmt->bindValue(':long_desc', $long_desc, PDO::PARAM_STR);
        $stmt->bindValue(':author', $author, PDO::PARAM_STR);
        $stmt->bindValue(':main_image', $main_image, PDO::PARAM_STR);
        $stmt->bindValue(':cat_id', $cat_id, PDO::PARAM_INT);
        $stmt->bindValue(':views', $views, PDO::PARAM_INT);
        $stmt->bindValue(':status', $status, PDO::PARAM_INT);
        $stmt->bindValue(':uploaded_by', $user_id, PDO::PARAM_STR);
        $stmt->execute();
        $lastInsertId = $this->conn->lastInsertId();
        if ($lastInsertId) {
            return true;
        } else {
            return false;
        }
    }


    public function delete_posts($id)
    {
        $sql = "DELETE FROM posts WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }


    public function update_posts($title, $slug, $short_desc, $long_desc, $author, $main_image, $cat_id, $user_id, $id)
    {
        $sql = "UPDATE posts SET title = :title, slug = :slug, short_desc = :short_desc, long_desc = :long_desc, author = :author, main_image = :main_image, cat_id = :cat_id, uploaded_by = :uploaded_by WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':slug', $slug, PDO::PARAM_STR);
        $stmt->bindValue(':short_desc', $short_desc, PDO::PARAM_STR);
        $stmt->bindValue(':long_desc', $long_desc, PDO::PARAM_STR);
        $stmt->bindValue(':author', $author, PDO::PARAM_STR);
        $stmt->bindValue(':main_image', $main_image, PDO::PARAM_STR);
        $stmt->bindValue(':cat_id', $cat_id, PDO::PARAM_INT);
        $stmt->bindValue(':uploaded_by', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function get_views($id)
    {
        $sql = "SELECT views FROM posts WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch();
        if ($stmt->rowCount() > 0) {
            $views = $data['views'];
            return $views;
        }
    }

    public function add_views($views, $id)
    {
        $sql = "UPDATE posts SET views = (:views + 1) WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":views", $views, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function active_post($id)
    {
        $status = "Active";
        $sql = "UPDATE posts SET status = :status WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":status", $status, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function inactive_post($id)
    {
        $status = "Inactive";
        $sql = "UPDATE posts SET status = :status WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":status", $status, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount();
    }
}
