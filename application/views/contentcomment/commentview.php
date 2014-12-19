<html>
<head>
	<title>comment</title>
	<meta charet="UTF-8"> 
	<link href="<?php echo base_url(); ?>assests/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assests/bootstrap/js/bootstrap.min.css" rel="stylesheet">


	<!--css in page-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assests/csscode/commentview.css">

	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


	<!--login face book-->
	<script src="<?php echo base_url();?>assests/jscode/loginfacebook.js" ></script>

	<!--Manage Content-->
	<script >
		$readcount = 0;
		$overcount = 0;
								$(document).ready(function(){


									$("#content2").hide();

									$(".read").click(function(){
										if($readcount==0){
											$("#content2").show();
											$readcount =1;
											$(".read").html("Hide");
										}
										else{
											$("#content2").hide();
											$readcount =0;
											$(".read").html("Read More");
										}
									});

									$(".read").mouseover(function(){
										$(".read").css("background","rgba(255,255,255,1)");
										$(".read").css("border-color","white");
										$(".read").css("color","gray");

									});
									$(".read").mouseout(function(){
										$(".read").css("background","<?php foreach ($contentvalue as $key) {echo $key->boxColor;} ?>"); /*boxColor*/
										$(".read").css("border-color","white");
										$(".read").css("color","white");
									});

								});
	</script>

</head>
<body>

	
	<div class="container">
		<div class="row" >
			<div class="col-md-12" id="boxbackgroundcontent" style="background:url('<?=base_url()?>images/<?php foreach ($contentvalue as $key) {echo $key->imageupload;} ?>') no-repeat ;width:100%;">


				<div class="col-md-offset-7 col-md-5" id="boxcontent" style="background:<?php foreach ($contentvalue as $key) {echo $key->boxColor;} ?>"> <!--boxColor-->
					<div class="boxheader">
						<h3><?php foreach ($contentvalue as $key) {echo $key->topic;} ?></h3> <!--topic-->
						<div class="headercontent">
							<span id="content1">
								<b>
									<?php foreach ($contentvalue as $key) {
										echo $key->prefix;
										echo $key->firstname."&nbsp";
										echo $key->lastname."&nbsp";
										echo $key->years."&nbsp";
										echo $key->department."&nbsp";
										echo $key->faculty."&nbsp";
										echo $key->position."&nbsp";
										echo $key->university."&nbsp";
									} ?>
								</b>  <!--prefix, firstname, lastname, years, department, faculty, position, university-->
								<?php foreach ($contentvalue as $key) {echo $key->maincontent;} ?>
							</span> <!--พาทเเรก: maincontent-->
							<br>
							<span id="content2"><?php foreach ($contentvalue as $key) {echo $key->hiddencontent;} ?></span>
							<!--พาทสองซ่อน: hiddencontent-->
							<br>
							<button class="btn btn-danger read" style="background:<?php foreach ($contentvalue as $key) {echo $key->boxColor;} ?>">Read More</button> <!--boxColor-->

							
						</div> <!--เกริ่นนำเนื้อหา-->

					</div> <!--เกริ่นนำ-->
					
					<div class="boxarticle">
						<div class="articlecontent">
							<span id="test">
								<?php foreach ($contentvalue as $key) {echo $key->conclusioncontent;} ?>
							</span>
						</div>
					</div> <!--ส่วนเด่น: conclusioncontent-->

					
					<hr style="display: block; height: 3px;
    border: 0; border-top: 3px solid #ff8b40;
    margin: 1em 1%; padding: 0; "> 


					<div class="boxfooter">
						<div class="loninbox">
							<span id="status" ></span>
							<span id="firstname"></span>
							<span id="lastname"></span>
							<div id="loginbutton" style="display:inline" >
								<fb:login-button  scope="public_profile,email" onlogin="checkLoginState();">
								</fb:login-button >
							</div>
							<button id="logoutbutton" onclick="logout()" hidden>Logout</button>

						</div> <!--เข้าสู่ระบบ-->
					
						<br>
						
						<div class="kwamkidbox">
							<form><!--boxColor-->
								<input type="hidden" name="qID" value="<?php foreach ($contentvalue as $key) {echo $key->qID;} ?>">
								<textarea disabled style="border-color:<?php foreach ($contentvalue as $key) {echo $key->boxColor;} ?>">

								</textarea>
								<input type="submit" value="send" class="btn btn-success">
							</form>
						</div> 
					</div><!--เเสดงความคิดเห็น-->



				</div> <!--box แสดงเนื้อหา ทั้งหมด-->

			</div>
			
		</div>
	</div>
</body>
</html>