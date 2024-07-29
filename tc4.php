<?php
@session_start();
if(!empty($_SESSION['cert_user']) && !empty($_SESSION['priv']) && $_SESSION['priv']=="generator"){

if(!empty($_POST['htno']) && !empty($_POST['stname']) && !empty($_POST['nationality']) && !empty($_POST['doj']) && !empty($_POST['dob'])  && !empty($_POST['class'])&& !empty($_POST['religion'])&& !empty($_POST['caste'])
	&& !empty($_POST['qualify'])&& !empty($_POST['pay'])&& !empty($_POST['medical']) && !empty($_POST['ldate'])&& !empty($_POST['appdate'])){

$res = $_POST;
$cast = $_POST['caste'].",".$_POST['subcaste']."/".$_POST['castename'];
require("cgs.php");
$cgs_obj = new CGS;
$cgs_obj1 = new CGS;
$sno = $cgs_obj->tcSrno();
$x=str_pad($sno,6,0,STR_PAD_LEFT);
$insres = $cgs_obj->tcCert($x,$res['htno'],$res['stname'],$_SESSION['caste'],$res['doj'],$res['dob'],$_POST['class'],$res['qualify'],$res['pay'],$res['medical'],$res['ldate'],$res['appdate'],$_SESSION['cert_user']);



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

if( $res['qualify']  == "No"){
	$res['qualify'] = $res['qualify']."- -&emsp;&emsp;&emsp;(Discontinued)" ;
}
else{
	$res['qualify'] =$res['qualify'];
}
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

            <div class="row doprint" STYLE=" margin:5mm 5mm 5mm 5mm; border: 5px double #000000;width:215mm; height:350mm;">
              <div class="col-sm-12" style="font-family:'Book Antiqua'; ">
                <div align='center' style=" padding-top:12px; letter-spacing:1px; font-weight: bold;"><br/>
                  <span style="font-size:1.2em;">JAWAHARLAL NEHRU TECHNOLOGICAL UNIVERSITY ANANTAPUR</span><br/>
                  <span style="font-size:1.2em;">COLLEGE OF ENGINEERING (<i>Autonomous</i>), ANANTHAPURAMU</span><br/>
                  <span style="font-size:1em; padding-top:10px;">ANDHRA PRADESH, INDIA - 515002</span><br/>
                  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<img src="images/jntuacea.png" alt="JNTUACEA" width="100px" height="100px" style="margin:10px; " />&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span style="font-size:1.3em;">S.No :<?php echo $x ; ?></span>
									<br/>
                  <span  style="font-family:'Arial'; font-size:1.4em; margin-bottom:12px; letter-spacing: 3px;"><b>TRANSFER CERTIFICATE</b></span>
                </div>
                <br/> <br/>

				<table style=" line-height:3.8em; width:105%;">



                 <col width="123">
								  <col width="123">

				  <tr>
				    <td  style="font-size:1.4em;">&emsp;&emsp; 1.   Name of the student &emsp;&emsp;</td>
					<td>:&emsp; <b><?php echo $g1.' '.$res['stname']; ?></b></td>
				  </tr>
				  <tr>
				    <td style="font-size:1.4em;">&emsp;&emsp; 2.  Admission No. &emsp;&emsp;</td>
					<td>:&emsp;<b><?php echo $res['htno']; ?></b></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em;">&emsp;&emsp; 3.  Nationality, Religion or Caste &emsp;&emsp;</td>
					<td>:&emsp;<?php echo$_SESSION['caste']; ?></td>
				  </tr>

				   <tr>

				    <td style="font-size:1.4em;  line-height:1.7em;">&emsp;&emsp; 4.  Date of birth as entered in the <br/>&emsp;&emsp;&emsp;&nbsp;admission register</td>

					<td style="font-size:1.0em;  line-height:1.7em;">:&emsp;<?php echo $res['dob']; ?>
						<br>
						<?php

						$sdate=$res['dob'];
					$words =array('1' =>"ONE ",'2' =>"TWO ",'3' =>"THREE ",'4' =>"FOUR ",'5' =>"FIVE ",'6' =>"SIX ",'7' =>"SEVEN ",'8' =>"EIGHT ",'9' =>"NINE ",'0' =>"ZERO ",'/' =>"&nbsp;&nbsp; " );
					$months =array('01' =>"JANUARY",'02' =>"FEBRUARY",'03' =>"MARCH",'04' =>"APRIL",'05' =>"MAY",'06' =>"JUNE",'07' =>"JULY",'08' =>"AUGUST",'09' =>"SEPTEMBER",'10' =>"OCTOBER",'11' =>"NOVEMBER",'12' =>"DECEMBER");
					$mon= $sdate[3].$sdate[4];


						echo "&emsp;";
					for($i=0;$i<=9;$i++){

						if($i!=3 && $i!=4){

							echo $words[$sdate[$i]];
						}
						if($i==3){
							echo $months[$mon];
						}
						if($i==4){

						}

					}





					?></td>
				  </tr>

				   <tr>
				    <td style="font-size:1.4em;  line-height:1.7em;">&emsp;&emsp; 5.  Class in which the pupil was  <br/>&emsp;&emsp;&emsp;&nbsp;reading at the time of leaving  </td>
					<td>:&emsp;<?php echo $res['class']; ?></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em;">&emsp;&emsp; 6.  Date of Admission </td>
					<td>:&emsp;<?php echo $res['doj']; ?></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em; line-height:1.7em;">&emsp;&emsp;&nbsp;7. Whether qualified for promotion</br> &emsp;&emsp;&emsp;&nbsp;
					to next higher class</td>
					<td>:&emsp;<?php echo " - ".$res['qualify']." - "; ?></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em;  line-height:1.7em;">&emsp;&emsp; 8.  Whether the pupil has paid all <br/>&emsp;&emsp;&emsp;&nbsp;the dues to the College</td>
					<td>:&emsp;<?php echo " - ".$res['pay']." - "; ?></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em;  line-height:1.7em;">&emsp;&emsp; 9.  Whether the pupil has undergone<br/> &emsp;&emsp;&emsp;&nbsp;medical inspection during the<br/>&emsp;&emsp;&emsp;&nbsp; year(First  to be specified)</td>
					<td>:&emsp;<?php echo " - ".$res['medical']." - "; ?></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em;  line-height:1.7em;">&emsp;&emsp;10. Date on which the pupil <br/>&emsp;&emsp;&emsp;&nbsp; actually left the College</td>
					<td>:&emsp;<?php echo $_SESSION['ledate']; ?></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em;  line-height:1.7em;">&emsp;&emsp;11. Date on which aplication for <br/> &emsp;&emsp;&emsp;&nbsp;transfer certificate was made.</td>
					<td>:&emsp;<?php echo $today = date("d/m/Y "); ?></td>
				  </tr>
				   <tr>
				    <td style="font-size:1.4em;">&emsp;&emsp;12. Date of Transfer Certificate</td>
					<td>:&emsp;<?php echo date("d/m/Y"); ?></td>
				  </tr>
				</table>
				 <br/><br/><br/></br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>PRINCIPAL</b>

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
