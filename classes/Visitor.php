<?php
class Visitor
{
    private $id;
    private $inmate_id;
    private $full_name;
    private $contact;
    private $relation;
    private $added_date;

    public function __construct($id, $inmate_id, $full_name, $contact, $relation, $added_date)
    {
        $this->id = $id;
        $this->inmate_id = $inmate_id;
        $this->full_name = $full_name;
        $this->contact = $contact;
        $this->relation = $relation;
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
     * Get the value of inmate_id
     */
    public function getInmateId()
    {
        return $this->inmate_id;
    }

    /**
     * Set the value of inmate_id
     */
    public function setInmateId($inmate_id): self
    {
        $this->inmate_id = $inmate_id;

        return $this;
    }

    /**
     * Get the value of full_name
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * Set the value of full_name
     */
    public function setFullName($full_name): self
    {
        $this->full_name = $full_name;

        return $this;
    }

    /**
     * Get the value of contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set the value of contact
     */
    public function setContact($contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get the value of relation
     */
    public function getRelation()
    {
        return $this->relation;
    }

    /**
     * Set the value of relation
     */
    public function setRelation($relation): self
    {
        $this->relation = $relation;

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
}
?>