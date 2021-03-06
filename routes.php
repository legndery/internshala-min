<?php


$controllers = array('pages' => ['home','dashboard', 'error','viewinternship'],
                        'post'=>['internship','apply'],
                        'user'=>['login','register','logout']);




  function call($controller, $action) {
    // require the file that matches the controller name
    require_once('controllers/' . $controller . '_controller.php');

    // create a new instance of the needed controller
    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'user':
        require_once('models/UserModel.php');
        $controller = new UserController();
        break;
      case 'post':
        require_once('models/InternshipModel.php');
        require_once('models/InternshipApplicationModel.php');
        $controller = new PostController();
        break;
    }

    // call the action
    $controller->{ $action }();
  }

  // just a list of the controllers we have and their actions
  // we consider those "allowed" values
  

  // check that the requested controller and action are both allowed
  // if someone tries to access something else he will be redirected to the error action of the pages controller
  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>