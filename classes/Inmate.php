<?php
class Inmate
{
    private $id;
    private $code;
    private $first_name;
    private $middle_name;
    private $last_name;
    private $sex;
    private $dob;
    private $address;
    private $marital_status;
    private $eye_color;
    private $complexion;
    private $cell_id;
    private $sentence;
    private $date_from;
    private $date_to;
    private $emergency_name;
    private $emergency_contact;
    private $emergency_relation;
    private $photo;
    private $visiting_privilege;
    private $added_date;

    public function __construct($id, $code, $first_name, $middle_name, $last_name, $sex, $dob, $address, $marital_status, $eye_color, $complexion, $cell_id, $sentence, $date_from, $date_to, $emergency_name, $emergency_contact, $emergency_relation, $photo, $visiting_privilege, $added_date) {
        $this->id = $id;
        $this->code = $code;
        $this->first_name = $first_name;
        $this->middle_name = $middle_name;
        $this->last_name = $last_name;
        $this->sex = $sex;
        $this->dob = $dob;
        $this->address = $address;
        $this->marital_status = $marital_status;
        $this->eye_color = $eye_color;
        $this->complexion = $complexion;
        $this->cell_id = $cell_id;
        $this->sentence = $sentence;
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->emergency_name = $emergency_name;
        $this->emergency_contact = $emergency_contact;
        $this->emergency_relation = $emergency_relation;
        $this->photo = $photo;
        $this->visiting_privilege = $visiting_privilege;
        $this->added_date = $added_date;
    }
    

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of first_name
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     */
    public function setFirstName($first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of middle_name
     */
    public function getMiddleName()
    {
        return $this->middle_name;
    }

    /**
     * Set the value of middle_name
     */
    public function setMiddleName($middle_name): self
    {
        $this->middle_name = $middle_name;

        return $this;
    }

    /**
     * Get the value of last_name
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     */
    public function setLastName($last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of sex
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set the value of sex
     */
    public function setSex($sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set the value of dob
     */
    public function setDob($dob): self
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     */
    public function setAddress($address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of marital_status
     */
    public function getMaritalStatus()
    {
        return $this->marital_status;
    }

    /**
     * Set the value of marital_status
     */
    public function setMaritalStatus($marital_status): self
    {
        $this->marital_status = $marital_status;

        return $this;
    }

    /**
     * Get the value of eye_color
     */
    public function getEyeColor()
    {
        return $this->eye_color;
    }

    /**
     * Set the value of eye_color
     */
    public function setEyeColor($eye_color): self
    {
        $this->eye_color = $eye_color;

        return $this;
    }

    /**
     * Get the value of complexion
     */
    public function getComplexion()
    {
        return $this->complexion;
    }

    /**
     * Set the value of complexion
     */
    public function setComplexion($complexion): self
    {
        $this->complexion = $complexion;

        return $this;
    }

    /**
     * Get the value of cell_id
     */
    public function getCellId()
    {
        return $this->cell_id;
    }

    /**
     * Set the value of cell_id
     */
    public function setCellId($cell_id): self
    {
        $this->cell_id = $cell_id;

        return $this;
    }

    /**
     * Get the value of sentence
     */
    public function getSentence()
    {
        return $this->sentence;
    }

    /**
     * Set the value of sentence
     */
    public function setSentence($sentence): self
    {
        $this->sentence = $sentence;

        return $this;
    }

    /**
     * Get the value of date_from
     */
    public function getDateFrom()
    {
        return $this->date_from;
    }

    /**
     * Set the value of date_from
     */
    public function setDateFrom($date_from): self
    {
        $this->date_from = $date_from;

        return $this;
    }

    /**
     * Get the value of date_to
     */
    public function getDateTo()
    {
        return $this->date_to;
    }

    /**
     * Set the value of date_to
     */
    public function setDateTo($date_to): self
    {
        $this->date_to = $date_to;

        return $this;
    }

    /**
     * Get the value of emergency_name
     */
    public function getEmergencyName()
    {
        return $this->emergency_name;
    }

    /**
     * Set the value of emergency_name
     */
    public function setEmergencyName($emergency_name): self
    {
        $this->emergency_name = $emergency_name;

        return $this;
    }

    /**
     * Get the value of emergency_contact
     */
    public function getEmergencyContact()
    {
        return $this->emergency_contact;
    }

    /**
     * Set the value of emergency_contact
     */
    public function setEmergencyContact($emergency_contact): self
    {
        $this->emergency_contact = $emergency_contact;

        return $this;
    }

    /**
     * Get the value of emergency_relation
     */
    public function getEmergencyRelation()
    {
        return $this->emergency_relation;
    }

    /**
     * Set the value of emergency_relation
     */
    public function setEmergencyRelation($emergency_relation): self
    {
        $this->emergency_relation = $emergency_relation;

        return $this;
    }

    /**
     * Get the value of photo
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     */
    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of visiting_privilege
     */
    public function getVisitingPrivilege()
    {
        return $this->visiting_privilege;
    }

    /**
     * Set the value of visiting_privilege
     */
    public function setVisitingPrivilege($visiting_privilege): self
    {
        $this->visiting_privilege = $visiting_privilege;

        return $this;
    }

    /**
     * Get the value of added_date
     */
    public function getAddedDate()
    {
        return $this->added_date;
    }

    /**
     * Set the value of added_date
     */
    public function setAddedDate($added_date): self
    {
        $this->added_date = $added_date;

        return $this;
    }

    /**
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     */
    public function setCode($code): self
    {
        $this->code = $code;

        return $this;
    }
}
?>