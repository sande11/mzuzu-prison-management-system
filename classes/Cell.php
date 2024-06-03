<?php
class Cell
{
    private $id;
    private $cell;
    private $prison_id;

    public function __construct($id, $cell, $prison_id)
    {
        $this->id = $id;
        $this->cell = $cell;
        $this->prison_id = $prison_id;
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
     * Get the value of cell
     */
    public function getCell()
    {
        return $this->cell;
    }

    /**
     * Set the value of cell
     */
    public function setCell($cell): self
    {
        $this->cell = $cell;

        return $this;
    }

    /**
     * Get the value of prison_id
     */
    public function getPrisonId()
    {
        return $this->prison_id;
    }

    /**
     * Set the value of prison_id
     */
    public function setPrisonId($prison_id): self
    {
        $this->prison_id = $prison_id;

        return $this;
    }
}
?>