<?php
class User
{
    private $conn;
    private $table = "users";

    public function __construct($db_name)
    {
        $this->conn = $db_name;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `$this->table`";
        $result = $this->conn->query($sql);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function postData($name, $email)
    {
        $sql = "INSERT INTO `users` ( `name`, `email`) VALUES ( '$name', '$email');";
        return $this->conn->query($sql);
    }

    public function updateData($id, $name, $email)
    {
        $sql = "UPDATE `$this->table` SET `name` = '$name', `email` = '$email' WHERE `$this->table`.`id` = $id;";
        return $this->conn->query($sql);
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM `$this->table` WHERE `$this->table`.`id` = $id";
        return $this->conn->query($sql);
    }
}
