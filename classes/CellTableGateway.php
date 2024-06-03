<?php

require_once __DIR__ . '/Cell.php';

class CellTableGateway
{
    private $link;

    public function __construct($connection)
    {
        $this->link = $connection;
    }

    public function insert($cell)
    {
        if (!isset($cell)) {
            throw new Exception("cell required");

        }
        $sql = "INSERT INTO cells(cell, prison_id)"
            . "VALUES (:cell, :prison_id)";


        $params = array(
            'cell' => $cell->getCell(),
            'prison_id' => $cell->getPrisonId()
        );

        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not save cell: " . $errorInfo[2]);
        }

        $id = $this->link->lastInsertId('cells');

        return $id;
    }
    public function getCells()
    {
        $sql = "SELECT * FROM cells";
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute();
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve cells: " . $errorInfo[2]);
        }

        $cell = array();
        $cells = null;
        $row = $stmt->fetch();
        while ($row != null) {
            $id = $row['id'];
            $cell = $row['cell'];
            $prison_id = $row['prison_id'];
            $cell = new Cell($id, $cell, $prison_id);
            $cells[$id] = $cell;

            $row = $stmt->fetch();
        }
        return $cells;
    }
    public function getCellByName($name)
    {
        $sql = "SELECT * FROM cells WHERE cell = :cell";
        $params = array('cell' => $name);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve cell: " . $errorInfo[2]);
        }

        $cell = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            $id = $row['id'];
            $name = $row['cell'];
            $prison_id = $row['prison_id'];
            $cell = new Cell($id, $name, $prison_id);
        }
        return $cell;
    }
    public function getCellByNameAndPrisonId($name, $prison_id)
    {
        $sql = "SELECT * FROM cells WHERE cell = :cell AND prison_id=:prison_id";
        $params = array(
            'cell' => $name,
            'prison_id' => $prison_id
        );
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve cell: " . $errorInfo[2]);
        }

        $cell = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            $id = $row['id'];
            $name = $row['cell'];
            $prison_id = $row['prison_id'];
            $cell = new Cell($id, $name, $prison_id);
        }
        return $cell;
    }
    public function getCellById($id)
    {
        $sql = "SELECT * FROM cells WHERE id = :id";
        $params = array('id' => $id);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve cell: " . $errorInfo[2]);
        }

        $cell = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            $id = $row['id'];
            $name = $row['cell'];
            $prison_id = $row['prison_id'];
            $cell = new Cell($id, $name, $prison_id);
        }
        return $cell;
    }
}
?>