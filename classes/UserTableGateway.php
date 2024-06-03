<?php

require_once __DIR__ . '/User.php';

class UserTableGateway
{
    private $link;

    public function __construct($connection)
    {
        $this->link = $connection;
    }

     public function insert($user)
    {
        if (!isset($user)) {
            throw new Exception("User required");
            
        }
        $sql = "INSERT INTO users(username, email, password, number, role, status, code) "
            . "VALUES (:username, :email, :password, :number, :role, :status, :code)";

            
        $params = array(
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'number' => $user->getNumber(),
            'role' => $user->getRole(),
            'status' => $user->getStatus(),
            'code' => $user->getCode()
        );
        
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not save user: " . $errorInfo[2]);
        }

        $id = $this->link->lastInsertId('users');

        return $id;
    }
     public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $params = array('id' => $id);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve user: " . $errorInfo[2]);
        }

        $user = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            $id = $row['id'];
            $username = $row['username'];
            $password = $row['password'];
            $number = $row['number'];
            $email = $row['email'];
            $status = $row['status'];
            $code = $row['code'];
            $role = $row['role'];
            $photo = $row['photo'];
            $user = new User($id, $username, $email, $password, $number, $role, $status, $code, $photo);
        }
        return $user;
    }


    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $params = array('email' => $email);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve user email: " . $errorInfo[2]);
        }

        $user = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            $id = $row['id'];
            $username = $row['username'];
            $password = $row['password'];
            $number = $row['number'];
            $email = $row['email'];
            $status = $row['status'];
            $code = $row['code'];
            $role = $row['role'];
            $photo = $row['photo'];
            $user = new User($id, $username, $email, $password, $number, $role, $status, $code, $photo);
        }
        return $user;
    }

    public function getUserByUsername($username)
    {
        $sql = "SELECT * FROM users WHERE username = :username";
        $params = array('username' => $username);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve user: " . $errorInfo[2]);
        }

        $user = null;
        if ($stmt->rowCount() == 1) {
             $row = $stmt->fetch();
            $id = $row['id'];
            $username = $row['username'];
            $password = $row['password'];
            $number = $row['number'];
            $email = $row['email'];
            $status = $row['status'];
            $code = $row['code'];
            $role = $row['role'];
            $photo = $row['photo'];
            $user = new User($id, $username, $email, $password, $number, $role, $status, $code, $photo);
        }
        return $user;
    }
     public function getEmployees()
    {
        $sql = "SELECT * FROM users WHERE role!=3 AND role!=1";
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute();
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve users: " . $errorInfo[2]);
        }

        $users = array();
        $row = $stmt->fetch();
        while ($row != null) {
           $id = $row['id'];
            $username = $row['username'];
            $password = $row['password'];
            $number = $row['number'];
            $email = $row['email'];
            $status = $row['status'];
            $code = $row['code'];
            $role = $row['role'];
            $photo = $row['photo'];
            $user = new User($id, $username, $email, $password, $number, $role, $status, $code, $photo);
            $users[$id] = $user;

            $row = $stmt->fetch();
        }
        return $users;
    }
}

?>