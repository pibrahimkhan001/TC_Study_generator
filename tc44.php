<?php
@session_start();
if(!empty($_SESSION['cert_user']) && !empty($_SESSION['priv']) && $_SESSION['priv']=="generator" || $_SESSION['priv']=="admin"){

if(!empty($_POST['htno']) && !empty($_POST['stname']) && !empty($_POST['nationality']) && !empty($_POST['doj']) && !empty($_POST['dob'])  &&  !empty($_POST['class']) && !empty($_POST['period']) && !empty($_POST['qualify'])&& !empty($_POST['pay'])&& !empty($_POST['medical']) && !empty($_POST['ldate'])&& !empty($_POST['appdate'])){

$res = $_POST;

require("cgs.php");
$cgs_obj = new CGS;
$insres = $cgs_obj->tcCert($res['htno'],$res['stname'],$res['nationality'],$res['dob'],$res['doj'],$_POST['class'],$res['qualify'],$res['pay'],$res['medical'],$res['ldate'],$res['appdate'],$_SESSION['cert_user']);

/*if($res['gender']=='M'){
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
}*/


  require('header.php');
  ?>

  <div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left dontprint">

      <div class="col-xs-12 col-sm-3 sidebar-offcanvas dontprint" id="sidebar" role="navigation">
        <div class="list-group">
          <?php
          $menu_id = 6;
          require_once("menu.php");
          ?>
        </div>
      </div><!--/span-->

      <div class="col-xs-12 col-sm-9">

        <div class="panel panel-info dontprint">
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
                    <label for="inputHtno" class="col-sm-6 control-label labelapply3">Certificate:</label>
                    <div class="col-sm-6">
                      <?php echo "Transfer Certificate"; ?>
                    </div>
                  </div>

                  <div class="col-sm-12" align='center'>
                    <button type="button" name="button" class="btn btn-link" onClick="window.print()" />If Certificate Not Generated automatically, click here</button>
                  </div>
                  <br/>
                  <div class="form-group">
                    <div class="col-sm-4" align='right'>
                      <a href="tc1.php" class="btn btn-default">&nbsp;&nbsp;Back&nbsp;&nbsp;</a>
                    </div>
                    <div class="col-sm-8">&nbsp;</div>
                  </div>
                  <?php if($insres==0){ ?>
                  <br/>
                  <div class="col-sm-12" align='center'>
                    <span style="color:red"> Please Contact Administrator with ErrorName 'TransferCertNotInserted' </span>
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

            <div class="row doprint" STYLE=" margin:10mm 10mm 1mm 10mm; border: 10px double #000000; width:185mm; height:275mm;">
              <div class="col-sm-12" style="font-family:'Book Antiqua'; ">
                <div align='center' style=" padding-top:12px; letter-spacing:1px; font-weight: bold;">
                  <span style="font-size:1.2em;">JAWAHARLAL NEHRU TECHNOLOGICAL UNIVERSITY ANANTAPUR</span><br/>
                  <span style="font-size:1.2em;">COLLEGE OF ENGINEERING (<i>Autonomous</i>), ANANTHAPURAMU</span><br/>
                  <span style="font-size:1em; padding-top:10px;">ANDHRA PRADESH, INDIA - 515002</span><br/>
                  <img src="images/jntuacea.png" alt="JNTUACEA" width="100px" height="100px" style="margin:10px;" /><br/>
                  <span class="data" style="font-family:'Arial'; font-size:1.4em; margin-bottom:12px; letter-spacing: 3px;">TRANSFER CERTIFICATE</span>
                </div>
                <br/> <br/>

				<table style=" line-height:2em; width:100%;">


                 <col width="130">
                 <col width="80">
				  <tr>
				    <td  style="font-size:1.4em;">&emsp;&emsp; 1.   Name of the student &emsp;&emsp;</td>
					<td>:&emsp;&emsp; <?php echo '<span class="data">'.$g1.' '.$res['stname'].'</span>'; ?></td>
				  </tr>
				  <tr>
				    <td style="font-size:1.4em;">&emsp;&emsp; 2.  Admission No. &emsp;&emsp;</td>
					<td>:&emsp;&emsp;<?php echo '<span class="data">'.$res['htno'].'</span>'; ?></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em;">&emsp;&emsp; 3.  Nationality, religion or Caste &emsp;&emsp;</td>
					<td>:&emsp;&emsp;<?php echo '<span class="data">'.$res['nationality'].'</span>'; ?></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em;">&emsp;&emsp; 4.  Date of birth as entered in the <br/>&emsp;&emsp;&emsp;&nbsp;admission register</td>
					<td>:&emsp;&emsp;<?php echo $res['dob']; ?></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em;">&emsp;&emsp; 5.  Class in which the pupil was  <br/>&emsp;&emsp;&emsp;&nbsp;readingat the time of leaving (in &emsp;&emsp;&emsp;&nbsp;words) </td>
					<td>:&emsp;&emsp;<?php echo $res['class']; ?></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em;">&emsp;&emsp; 6.  Date of Admission </td>
					<td>:&emsp;&emsp;<?php echo $res['doj']; ?></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em;">&emsp;&emsp;&nbsp;7. Whether qualified for promotion <br/>&emsp;&emsp;&emsp;&nbsp;to next higher class</td>
					<td>:&emsp;&emsp;<?php echo $res['qualify']; ?></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em;">&emsp;&emsp; 8.  Whether the pupil has paid all <br/>&emsp;&emsp;&emsp;&nbsp;the/due to the College</td>
					<td>:&emsp;&emsp;<?php echo $res['pay']; ?></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em;">&emsp;&emsp; 9.  Whether the pupil has undergone<br/>&emsp;&emsp;&emsp;&nbsp; medical inspection during the &emsp;&emsp;&emsp;&nbsp;year(First  to be specified)</td>
					<td>:&emsp;&emsp;<?php echo $res['medical']; ?></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em;">&emsp;&emsp;10. Date on which the pupil actually <br/>&emsp;&emsp;&emsp;&nbsp;left the College</td>
					<td>:&emsp;&emsp;<?php echo $res['ldate']; ?></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em;">&emsp;&emsp;11. Date on which aplication for <br/> &emsp;&emsp;&emsp;&nbsp;transfer certificate was made <br/>&emsp;&emsp;&emsp;&nbsp;on behalf of the pupil by his &emsp;&emsp;&emsp;&nbsp;parent or guardian.</td>
					<td>:&emsp;&emsp;<?php echo $res['appdate']; ?></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em;">&emsp;&emsp;12. Date of transfer certificate</td>
					<td>:&emsp;&emsp;<?php echo date("d/m/Y"); ?></td>
				  </tr>
				</table>

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
  header('Location: ');
}

}
else {
  header('Location: ./');
}
 ?>
