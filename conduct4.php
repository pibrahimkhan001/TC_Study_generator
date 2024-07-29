<?php
@session_start();
if(!empty($_SESSION['cert_user']) && !empty($_SESSION['priv']) && $_SESSION['priv']=="generator"){

if(!empty($_POST['htno']) && !empty($_POST['stname']) && !empty($_POST['fname']) && !empty($_POST['mname']) && !empty($_POST['gender']) && ($_POST['gender']=='M' || $_POST['gender']=='F') && !empty($_POST['class']) && !empty($_POST['period'])){

$res = $_POST;

require("cgs.php");
$cgs_obj = new CGS;
$sno = $cgs_obj->coSrno();
$x=str_pad($sno,6,0,STR_PAD_LEFT);
$insres = $cgs_obj->conductCert($x,$res['htno'],$res['stname'],$res['fname'],$res['gender'],$res['class'],$_POST['period'],$_SESSION['cert_user']);

if($res['gender']=='M'){
  $g1 = "Mr.";
  $g2 = "son";
  $g3 = "him";
  $g4 = "his";
}
else{
  $g1 = "Ms.";
  $g2 = "daughter";
  $g3 = "her";
  $g4 = "her";
}


  require('header.php');
  ?>

  <div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left dontprint">

      <div class="col-xs-12 col-sm-3 sidebar-offcanvas dontprint" id="sidebar" role="navigation">
        <div class="list-group">
          <?php
          $menu_id = 7;
          require_once("menu.php");
          ?>
        </div>
      </div><!--/span-->

      <div class="col-xs-12 col-sm-9">

        <div class="panel panel-info dontprint">
          <div class="panel-heading">
            <h4 align='center'>Conduct Certificate Generation</h4>
          </div>

          <div class="panel-body">
            <form class="form-horizontal" role="form" action="conduct4.php" method="post">
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
                    <label for="inputHtno" class="col-sm-6 control-label labelapply3">Certificate:</label>
                    <div class="col-sm-6">
                      <?php echo "Conduct Certificate"; ?>
                    </div>
                  </div>

                  <div class="col-sm-12" align='center'>
                    <button type="button" name="button" class="btn btn-link" onClick="window.print()" />If Certificate Not Generated automatically, click here</button>
                  </div>
                  <br/>
                  <div class="form-group">
                    <div class="col-sm-4" align='right'>
                      <a href="conduct1.php" class="btn btn-default">&nbsp;&nbsp;Back&nbsp;&nbsp;</a>
                    </div>
                    <div class="col-sm-8">&nbsp;</div>
                  </div>
                  <?php if($insres==0){ ?>
                  <br/>
                  <div class="col-sm-12" align='center'>
                    <span style="color:red"> Please Contact Administrator with ErrorName 'ConductNotInserted' </span>
                  </div>
                  <?php } ?>

                    </form>
                  </div><!--panel body-->
                </div><!--panel info-->

              </div>
            </div>
            <style media="print">
              .data{
                  font-weight: bold;
                  text-decoration: underline;
              }
              .datapurpose{
                  font-weight: bold;
              }
            </style>

            <div class="row doprint" STYLE=" margin:1mm 1mm 1mm 1mm; border: 5px double #000000; width:185mm; height:145mm;">
              <div class="col-sm-12" style="font-family:'Book Antiqua';">
                <div align='center' style=" padding-top:10px; letter-spacing:1px; font-weight: bold;">
                  <span style="font-size:1em;">JAWAHARLAL NEHRU TECHNOLOGICAL UNIVERSITY ANANTAPUR</span><br/>
                  <span style="font-size:1em;">COLLEGE OF ENGINEERING (<i>Autonomous</i>), ANANTHAPURAMU</span><br/>
                  <span style="font-size:1em; padding-top:10px;">ANDHRA PRADESH, INDIA - 515002</span><br/>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<img src="images/jntuacea.png" alt="JNTUACEA" width="70px" height="70px" style="margin:10px; " />&emsp;&emsp;&emsp;&emsp;S.No :<?php echo $x ; ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<br/><span class="data" style="font-family:'Arial'; font-size:1em; margin-bottom:8px; letter-spacing: 2px;">CONDUCT CERTIFICATE</span><br>
                </div>
                <br/>

				<table style=" line-height:2em; width:100%;">

				  <tr>
				    <td  style="font-size:1.1em;">&emsp;&emsp;Name of the Student</td>
					<td>:&emsp;&emsp; <b><?php echo '<span ">'.$g1.' '.$res['stname'].'</span>'; ?></b></td>
				  </tr>
				  <tr>
				    <td style="font-size:1.1em;">&emsp;&emsp;Admisson Number&emsp;&emsp;</td>
					<td>:&emsp;&emsp;<b><?php echo '<span ">'.$res['htno'].'</span>'; ?></b></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.1em;">&emsp;&emsp;Class of Study&emsp;&emsp;</td>
					<td>:&emsp;&emsp;<b><?php echo '<span ">'.$res['class'].'</span>'; ?></b></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.1em;">&emsp;&emsp;Period of Study</td>
					<td>:&emsp;&emsp;<b><?php echo $res['period']; ?></b></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.1em;">&emsp;&emsp;Conduct</td>
					<td>:&emsp;&emsp;________________________________________________</td>
				  </tr>
				   <tr>
				    <td style="font-size:1.1em;">&emsp;&emsp;General Remarks</td>
					<td>:&emsp;&emsp;_________________________________________________</td>
				  </tr>
				</table>

				<div  style="padding-right:15px; font-weight: bold; font-size:1.1em;">
                  <br><br>
                 &emsp;&emsp;&emsp; DATE: <?php echo date("d/m/Y"); ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;PRINCIPAL
                </div>


              </div>
            </div>

            <div class="row doprint" STYLE=" margin:4mm 1mm 1mm 1mm; border: 5px double #000000; width:185mm; height:130mm;">
              <div class="col-sm-12" style="font-family:'Book Antiqua';">
                <div align='center' style=" padding-top:8px; letter-spacing:1px; font-weight: bold;">
                  <span style="font-size:1em;">JAWAHARLAL NEHRU TECHNOLOGICAL UNIVERSITY ANANTAPUR</span><br/>
                  <span style="font-size:1em;">COLLEGE OF ENGINEERING (<i>Autonomous</i>), ANANTHAPURAMU</span><br/>
                  <span style="font-size:1em; padding-top:10px;">ANDHRA PRADESH, INDIA - 515002</span><br/>
           <span>Office Copy(Date:<?php echo date("d/m/Y"); ?>)</span>&emsp;&emsp;<img src="images/jntuacea.png" alt="JNTUACEA" width="70px" height="70px" style="margin:10px;" />&emsp;&emsp;&emsp;&emsp;S.No :<?php echo $x ; ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<br/>
                  <span class="data" style="font-family:'Arial'; font-size:1em; margin-bottom:8px; letter-spacing: 2px;">CONDUCT CERTIFICATE</span>
                </div>
                <br/>

            <table style=" line-height:2em; width:100%;">

            <tr>
            <td  style="font-size:1em;">&emsp;&emsp;Name of the Student&emsp;&emsp;</td>
            <td>:&emsp;&emsp; <b><?php echo $g1.' '.$res['stname']; ?></b></td>
            </tr>
            <tr>
            <td style="font-size:1em;">&emsp;&emsp;Admisson Number&emsp;&emsp;</td>
            <td>:&emsp;&emsp;<b><?php echo $res['htno']; ?></b></td>
            </tr>
            <tr>
            <td style="font-size:1em;">&emsp;&emsp;Class of Study&emsp;&emsp;</td>
            <td>:&emsp;&emsp;<b><?php echo $res['class']; ?></b></td>
            </tr>
            <tr>
            <td style="font-size:1em;">&emsp;&emsp;Period of Study</td>
            <td>:&emsp;&emsp;<b><?php echo $res['period']; ?></b></td>
            </tr>
            <tr>
            <td style="font-size:1em;">&emsp;&emsp;Conduct</td>
            <td>:&emsp;&emsp;________________________________________________</td>
            </tr>
            <tr>
            <td style="font-size:1em;">&emsp;&emsp;General Remarks</td>
            <td>:&emsp;&emsp;_________________________________________________</td>
            </tr>
            </table>
            <div  style="padding-right:15px; font-weight: bold; font-size:1em;">
                      <br><br><br>
                     &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;PRINCIPAL
                    </div>

                </div>


              </div>
            </div>


          </div>

          <script type="text/javascript">
            window.print();
          </script>
          <?php
          require('footer.php');

}
else {
  header('Location: conduct1.php');
}

}
else {
  header('Location: ./');
}
 ?>
