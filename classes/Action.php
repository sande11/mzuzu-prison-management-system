<?php
class Action
{
    private $id;
    private $action;

    public function __construct($id, $action)
    {
        $this->id = $id;
        $this->action = $action;
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
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of action
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set the value of action
     */
    public function setAction($action): self
    {
        $this->action = $action;

        return $this;
    }
}
?>