<?php

require_once __DIR__ . '/Crime.php';

class CrimeTableGateway
{
    private $link;

    public function __construct($connection)
    {
        $this->link = $connection;
    }

     public function insert($crime)
    {
        if (!isset($crime)) {
            throw new Exception("crime required");
            
        }
        $sql = "INSERT INTO crimes(crime)"
            . "VALUES (:crime)";

            
        $params = array(
            'crime' => $crime->getCrime()
        );
        
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not save cell: " . $errorInfo[2]);
        }

        $id = $this->link->lastInsertId('crimes');

        return $id;
    }
     public function getCrimes()
    {
        $sql = "SELECT * FROM crimes";
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute();
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve crimes: " . $errorInfo[2]);
        }

        $crime = array();
        $crimes = null;
        $row = $stmt->fetch();
        while ($row != null) {
            $id = $row['id'];
            $crime = $row['crime'];
            $crime = new Crime($id, $crime);
            $crimes[$id] = $crime;

            $row = $stmt->fetch();
        }
        return $crimes;
    }
     public function getCrimeByName($name)
    {
        $sql = "SELECT * FROM crimes WHERE crime = :crime";
        $params = array('crime' => $name);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve crime: " . $errorInfo[2]);
        }

        $crime = null;
        if ($stmt->rowCount() == 1) {
             $row = $stmt->fetch();
            $id = $row['id'];
            $name = $row['crime'];
            $crime = new Crime($id, $name);
        }
        return $crime;
    }
    public function getCrimeById($id)
    {
        $sql = "SELECT * FROM crimes WHERE id = :id";
        $params = array('id' => $id);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve prison: " . $errorInfo[2]);
        }

        $crime = null;
        if ($stmt->rowCount() == 1) {
             $row = $stmt->fetch();
            $id = $row['id'];
            $name = $row['crime'];
            $crime = new Crime($id, $name);
        }
        return $crime;
    }
}
?>