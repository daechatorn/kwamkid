<div class="container-fluid" >
      <div class="row">

         <!--menu-->
        <div class="col-sm-3 col-md-2 sidebar" style="margin-top:60px;">
          <ul class="nav nav-sidebar">
            <li ><a href="#">Overview</a></li>
            <li ><a href="#">เพิ่มคำถาม</a></li>
            <li style="background:rgba(255,155,202,0.5)"><a href="#">แก้ไขคำถาม</a></li>
            <li><a href="#">เพิ่มบทความ</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">#</a></li>
            <li><a href="">#</a></li>
            <li><a href="">#</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">#</a></li>
            <li><a href="">#</a></li>
          </ul>
        </div>

    



       
        <!--content-->
        <div class="col-sm-9 " style="margin-top:30px;">
          <h1 class="page-header">Edit question</h1>

          <div class="col-lg-12" style="margin:0% 0% 2% 0%;padding:0%;">
		    <div class="input-group">
		      <input type="text" class="form-control" id="searchbox" name="searchtopic" placeholder="ค้นหาด้วย Topic">
		      <span class="input-group-btn">
		        <button class="btn btn-default" disabled type="button"><span class="glyphicon glyphicon-search"></span></button>
		      </span>
		    </div><!-- /input-group -->
		  </div><!-- /.col-lg-6 -->

		  <div class="col-lg-12" style="margin:0% 0% 2% 0%;padding:0%;">
		  	<table class="table table-hover" id="searchtable">
			 	
			</table>
		  </div><!-- /.col-lg-6 -->


		<?php echo form_open_multipart("editquestion/edit");?>
          <!--Content data-->
          <div class="col-sm-12" style="border:solid;border-color:black">
          	<div class="col-sm-2">
          		Prefix: <select name="prefix" class="prefix" style="width:100%;">
							<option value="นาย">นาย</option>
							<option value="นาง">นาง</option>
							<option value="นางสาว">นางสาว</option>
						</select>
          	</div>
          	<div class="col-sm-5">
          		Firstname: <input type="text" name="firstname" class="firstname" style="width:100%;" placeholder="กรอกข้อมูลชื่อของท่าน"/>
          	</div>
          	<div class="col-sm-5">
          		Lastname: <input type="text" name="lastname" class="lastname" style="width:100%;" placeholder="กรอกข้อมูลนามสกุลของท่าน"/>
          	</div>
          	<div class="col-sm-12" style="background:black;width:95%;margin:1.5% 2.5% 1.5% 2.5%;"></div> <!--hr-->
          	
          	<!--education-->
          	<div class="col-sm-4">
          		Years: <select id="years" style="width:100%;">
							<option value="นักศึกษาชั้นปีที่ 1" selected>นักศึกษาชั้นปีที่ 1</option>
							<option value="นักศึกษาชั้นปีที่ 2">นักศึกษาชั้นปีที่ 2</option>
							<option value="นักศึกษาชั้นปีที่ 3">นักศึกษาชั้นปีที่ 3</option>
							<option value="นักศึกษาชั้นปีที่ 4">นักศึกษาชั้นปีที่ 4</option>
							<option value="นักศึกษาชั้นปีที่ 5">นักศึกษาชั้นปีที่ 5</option>
							<option value="อื่นๆ">อื่นๆ</option>
						</select>
						<input type="text" name="years" id="yearsbox" style="display:none;width:100%;" placeholder="กรอกข้อมูลชั้นปีของท่าน">
					          		<script>
										$(document).ready(function(){
											$("#yearsbox").val($("#years").val());

											$("#years").change(function(){
												$("#yearsbox").val($("#years").val());

												if($("#years").val()=="อื่นๆ"){
													$("#yearsbox").val("");
													$("#yearsbox").css("display","inline");
												}else{
													$("#yearsbox").css("display","none");
												}
											});
										});
									</script>
          	</div>
          	<div class="col-sm-4">
          		Faculty: <select id="faculty" style="width:100%;">
							<option value="คณะวิศวกรรมศาสตร์">คณะวิศวกรรมศาสตร์</option>
							<option value="คณะครุศาสตร์อุตสาหกรรมและเทคโนโลยี">คณะครุศาสตร์อุตสาหกรรมและเทคโนโลยี</option>
							<option value="คณะพลังงานสิ่งแวดล้อมและวัสด">คณะพลังงานสิ่งแวดล้อมและวัสด</option>
							<option value="คณะวิทยาศาสตร์">คณะวิทยาศาสตร์</option>
							<option value="คณะศิลปศาสตร์">คณะศิลปศาสตร์</option>
							<option value="คณะเทคโนโลยีสารสนเทศ">คณะเทคโนโลยีสารสนเทศ</option>
							<option value="คณะทรัพยากรชีวภาพและเทคโนโลยี">คณะทรัพยากรชีวภาพและเทคโนโลยี</option>
							<option value="คณะสถาปัตยกรรมศาสตร์และการออกแบบ">คณะสถาปัตยกรรมศาสตร์และการออกแบบ</option>
							<option value="บัณฑิตวิทยาลัยการจัดการและนวัตกรรม">บัณฑิตวิทยาลัยการจัดการและนวัตกรรม</option>
							<option value="สถาบันวิทยาการหุ่นยนต์ภาคสนาม (FIBO)">สถาบันวิทยาการหุ่นยนต์ภาคสนาม (FIBO)</option>
							<option value="อื่นๆ">อื่นๆ</option>
						</select>
						<input type="text" name="faculty" id="facultybox" style="display:none;width:100%;" placeholder="กรอกข้อมูลคณะของท่าน">
          	</div>
          	<div class="col-sm-4">
          		Department: <select id="dept" disabled style="width:100%;">
					
							</select>
							<input type="text" name="dept" id="deptbox" style="display:none;width:100%;" placeholder="กรอกข้อมูลภาควิชาของท่าน">
          	</div>

          							<script>
										$(document).ready(function(){ //อย่าลืมเปลี่ยนใน changedeptVal() ด้วย ถ้าไม่ทำ เวลาค้นหา dept จะไม่เปลี่ยน
											$("#facultybox").val($("#faculty").val());

											$deptval = "";
											if($("#facultybox").val()=="คณะวิศวกรรมศาสตร์"){
												$deptval = "<option value='ภาควิชาวิศวกรรมไฟฟ้า'>ภาควิชาวิศวกรรมไฟฟ้า</option>"+
												"<option value='ภาควิชาวิศวกรรมคอมพิวเตอร์'>ภาควิชาวิศวกรรมคอมพิวเตอร์</option>"+
												"<option value='ภาควิชาวิศวกรรมอิเล็กทรอนิกส์และโทรคมนาคม'>ภาควิชาวิศวกรรมอิเล็กทรอนิกส์และโทรคมนาคม</option>"+
												"<option value='ภาควิชาวิศวกรรมระบบควบคุมและเครื่องมือวัด'>ภาควิชาวิศวกรรมระบบควบคุมและเครื่องมือวัด</option>"+
												"<option value='ภาควิชาวิศวกรรมเครื่องกล'>ภาควิชาวิศวกรรมเครื่องกล</option>"+
												"<option value='ภาควิชาวิศวกรรมโยธา'>ภาควิชาวิศวกรรมโยธา</option>"+
												"<option value='ภาควิชาวิศวกรรมสิ่งแวดล้อม'>ภาควิชาวิศวกรรมสิ่งแวดล้อม</option>"+
												"<option value='ภาควิชาวิศวกรรมอุตสาหการ>ภาควิชาวิศวกรรมอุตสาหการ</option>"+
												"<option value='ภาควิชาวิศวกรรมเครื่องมือและวัสดุ'>ภาควิชาวิศวกรรมเครื่องมือและวัสดุ</option>"+
												"<option value='ภาควิชาวิศวกรรมเคมี'>ภาควิชาวิศวกรรมเคมี</option>"+
												"<option value='ภาควิชาวิศวกรรมอาหาร'>ภาควิชาวิศวกรรมอาหาร</option>"+
												"<option value='หลักสูตรวิศวกรรมชีวภาพ'>หลักสูตรวิศวกรรมชีวภาพ</option>"+
												"<option value='หลักสูตรวาริชวิศวกรรม'>หลักสูตรวาริชวิศวกรรม</option>";
											}


											$("#dept").html($deptval);
											$("#dept").prop("disabled", false);


											$("#faculty").change(function(){
												$("#facultybox").val($("#faculty").val());

												if($("#faculty").val()=="อื่นๆ"){
													$("#facultybox").val("");
													$("#facultybox").css("display","inline");
													$("#dept").prop("disabled", true);
												}else{
													$("#facultybox").css("display","none");
												}



												if($("#facultybox").val()=="คณะวิศวกรรมศาสตร์"){
													$deptval = "<option value='ภาควิชาวิศวกรรมไฟฟ้า'>ภาควิชาวิศวกรรมไฟฟ้า</option>"+
													"<option value='ภาควิชาวิศวกรรมคอมพิวเตอร์'>ภาควิชาวิศวกรรมคอมพิวเตอร์</option>"+
													"<option value='ภาควิชาวิศวกรรมอิเล็กทรอนิกส์และโทรคมนาคม'>ภาควิชาวิศวกรรมอิเล็กทรอนิกส์และโทรคมนาคม</option>"+
													"<option value='ภาควิชาวิศวกรรมระบบควบคุมและเครื่องมือวัด'>ภาควิชาวิศวกรรมระบบควบคุมและเครื่องมือวัด</option>"+
													"<option value='ภาควิชาวิศวกรรมเครื่องกล'>ภาควิชาวิศวกรรมเครื่องกล</option>"+
													"<option value='ภาควิชาวิศวกรรมโยธา'>ภาควิชาวิศวกรรมโยธา</option>"+
													"<option value='ภาควิชาวิศวกรรมสิ่งแวดล้อม'>ภาควิชาวิศวกรรมสิ่งแวดล้อม</option>"+
													"<option value='ภาควิชาวิศวกรรมอุตสาหการ>ภาควิชาวิศวกรรมอุตสาหการ</option>"+
													"<option value='ภาควิชาวิศวกรรมเครื่องมือและวัสดุ'>ภาควิชาวิศวกรรมเครื่องมือและวัสดุ</option>"+
													"<option value='ภาควิชาวิศวกรรมเคมี'>ภาควิชาวิศวกรรมเคมี</option>"+
													"<option value='ภาควิชาวิศวกรรมอาหาร'>ภาควิชาวิศวกรรมอาหาร</option>"+
													"<option value='หลักสูตรวิศวกรรมชีวภาพ'>หลักสูตรวิศวกรรมชีวภาพ</option>"+
													"<option value='หลักสูตรวาริชวิศวกรรม'>หลักสูตรวาริชวิศวกรรม</option>";
													$("#dept").prop("disabled", false);
													$("#deptbox").css("display","none");
												}
												else if($("#facultybox").val()=="คณะครุศาสตร์อุตสาหกรรมและเทคโนโลยี"){
													$deptval = "<option value='ภาควิชาครุศาสตร์โยธา'>ภาควิชาครุศาสตร์โยธา</option>"+
													"<option value='ภาควิชาครุศาสตร์ไฟฟ้า'>ภาควิชาครุศาสตร์ไฟฟ้า</option>"+
													"<option value='ภาควิชาครุศาสตร์เครื่องกล'>ภาควิชาครุศาสตร์เครื่องกล</option>"+
													"<option value='ภาควิชาครุศาสตร์อุตสาหการ'>ภาควิชาครุศาสตร์อุตสาหการ</option>"+
													"<option value='ภาควิชาเทคโนโลยีและสื่อสารการศึกษา'>ภาควิชาเทคโนโลยีและสื่อสารการศึกษา</option>"+
													"<option value='สาขาวิชาคอมพิวเตอร์และเทคโนโลยี'>สาขาวิชาคอมพิวเตอร์และเทคโนโลยี</option>"+
													"<option value='ภาควิชาเทคโนโลยีการพิมพ์และบรรจุภัณฑ์'>ภาควิชาเทคโนโลยีการพิมพ์และบรรจุภัณฑ์</option>"+
													"<option value='โครงการบริหารร่วมหลักสูตรมีเดียอาตส์และเทคโนโลยีมีเดีย'>โครงการบริหารร่วมหลักสูตรมีเดียอาตส์และเทคโนโลยีมีเดีย</option>";
													$("#dept").prop("disabled", false);
													$("#deptbox").css("display","none");
												}
												else if($("#facultybox").val()=="คณะพลังงานสิ่งแวดล้อมและวัสด"){
													$deptval = "<option value='สายวิชาเทคโนโลยีพลังงาน'>สายวิชาเทคโนโลยีพลังงาน</option>"+
													"<option value='สายวิชาเทคโนโลยีการจัดการพลังงาน'>สายวิชาเทคโนโลยีการจัดการพลังงาน</option>"+
													"<option value='สายวิชาเทคโนโลยีวัสดุ'>สายวิชาเทคโนโลยีวัสดุ</option>"+
													"<option value='สายวิชาเทคโนโลยีสิ่งแวดล้อม'>สายวิชาเทคโนโลยีสิ่งแวดล้อม</option>"+
													"<option value='สายวิชาเทคโนโลยีอุณหภาพ'>สายวิชาเทคโนโลยีอุณหภาพ</option>"+
													"<option value='กลุ่มวิจัยการผลิตและขึ้นรูปพอลิเมอร์'>กลุ่มวิจัยการผลิตและขึ้นรูปพอลิเมอร์</option>"+
													"<option value='กลุ่มงานวิจัยเพื่อการอนุรักษ์พลังงาน (EnConLab)์'>กลุ่มงานวิจัยเพื่อการอนุรักษ์พลังงาน (EnConLab)</option>"+
													"<option value='ศูนย์ดัชนีการอ้างอิงวารสารไทย (TCI)'>ศูนย์ดัชนีการอ้างอิงวารสารไทย (TCI)</option>";
													$("#dept").prop("disabled", false);
													$("#deptbox").css("display","none");
												}
												else if($("#facultybox").val()=="คณะวิทยาศาสตร์"){
													$deptval = "<option value='ภาควิชาคณิตศาสตร์'>ภาควิชาคณิตศาสตร์</option>"+
													"<option value='ภาควิชาเคมี'>ภาควิชาเคมี</option>"+
													"<option value='ภาควิชาจุลชีววิทยา'>ภาควิชาจุลชีววิทยา</option>"+
													"<option value='ภาควิชาฟิสิกส์'>ภาควิชาฟิสิกส์</option>"+
													"<option value='ศูนย์เครื่องมือวิทยาศาสตร์เพื่อมาตรฐานและอุตสาหกรรม'>ศูนย์เครื่องมือวิทยาศาสตร์เพื่อมาตรฐานและอุตสาหกรรม</option>";
													$("#dept").prop("disabled", false);
													$("#deptbox").css("display","none");
												}
												else if($("#facultybox").val()=="คณะศิลปศาสตร์"){
													$deptval = "<option value='สำนักงานวิชาศึกษาทั่วไป'>สำนักงานวิชาศึกษาทั่วไป</option>";
													$("#dept").prop("disabled", false);
													$("#deptbox").css("display","none");
												}
												else if($("#facultybox").val()=="คณะเทคโนโลยีสารสนเทศ"){
													$deptval = "<option value='สาขาวิชาเทคโนโลยีสารสนเทศ'>สาขาวิชาเทคโนโลยีสารสนเทศ</option>"+
													"<option value='สาขาวิชาวิทยาการคอมพิวเตอร์'>สาขาวิชาวิทยาการคอมพิวเตอร์</option>";
													$("#dept").prop("disabled", false);
													$("#deptbox").css("display","none");
												}
												else if($("#facultybox").val()=="คณะทรัพยากรชีวภาพและเทคโนโลยี"){
													$deptval = "<option value='สายวิชาเทคโนโลยีชีวภาพ์'>สายวิชาเทคโนโลยีชีวภาพ</option>"+
													"<option value='สายวิชาเทคโนโลยีชีวเคมี'>สายวิชาเทคโนโลยีชีวเคมี</option>"+
													"<option value='สายวิชาเทคโนโลยีหลังการเก็บเกี่ยว'>สายวิชาเทคโนโลยีหลังการเก็บเกี่ยว</option>"+
													"<option value='สายวิชาการจัดการทรัพยากรชีวภาพ'>สายวิชาการจัดการทรัพยากรชีวภาพ</option>"+
													"<option value='หลักสูตรชีวสารสนเทศและชีววิทยาระบบ'>หลักสูตรชีวสารสนเทศและชีววิทยาระบบ</option>"+
													"<option value='กลุ่มทักษะการจัดการทรัพยากรฐานชุมชน'>กลุ่มทักษะการจัดการทรัพยากรฐานชุมชน</option>";
													$("#dept").prop("disabled", false);
													$("#deptbox").css("display","none");
												}
												else if($("#facultybox").val()=="คณะสถาปัตยกรรมศาสตร์และการออกแบบ"){
													$deptval = "<option value='ภาควิชาสถาปัตยกรรมศาสตร์และการออกแบบ'>ภาควิชาสถาปัตยกรรมศาสตร์และการออกแบบ</option>";
													$("#dept").prop("disabled", false);
													$("#deptbox").css("display","none");
												}
												else if($("#facultybox").val()=="บัณฑิตวิทยาลัยการจัดการและนวัตกรรม"){
													$deptval = "<option value='ภาควิชาบัณฑิตวิทยาลัยการจัดการและนวัตกรรม'>ภาควิชาบัณฑิตวิทยาลัยการจัดการและนวัตกรรม</option>";
													$("#dept").prop("disabled", false);
													$("#deptbox").css("display","none");
												}
												else if($("#facultybox").val()=="สถาบันวิทยาการหุ่นยนต์ภาคสนาม (FIBO)"){
													$deptval = "<option value='สาขาวิชาวิศวกรรมหุ่นยนต์และระบบอัตโนมัติ (ป.ตรี)'>สาขาวิชาวิศวกรรมหุ่นยนต์และระบบอัตโนมัติ (ป.ตรี)</option>"+
													"<option value='สาขาวิชาวิทยาการหุ่นยนต์และระบบอัตโนมัติ (ป.โท)'>สาขาวิชาวิทยาการหุ่นยนต์และระบบอัตโนมัติ (ป.โท)</option>"+
													"<option value='สาขาวิชาธุรกิจเทคโนโลยี (ป.โท)'>สาขาวิชาธุรกิจเทคโนโลยี (ป.โท)</option>"+
													"<option value='สาขาวิชาวิทยาการหุ่นยนต์และระบบอัตโนมัติ (ป.เอก)์'>สาขาวิชาวิทยาการหุ่นยนต์และระบบอัตโนมัติ (ป.เอก)</option>";
													$("#dept").prop("disabled", false);
													$("#deptbox").css("display","none");
												}
												else if($("#faculty").val()=="อื่นๆ"){
													$("#deptbox").css("display","inline");

												}
												

												$("#dept").html($deptval);
												$("#deptbox").val($("#dept").val());
												if($("#faculty").val()=="อื่นๆ"){
													$("#deptbox").css("display","inline");
													$("#deptbox").val("");
												}
												
											});
											$("#deptbox").val($("#dept").val());

											$("#dept").change(function(){
												$("#deptbox").val($("#dept").val());
											});
											
											
										});
									</script>


          	<div class="col-sm-6">
          		Position: <input type="text" name="position" class="position" style="width:100%;" placeholder="กรอกข้อมูลตำแหน่งงานของท่าน" />
          	</div>
          	<div class="col-sm-6" style="margin-bottom:2%">
          		University: <input type="text" name="university" class="university" style="width:100%;" placeholder="กรอกข้อมูลมหาวิทยาลัยของท่าน" />	
          	</div>
          </div>
          
          <br><br>
          <!--Content data-->
          <div class="col-sm-12" style="border:solid;border-color:black;margin-top:2.5%">
          	<div class="col-sm-12">
          		Topic content:
          		<textarea name="topic" class="topiccontent" style="resize: none;width:100%;">

				</textarea>
          	</div>
          	<div class="col-sm-4">
          		Main content:
          		<textarea name="maincontent" class="maincontent" style="resize: none;width:100%;">

				</textarea>
          	</div>
          	<div class="col-sm-4">
          		Hidden content:
          		<textarea name="hiddencontent" class="hiddencontent" style="resize: none;width:100%;">

				</textarea>
          	</div>
          	<div class="col-sm-4" style="margin-bottom:2%">
          		Conclusion content:
          		<textarea name="conclusioncontent" class="conclusioncontent" style="resize: none;width:100%;">

				</textarea>
          	</div>
          </div>

          <!--Other data-->
          <div class="col-sm-12" style="border:solid;border-color:black;margin-top:2.5%;">
          	<div class="col-sm-6">
          		Profile of interviewer: <input type="file" class="profile" name="profile"  size="20" style="width:100%;"/> 
          	</div>
          	<div class="col-sm-6">
          		Background of page: <input type="file" name="picture" size="20"  style="width:100%;"/>
          	</div>

          	<div class="col-sm-6">
          		Video path: <input type="text" name="videopath" id="videopath" style="width:100%;" placeholder="กรอกลิ้งค์วิดีโอบนยูทูปของท่าน"/>
          		
          		
          	</div>
          	<div class="col-sm-6" style="margin-bottom:2%">
          		<input type="hidden" name="qID" class="qID" />
          		template color: <select name="tempID" class="tempID" style="width:100%;">
									<?php 
										foreach ($tempval as $val) {
											echo "<option value='".$val['tempID']."'>";
											echo $val['tempName'];
											echo "</option>";
										}
									?>
								</select>

          	</div>
          </div>

          <div class="col-sm-offset-8 col-sm-4" style="margin-top:1.5%;margin-bottom:2.5%;padding:0;">
          		<input type="submit" value="save" class="btn btn-success" style="width:100%;"/>
          </div>
          <?php echo form_close();?>

        </div>
        
      </div>
      
    </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
	    

  </body>
</html>