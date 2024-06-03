<?php

require_once __DIR__ . '/Inmate.php';

class InmateTableGateway
{
    private $link;

    public function __construct($connection)
    {
        $this->link = $connection;
    }

    public function insert($inmate)
    {
        if (!isset($inmate)) {
            throw new Exception("inmate required");

        }
        $sql = "INSERT INTO inmates(code, first_name, middle_name, last_name, sex, dob, address, marital_status, eye_color, complexion, cell_id, sentence, date_from, date_to, emergency_name, emergency_contact, emergency_relation, photo, visiting_privilege, added_date)"
            . "VALUES (:code, :first_name, :middle_name, :last_name, :sex, :dob, :address, :marital_status, :eye_color, :complexion, :cell_id, :sentence, :date_from, :date_to, :emergency_name, :emergency_contact, :emergency_relation, :photo, :visiting_privilege, :added_date)";


        $params = array(
            'code' => $inmate->getCode(),
            'first_name' => $inmate->getFirstName(),
            'middle_name' => $inmate->getMiddleName(),
            'last_name' => $inmate->getLastName(),
            'sex' => $inmate->getSex(),
            'dob' => $inmate->getDob(),
            'address' => $inmate->getAddress(),
            'marital_status' => $inmate->getMaritalStatus(),
            'eye_color' => $inmate->getEyeColor(),
            'complexion' => $inmate->getComplexion(),
            'cell_id' => $inmate->getCellId(),
            'sentence' => $inmate->getSentence(),
            'date_from' => $inmate->getDateFrom(),
            'date_to' => $inmate->getDateTo(),
            'emergency_name' => $inmate->getEmergencyName(),
            'emergency_contact' => $inmate->getEmergencyContact(),
            'emergency_relation' => $inmate->getEmergencyRelation(),
            'photo' => $inmate->getPhoto(),
            'visiting_privilege' => $inmate->getVisitingPrivilege(),
            'added_date' => $inmate->getAddedDate()
        );

        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);

        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not save inmate: " . $errorInfo[2]);
        }

        $id = $this->link->lastInsertId('inmates');

        return $id;
    }
    public function getInmates()
    {
        $sql = "SELECT * FROM inmates";
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute();
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve inmates: " . $errorInfo[2]);
        }

        $inmate = array();
        $inmates = null;
        $row = $stmt->fetch();
        while ($row != null) {
            $id = $row['id'];
            $code = $row['code'];
            $address = $row['address'];
            $first_name = $row['first_name'];
            $middle_name = $row['middle_name'];
            $last_name = $row['last_name'];
            $sex = $row['sex'];
            $dob = $row['dob'];
            $marital_status = $row['marital_status'];
            $eye_color = $row['eye_color'];
            $complexion = $row['complexion'];
            $cell_id = $row['cell_id'];
            $sentence = $row['sentence'];
            $date_from = $row['date_from'];
            $date_to = $row['date_to'];
            $emergency_name = $row['emergency_name'];
            $emergency_contact = $row['emergency_contact'];
            $emergency_relation = $row['emergency_relation'];
            $photo = $row['photo'];
            $visiting_privilege = $row['visiting_privilege'];
            $added_date = $row['added_date'];
            $inmate = new Inmate($id, $code, $first_name, $middle_name, $last_name, $sex, $dob, $address, $marital_status, $eye_color, $complexion, $cell_id, $sentence, $date_from, $date_to, $emergency_name, $emergency_contact, $emergency_relation, $photo, $visiting_privilege, $added_date);
            $inmates[$id] = $inmate;

            $row = $stmt->fetch();
        }
        return $inmates;
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
    public function getInmateById($id)
    {
        $sql = "SELECT * FROM inmates WHERE id = :id";
        $params = array('id' => $id);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve inmate: " . $errorInfo[2]);
        }

        
        $inmate = null;
        $row = $stmt->fetch();
        while ($row != null) {
            $id = $row['id'];
            $code = $row['code'];
            $address = $row['address'];
            $first_name = $row['first_name'];
            $middle_name = $row['middle_name'];
            $last_name = $row['last_name'];
            $sex = $row['sex'];
            $dob = $row['dob'];
            $marital_status = $row['marital_status'];
            $eye_color = $row['eye_color'];
            $complexion = $row['complexion'];
            $cell_id = $row['cell_id'];
            $sentence = $row['sentence'];
            $date_from = $row['date_from'];
            $date_to = $row['date_to'];
            $emergency_name = $row['emergency_name'];
            $emergency_contact = $row['emergency_contact'];
            $emergency_relation = $row['emergency_relation'];
            $photo = $row['photo'];
            $visiting_privilege = $row['visiting_privilege'];
            $added_date = $row['added_date'];
            $inmate = new Inmate($id, $code, $first_name, $middle_name, $last_name, $sex, $dob, $address, $marital_status, $eye_color, $complexion, $cell_id, $sentence, $date_from, $date_to, $emergency_name, $emergency_contact, $emergency_relation, $photo, $visiting_privilege, $added_date);
        }
        return $inmate;
    }
}
?>