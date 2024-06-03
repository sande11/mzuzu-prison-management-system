<?php

require_once __DIR__ . '/Prison.php';

class PrisonTableGateway
{
    private $link;

    public function __construct($connection)
    {
        $this->link = $connection;
    }

     public function insert($prison)
    {
        if (!isset($prison)) {
            throw new Exception("prison required");
            
        }
        $sql = "INSERT INTO prisons(prison)"
            . "VALUES (:prison)";

            
        $params = array(
            'prison' => $prison->getPrison()
        );
        
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not save prison: " . $errorInfo[2]);
        }

        $id = $this->link->lastInsertId('prisons');

        return $id;
    }
     public function getPrisons()
    {
        $sql = "SELECT * FROM prisons";
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute();
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve prisons: " . $errorInfo[2]);
        }

        $prison = array();
        $prisons = null;
        $row = $stmt->fetch();
        while ($row != null) {
            $id = $row['id'];
            $prison = $row['prison'];
            $prison = new Prison($id, $prison);
            $prisons[$id] = $prison;

            $row = $stmt->fetch();
        }
        return $prisons;
    }
     public function getPrisonByName($name)
    {
        $sql = "SELECT * FROM prisons WHERE prison = :prison";
        $params = array('prison' => $name);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve prison: " . $errorInfo[2]);
        }

        $prison = null;
        if ($stmt->rowCount() == 1) {
             $row = $stmt->fetch();
            $id = $row['id'];
            $name = $row['prison'];
            $prison = new Prison($id, $name);
        }
        return $prison;
    }
    public function getPrisonById($id)
    {
        $sql = "SELECT * FROM prisons WHERE id = :id";
        $params = array('id' => $id);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve prison: " . $errorInfo[2]);
        }

        $prison = null;
        if ($stmt->rowCount() == 1) {
             $row = $stmt->fetch();
            $id = $row['id'];
            $name = $row['prison'];
            $prison = new Prison($id, $name);
        }
        return $prison;
    }
}
?>