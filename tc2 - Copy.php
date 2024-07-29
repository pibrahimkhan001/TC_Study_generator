<?php
@session_start(); 
if(!empty($_SESSION['cert_user']) && !empty($_SESSION['priv']) && $_SESSION['priv']=="generator"){

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
          <h2 class="success"> Coming Soon........</h2>
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
