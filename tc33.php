<?php
@session_start();
if(!empty($_SESSION['cert_user']) && !empty($_SESSION['priv']) && $_SESSION['priv']=="generator" || $_SESSION['priv']=="admin"){

if(!empty($_POST['htno']) && !empty($_POST['stname']) && !empty($_POST['nationality']) && !empty($_POST['doj']) && !empty($_POST['dob']) && (!empty($_POST['year'])) && !empty($_POST['course']) && !empty($_POST['spec']) && !empty($_POST['period'])
	&& !empty($_POST['qualify'])&& !empty($_POST['pay'])&& !empty($_POST['medical']) && !empty($_POST['ldate'])&& !empty($_POST['appdate'])){

$res = $_POST;

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
            <form class="form-horizontal" role="form" action="tc4.php" method="post">
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
                    <label for="inputHtno" class="col-sm-6 control-label labelapply3">Nationality,Religion or Caste</label>
                    <div class="col-sm-6">
                      <?php echo $res['nationality']; ?>
                    </div>
                  </div>

                  <div class="form-group">
				   <label for="inputHtno" class="col-sm-6 control-label labelapply3">Date of Birth:</label>
				   <div class="col-sm-6">
                    <?php echo $res['dob']; ?>
                  </div>
                 </div>
                  <?php
                    $cls = "";
                    if(!empty($res['year'])){
                      $cls = $res['year']."&nbsp;";
                    }

                    $cls = $res['course']." - ";



                    $cls = $cls."".$res['spec'];


                  ?>

                  <div class="form-group">
                    <label for="inputHtno" class="col-sm-6 control-label labelapply3">Class:</label>
                    <div class="col-sm-6">
                      <?php echo $cls; ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputHtno" class="col-sm-6 control-label labelapply3">Date of Admission:</label>
                    <div class="col-sm-3">
                      <?php echo $res['doj']; ?>
                    </div>
                    <div class="col-sm-3">
                      &nbsp;
                    </div>
                  </div>
				   <div class="form-group">
                    <label for="inputHtno" class="col-sm-6 control-label labelapply3">Qualified for Next Higher Class:</label>
                    <div class="col-sm-3">
                      <?php echo $res['qualify']; ?>
                    </div>
                    <div class="col-sm-3">
                      &nbsp;
                    </div>
                  </div>
				   <div class="form-group">
                    <label for="inputHtno" class="col-sm-6 control-label labelapply3">Paid All Due to the College:</label>
                    <div class="col-sm-3">
                      <?php echo $res['pay']; ?>
                    </div>
                    <div class="col-sm-3">
                      &nbsp;
                    </div>
                  </div>
				   <div class="form-group">
                    <label for="inputHtno" class="col-sm-6 control-label labelapply3">Undergone Medical Inspection:</label>
                    <div class="col-sm-3">
                      <?php echo $res['medical']; ?>
                    </div>
                    <div class="col-sm-3">
                      &nbsp;
                    </div>
                  </div>
				   <div class="form-group">
                    <label for="inputHtno" class="col-sm-6 control-label labelapply3">Date on which the pupil Actually left the college:</label>
                    <div class="col-sm-3">
                      <?php echo $res['ldate']; ?>
                    </div>
                    <div class="col-sm-3">
                      &nbsp;
                    </div>
                  </div>
				   <div class="form-group">
                    <label for="inputHtno" class="col-sm-6 control-label labelapply3">Date of application for transfer certificate:</label>
                    <div class="col-sm-3">
                      <?php echo $res['appdate']; ?>
                    </div>
                    <div class="col-sm-3">
                      &nbsp;
                    </div>
                  </div>



                  <input type='hidden' name='htno' value='<?php echo $res['htno']; ?>' />
                  <input type='hidden' name='stname' value='<?php echo $res['stname']; ?>' />
                  <input type='hidden' name='nationality' value='<?php echo $res['nationality']; ?>' />
                  <input type='hidden' name='dob' value='<?php echo $res['dob']; ?>' />
                  <input type='hidden' name='doj' value='<?php echo $res['doj']; ?>' />
                  <input type='hidden' name='class' value='<?php echo $cls; ?>' />
                  <input type='hidden' name='period' value='<?php echo $period; ?>' />
                  <input type='hidden' name='qualify' value='<?php echo $res['qualify']; ?>' />
                  <input type='hidden' name='period' value='<?php echo $_POST['strt']."-".$_POST['end']; ?>' />
				  <input type='hidden' name='end' value='<?php echo $_POST['end']; ?>' />
				   <input type='hidden' name='pay' value='<?php echo $res['pay']; ?>' />
				    <input type='hidden' name='medical' value='<?php echo $res['medical']; ?>' />
					 <input type='hidden' name='ldate' value='<?php echo $res['ldate']; ?>' />
					  <input type='hidden' name='appdate' value='<?php echo $res['appdate']; ?>' />


                  <div class="form-group">
                    <div class="col-sm-4" align='right'>
                      <a href="tc1.php" class="btn btn-danger">&nbsp;&nbsp;Abort&nbsp;&nbsp;</a>
                    </div>
                    <div class="col-sm-offset-3 col-sm-5">
                      <button type="submit" class="btn btn-default">Generate Certificate</button>
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
else {
  header('Location:tc1.php ');
}

}
else {
  header('Location: ./');
}
 ?>
