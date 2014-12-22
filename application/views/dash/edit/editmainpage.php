<div class="container-fluid" >
      <div class="row">

         <!--menu-->
        <div class="col-sm-3 col-md-2 sidebar" style="margin-top:60px;">
          <ul class="nav nav-sidebar">
            <li ><a href="#">Overview</a></li>
            <li ><a href="#">เพิ่มคำถาม</a></li>
            <li><a href="#">แก้ไขคำถาม</a></li>
            <li ><a href="#">เพิมบทความ</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="#">แก้ไขบทความ</a></li>
            <li style="background:rgba(255,155,202,0.5)"><a href="#">แก้ไขหน้าแรก</a></li>
          </ul>
        </div>

    



       
        <!--content-->
        <div class="col-sm-9 " style="margin-top:30px;">
          <h1 class="page-header">Edit Background Mainpage</h1>

          
          <!--Content data-->
          <div class="col-sm-12" style="border:solid;border-color:black;padding:1%;">
          	<div class="col-sm-8">
          		<div class="col-sm-2">
          			รูปปัจจุบัน: 
          		</div>
          		<div class="col-sm-10">
          			<img src="<?=base_url();?>images/background/<?php echo $path['partbg'];?>" width="100%;" height="100%;">
          		</div>
          	</div>

          	<div class="col-sm-4">
          		<?php echo form_open_multipart("editmainpage/edit");?>
	          		<input type="file" name="centerbg" size="20" style="width:100%;padding-bottom:6%;"/>
	          		<input type="submit" class="btn btn-success" style="width:100%;" value="change"/> 
          		<?php echo form_close();?>
          	</div>
          	
          </div>


        </div>
      </div>
      
    </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?=base_url();?>assests/bootstrap/js/bootstrap.min.js"></script>
	    

  </body>
</html>