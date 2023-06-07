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

    public function loadMore($row)
    {
        $rowperpage = 3;

        $sql = "SELECT a.main_image, b.category_name, a.id as a_id, b.id as cat_id, a.title, a.author, DATE_FORMAT(a.created_at, '%M %d, %Y') as created_at 
        FROM posts a INNER JOIN category b ON a.cat_id = b.id ORDER BY a.id ASC lIMIT :row, :rowperpage";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":row", $row, PDO::PARAM_INT);
        $stmt->bindValue(":rowperpage", $rowperpage, PDO::PARAM_INT);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_OBJ);
        $html = '';
        if ($stmt->rowCount() > 0) {
            foreach ($datas as $data) {
                $post_id = $data->a_id;
                $main_image = $data->main_image;
                $category_name = $data->category_name;
                $author = $data->category_name;
                $created_at = $data->created_at;
                $cat_id = $data->cat_id;
                if (strlen($data->title) > 70) {
                    $title = substr($data->title, 0, 70) . '. . .';
                } else {
                    $title = $data->title;
                }
                // Creating HTML structure
                $html .= '<div class="post post-row">';
                $html .= '<a class="post-img" href="blog-post.php?post_id=' . $post_id . '"><img src="admin/assets/images/post_images/' . $main_image . '" alt=""></a>';
                $html .= '<div class="post-body">';
                $html .= '<div class="post-category">';
                $html .= '<a href="category.php?cat_id=' . $cat_id . '">' . $category_name . '</a>';
                $html .= '</div>';
                $html .= '<h3 class="post-title title-lg"><a href="blog-post.php?post_id=' . $post_id . '">' . $title . '</h3>';
                $html .= '<ul class="post-meta">';
                $html .= '<li><a href="author.php">' . $author . '</a></li>';
                $html .= '<li>' . $created_at . '</li>';
                $html .= '</ul>';
                $html .= '</div>';
                $html .= '</div>';

            }
        }
        return $html;
    }
}
