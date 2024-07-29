<?php
@session_start();
if(!empty($_SESSION['cert_user']) && !empty($_SESSION['priv']) && $_SESSION['priv']=="admin" || $_SESSION['priv']=="generator"){

require('header.php');
 ?>

<div class="container-fluid">
  <div class="col-xs-12 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
    <div class="list-group">
      <?php
        $menu_id = 11;
        require_once("menu.php");
      ?>
    </div>
  </div>

<div class="col-xs-12 col-sm-9">
 <div class="panel panel-info">
           				<div class="panel-heading">
           					<h4 align='center'>Admin Panel</h4>
           				</div>
                  <div class="panel-body">
          					<form class="form-horizontal" role="form" action="fetchtc.php" method="post">
                      <div class="form-group">
                        <h4 style="text-align:center">Enter Admission No for which details to be edited.</h4><br>
          						<label for="inputspec_code" class="col-sm-4 control-label">Enter Admission No:</label>
          						<div class="col-sm-4">
          							<input type="text" class="form-control" name="roll" id="inputHtno" placeholder="admission no" pattern="[a-zA-Z0-9]{7,10}" required="required" title="Only Alphabets, digits are allowed with a maximum of 10 characters" maxlength="10" />
          						</div>
          						<div class="col-sm-4">&nbsp;
          						</div>
          					  </div>


                      <div class="form-group">
            						<div class="col-sm-offset-7 col-sm-5">
            							<button type="submit" class="btn btn-primary">Submit</button>
            						</div>
            					</div>

                    </form>
</div>
</div>
</div>


<?php
require('footer.php');
}
else {
  header('Location: ./');
}
 ?>
