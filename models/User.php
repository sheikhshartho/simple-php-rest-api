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

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return $row;
        } else {
            return null;
        }
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
