<?php

require_once __DIR__ . '/Visitor.php';

class VisitorTableGateway
{
    private $link;

    public function __construct($connection)
    {
        $this->link = $connection;
    }

     public function insert($visitor)
    {
        if (!isset($visitor)) {
            throw new Exception("Visitor required");
            
        }
        $sql = "INSERT INTO visitors(inmate_id, full_name, contact, relation, added_date) "
            . "VALUES (:inmate_id, :full_name, :contact, :relation, :added_date)";

            
        $params = array(
            'inmate_id' => $visitor->getInmateId(),
            'full_name' => $visitor->getFullName(),
            'contact' => $visitor->getContact(),
            'relation' => $visitor->getRelation(),
            'added_date' => $visitor->getAddedDate()
        );
        
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not save visitor: " . $errorInfo[2]);
        }

        $id = $this->link->lastInsertId('visitors');

        return $id;
    }
     public function getVisitorById($id)
    {
        $sql = "SELECT * FROM visitors WHERE id = :id";
        $params = array('id' => $id);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve visitor: " . $errorInfo[2]);
        }

        $visitor = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            $id = $row['id'];
            $inmate_id = $row['inmate_id'];
            $full_name = $row['full_name'];
            $contact = $row['contact'];
            $relation = $row['relation'];
            $added_date = $row['added_date'];
            $visitor = new Visitor($id, $inmate_id, $full_name, $contact, $relation, $added_date);
        }
        return $visitor;
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

    public function getVisitorsByInmateId($inmate_id)
    {
        $sql = "SELECT * FROM users WHERE inmate_id = :inmate_id";
        $params = array('inmate_id' => $inmate_id);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve user: " . $errorInfo[2]);
        }

        $visitors = array();
        $visitor = null;
        $row = $stmt->fetch();
        while ($row != null) {
           $id = $row['id'];
            $inmate_id = $row['inmate_id'];
            $full_name = $row['full_name'];
            $contact = $row['contact'];
            $relation = $row['relation'];
            $added_date = $row['added_date'];
            $visitor = new Visitor($id, $inmate_id, $full_name, $contact, $relation, $added_date);
            $visitors[$id] = $visitor;

            $row = $stmt->fetch();
        }
        return $visitors;
    }
     public function getVisitors()
    {
        $sql = "SELECT * FROM visitors";
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute();
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve users: " . $errorInfo[2]);
        }

        $visitors = array();
        $visitor = null;
        $row = $stmt->fetch();
        while ($row != null) {
           $id = $row['id'];
            $inmate_id = $row['inmate_id'];
            $full_name = $row['full_name'];
            $contact = $row['contact'];
            $relation = $row['relation'];
            $added_date = $row['added_date'];
            $visitor = new Visitor($id, $inmate_id, $full_name, $contact, $relation, $added_date);
            $visitors[$id] = $visitor;

            $row = $stmt->fetch();
        }
        return $visitors;
    }
}

?>