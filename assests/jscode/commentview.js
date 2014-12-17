
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
										$(".read").css("background","rgba(255,155,0,0.7)");
										$(".read").css("border-color","white");
										$(".read").css("color","white");
									});

								});

							