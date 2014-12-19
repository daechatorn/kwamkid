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
				//alert(result[0]['firstname']);
				$(".prefix").val(result[0]['prefix']);
				$(".firstname").val(result[0]['firstname']);
				$(".lastname").val(result[0]['lastname']);
				$("#years").val(result[0]['years']);
				$("#faculty").val(result[0]['faculty']);
				$("#dept").val(result[0]['department']);
				$(".position").val(result[0]['position']);
				$(".university").val(result[0]['university']);
				$(".topiccontent").val(result[0]['topic']);
				$(".maincontent").val(result[0]['maincontent']);
				$(".hiddencontent").val(result[0]['hiddencontent']);
				$(".conclusioncontent").val(result[0]['conclusioncontent']);
				$(".profile").val(result[0]['profileupload']);

				//alert(result[0]['tempID']);
				//$(".videopath").val(result[0]['videopath']);
				//$(".tempID").val(result[0]['tempID']);
				


			},
			error:function(err){
				alert("Error: "+err);
			},
		
		});
}







