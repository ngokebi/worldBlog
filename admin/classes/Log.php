<?php

include_once "Database.php";

class Log 
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();

    }

    public function logActivity($username, $activity)
    {

        $ipaddress = $_SERVER['REMOTE_ADDR'];
        $sql = "INSERT INTO Logs (logdate, username, activity, ipaddress) VALUES (CURRENT_TIMESTAMP, :username, :activity, :ipaddress)";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':activity', $activity, PDO::PARAM_STR);
        $query->bindParam(':ipaddress', $ipaddress, PDO::PARAM_STR);
        $rs = $query->execute();
        if ($rs) {
            return true;
        } else {
            return false;
        }
    }
}
