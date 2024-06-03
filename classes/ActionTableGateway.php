<?php

require_once __DIR__ . '/Action.php';

class ActionTableGateway
{
    private $link;

    public function __construct($connection)
    {
        $this->link = $connection;
    }

     public function insert($action)
    {
        if (!isset($action)) {
            throw new Exception("action required");
            
        }
        $sql = "INSERT INTO actions(action)"
            . "VALUES (:action)";

            
        $params = array(
            'action' => $action->getAction()
        );
        
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not save action: " . $errorInfo[2]);
        }

        $id = $this->link->lastInsertId('actions');

        return $id;
    }
     public function getActions()
    {
        $sql = "SELECT * FROM actions";
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute();
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve actions: " . $errorInfo[2]);
        }

        $action = array();
        $actions = null;
        $row = $stmt->fetch();
        while ($row != null) {
            $id = $row['id'];
            $action = $row['action'];
            $action = new Action($id, $action);
            $actions[$id] = $action;

            $row = $stmt->fetch();
        }
        return $actions;
    }
     public function getActionByName($name)
    {
        $sql = "SELECT * FROM actions WHERE action = :action";
        $params = array('action' => $name);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve action: " . $errorInfo[2]);
        }

        $action = null;
        if ($stmt->rowCount() == 1) {
             $row = $stmt->fetch();
            $id = $row['id'];
            $name = $row['action'];
            $action = new Action($id, $name);
        }
        return $action;
    }
    public function getActionById($id)
    {
        $sql = "SELECT * FROM actions WHERE id = :id";
        $params = array('id' => $id);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve action: " . $errorInfo[2]);
        }

        $action = null;
        if ($stmt->rowCount() == 1) {
             $row = $stmt->fetch();
            $id = $row['id'];
            $name = $row['action'];
            $action = new Action($id, $name);
        }
        return $action;
    }
}
?>