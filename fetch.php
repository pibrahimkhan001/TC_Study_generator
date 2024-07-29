<?php
@session_start();
if(!empty($_SESSION['cert_user']) && !empty($_SESSION['priv']) && $_SESSION['priv']=="admin" || $_SESSION['priv']=="generator"){

 require('cgs.php');

$_SESSION['rollno']=$_POST['rollno'];

 $obj = new CGS();
 $re=$obj->sel($_SESSION['rollno']);

 require('header.php');

 ?>
 <div class="container-fluid">

   <div class="container-fluid">
     <div class="col-xs-12 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
       <div class="list-group">
         <?php
           $menu_id = 10;
           require_once("menu.php");
         ?>
       </div>
     </div>


   <div class="col-sm-9">


      <div class="panel panel-info">
        <div class="panel-heading">
          <h4 align='center'>Student Details</h4>
        </div>

        <div class="panel-body">

          <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="inputHtno" class="col-sm-6 control-label labelapply3">Admission Number:</label>
            <div class="col-sm-6">
              <?php echo $re['htno']; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="inputHtno" class="col-sm-6 control-label labelapply3">Student Name:</label>
            <div class="col-sm-6">
              <?php echo $re['stname']; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="inputHtno" class="col-sm-6 control-label labelapply3" >Father Name:</label>
            <div class="col-sm-6">
              <?php echo $re['fname']; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="inputHtno" class="col-sm-6 control-label labelapply3">Mother Name:</label>
            <div class="col-sm-6">
              <?php echo $re['mname']; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="inputHtno" class="col-sm-6 control-label labelapply3">Gender:</label>
            <div class="col-sm-6">
              <?php echo $re['gender']; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="inputHtno" class="col-sm-6 control-label labelapply3">Year:</label>
            <div class="col-sm-6">
              <?php echo $re['year']; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="inputHtno" class="col-sm-6 control-label labelapply3" >Sem:</label>

            <div class="col-sm-6">
              <?php echo $re['sem']; ?>
            </div>
          </div>


          <div class="form-group">
            <label for="inputHtno" class="col-sm-6 control-label labelapply3">DOJ: </label>
            <div class="col-sm-6">
              <?php echo $re['doj']; ?>
            </div>
          </div>


          <div class="form-group">
            <label for="inputHtno" class="col-sm-6 control-label labelapply3" >DOB:</label>
            <div class="col-sm-6">
              <?php echo $re['dob']; ?>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




 <div class="container-fluid">

   <div class="col-sm-3">
   </div>
<div class="col-sm-9">


  <div class="panel panel-info">
    <div class="panel-heading">
      <h4 align='center'>Update Details</h4>
    </div>

    <div class="panel-body">
            <form class="form-horizontal" role="form" action="update.php" method="post">
          					<div class="form-group">
          						<label for="inputHtno" class="col-sm-4 control-label">Adminssion Number:</label>
          						<div class="col-sm-6">
          							<input type="text" value="<?php echo $re['htno']; ?>" class="form-control" name="htnou" id="inputHtno" placeholder="admissionno"  />
          						</div>
          						<div class="col-sm-2">&nbsp;
          						</div>
          					</div>

                    <div class="form-group">
                      <label for="inputHtno" class="col-sm-4 control-label">Student Name:</label>
                      <div class="col-sm-6">
                        <input type="text" value="<?php echo $re['stname']; ?>" class="form-control" name="snameu" id="inputHtno" placeholder="Studentname"  />
                      </div>
                      <div class="col-sm-2">&nbsp;
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputHtno" class="col-sm-4 control-label">Father Name:</label>
                      <div class="col-sm-6">
                        <input type="text" value="<?php echo $re['fname']; ?>" class="form-control" name="fnameu" id="inputHtno" placeholder="Fathername"  />
                      </div>
                      <div class="col-sm-2">&nbsp;
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputHtno" class="col-sm-4 control-label">Mother Name:</label>
                      <div class="col-sm-6">
                        <input type="text" value="<?php echo $re['mname']; ?>" class="form-control" name="mnameu" id="inputHtno" placeholder="Mothername"  />
                      </div>
                      <div class="col-sm-2">&nbsp;
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputHtno" class="col-sm-4 control-label">Gender:</label>
                      <div class="col-sm-6">
                        <input type="text" value="<?php echo $re['gender']; ?>" class="form-control" name="genderu" id="inputHtno" placeholder="Gender"  />
                      </div>
                      <div class="col-sm-2">&nbsp;
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputHtno" class="col-sm-4 control-label">Year:</label>
                      <div class="col-sm-6">
                        <input type="text" value="<?php echo $re['year']; ?>" class="form-control" name="yearu" id="inputHtno" placeholder="Year"  />
                      </div>
                      <div class="col-sm-2">&nbsp;
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputHtno" class="col-sm-4 control-label">Sem:</label>
                      <div class="col-sm-6">
                        <input type="text" value="<?php echo $re['sem']; ?>" class="form-control" name="semu" id="inputHtno" placeholder="Sem."  />
                      </div>
                      <div class="col-sm-2">&nbsp;
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputHtno" class="col-sm-4 control-label">DOJ:</label>
                      <div class="col-sm-6">
                        <input type="text" value="<?php echo $re['doj']; ?>" class="form-control" pattern="[0-9]{2}[/][0-9]{2}[/][0-9]{4}" title="enter date in dd/mm/yyyy format only" name="doju" id="inputHtno" placeholder="doj"  />
                      </div>
                      <div class="col-sm-2">&nbsp;
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputHtno" class="col-sm-4 control-label">DOB:</label>
                      <div class="col-sm-6">
                        <input type="text" value="<?php echo $re['dob']; ?>" class="form-control" pattern="[0-9]{2}[/][0-9]{2}[/][0-9]{4}" title="enter date in dd/mm/yyyy format only" name="dobu" id="inputHtno" placeholder="dob"  />
                      </div>
                      <div class="col-sm-2">&nbsp;
                      </div>
                    </div>

                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
            </form>
    </div>
  </div>
</div>


</div>





                    <?php
          					if(!empty($_GET['ke'])){
          						if($_GET['ke']==1){
          						 ?>
          						<div class="row">
          							<div class="col-sm-4">&nbsp;</div>
          							<div class="col-xs-12 col-sm-4">
          								<br/><span class='text-danger'> <strong>Updated Successfully</strong> </span>
          							</div>
          							<div class="col-sm-4">&nbsp;</div>
          						</div>
                    <?php

                  }
                }
                  ?>







      <?php
      require('footer.php');
    }

    else{
      header('Location:adminhome.php');
    }
    ?>
