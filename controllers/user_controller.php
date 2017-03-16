<?php
/**
 * 
 */
class UserController
{

    public function login()
    {   
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $uname = trim($_POST['uname']);
            $pword = md5(trim($_POST['pword']));
            if(($userObj = UserModel::findUsingUnamePassword($uname, $pword)) != null){
                
                $_SESSION['user'] = $userObj;
                $_SESSION['message'] = new MessageModel(false,"Successfully Logged In");
                header('Location: ./');
                // echo($_SESSION['message']->getMsg());
            }else{
                $_SESSION['message'] = new MessageModel(true,"Check Username or Password");
                echo($_SESSION['message']->getMsg());
                require_once('./views/pages/login.view.php');
            }
        }else{
            require_once('./views/pages/login.view.php');
        }
    }


    // private function login_action($uname, $pword) {
    //     $db = Db::getInstance();
    //     $userObj = null;
    //     $flag = false;
    //     if ($stmt = $db->prepare('SELECT * FROM `user` WHERE `uname`=? AND `pword`=?')) {

    //         $stmt->bind_param("ss", $uname,$pword);

    //         $stmt->execute();
    //         $result = $stmt->get_result();
    //         if($result->num_rows == 1){
    //             if($userRow = $result->fetch_assoc()){
    //                 print_r($userRow);
    //                 $userObj =  new UserModel($userRow['id'],
    //                                 $userRow['uname'],
    //                                 $userRow['pword'],
    //                                 $userRow['email'],
    //                                 $userRow['isEmployee']);
    //                 $flag = true;
    //             }
    //         }
    //         /* close statement */
    //         $stmt->close();
    //     }
    //     return $userObj;
    // }
    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = trim($_POST['name']);
            $uname = trim($_POST['uname']);
            $pword = md5(trim($_POST['pword']));
            $email = trim($_POST['email']);
            $isEmployee = trim($_POST['isEmp']);
            if(UserModel::insert($name, $uname, $pword, $email, $isEmployee)){
                $_SESSION['message'] = new MessageModel(false,"Successfully Registered, Now you can login!");
                echo($_SESSION['message']->getMsg());
            }else{
                $_SESSION['message'] = new MessageModel(true,"Error Occured! Please Try again!");
                echo($_SESSION['message']->getMsg());
            }
        }
        require_once('./views/pages/register.view.php');
    }
    // public function register_action($uname, $pword, $email, $isEmployee)
    // {   
    //     $flag = false;
    //     $db = Db::getInstance();
    //     if ($stmt = $db->prepare('INSERT INTO `user`(uname, pword, email, isEmployee) VALUES (?, ?, ?,?)')) {

    //         $stmt->bind_param("ssss", $uname,$pword,$email,$isEmployee);

    //         $stmt->execute();

    //         if($stmt->affected_rows == 1){
    //             $flag =  true;
    //         }
    //         /* close statement */
    //         $stmt->close();
    //     }
    //     return $flag;
    // }
    public function logout(){
        unset($_SESSION['user']);
        header('Location: ./');
    }
}


?>