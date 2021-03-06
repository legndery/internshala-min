<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="./style.css" rel="stylesheet">


  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Internshala-Min</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <div class="navbar-right">

          <?php if(!$loggedIn): ?>
            <a href='./?controller=user&action=login' class="btn btn-success">Sign in</a>
            <a href='./?controller=user&action=register' class="btn btn-success">Rregister</a>
            <?php else: ?>
            <span style="color:white">Hi <?php echo $_SESSION['user']->getUname(); ?>!</span>
            <?php if($_SESSION['user']->isEmployee()==1): ?>
            <a href='./?controller=post&action=internship' class="btn btn-success">Post Internship</a>
            <?php endif; ?>
            <a href='./?controller=user&action=logout' class="btn btn-success">Logout</a>
            <?php endif; ?>
          </div>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>