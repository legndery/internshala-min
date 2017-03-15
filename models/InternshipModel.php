<?php

class InternshipModel {

    private $id;
    private	$title;	
    private $description;
    private	$stipend;
    private	$start_date;
    private	$duration;
    private	$posted_by;



    public function __construct($id='', $title='', $description='', $stipend='', $start_date='', $duration='',$posted_by='')
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->stipend = $stipend;
        $this->start_date = $start_date;
        $this->duration = $duration;
        $this->posted_by = $posted_by;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getStipend()
    {
        return $this->stipend;
    }
    public function setStipend($stipend)
    {
        $this->stipend = $stipend;
    }
    public function getStartDate()
    {
        return $this->start_date;
    }
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }
    public function getDuration()
    {
        return $this->duration;
    }
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }
    public function getPostedBy()
    {
        return $this->posted_by;
    }
    public function setPostedBy($posted_by)
    {
        $this->posted_by = $posted_by;
    }

}

?>