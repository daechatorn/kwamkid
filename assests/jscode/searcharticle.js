var searcharticlevalue;

$(document).ready(function(){
	searcharticlevalue = {};
	$("#searcharticlebox").keyup(function(){
		//alert($("#searchbox").val());
		searcharticlevalue = $("#searcharticlebox").val();//alert(searchvalue);
		//alert(searcharticlevalue);
		searchbytopic();
		
	});

});

function searchbytopic(){
	
	if(searcharticlevalue!=""){
		$.ajax({
			
			url:"http://localhost/kwamkid/editarticle/search",
			type:"POST",
			cache:false,
			data:{
				searchval: searcharticlevalue,
			},
			dataType:"JSON",
			
			success:function(result){
				//alert(result);
				$htmlval = "";
				result.forEach(function(entry) {
				    $htmlval += "<tr><td class='success' style='width:80%;'>"+entry['shorttopic']+"</td><td class='success' style='width:20%;'><button class='btn btn-primary'  onClick='getEditArticle("+entry['articleID']+");' style='float:right;width:100%;'>Edit</button></td></tr>";
				});

				$("#searcharticletable").html($htmlval);
			},
			error:function(err){
				alert("Error: "+err);
			},
		
		});
	}
	else{
		$("#searcharticletable").html("");
	}


}


function getEditArticle($aID){
	//alert("getget"+$qID);
		$.ajax({
			
			url:"http://localhost/kwamkid/editarticle/getArticle",
			type:"POST",
			cache:false,
			data:{
				aID: $aID,
			},
			dataType:"JSON",
			
			success:function(result){
				//alert(result[0]['videopath']);
				$("#writer").val(result[0]['writer']);
				$("#shorttopic").val(result[0]['shorttopic']);
				$("#fulltopic").val(result[0]['fulltopic']);
				$("#para1").val(result[0]['paragraph1']);
				$("#para2").val(result[0]['paragraph2']);
				$("#para3").val(result[0]['paragraph3']);

				$("#aID").val(result[0]['articleID']);
				



			},
			error:function(err){
				alert("Error: "+err);
			},
		
		});
}









