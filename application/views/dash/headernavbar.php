<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Kwamkid</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url();?>assests/bootstrap/css/bootstrap.min.css" rel="stylesheet">

   

    
  </head>

  <body>
  	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Kwamkid KMUTT</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <!--
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
        -->
          <form class="navbar-form navbar-right">
            <span style="color:white">Hello, Admin</span>&nbsp;&nbsp;
            <button class="btn btn btn-success">Logout</button>
          </form>
        </div>
      </div>
    </nav>