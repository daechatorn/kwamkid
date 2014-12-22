<!DOCTYPE html>
<html>
<head>
	<!-- Bootstrap core CSS -->
    <link href="<?=base_url();?>assests/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>   

    <script src="<?=base_url();?>assests/bootstrap/js/bootstrap.min.js"></script> 
</head>
<body>
<div class="container">

      <?php echo form_open("control/login");?>
        <?php print_r($this->session->userdata("login_id"));?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputEmail" name="username" class="form-control" placeholder="username" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
       
        <input class="btn btn-lg btn-primary btn-block" name="bt" type="submit" value="Login">
      </form>

    </div> <!-- /container -->

</body>
</html>