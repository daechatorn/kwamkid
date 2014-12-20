//main
var checkdelete;


		$(document).ready(function(){
			


		    $(":checkbox").on("change", function(){
		        var checkboxValues = {};
		        
				checkdelete = {};
		        var count = 0;


		        $(":checkbox").each(function(i){
		         	checkboxValues[this.id] = this.checked; //keep status of checkbox true || false
		          	if(checkboxValues[this.id]){ // if true do this
		          		$("#"+this.id).parent().parent().css("background","rgba(242,195,96,0.3)");

		          		$("#"+this.id).parent().parent().hover(function(){
		          			$(this).css("background","rgba(242,195,96,0.3)");
		          		});

			          	checkdelete[count] = this.id; //keep value to array
			          	//alert("check : "+checkdelete[count]);
			          	count++; //index of array
		          	}
		          	else{ 
		          		$("#"+this.id).parent().parent().mouseover(function(){
		          			$(this).css("background","rgba(253,52,249,0.3)");
		          		});
		          		$("#"+this.id).parent().parent().mouseout(function(){
		          			$(this).css("background","white");
		          		});
		          		//$(".tabledata table tbody tr:hover").css("background","rgba(253,52,249,0.3)");
		        		//space don't select
		        		//alert(this.id);
		          	}

		        }); //loop array parameter

		    });//verify checkbox		    



		});//end jquery

		function deldata(){
			var conf = confirm('Are you sure to delete?'+" "+Object.keys(checkdelete).length+" comment");
			
		    if(conf){
		    	//alert("eiei");
		    	$.ajax({
		    		url: "http://localhost/kwamkid/dashboard/delete",
		    		type:"POST",
		    		cache:false,
		    		data:{
		    			commentid: checkdelete,
		    		},
		    		dataType:"JSON",
		    		success:function(result){
		    			
						window.location.reload();
						alert("Delete "+Object.keys(checkdelete).length+result);

		    		},//success
		    		error:function(err){
		    			alert("ERROR : "+err);
		    		},
		    	});
		    }
		    else{
		    	alert("cancel delete");
		    	return false;
		    }
		}