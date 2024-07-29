<?php

/*
It is not a class
so be careful with variable names used
@nil
*/
@session_start();
if(!empty($_SESSION['cert_user']) && !empty($_SESSION['priv']) && $_SESSION['priv']=="generator" || $_SESSION['priv']=="admin" && !empty($_POST['printdate'])){

require_once("db.php");
$dbcred = new Db();
$host = $dbcred->getHost();

$user = $dbcred->getuser();
$pwd = $dbcred->getpwd();




     $dbname = "study";

          $mysqli = new mysqli($host, $user, $pwd, $dbname);
           /* check connection */
           if (mysqli_connect_errno()) {
              header('Location: getreport.php?id=networkerror');
           }
           else{


             $yy=0;
             $tables = array();


             if ($stmt = $mysqli->prepare("show tables")) {
                  if($stmt->execute()){
                    $stmt->bind_result($table);
          				      while ($stmt->fetch()) {
                          $tables[$yy] = $table;
          				        $yy++;
          			      }
                  }  else{
          			         header('Location: getreport.php?id=dateerror');
                    }
                    $stmt->close();
              }
              else{
                  header('Location: getreport.php?id=networkdberror');
              }

            $x = 1;

            foreach($tables as $tbl){
           /* create a prepared statement */
           $query = "SELECT `htno`, `stname`, `gender`, `fname`, `class`, `period` FROM ".$tbl." WHERE date(updatedon) like ? order by date(updatedon) asc";
           if ($stmt = $mysqli->prepare($query)){

             $dt = date("Y-m-d",strtotime($_POST['printdate']));
             $dt = $dt."%";
               /* bind parameters for markers */
               $stmt->bind_param("s", $dt);

               /* execute query */
                if($stmt->execute()){

               /* bind result variables */
                $stmt->bind_result($actualids,$stnames,$genders,$fnames,$classs,$periods);
        				 /* fetch value */
        				 while ($stmt->fetch()) {

        				 $res_arr = array();
        				   $snoss[$x] = $x;
        				   $htnoss[$x] = $actualids;
                   $stnamess[$x] = $stnames;
     			  $genderss[$x] = $genders;
                   $fnamess[$x] = $fnames;
     			   $classss[$x] = $classs;
                   $periodss[$x] = $periods;

        				   $x++;
        			   }

                 header('Location: getreport.php?id=dateerror');
               }

               /* close statement */
               $stmt->close();

             }
             else{
               header('Location: getreport.php?id=networkdberror');
             }
           }
           /* close connection */
           $mysqli->close();
         }



           $dbname = "conduct";

                $mysqli = new mysqli($host, $user, $pwd, $dbname);
                 /* check connection */
                 if (mysqli_connect_errno()) {
                    header('Location: getreport.php?id=networkerror');
                 }
                 else{

     $ss=0;
     $tables = array();


     if ($stmt = $mysqli->prepare("show tables")) {
          if($stmt->execute()){
            $stmt->bind_result($table);
  				      while ($stmt->fetch()) {
                  $tables[$ss] = $table;
  				        $ss++;
  			        }
            }else{
  			         header('Location: getreport.php?id=dateerror');
            }
            $stmt->close();
      }
      else{
          header('Location: getreport.php?id=networkdberror');
      }

    $s = 1;

    foreach($tables as $tbl){
   /* create a prepared statement */
   $query = "SELECT `sno`,`htno`, `stname`, `gender`, `fname`, `class`, `period`  FROM ".$tbl." WHERE date(updatedon) like ? order by date(updatedon) asc";
   if ($stmt = $mysqli->prepare($query)) {

     $dt = date("Y-m-d",strtotime($_POST['printdate']));
     $dt = $dt."%";
       /* bind parameters for markers */
       $stmt->bind_param("s", $dt);

       /* execute query */
        if($stmt->execute()){

       /* bind result variables */
        $stmt->bind_result($ser,$actualids,$stnames,$genders,$fnames,$classs,$periods);
				 /* fetch value */
				 while ($stmt->fetch()) {

				 $res_arr = array();
				   $sno[$s] = $ser;
				   $htno[$s] = $actualids;
           $stname[$s] = $stnames;
           $gender[$s] = $genders;
           $fname[$s] = $fnames;
           $class[$s] = $classs;
           $period[$s] = $periods;

				   $s++;
			   }

          }else{
			         header('Location: getreport.php?id=dateerror');
          }
          /* close statement */
          $stmt->close();
      }
      else{
        header('Location: getreport.php?id=networkdberror');
      }
    }
     /* close connection */
     $mysqli->close();
   }



$dbname = "coursec";

     $mysqli = new mysqli($host, $user, $pwd, $dbname);
      /* check connection */
      if (mysqli_connect_errno()) {
         header('Location: getreport.php?id=networkerror');
      }
      else{


        $zz=0;
        $tables = array();


        if ($stmt = $mysqli->prepare("show tables")) {
             if($stmt->execute()){
               $stmt->bind_result($table);
     				      while ($stmt->fetch()) {
                     $tables[$zz] = $table;
     				        $zz++;
     			        }
               }else{
     			         header('Location: getreport.php?id=dateerror');
               }
               $stmt->close();
         }
         else{
             header('Location: getreport.php?id=networkdberror');
         }

       $c = 1;

       foreach($tables as $tbl){
      /* create a prepared statement */
      $query = "SELECT `htno`, `stname`, `gender`, `fname`, `class`,`period`, `purpose` FROM ".$tbl." WHERE date(updatedon) like ? order by date(updatedon) asc";
      if ($stmt = $mysqli->prepare($query)) {

        $dt = date("Y-m-d",strtotime($_POST['printdate']));
        $dt = $dt."%";
          /* bind parameters for markers */
          $stmt->bind_param("s", $dt);

          /* execute query */
           if($stmt->execute()){

          /* bind result variables */
           $stmt->bind_result($actualids,$stnames,$genders,$fnames,$classs,$periods,$purposes);
   				 /* fetch value */
   				 while ($stmt->fetch()) {

   				 $res_arr = array();
   				   $snoc[$c] = $c;
   				   $htnoc[$c] = $actualids;
              $stnamec[$c] = $stnames;
			  $genderc[$c] = $genders;
              $fnamec[$c] = $fnames;
			   $classc[$c] = $classs;
              $periodc[$c] = $periods;
              $purposec[$c] = $purposes;
   				   $c++;
   			   }

             }else{
   			         header('Location: getreport.php?id=dateerror');
             }
             /* close statement */
             $stmt->close();
         }
         else{
           header('Location: getreport.php?id=networkdberror');
         }
       }
        /* close connection */
        $mysqli->close();
      }


           $dbname = "tc1";

                $mysqli = new mysqli($host, $user, $pwd, $dbname);
                 /* check connection */
                 if (mysqli_connect_errno()) {
                    header('Location: getreport.php?id=networkerror');
                 }
                 else{


                   $tt=0;
                   $tables = array();


                   if ($stmt = $mysqli->prepare("show tables")) {
                        if($stmt->execute()){
                          $stmt->bind_result($table);
                				      while ($stmt->fetch()) {
                                $tables[$tt] = $table;
                				        $tt++;
                			      }
                        }  else{
                			         header('Location: getreport.php?id=dateerror');
                          }
                          $stmt->close();
                    }
                    else{
                        header('Location: getreport.php?id=networkdberror');
                    }

                  $t = 1;

                  foreach($tables as $tbl){
                 /* create a prepared statement */
                 $query = "SELECT `sno`,`htno`, `stname`, `nationality,caste,religion`, `doj`, `dob`, `class`, `qualify`, `pay`, `medical`, `ldate`, `appdate`, `bywhom` FROM ".$tbl." WHERE date(updatedon) like ? order by date(updatedon) asc";
                 if ($stmt = $mysqli->prepare($query)){

                   $dt = date("Y-m-d",strtotime($_POST['printdate']));
                   $dt = $dt."%";
                     /* bind parameters for markers */
                     $stmt->bind_param("s", $dt);

                     /* execute query */
                      if($stmt->execute()){

                     /* bind result variables */
                      $stmt->bind_result($serno,$actualidt,$stnamet,$casrelt,$dojt,$dobt,$classt,$qualifyt,$payt,$medicalt,$ldatet,$appdatet,$bywhomt);
              				 /* fetch value */
              				 while ($stmt->fetch()) {

              				 $res_arr = array();
              				    $snost[$t] = $serno;
              				    $htnost[$t] = $actualidt;
                          $stnamest[$t] = $stnamet;
           			          $nationt[$t] =$casrelt;
                          $dojjt[$t] = $dojt;
                          $dobbt[$t] = $dobt;
                          $classst[$t] = $classt;
                          $qualifyyt[$t]=$qualifyt;
                          $payyyt[$t]=$payt;
                          $medicallt[$t]=$medicalt;
                          $ldateet[$t]=$ldatet;
                          $appdateet[$t]=$appdatet;
                          $bywhommt[$t]=$bywhomt;

                          $t++;

              			   }

                       header('Location: getreport.php?id=dateerror');
                     }

                     /* close statement */
                     $stmt->close();

                   }
                   else{
                     header('Location: getreport.php?id=networkdberror');
                   }
                 }
                 /* close connection */
                 $mysqli->close();
               }


if($c>1 || $s>1 || $x>1 || $t>1){
        date_default_timezone_set("Asia/Kolkata");
        $id = date('d_m_Y',strtotime($dt));
        $tstmp = date('d_m_Y_H_i_s');

        $name = "downloads/report_".$tstmp.".xls";
        $dtid = date("d-m-Y",strtotime($_POST['printdate']));

        require_once 'Classes/PHPExcel.php';
        require_once 'Classes/PHPExcel/Writer/Excel5.php';
        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();


if($s>1){

  // Fill worksheet from values in array
  $objPHPExcel->setActiveSheetIndex(0);
  $j = 1; /* cell index*/

  $objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
  $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'CONDUCT CERTIFICATES GENERATED ON '.$dtid);
  $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);
  $j++;

$objPHPExcel->getActiveSheet()->SetCellValue('A2', 'S.No.');
$objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Hall Ticket No.');
$objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Student Name');
$objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Gender');
$objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Father Name');
$objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Class');
$objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Period');
$objPHPExcel->getActiveSheet()->getStyle('A2:G2')->getFont()->setBold(true);
$j++;


	for($i=1;$i<$s;$i++)
	{

	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$j, $sno[$i]);
	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('B'.$j, $htno[$i],PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('C'.$j, $stname[$i],PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('D'.$j, $fname[$i],PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('E'.$j, $gender[$i],PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('F'.$j, $class[$i],PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('G'.$j, $period[$i],PHPExcel_Cell_DataType::TYPE_STRING);

	$j++;
	}


    $objPHPExcel->getActiveSheet()->setTitle('CONDUCT CERTIFICATES');
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

  }
  else {
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
    $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'CONDUCT CERTIFICATE(S) NOT GENERATED ON '.$dtid);
    $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->setTitle('CONDUCT CERTIFICATES');
  }

  $objPHPExcel->createSheet(1);
  if($c>1){
    // Fill worksheet from values in array
    $objPHPExcel->setActiveSheetIndex(1);
    $j = 1; /* cell index*/

    $objPHPExcel->getActiveSheet()->mergeCells('A1:I1');
    $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'COURSE COMPLETION CERTIFICATES GENERATED ON '.$dtid);
    $objPHPExcel->getActiveSheet()->getStyle('A1:I1')->getFont()->setBold(true);
    $j++;

  $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'S.No.');
  $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Hall Ticket No.');
  $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Student Name');
  $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Gender');
  $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Father Name');
  $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Class');
  $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Period');

  $objPHPExcel->getActiveSheet()->getStyle('A2:G2')->getFont()->setBold(true);
  $j++;


  	for($i=1;$i<$c;$i++)
  	{

  	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$j, $snoc[$i]);
  	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('B'.$j, $htnoc[$i],PHPExcel_Cell_DataType::TYPE_STRING);
  	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('C'.$j, $stnamec[$i],PHPExcel_Cell_DataType::TYPE_STRING);
  	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('D'.$j, $genderc[$i],PHPExcel_Cell_DataType::TYPE_STRING);
  	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('E'.$j, $fnamec[$i],PHPExcel_Cell_DataType::TYPE_STRING);
  	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('F'.$j, $classc[$i],PHPExcel_Cell_DataType::TYPE_STRING);
  	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('G'.$j, $periodc[$i],PHPExcel_Cell_DataType::TYPE_STRING);

  	$j++;
  	}


      $objPHPExcel->getActiveSheet()->setTitle('COURSE COMPLETION CERTIFICATES');
      $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
      $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
      $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
  		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
  		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
  		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
  		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);


    }
    else {
      $objPHPExcel->setActiveSheetIndex(1);
      $objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
      $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'COURSE COMPLETION CERTIFICATE(S) NOT GENERATED ON '.$dtid);
      $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);
      $objPHPExcel->getActiveSheet()->setTitle('COURSE COMPLETION CERTIFICATES');
    }

    $objPHPExcel->createSheet(2);
    if($x>1){
      // Fill worksheet from values in array
      $objPHPExcel->setActiveSheetIndex(2);
      $j = 1; /* cell index*/

      $objPHPExcel->getActiveSheet()->mergeCells('A1:G1');
      $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'STUDY CERTIFICATES GENERATED ON '.$dtid);
      $objPHPExcel->getActiveSheet()->getStyle('A1:G1')->getFont()->setBold(true);
      $j++;

    $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'S.No.');
    $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Hall Ticket No.');
    $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Student Name');
    $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Gender');
    $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Father Name');
    $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Class');
    $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Period');

    $objPHPExcel->getActiveSheet()->getStyle('A2:G2')->getFont()->setBold(true);
    $j++;


      for($i=1;$i<$x;$i++)
      {

      $objPHPExcel->getActiveSheet()->SetCellValue('A'.$j, $snoss[$i]);
      $objPHPExcel->getActiveSheet()->SetCellValueExplicit('B'.$j, $htnoss[$i],PHPExcel_Cell_DataType::TYPE_STRING);
      $objPHPExcel->getActiveSheet()->SetCellValueExplicit('C'.$j, $stnamess[$i],PHPExcel_Cell_DataType::TYPE_STRING);
      $objPHPExcel->getActiveSheet()->SetCellValueExplicit('D'.$j, $genderss[$i],PHPExcel_Cell_DataType::TYPE_STRING);
      $objPHPExcel->getActiveSheet()->SetCellValueExplicit('E'.$j, $fnamess[$i],PHPExcel_Cell_DataType::TYPE_STRING);
      $objPHPExcel->getActiveSheet()->SetCellValueExplicit('F'.$j, $classss[$i],PHPExcel_Cell_DataType::TYPE_STRING);
      $objPHPExcel->getActiveSheet()->SetCellValueExplicit('G'.$j, $periodss[$i],PHPExcel_Cell_DataType::TYPE_STRING);
      $j++;
      }


        $objPHPExcel->getActiveSheet()->setTitle('STUDY CERTIFICATES');
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);


      }
      else {
        $objPHPExcel->setActiveSheetIndex(2);
        $objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'STUDY CERTIFICATE(S) NOT GENERATED ON '.$dtid);
        $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->setTitle('STUDY CERTIFICATES');
      }

      $objPHPExcel->createSheet(3);
      if($t>1){
        // Fill worksheet from values in array
        $objPHPExcel->setActiveSheetIndex(3);
        $j = 1; /* cell index*/

        $objPHPExcel->getActiveSheet()->mergeCells('A1:I1');
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'TRANSFER CERTIFICATES GENERATED ON '.$dtid);
        $objPHPExcel->getActiveSheet()->getStyle('A1:I1')->getFont()->setBold(true);
        $j++;

      $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'S.No.');
      $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Hall Ticket No.');
      $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Student Name');
      $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Nationality,Caste,Religion');
      $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'DOJ');
      $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'DOB');
      $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Class');
      $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'Qualify');
      $objPHPExcel->getActiveSheet()->SetCellValue('I2', 'Pay');
      $objPHPExcel->getActiveSheet()->SetCellValue('J2', 'Medical');
      $objPHPExcel->getActiveSheet()->SetCellValue('K2', 'Ldate');
      $objPHPExcel->getActiveSheet()->SetCellValue('L2', 'Appdate');
      $objPHPExcel->getActiveSheet()->SetCellValue('M2', 'Bywhom');

      $objPHPExcel->getActiveSheet()->getStyle('A2:O2')->getFont()->setBold(true);
      $j++;


        for($i=1;$i<$t;$i++)
        {

        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$j, $snost[$i]);
        $objPHPExcel->getActiveSheet()->SetCellValueExplicit('B'.$j, $htnost[$i],PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->SetCellValueExplicit('C'.$j, $stnamest[$i],PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->SetCellValueExplicit('D'.$j, $nationt[$i],PHPExcel_Cell_DataType::TYPE_STRING);

        $objPHPExcel->getActiveSheet()->SetCellValueExplicit('E'.$j, $dojjt[$i],PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->SetCellValueExplicit('F'.$j, $dobbt[$i],PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->SetCellValueExplicit('G'.$j, $classst[$i],PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->SetCellValueExplicit('H'.$j, $qualifyyt[$i],PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->SetCellValueExplicit('I'.$j, $payyyt[$i],PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->SetCellValueExplicit('J'.$j, $medicallt[$i],PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->SetCellValueExplicit('K'.$j, $ldateet[$i],PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->SetCellValueExplicit('L'.$j, $appdateet[$i],PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->SetCellValueExplicit('M'.$j, $bywhommt[$i],PHPExcel_Cell_DataType::TYPE_STRING);


        $j++;
        }


          $objPHPExcel->getActiveSheet()->setTitle('TRANSFER CERTIFICATES');
          $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
          $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);


        }
        else {
          $objPHPExcel->setActiveSheetIndex(3);
          $objPHPExcel->getActiveSheet()->mergeCells('A1:O1');
          $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'TRANSFER CERTIFICATE(S) NOT GENERATED ON '.$dtid);
          $objPHPExcel->getActiveSheet()->getStyle('A1:O1')->getFont()->setBold(true);
          $objPHPExcel->getActiveSheet()->setTitle('TRANSFER CERTIFICATES');
        }





    $xlname = $name;
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save($xlname);

    header('Location: ./'.$xlname);
  }
  else{
    header('Location: getreport.php?id=empty');
  }


}else{
  header('Location: getreport.php');
}

?>
