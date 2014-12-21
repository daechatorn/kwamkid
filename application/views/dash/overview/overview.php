<div class="container-fluid" >
      <div class="row">
          <!--menu-->
        <div class="col-sm-3 col-md-2 sidebar" style="margin-top:60px;">
          <ul class="nav nav-sidebar">
            <li style="background:rgba(255,155,202,0.5)"><a href="#">Overview</a></li>
            <li ><a href="#">เพิ่มคำถาม</a></li>
            <li><a href="#">แก้ไขคำถาม</a></li>
            <li><a href="#">เพิ่มบทความ</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="#">แก้ไขบทความ</a></li>
            <li><a href="#">แก้ไขหน้าแรก</a></li>
            <li><a href="">แก้ไขจำนวนคำถามเด่น</a></li>
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
                <button class="btn btn-success exportbutton"  style="width:100%;">Export</button>
              </div>
              <div class="col-sm-2" style="padding:4px;">
                <button class="btn btn-primary filterbutton"  style="width:100%;">Filter</button>
              </div>
            </div>
            <script type="text/javascript">
              $(document).ready(function(){
                $("#exportbox").hide();
                $("#filterbox").hide();
                
                $count = 1;
                $(".exportbutton").click(function(){
                  if($count == 1){
                    $("#exportbox").show();
                    $count = 0;
                  }
                  else{
                    $("#exportbox").hide();
                    $count = 1;
                  }
                });

                $countfil =1;
                $(".filterbutton").click(function(){
                  if($countfil == 1){
                    $("#filterbox").show();
                    $countfil = 0;
                  }
                  else{
                    $("#filterbox").hide();
                    $countfil = 1;
                  }
                });

              });
            </script>

            <?php echo form_open("dashboard/export");?>
              <div class="col-sm-12" id="exportbox" style="border:solid;border-color:black;padding:1px;" >
                <div class="col-sm-1 "  style="padding:0.5px 0 0.5px 0;" > 
                  <h5 style="margin:7px;">Topic: </h5> 
                </div>
                <div class="col-sm-11 "  style="padding:0.5px 0 0.5px 0;" > 
                  <select name="qID" class="form-control">
                    <option value="notchoose">Not Choose</option>
                    <?php 
                      foreach ($topic as $key => $value) {
                        echo "<option value='".$value['qID']."'>"."- ".$value['topic']."</option>";
                      }
                    ?>
                  </select>
                </div>

                <div class="col-sm-1" style="padding:0px 0 0.5px 0;">
                  <h5 style="margin:7px;">Date From: </h5> 
                </div>
                <div class="col-sm-4" style="padding:0.5px 0 0.5px 0;">
                  <input type="date" name="datefrom" value="notchoose" class="form-control" style="width:100%;"/>
                </div>
                <div class="col-sm-1" style="padding:0.5px 0 0.5px 0;">
                  <h5 style="margin:7px;">Date To: </h5> 
                </div>
                <div class="col-sm-4" style="padding:0.5px 0 0.5px 0;">
                 <input type="date" name="dateto" value="notchoose" class="form-control" style="width:100%;"/>
                </div>
                <div class="col-sm-1" style="padding:0.5px 0 0.5px 0;">
                  <input type="submit" class="form-control btn btn-info" style="margin-left:2px;" value="export" style="width:100%;"/>
                </div>
              </div>
            <?php echo form_close();?>

            <?php echo form_open("dashboard/filter");?>
              <div class="col-sm-12" id="filterbox" style="border:solid;border-color:black;padding:1px;" >
                <div class="col-sm-1 "  style="padding:0.5px 0 0.5px 0;" > 
                  <h5 style="margin:7px;">Topic: </h5> 
                </div>
                <div class="col-sm-11 "  style="padding:0.5px 0 0.5px 0;" > 
                  <select name="qID" class="form-control">
                    <option value="notchoose">Not Choose</option>
                    <?php 
                      foreach ($topic as $key => $value) {
                        echo "<option value='".$value['qID']."'>"."- ".$value['topic']."</option>";
                      }
                    ?>
                  </select>
                </div>

                <div class="col-sm-1" style="padding:0px 0 0.5px 0;">
                  <h5 style="margin:7px;">Date From: </h5> 
                </div>
                <div class="col-sm-4" style="padding:0.5px 0 0.5px 0;">
                  <input type="date" name="datefrom" value="notchoose" class="form-control" style="width:100%;"/>
                </div>
                <div class="col-sm-1" style="padding:0.5px 0 0.5px 0;">
                  <h5 style="margin:7px;">Date To: </h5> 
                </div>
                <div class="col-sm-4" style="padding:0.5px 0 0.5px 0;">
                 <input type="date" name="dateto" value="notchoose" class="form-control" style="width:100%;"/>
                </div>
                <div class="col-sm-1" style="padding:0.5px 0 0.5px 0;">
                  <input type="submit" class="form-control btn btn-info" style="margin-left:2px;" value="filter" style="width:100%;"/>
                </div>
              </div>
            <?php echo form_close();?>


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
