<?php
class Prison
{
    private $id;
    private $prison;

    public function __construct($id, $prison)
    {
        $this->id = $id;
        $this->prison = $prison;
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
     * Get the value of prison
     */
    public function getPrison()
    {
        return $this->prison;
    }

    /**
     * Set the value of prison
     */
    public function setPrison($prison): self
    {
        $this->prison = $prison;

        return $this;
    }
}
?>