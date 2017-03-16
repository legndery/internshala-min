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

    public function insert($title='', $description='', $stipend='', $start_date='', $duration='',$posted_by='')
    {
        $flag = false;
        $db = Db::getInstance();
        if ($stmt = $db->prepare('INSERT INTO `internship`(`Title`, `Description`, `Stipend`, `StartDate`, `Duration`, `PostedBy`) 
        VALUES (?,?,?,?,?,?)')) {

            $stmt->bind_param("ssssss", $title, $description, $stipend, $start_date, $duration,$posted_by);

            $stmt->execute();

            if($stmt->affected_rows == 1){
                $flag =  true;
            }
            /* close statement */
            $stmt->close();
        }
        return $flag;
    }

    public function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM `internship`');

        // we create a list of Post objects from the database results
        while($row = $req->fetch_assoc()) {
            $list[] = new InternshipModel(
                $row['ID'],
                $row['Title'],
                $row['Description'],
                $row['Stipend'],
                $row['StartDate'],
                $row['Duration'],
                $row['PostedBy']
            );
        }  

        return $list;
    }
    public function allTrimmed()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM `internship`');

        // we create a list of Post objects from the database results
        while($row = $req->fetch_assoc()) {
            $userObj = UserModel::findUsingID($row['PostedBy']);
            $list[] = new InternshipModel(
                $row['ID'],
                $row['Title'],
                '',
                $row['Stipend'],
                $row['StartDate'],
                $row['Duration'],
                $userObj
            );
        }  

        return $list;
    }

    public function findByID($id)
    {
        $db = Db::getInstance();
        $internshipObj = null;
        $flag = false;
        if ($stmt = $db->prepare('SELECT * FROM `internship` WHERE `ID`=?')) {

            $stmt->bind_param("s", $id);

            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows == 1){
                if($row = $result->fetch_assoc()){
                    $userObj = UserModel::findUsingID($row['PostedBy']);
                    $internshipObj =  new InternshipModel(
                                    $row['ID'],
                                    $row['Title'],
                                    $row['Description'],
                                    $row['Stipend'],
                                    $row['StartDate'],
                                    $row['Duration'],
                                    $userObj
                                );
                    $flag = true;
                }
            }
            /* close statement */
            $stmt->close();
        }
        return $internshipObj;
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