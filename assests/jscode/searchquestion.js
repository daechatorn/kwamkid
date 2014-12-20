var searchvalue;

$(document).ready(function(){
	searchvalue = {};
	$("#searchbox").keyup(function(){
		//alert($("#searchbox").val());
		searchvalue = $("#searchbox").val();//alert(searchvalue);
		searchbytopic();
		
	});

});

function searchbytopic(){
	
	if(searchvalue!=""){
		$.ajax({
			
			url:"http://localhost/kwamkid/editquestion/searchbytopic",
			type:"POST",
			cache:false,
			data:{
				searchval: searchvalue,
			},
			dataType:"JSON",
			
			success:function(result){
				//alert(result);
				$htmlval = "";
				result.forEach(function(entry) {
				    $htmlval += "<tr><td class='success' style='width:80%;'>"+entry['topic']+"</td><td class='success' style='width:20%;'><button class='btn btn-primary'  onClick='getEditQuestion("+entry['qID']+");' style='float:right;width:100%;'>Edit</button></td></tr>";
				});

				$("#searchtable").html($htmlval);
			},
			error:function(err){
				alert("Error: "+err);
			},
		
		});
	}
	else{
		$("#searchtable").html("");
	}


}


function getEditQuestion($qID){
	//alert("getget"+$qID);
		$.ajax({
			
			url:"http://localhost/kwamkid/editquestion/getQuestion",
			type:"POST",
			cache:false,
			data:{
				qID: $qID,
			},
			dataType:"JSON",
			
			success:function(result){
				//alert(result[0]['videopath']);
				$("#videopath").val(result[0]['videopath']);
				$(".tempID").val(result[0]['tempID']);
				$(".prefix").val(result[0]['prefix']);
				$(".firstname").val(result[0]['firstname']);
				$(".lastname").val(result[0]['lastname']);
				$("#years").val(result[0]['years']);
				$("#faculty").val(result[0]['faculty']); //ค่าใน box มันไม่เปลี่ยนให้
				$("#facultybox").val($("#faculty").val()); //เปลี่ยนค่าใน box 
				changedeptVal(); //ให้มันไปทำการเลือก dept ใหม่

				$("#dept").val(result[0]['department']);
				$("#deptbox").val($("#dept").val());
				$(".position").val(result[0]['position']);
				$(".university").val(result[0]['university']);
				$(".topiccontent").val(result[0]['topic']);
				$(".maincontent").val(result[0]['maincontent']);
				$(".hiddencontent").val(result[0]['hiddencontent']);
				$(".conclusioncontent").val(result[0]['conclusioncontent']);




			},
			error:function(err){
				alert("Error: "+err);
			},
		
		});
}

function changedeptVal(){
	//lert($facultyval);
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
												
												if($("#faculty").val()=="อื่นๆ"){
													$("#deptbox").css("display","inline");
													$("#deptbox").val("");
												}


}







