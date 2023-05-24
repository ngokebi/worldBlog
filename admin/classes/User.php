<?php

include_once "Database.php";

class User
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }

    public function generatePassword($password)
    {
        return md5(md5(substr(strrev($password), 0, 3)) . md5(substr(strrev($password), 4)));
    }

    public function validatePassword($password)
    {
        if (strlen($password) > 7 && strlen($password) < 21 && preg_match('`[A-Z]`', $password) && preg_match('`[a-z]`', $password) && preg_match('`[0-9]`', $password)) {
            return true;
        } else {
            return false;
        }
    }

    public function register($username, $name, $email, $password)
    {
        if (self::validatePassword($password)) {
            $bio = "";
            $g_password = self::generatePassword($password);
            $sql = "INSERT INTO Users (username, name, email, bio, password, DateCreated) VALUES (:username, :name, :email, :bio, :password, now())";
            $query = $this->conn->prepare($sql);
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':bio', $bio, PDO::PARAM_STR);
            $query->bindParam(':password', $g_password, PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $this->conn->lastInsertId();
            if ($lastInsertId) {
                return $lastInsertId;
            } else {
                return false;
            }
        } else {
            return false;
            // echo "Password is not Strong";

        }
    }

    public function registerAdmin($username, $name, $email, $password)
    {

        if (self::validatePassword($password)) {
            $role = 'admin';
            $bio = "";
            $g_password = self::generatePassword($password);
            $sql = "INSERT INTO Users (username, name, email, role, bio, password, DateCreated) VALUES (:username, :name, :email, :role, :bio, :password, now())";
            $query = $this->conn->prepare($sql);
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':role', $role, PDO::PARAM_STR);
            $query->bindParam(':bio', $bio, PDO::PARAM_STR);
            $query->bindParam(':password', $g_password, PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $this->conn->lastInsertId();
            if ($lastInsertId) {
                return $lastInsertId;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function social_links($name, $social_link, $id)
    {
        $sql = "INSERT INTO social_links (name, social_link, user_id) VALUES (:name, :social_link, :user_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':social_link', $social_link, PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();

        $lastInsertId = $this->conn->lastInsertId();
        if ($lastInsertId) {
            return true;
            var_dump($result);
        } else {
            return false;
        }
    }

    public function getLinks($id)
    {
        $sql = "SELECT * FROM social_links WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }

    public function update_Links($name, $social_link, $id)
    {

        $sql = "UPDATE social_links SET name = :name, social_link = :social_link WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':social_link', $social_link, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function delete_link($id)
    {

        $sql = "DELETE FROM social_links WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function registerAuthor($username, $name, $email)
    {

        $role = 'author';
        $bio = "";
        $password = 'Password01';
        $g_password = self::generatePassword($password);
        $sql = "INSERT INTO Users (username, name, email, role, bio, password, DateCreated) VALUES (:username, :name, :email, :role, :bio, :password, now())";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':role', $role, PDO::PARAM_STR);
        $query->bindParam(':bio', $bio, PDO::PARAM_STR);
        $query->bindParam(':password', $g_password, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $this->conn->lastInsertId();
        if ($lastInsertId) {
            return $lastInsertId;
        } else {
            return false;
        }
    }

    public function usernameAvailable($username)
    {
        $sql = "SELECT COUNT(username) AS admin FROM Users where username = :username";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($user['admin'] > 0) {
            return "Username already exists";
            exit;
        }
    }

    public function login($username, $password)
    {
        $sql = "SELECT *, DATE_FORMAT(DateCreated, '%M %d, %Y') as DateCreated FROM Users WHERE username = :username";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            foreach ($results as $result) {
                $dbPassword = $result->password;
                if (self::generatePassword($password) == $dbPassword) {
                    $session_token = self::getToken(20);
                    $sql = "UPDATE Users SET LastAuthenticatedToken = :token ,LastLoginDate = now() WHERE username = :username";
                    $query = $this->conn->prepare($sql);
                    $query->bindParam(':username', $username, PDO::PARAM_STR);
                    $query->bindParam(':token', $session_token, PDO::PARAM_STR);
                    $query->execute();
                    $_SESSION['token'] = $session_token;
                    $_SESSION['id'] = $result->id;
                    $_SESSION['email'] = $result->email;
                    $_SESSION['name'] = $result->name;
                    $_SESSION['username'] = $result->username;
                    $_SESSION['profile_image'] = $result->profile_image;
                    $_SESSION['last_acted_on'] = time();

                    return true;
                } else {
                    return false;
                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function loginAdmin($username, $password)
    {
        $role = 'admin';
        $sql = "SELECT *, DATE_FORMAT(DateCreated, '%M %d, %Y') as DateCreated, DATEDIFF(Date(Now()),Date(LPasswordCDate)) AS 'Days' FROM Users WHERE username = :username AND role = :role";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':role', $role, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            foreach ($results as $result) {
                $dbPassword = $result->password;
                if (self::generatePassword($password) == $dbPassword) {
                    $session_token = self::getToken(20);
                    $sql = "UPDATE Users SET LastAuthenticatedToken = :token ,LastLoginDate = now() WHERE username = :username";
                    $query = $this->conn->prepare($sql);
                    $query->bindParam(':username', $username, PDO::PARAM_STR);
                    $query->bindParam(':token', $session_token, PDO::PARAM_STR);
                    $query->execute();
                    $_SESSION['token'] = $session_token;
                    $_SESSION['id'] = $result->id;
                    $_SESSION['role'] = $result->role;
                    $_SESSION['username'] = $result->username;
                    $_SESSION['last_acted_on'] = time();
                    $_SESSION['PassDays'] = $result->Days;
                    if ($password == 'Password01') { //test for default password
                        $_SESSION['DefPass'] = 2;
                    } else {
                        $_SESSION['DefPass'] = 1;
                    }
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    public function loginAuthor($username, $password)
    {
        $role = 'author';
        $sql = "SELECT *, DATE_FORMAT(DateCreated, '%M %d, %Y') as DateCreated, DATEDIFF(Date(Now()),Date(LPasswordCDate)) AS 'Days' FROM Users WHERE username = :username AND role = :role";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':role', $role, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            foreach ($results as $result) {
                $dbPassword = $result->password;
                if (self::generatePassword($password) == $dbPassword) {
                    $session_token = self::getToken(20);
                    $sql = "UPDATE Users SET LastAuthenticatedToken = :token ,LastLoginDate = now() WHERE username = :username";
                    $query = $this->conn->prepare($sql);
                    $query->bindParam(':username', $username, PDO::PARAM_STR);
                    $query->bindParam(':token', $session_token, PDO::PARAM_STR);
                    $query->execute();
                    $_SESSION['token'] = $session_token;
                    $_SESSION['id'] = $result->id;
                    $_SESSION['role'] = $result->role;
                    $_SESSION['username'] = $result->username;
                    $_SESSION['last_acted_on'] = time();
                    $_SESSION['PassDays'] = $result->Days;
                    if ($password == 'Password01') { //test for default password
                        $_SESSION['DefPass'] = 2;
                    } else {
                        $_SESSION['DefPass'] = 1;
                    }
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    public function update($name, $username, $email, $profile_image, $role, $id)
    {
        if ($role == 'admin') {
            $role1 = 'admin';
            $sql = "UPDATE Users SET name = :name, username = :username, email = :email, profile_image = :profile_image, updated_at = now() WHERE id = :id AND role = :role";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':role', $role1, PDO::PARAM_STR);
            $stmt->bindValue(':profile_image', $profile_image, PDO::PARAM_STR);
            $stmt->execute();
        } elseif ($role == 'author') {
            $role2 = 'author';
            $sql = "UPDATE Users SET name = :name, username = :username, email = :email, profile_image = :profile_image, updated_at = now() WHERE id = :id AND role = :role";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':role', $role2, PDO::PARAM_STR);
            $stmt->bindValue(':profile_image', $profile_image, PDO::PARAM_STR);
            $stmt->execute();
        } else {
            $role3 = 'user';
            $sql = "UPDATE Users SET name = :name, username = :username, email = :email, profile_image = :profile_image, updated_at = now() WHERE id = :id AND role = :role";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':role', $role3, PDO::PARAM_STR);
            $stmt->bindValue(':profile_image', $profile_image, PDO::PARAM_STR);
            $stmt->execute();
        }

        return $stmt->rowCount();
    }

    public function deleteAuthor($id)
    {
        $role = 'author';
        $sql = "DELETE FROM users WHERE id = :id AND role = :role";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(':role', $role, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount();
    }

    function getToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[rand(0, $max - 1)];
        }
        return $token;
    }

    function validateTokenID($username, $tokenID)
    {
        $sql = "SELECT * FROM Users WHERE username = :username";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            foreach ($results as $result) {
                if ($result->LastAuthenticatedToken == $tokenID) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    function changePassword($username, $password, $oldpassword)
    {
        if (self::loginAuthor($username, $oldpassword)) {
            if (self::validatePassword($password)) {
                $g_password = self::generatePassword($password);
                $sql = "UPDATE users SET password = :password, LPasswordCDate = Now() WHERE username = :username";
                $query = $this->conn->prepare($sql);
                $query->bindParam(':username', $username, PDO::PARAM_STR);
                $query->bindParam(':password', $g_password, PDO::PARAM_STR);
                $query->execute();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function authenticateUsers($username, $password)
    {
        $sql = "SELECT *,DATEDIFF(Date(Now()),Date(LPasswordCDate)) AS 'Days' FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
        if ($stmt->rowCount() > 0) {
            foreach ($results as $result) {
                $dbPassword = $result->password;
                if (self::generatePassword($password) == $dbPassword) {
                    //multiple logins
                    $session_token = self::getToken(20);
                    $sql1 = "UPDATE users SET LastAuthenticatedToken = :LastAuthenticatedToken, LastLoginDate = now() where username = :username";
                    $stmt = $this->conn->prepare($sql1);
                    $stmt->bindValue(":username", $username, PDO::PARAM_STR);
                    $stmt->execute();

                    $_SESSION['token'] = $session_token;
                    $_SESSION['username'] = strtolower($username);
                    $_SESSION['PassDays'] = $result->Days;
                    if ($password == 'Password01') { //test for default password
                        $_SESSION['DefPass'] = 2;
                    } else {
                        $_SESSION['DefPass'] = 1;
                    }
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

}
