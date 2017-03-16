<?php

/**
 * 
 */
class PostController
{
    public function internship(){
        if(isset($_SESSION['user'])){
            $userobj = $_SESSION['user'];
            if($userobj->getIsEmployee()== 1){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $title = trim($_POST['title']);
                    $description = trim($_POST['description']);
                    $stipend = trim($_POST['stipend']);
                    $stipend_unit = trim($_POST['stipend_unit']);
                    $startDate = trim($_POST['start_date']);
                    $duration = trim($_POST['duration']);
                    $duration_unit = trim($_POST['duration_unit']);
                    if(InternshipModel::insert($title, $description, $stipend.' '.$stipend_unit, $startDate, $duration.' '.$duration_unit,$userobj->getId())){
                        
                        $_SESSION['message'] = new MessageModel(false,"Internship Successfully Posted!");
                        echo($_SESSION['message']->getMsg());
                    }else{
                        $_SESSION['message'] = new MessageModel(true,"Error Occured! Please Try again!");
                        echo($_SESSION['message']->getMsg());
                    }
                }else{
                    require_once('./views/pages/post.internship.view.php');
                }
            }else{
                header('Location: ./?controller=pages&action=error');
            }
        }else{
            header('Location: ./?controller=user&action=login');
        }
    }

    public function apply(){
        if(isset($_SESSION['user'])){
            $userobj = $_SESSION['user'];
            if($userobj->getIsEmployee()== 0){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $internshipID = trim($_POST['internshipID']);
                    $why_hire = trim($_POST['why_hire']);
                    if(InternshipModel::insert($title, $description, $stipend.' '.$stipend_unit, $startDate, $duration.' '.$duration_unit,$userobj->getId())){
                        
                        $_SESSION['message'] = new MessageModel(false,"Internship Successfully Posted!");
                        echo($_SESSION['message']->getMsg());
                    }else{
                        $_SESSION['message'] = new MessageModel(true,"Error Occured! Please Try again!");
                        echo($_SESSION['message']->getMsg());
                    }
                }else{
                    require_once('./views/pages/apply.internship.view.php');
                }
            }else{
                header('Location: ./?controller=pages&action=error');
            }
        }else{
            header('Location: ./?controller=user&action=login');
        }  
    }
}


?>