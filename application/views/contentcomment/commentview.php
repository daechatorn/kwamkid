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
										$(".read").css("background","<?php foreach($temp as $tempval){echo $tempval->boxColor;};?>"); /*boxColor*/
										$(".read").css("border-color","white");
										$(".read").css("color","white");
									});

								});
	</script>

</head>
<body>

	
	<div class="container">
		<div class="row">
			<div class="col-md-12" id="boxbackgroundcontent" style="background:url('<?=base_url()?>assests/images/pongsakorn.jpg') no-repeat ;width:100%;">


				<div class="col-md-offset-7 col-md-5" id="boxcontent" style="background:<?php foreach($temp as $tempval){echo $tempval->boxColor;};?>"> <!--boxColor-->
					<div class="boxheader">
						<h3>อะไรคืออุปสรรคสำคัญต่อคุณภาพการเรียนการสอนด้านวิทยาศาสตร์และเทคโนโลยี และเราจะปฏิรูปได้อย่างไร</h3> <!--topic-->
						<div class="headercontent">
							<span id="content1">
								<b>นายพงศกร จงชีวีวัฒน์ นักศึกษาชั้นปีที่ 4 
								ภาควิชาวิศวกรรมเคมี คณะวิศวกรรมศาสตร์ 
								เลขานุการองค์การนักศึกษา 
								มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี
								</b>  <!--prefix, firstname, lastname, years, department, faculty, position, university-->
							มองว่าปัญหาและอุปสรรคที่เป็นปัญหาต่อคุณภาพการเรียนการสอนด้านวิทยา
ศาสตร์และเทคโนโลยี แบ่งเป็น 4 ระดับ คือ 1) ระดับตัวเอง 
จะมองในมุมของคุณภาพการเรียนรู้ 2) ระดับผู้สอน 
คุณภาพการถ่ายทอดของอาจารย์ 3) ระดับครอบครัว สังคม 
ในมุมมองของค่านิยมต่างๆ ที่มีในสังคมที่เน้นเรื่องของการแข่งขัน เช่น 
การแข่งขันทางวิชาการ การแข่งขันสอบเข้าเรียนในสถาบันที่มีคุณภาพ 4) 
ระดับประเทศ เกี่ยวกับหลักสูตรการเรียนการสอน</span> <!--พาทเเรก: maincontent-->
							<br>
							<span id="content2">ใน 4 ระดับนี้ ผมเห็นว่าสิ่งสำคัญคือ ระดับ 3 เกี่ยวกับค่านิยม 

ที่ผมอยากจะใช้เวทีนี้สะท้อนว่าวิทยาศาสตร์และเทคโนโลยี ไม่ได้มุ่งเน้นแต่ทฤษฎีหรือวิชาการ แต่วิทยาศาสตร์ คือ การเรียน การทดลอง และเทคโนโลยีก็คือการนำเอาวิทยาศาสตร์ หรือวิชาการแขนงอื่นๆ มาประยุกต์ใช้ให้เกิดการพัฒนามากยิ่งขึ้น หากค่านิยมในสังคมไทยเกิดการปรับเปลี่ยน 
ก็จะทำให้นักเรียน นักศึกษาเริ่มมองเห็นเป้าหมายในการเรียนรู้ของตัวเองที่ชัดเจนมากยิ่งขึ้นส่งผลให้การถ่ายทอดความรู้ของอาจารย์ก็จะได้มองไปในแนวทางเป้าหมายเดียวกันกับนักเรียน นักศึกษา การเรียนการสอนจะมีมุมมอง มีการปฏิบัติ มีการนำทฤษฎีมาปรับประยุกต์ใช้ได้มากขึ้น สุดท้ายก็จะส่งผลให้คุณภาพของการเรียนการสอนในภาพรวมของประเทศดียิ่งขึ้นด้วย</span>
							<!--พาทสองซ่อน: hiddencontent-->
							<br>
							<button class="btn btn-danger read" style="background:<?php foreach($temp as $tempval){echo $tempval->boxColor;};?>">Read More</button> <!--boxColor-->

							
						</div> <!--เกริ่นนำเนื้อหา-->

					</div> <!--เกริ่นนำ-->
					
					<div class="boxarticle">
						<div class="articlecontent">
							<span id="test">การพัฒนาการปฏิรูปคุณภาพการเรียนการสอนด้านวิทยาศาสตร์และเทคโนโลยี  
ไม่ใช่เรื่องที่ใครคนใดคนหนึ่งต้องทำ  แต่ทุกคนต้องทำเพราะตัวเราเองมีส่วนที่จะทำให้การปฏิรูปของประเทศ ในด้านการเรียนรู้คุณภาพการเรียนสอนในด้านวิทยาศาสตร์และเทคโนโลยีเจริญเติบโตไปข้างหน้าได้
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
								<textarea disabled style="border-color:<?php foreach($temp as $tempval){echo $tempval->boxColor;};?>">

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