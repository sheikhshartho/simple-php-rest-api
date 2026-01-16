<?php
class Database
{
    private $db = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db_name = 'rest_api';

    public $conn;

    public function connect()
    {
        $this->conn = new mysqli(
            $this->db,
            $this->user,
            $this->pass,
            $this->db_name,

        );
        if ($this->conn->connect_error) {
            die(json_encode([
                "status" => false,
                "message" => 'Database connection failed'
            ]));
        }
        return $this->conn;
    }
}

