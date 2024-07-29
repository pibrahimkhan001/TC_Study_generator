<?php
@session_start();
if(!empty($_SESSION['cert_user']) && !empty($_SESSION['priv']) && $_SESSION['priv']=="generator"){

if(!empty($_POST['sthtno'])){

require('cgs.php');
$cgs_obj = new CGS;
$res = $cgs_obj->getStDetails($_POST['sthtno']);

if(empty($res['status']) || $res['status']==0){
  header('Location: coonduct1.php?res=nohtno');
}
else{
  require('header.php');
  ?>

  <div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">

      <div class="col-xs-12 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
        <div class="list-group">
          <?php
          $menu_id = 7;
          require_once("menu.php");
          ?>
        </div>
      </div><!--/span-->

      <div class="col-xs-12 col-sm-9">

        <div class="panel panel-info">
          <div class="panel-heading">
            <h4 align='center'>Conduct Certificate Generation</h4>
          </div>

          <div class="panel-body">
            <form class="form-horizontal" role="form" action="conduct3.php" method="post">
              <div class="form-group">
                <label for="inputHtno" class="col-sm-6 control-label labelapply3">Admission Number:</label>
                <div class="col-sm-6">
                  <?php echo $res['htno']; ?>
                </div>
              </div>

              <div class="form-group">
                <label for="inputHtno" class="col-sm-6 control-label labelapply3">Student Name:</label>
                <div class="col-sm-6">
                  <?php echo $res['stname']; ?>
                </div>
              </div>

              <div class="form-group">
                <label for="inputHtno" class="col-sm-6 control-label labelapply3">Father Name:</label>
                <div class="col-sm-6">
                  <?php echo $res['fname']; ?>
                </div>
              </div>

              <div class="form-group">
                <label for="inputHtno" class="col-sm-6 control-label labelapply3">Gender:</label>
                <div class="col-sm-6">
                  <?php
                  if($res['gender']=='M' || $res['gender']=="MALE"){
                      echo "Male<input type='hidden' name='gender' value='M' />";
                  }
                  elseif($res['gender']=='F' || $res['gender']=="FEMALE"){
                      echo "Female<input type='hidden' name='gender' value='F' />";
                  }
                  else{
                    echo "<span style='color:red'>Invalid</span>";
                  }
                   ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputHtno" class="col-sm-6 control-label labelapply3">Course:</label>
                <div class="col-sm-6">
                  <?php echo $res['course']; ?>
                </div>
              </div>

              <div class="form-group">
                <label for="inputHtno" class="col-sm-6 control-label labelapply3">Branch/Specialization:</label>
                <div class="col-sm-6">
                  <?php echo $res['spec']; ?>
                </div>
              </div>
              <script type="text/javascript">
                function otherp(){
                  if(document.getElementById('purpose').value=="other"){
                    document.getElementById('otherpurposeid').style.display = "block";
                  }
                  else{
                    document.getElementById('otherpurposeid').style.display = "none";
                  }
                }
              </script>

              <?php
                $cls = "";
                if(!empty($res['year'])){
                  $cls = $res['year']."&nbsp;";
                }

                $cls = $res['course']." - ";
                $cls = $cls."".$res['spec'];
                $st = (int)"20".substr($res['htno'],0,2);

                $period = $st." - ";
                 $a = array('A'=>4,'R'=>4,'F'=>3,'D'=>2);
                 $s = substr($res['htno'],5,1);
                 $val = $st+1;
                 $yr = (int) date('Y');



              ?>


              <div class="form-group">
                <label for="inputHtno" class="col-sm-6 control-label labelapply3" name="strt">During (Period):</label>
                <div class="col-sm-2">
                  <?php echo $res['doj']."&emsp;&emsp;<b>To</b>"; ?>
				   <input type='hidden' name='strt' value='<?php echo $st ?>' />
                </div>
                <div class="col-sm-2">
                   <select class="form-control" name="mnth" id="mnth" required="required" >
                     <option value="">--select--</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
					          <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>

                   </select>

               </div>
                 <div class="col-sm-2">
                    <select class="form-control" name="end" id="end" required="required" onchange="otherp()">
                      <option value="">--select--</option>
                      <?php

                        for($i=$val;$i<=$yr;$i++){
                          echo "<option value='".$i."'>".$i."</option>";
                        }
                       ?>
                    
                    </select>

                </div>

              </div>




              <input type='hidden' name='htno' value='<?php echo $res['htno']?>' />
              <input type='hidden' name='stname' value='<?php echo $res['stname']?>' />
              <input type='hidden' name='fname' value='<?php echo $res['fname']?>' />
              <input type='hidden' name='mname' value='<?php echo $res['mname']?>' />
              <input type='hidden' name='year' value='<?php echo $res['year']?>' />
              <input type='hidden' name='sem' value='<?php echo $res['sem']?>' />
              <input type='hidden' name='doj' value='<?php echo $res['doj']?>' />
              <input type='hidden' name='dob' value='<?php echo $res['dob']?>' />
              <input type='hidden' name='course' value='<?php echo $res['course']?>' />
              <input type='hidden' name='spec' value='<?php echo $res['spec']?>' />

              <div class="form-group">
                <div class="col-sm-4" align='right'>
                  <a href="conduct1.php" class="btn btn-danger">&nbsp;&nbsp;Abort&nbsp;&nbsp;</a>
                </div>
                <div class="col-sm-offset-3 col-sm-5">
                  <button type="submit" class="btn btn-default">Submit</button>
                </div>
              </div>

                    </form>
                  </div><!--panel body-->
                </div><!--panel info-->

              </div>
            </div>

          </div>
          <?php
          require('footer.php');
}
}
else {
  header('Location: conduct1.php');
}

}
else {
  header('Location: ./');
}
 ?>
