<?php

class UserController
{
    private $user;

    public function __construct($db_name)
    {
        $this->user = new User($db_name);
    }

    public function handleRequst($method)
    {
        switch ($method) {
            case "GET":
                echo json_encode([
                    "status" => true,
                    "data" => $this->user->getAll()
                ]);
                break;

            case "POST":
                $data = json_decode(file_get_contents('php://input'), true);
                $this->user->postData($data['name'], $data['email']);

                echo json_encode([
                    'status' => true,
                    "message" => "User created successfully"
                ]);
                break;

            case "PUT":
                $data = json_decode(file_get_contents("php://input"), true);
                $this->user->updateData($data['id'], $data['name'], $data["email"]);

                echo json_encode([
                    "status" => true,
                    "message" => "User updated successfully"
                ]);
                break;

            case "DELETE":
                $data = json_decode(file_get_contents('php://input'), true);
                $this->user->deleteData($data['id']);

                echo json_encode([
                    "status" => true,
                    "message" => 'User deleted successfully'
                ]);
                break;
        }
    }
}
