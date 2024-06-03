<?php
class Crime
{
    private $id;
    private $crime;

    public function __construct($id, $crime)
    {
        $this->id = $id;
        $this->crime = $crime;
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
     * Get the value of crime
     */
    public function getCrime()
    {
        return $this->crime;
    }

    /**
     * Set the value of crime
     */
    public function setCrime($crime): self
    {
        $this->crime = $crime;

        return $this;
    }
}
?>