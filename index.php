<?php

//////////////////////////////
require_once('./controllers/connection.php');
require_once('./models/MessageModel.php');
require_once('./models/UserModel.php');
require_once('./models/InternshipModel.php');
require_once('./models/InternshipApplicationModel.php');
/////////////////////////////
session_start();
if(isset($_SESSION['user'])){
    $loggedIn = true;
}else{
    $loggedIn = false;
}
////////////////////////////
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
} else {
    $controller = 'pages';
    $action     = 'home';
}

require_once('views/layout.php');
?>