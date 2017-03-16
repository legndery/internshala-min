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
    public function insert($internship, $user, $why_hire)
    {
        $flag = false;
        $db = Db::getInstance();
        if ($stmt = $db->prepare('INSERT INTO `internshipapplcation`( `InternshipID`, `UserID`, `WhyHire`) 
        VALUES (?,?,?)')) {

            $stmt->bind_param("sss", $internship, $user, $why_hire);

            $stmt->execute();

            if($stmt->affected_rows == 1){
                $flag =  true;
            }
            /* close statement */
            $stmt->close();
        }
        return $flag;
    }
    public function allByUser($user)
    {
        $db = Db::getInstance();
        $internshipApplication = [];
        $flag = false;
        if ($stmt = $db->prepare('SELECT * FROM `internshipapplcation` WHERE `UserID`=?')) {

            $stmt->bind_param("s", $user);

            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()) {
                $internshipApplication[] = new InternshipApplicationModel(
                    $row['ID'],
                    $row['InternshipID'],
                    $row['UserID'],
                    $row['WhyHire']
                );
            }  
            /* close statement */
            $stmt->close();
        }
        return $internshipApplication;
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