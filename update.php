<?php
@session_start();
if(!empty($_SESSION['cert_user']) && !empty($_SESSION['priv']) && $_SESSION['priv']=="admin" || $_SESSION['priv']=="generator"){

 require('cgs.php');

require('header.php');

 $obj = new CGS();
 $ke=$obj->upd($_POST['htnou'],$_POST['snameu'],$_POST['genderu'],$_POST['fnameu'],$_POST['mnameu'],$_POST['yearu'],$_POST['semu'],$_POST['doju'],$_POST['dobu']);
 if(!empty($ke)){
   ?>
   <div class="container-fluid">

     <div class="col-xs-12 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
       <div class="list-group">
         <?php
           $menu_id = 10;
           require_once("menu.php");
         ?>
       </div>
     </div>



      <div class="col-xs-12 col-sm-9">

        <div class="panel panel-info">
          <div class="panel-heading">
            <h4 align='center'>Updated Details</h4>
          </div>

          <div class="panel-body">

            <form class="form-horizontal" role="form">
            <div class="form-group">
              <label for="inputHtno" class="col-sm-6 control-label labelapply3">Admission Number:</label>
              <div class="col-sm-6">
                <?php echo $ke['htno']; ?>
              </div>
            </div>

            <div class="form-group">
              <label for="inputHtno" class="col-sm-6 control-label labelapply3">Student Name:</label>
              <div class="col-sm-6">
                <?php echo $ke['stname']; ?>
              </div>
            </div>

            <div class="form-group">
              <label for="inputHtno" class="col-sm-6 control-label labelapply3" >Father Name:</label>
              <div class="col-sm-6">
                <?php echo $ke['fname']; ?>
              </div>
            </div>

            <div class="form-group">
              <label for="inputHtno" class="col-sm-6 control-label labelapply3">Mother Name:</label>
              <div class="col-sm-6">
                <?php echo $ke['mname']; ?>
              </div>
            </div>

            <div class="form-group">
              <label for="inputHtno" class="col-sm-6 control-label labelapply3">Gender:</label>
              <div class="col-sm-6">
                <?php echo $ke['gender']; ?>
              </div>
            </div>

            <div class="form-group">
              <label for="inputHtno" class="col-sm-6 control-label labelapply3">Year:</label>
              <div class="col-sm-6">
                <?php echo $ke['year']; ?>
              </div>
            </div>

            <div class="form-group">
              <label for="inputHtno" class="col-sm-6 control-label labelapply3" >Sem:</label>

              <div class="col-sm-6">
                <?php echo $ke['sem']; ?>
              </div>
            </div>


            <div class="form-group">
              <label for="inputHtno" class="col-sm-6 control-label labelapply3">DOJ: </label>
              <div class="col-sm-6">
                <?php echo $ke['doj']; ?>
              </div>
            </div>


            <div class="form-group">
              <label for="inputHtno" class="col-sm-6 control-label labelapply3" >DOB:</label>
              <div class="col-sm-6">
                <?php echo $ke['dob']; ?>
              </div>
            </div>
			
			
			
            <div>
            <a href="adminhome.php" class="btn btn-default"> Back </a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

  <?php
  require('footer.php');
  }

  else{
  header('Location:adminhome.php');
  }
}
  ?>
