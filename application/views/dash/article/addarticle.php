<div class="container-fluid" >
      <div class="row">

         <!--menu-->
        <div class="col-sm-3 col-md-2 sidebar" style="margin-top:60px;">
          <ul class="nav nav-sidebar">
            <li ><a href="#">Overview</a></li>
            <li ><a href="#">เพิ่มคำถาม</a></li>
            <li><a href="#">แก้ไขคำถาม</a></li>
            <li style="background:rgba(255,155,202,0.5)"><a href="#">เพิมบทความ</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="#">แก้ไขบทความ</a></li>
            <li><a href="#">แก้ไขหน้าแรก</a></li>
          </ul>
        </div>

    



       <?php echo form_open_multipart("addarticle/add");?>
        <!--content-->
        <div class="col-sm-9 " style="margin-top:30px;">
          <h1 class="page-header">Add article</h1>

          
          <!--Content data-->
          <div class="col-sm-12" style="border:solid;border-color:black;padding:0%;">
          	
          	<div class="col-sm-12" style="padding-top:1%;">
	          	<!--writer-->
	          	<div class="col-sm-1" >
	          		Writer: 
	          	</div>
	          	<div class="col-sm-5" >
	          		<input type="text" name="writer" style="width:100%;"/> 
	          	</div>


	          	<!--topic image-->
	          	<div class="col-sm-2" >
	          		Topic image:
	          	</div>
	          	<div class="col-sm-4" >
	          		<input type="file" name="topicimage" size="20" style="width:100%;"/> 
	          	</div>
          	</div>

          	<div class="col-sm-12" style="background:black;width:95%;margin:1.5% 2.5% 1.5% 2.5%;"></div> <!--hr-->
          	
          	<div class="col-sm-12" >
	          	<!--short topic-->
	          	<div class="col-sm-1" >
	          		Short Topic:
	          	</div>
	          	<div class="col-sm-4">
	          		<textarea name="shorttopic" style="resize: none;width:100%;">

					</textarea>
	          	</div>


	          	<!--full topic-->
	          	<div class="col-sm-1" >
	          		Full Topic:
	          	</div>
	          	<div class="col-sm-6">
	          		<textarea name="fulltopic" style="resize: none;width:100%;">

					</textarea>
	          	</div>
          	</div>
          </div>


          <!--Content data-->
          <div class="col-sm-12" style="border:solid;border-color:black;margin-top:1%;padding-top:1%;">
          	
	          	<!--writer-->
	          	<div class="col-sm-1" style="padding:1;">
	          		Paragraph1 image: 
	          	</div>
	          	<div class="col-sm-4" >
	          		<input type="file" name="paragraph1image" size="20" style="width:100%;padding-left:4%;"/> 
	          	</div>
          	
	          	<div class="col-sm-1" style="padding:1;">
	          		Para
	          		graph1:
	          	</div>
	          	<div class="col-sm-6">
	          		<textarea name="paragraph1" style="resize: none;width:100%;">

					</textarea>
	          	</div>
          	
          </div>

          <!--Content data-->
          <div class="col-sm-12" style="border:solid;border-color:black;margin-top:1%;padding-top:1%;">
          	
	          	<!--writer-->
	          	<div class="col-sm-1" style="padding:1;">
	          		Paragraph2 image: 
	          	</div>
	          	<div class="col-sm-4" >
	          		<input type="file" name="paragraph2image" size="20" style="width:100%;padding-left:4%;"/> 
	          	</div>
          	
	          	<div class="col-sm-1" style="padding:1;">
	          		Para
	          		graph2:
	          	</div>
	          	<div class="col-sm-6">
	          		<textarea name="paragraph2" style="resize: none;width:100%;">

					</textarea>
	          	</div>
          	
          </div>

          <!--Content data-->
          <div class="col-sm-12" style="border:solid;border-color:black;margin-top:1%;padding-top:1%;">
          	
	          	<!--writer-->
	          	<div class="col-sm-1" style="padding:1;">
	          		Paragraph3 image: 
	          	</div>
	          	<div class="col-sm-4" >
	          		<input type="file" name="paragraph3image" size="20" style="width:100%;padding-left:4%;"/> 
	          	</div>
          	
	          	<div class="col-sm-1" style="padding:1;">
	          		Para
	          		graph3:
	          	</div>
	          	<div class="col-sm-6">
	          		<textarea name="paragraph3" style="resize: none;width:100%;">

					</textarea>
	          	</div>
          	
          </div>




          
          <div class="col-sm-offset-8 col-sm-4" style="margin-top:1.5%;margin-bottom:2.5%;padding:0;">
          		<input type="submit" value="save" class="btn btn-success" style="width:100%;"/>
          </div>


        </div>
        <?php echo form_close();?>
      </div>
      
    </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?=base_url();?>assests/bootstrap/js/bootstrap.min.js"></script>
	    

  </body>
</html>