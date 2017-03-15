<?php

/**
 * 
 */
class InternshipApplicationModel {
    private $id;
    private $internship;	
    private $user;
    private	$why_hire;


    function __construct($id='',$internship='',$user='',$why_hire=''){
        $this->id = $id;
        $this->internship = $internship;
        $this->user = $user;
        $this->why_hire = $why_hire;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id='')
    {
        $this->id = $id;
    }
     public function getInternship()
    {
        return $this->internship;
    }
    public function setInternship($internship='')
    {
        $this->internship = $internshipid;
    }
     public function getUser()
    {
        return $this->user;
    }
    public function setUser($user='')
    {
        $this->user = $user;
    }
     public function getWhyHire()
    {
        return $this->why_hire;
    }
    public function setWhyHire($why_hire='')
    {
        $this->why_hire = $why_hire;
    }
}


?>