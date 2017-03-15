<?php
/**
 * 
 */
class UserModel
{
    private $id;
    private	$uname;
    private $pword;
    private $email;
    private	$is_employee;
    function __construct($id, $uname, $pword, $email, $is_employee)
    {
        $this->id = $id;
        $this->uname = $uname;
        $this->pword = $pword;
        $this->email = $email;
        $this->is_employee = $is_employee;
    }

    public static function findUsingUnamePassword($uname,$pword)
    {
        $db = Db::getInstance();
        $userObj = null;
        $flag = false;
        if ($stmt = $db->prepare('SELECT * FROM `user` WHERE `uname`=? AND `pword`=?')) {

            $stmt->bind_param("ss", $uname,$pword);

            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows == 1){
                if($userRow = $result->fetch_assoc()){
                    $userObj =  new UserModel($userRow['id'],
                                    $userRow['uname'],
                                    $userRow['pword'],
                                    $userRow['email'],
                                    $userRow['isEmployee']);
                    $flag = true;
                }
            }
            /* close statement */
            $stmt->close();
        }
        return $userObj;
    }
    public static function findUsingID($id){
        $db = Db::getInstance();
        $userObj = null;
        $flag = false;
        if ($stmt = $db->prepare('SELECT * FROM `user` WHERE `id`=?')) {

            $stmt->bind_param("s", $id);

            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows == 1){
                if($userRow = $result->fetch_assoc()){
                    $userObj =  new UserModel($userRow['id'],
                                    $userRow['uname'],
                                    $userRow['pword'],
                                    $userRow['email'],
                                    $userRow['isEmployee']);
                    $flag = true;
                }
            }
            /* close statement */
            $stmt->close();
        }
        return $userObj;
    }
    public static function all(){
        
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUname()
    {
        return $this->uname;
    }
    public function setUname($uname)
    {
        $this->uname = $uname;
    }

    public function getPword()
    {
        return $this->pword;
    }
    public function setPword($pword)
    {
        $this->pword = $pword;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function isEmployee()
    {
        return $this->is_employee;
    }
    public function setIsEmployee($is_employee)
    {
        $this->is_employee = $is_employee;
    }
}


?>