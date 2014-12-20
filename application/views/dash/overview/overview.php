<div class="container-fluid" >
      <div class="row">
          <!--menu-->
        <div class="col-sm-3 col-md-2 sidebar" style="margin-top:60px;">
          <ul class="nav nav-sidebar">
            <li style="background:rgba(255,155,202,0.5)"><a href="#">Overview</a></li>
            <li ><a href="#">เพิ่มคำถาม</a></li>
            <li><a href="#">แก้ไขคำถาม</a></li>
            <li><a href="#">#</a></li>
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
          <h1 class="page-header">Dashboard</h1>
          

          <div class="row placeholders" style="margin-left:1px;margin-right:1px;">
            <div class="col-sm-12" style="border:solid;border-color:black;padding:0;"> 
              <div class="col-sm-8"  style="padding:4px;" > 
                <div class="col-sm-4" style="padding:4px;">
                  <h4 style="margin:0;padding:0;" class="sub-header">Comment Detail</h4>
                </div>
                <div class="col-sm-2" style="padding:4px;">
                  <button type="button" class="btn btn-danger" onClick="deldata();" style="width:100%;" aria-label="Left Align">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                  </button>

                </div>
              </div>
              <div class="col-sm-2" style="padding:4px;">
                <button class="btn btn-success" style="width:100%;">Export</button>
              </div>
              <div class="col-sm-2" style="padding:4px;">
                <button class="btn btn-primary" style="width:100%;">Filter</button>
              </div>
            </div>

            <div class="col-sm-12" id="boxmanual" style="border:solid;border-color:black;padding:1px;" hidden>
              <div class="col-sm-1 "  style="padding:0.5px 0 0.5px 0;" > 
                <h5 style="margin:7px;">Topic: </h5> 
              </div>
              <div class="col-sm-11 "  style="padding:0.5px 0 0.5px 0;" > 
                <select class="form-control">
                  <option>ท่านพร้อมหรือไม่พร้อมกับการไปทํางานในประเทศกลุ่ม AEC การเคลื่อนย้ายแรงงาน และมีข้อเสนอแนะอย่างไร</option>
                  <option>2</option>
                  <option>3</option>
                </select>
              </div>

              <div class="col-sm-1" style="padding:0px 0 0.5px 0;">
                <h5 style="margin:7px;">Date From: </h5> 
              </div>
              <div class="col-sm-4" style="padding:0.5px 0 0.5px 0;">
                <input type="date" class="form-control" style="width:100%;"/>
              </div>
              <div class="col-sm-1" style="padding:0.5px 0 0.5px 0;">
                <h5 style="margin:7px;">Date To: </h5> 
              </div>
              <div class="col-sm-4" style="padding:0.5px 0 0.5px 0;">
               <input type="date" class="form-control" style="width:100%;"/>
              </div>
              <div class="col-sm-1" style="padding:0.5px 0 0.5px 0;">
                <input type="submit" class="form-control btn btn-info" style="margin-left:2px;" value="submit" style="width:100%;"/>
              </div>
            </div>
          </div>



          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Comment</th>
                  <th>Question</th>
                  <th>Respondents</th>
                  <th>Date</th>
                  <th>Time</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if(count($comment)==0){
                    echo "<tr>";
                      echo "<td colspan='6' align='center'>"."---- no data ----"."</td>";
                    echo "</tr>";
                  }
                  else{
                    foreach ($comment as $key => $value) {
                      echo "<tr class='rowcontent'>";
                        echo "<td>";
                        echo "<input type='checkbox' name='checkdelete' id='".$value['cID']."' value='".$value['cID']."' />";
                        echo "</td>";

                        echo "<td>";
                        echo $value['detail'];
                        echo "</td>";

                        echo "<td>";
                        echo $value['topic'];
                        echo "</td>";

                        echo "<td>";
                        echo $value['firstname']." ".$value['lastname'];
                        echo "</td>";

                        echo "<td>";
                        echo $value['date'];
                        echo "</td>";

                        echo "<td>";
                        echo $value['time'];
                        echo "</td>";
                      echo "</tr>";
                    }

                  }
                ?>
              </tbody>                                                                      
            </table>
          </div>

          <script type="text/javascript">
            $(document).ready(function(){
                  $(".rowcontent").mouseover(function(){
                    $(this).css("background","rgba(253,52,249,0.3)");
                  });
                  $(".rowcontent").mouseout(function(){
                    $(this).css("background","white");
                  });
            });
          </script>


          <?=$this->pagination->create_links();?>


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
