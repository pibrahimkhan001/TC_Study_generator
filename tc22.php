<?php
@session_start();
if(!empty($_SESSION['cert_user']) && !empty($_SESSION['priv']) && $_SESSION['priv']=="generator" || $_SESSION['priv']=="admin"){

if(!empty($_POST['sthtno'])){

require('cgs.php');
$cgs_obj = new CGS;
$res = $cgs_obj->getStDetails($_POST['sthtno']);

if(empty($res['status']) || $res['status']==0){
  header('Location: tc1.php?res=nohtno');
}
else{
  require('header.php');
  ?>

  <div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">

      <div class="col-xs-12 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
        <div class="list-group">
          <?php
          $menu_id = 6;
          require_once("menu.php");
          ?>
        </div>
      </div><!--/span-->

      <div class="col-xs-12 col-sm-9">

        <div class="panel panel-info">
          <div class="panel-heading">
            <h4 align='center'>Transfer Certificate Generation</h4>
          </div>

          <div class="panel-body">
            <form class="form-horizontal" role="form" action="tc3.php" method="post">
              <div class="form-group">
                <label for="inputHtno" class="col-sm-6 control-label labelapply3">Hall Ticket Number:</label>
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
                <label for="inputHtno" class="col-sm-6 control-label labelapply3">Nationality,Religion or Caste</label>
                <div class="col-sm-3">
                  <select class="form-control" name="nationality" id="nationality" required="required" onchange="otherp()">
                    <option value="">--select--</option>
				   <option value="hindu">INDIAN,HINDU</option>
                    <option value="christian">INDIAN,CHRISTIAN</option>
                    <option value="muslim">INDIAN,MUSLIM</option>
					 <option value="other">others</option>
                  </select>
                </div>

				<div class="form-group" id="nationality" style="display:none;">
                <label for="inputHtno" class="col-sm-6 control-label labelapply3">&nbsp;</label>
                <div class="col-sm-3">
                  <input type="text" name="otherpurpose" class='form-control' value="" />
                </div>
                <div class="col-sm-3">
                  &nbsp;
                </div>
              </div>
			  <script type="text/javascript">
                function otherp(){
                  if(document.getElementById('nationality').value=="other"){
                    document.getElementById('nationality').style.display = "block";
                  }
                  else{
                    document.getElementById('nationality').style.display = "none";
                  }
                }
              </script>

                <div class="col-sm-3">
                  &nbsp;
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
                <div class="col-sm-1">
                  <?php echo $st."-"; ?>
				   <input type='hidden' name='strt' value='<?php echo $st ?>' />
                </div>
                 <div class="col-sm-2">


                    <select class="form-control" name="end" id="end" required="required" onchange="otherp()">
                      <option value="">--select--</option>
                      <?php

                        for($i=$val;$i<=$yr;$i++){
                          echo "<option value='".$i."'>".$i."</option>";

					   }
                       ?>
                      <option value="other">Other</option>
                    </select>

                </div>
                <div class="col-sm-3">
                  &nbsp;
                </div>
              </div>
			   <div class="form-group">
                 <label for="inputTrans" class="col-sm-6 control-label">Date of Admission:</label>
                <div class="col-sm-6">
                  <?php echo $res['doj']; ?>
                </div>
                </div>


			  <div class="form-group">
                    <label for="inputTrans" class="col-sm-6 control-label">Qualified to Next Class:</label>
               <div class="col-sm-3">
                  <select class="form-control" name="qualify" id="qualify" required="required" onchange="otherp()">
                      <option value="">--select--</option>
                      <option value="yes" selected="selected">YES</option>
                      <option value="no">NO</option>
                    </select>
                </div>
				<div class="col-sm-3">&nbsp;</div>
              </div>
			   <div class="form-group">
                    <label  class="col-sm-6 control-label">Paid All College Due:</label>
                <div class="col-sm-3">
                  <select class="form-control" name="pay" id="pay" required="required" >
                      <option value="">--select--</option>
                      <option value="yes" selected="selected">YES</option>
                      <option value="no">NO</option>
                    </select>
                </div>
				<div class="col-sm-3">&nbsp;</div>
              </div>
			  <div class="form-group">
                    <label  class="col-sm-6 control-label">Undergone Medical Inspection:</label>
                <div class="col-sm-3">
                  <select class="form-control" name="medical" id="medical" required="medical" >
                      <option value="">--select--</option>
                      <option value="yes">YES</option>
                      <option value="no" selected="selected">NO</option>
                    </select>
                </div>
				<div class="col-sm-3">&nbsp;</div>
              </div>
			   <div class="form-group">
                   <label  class="col-sm-6 control-label">Date of Leaving: </label>
                <div class="col-sm-3">
                  <input type="date" name="ldate" value="" class="form-control"  />
			   </div>
			    <div class="col-sm-3">&nbsp;</div>
              </div>
			  <div class="form-group">
                    <label  class="col-sm-6 control-label">Date of Application:</label>
                <div class="col-sm-3">
                  <input type="date" name="appdate" value="" class="form-control"  />
                </div>
				<div class="col-sm-3">&nbsp;</div>
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
              <input type='hidden' name='period' value='<?php echo $_POST['strt']."-".$_POST['end']; ?>' />


              <div class="form-group">
                <div class="col-sm-4" align='right'>
                  <a href="tc1.php" class="btn btn-danger">&nbsp;&nbsp;Abort&nbsp;&nbsp;</a>
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
  header('Location: tc1.php');
}

}
else {
  header('Location: ./');
}
 ?>
