<html>
<head>
	<title>addquestionview</title>
	<meta charset="UTF-8">

	<link href="<?php echo base_url(); ?>assests/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assests/bootstrap/js/bootstrap.min.css" rel="stylesheet">


	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body>

	<?php echo form_open_multipart("add/addquestion");?>
		<!--
		Topic: <input type="text" name="topic" placeholder="กรอกข้อมูลหัวข้อของท่าน"/> <br>
		-->
		Picture of Interviewer: <input type="file" name="picture" size="20"/> 
				<input type="submit" name="bt" value="upload" />
	<?php echo form_close();?>
</body>
</html>