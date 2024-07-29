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
$dbname = "conduct";
$user = $dbcred->getuser();
$pwd = $dbcred->getpwd();

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
   $query = "SELECT `htno`, `stname`, `gender`, `fname`, `class`, `period`  FROM ".$tbl." WHERE date(updatedon) like ? order by date(updatedon) asc";
   if ($stmt = $mysqli->prepare($query)) {

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
		    $snoa[$s] = $s;
			$htnoa[$s] = $actualids;
            $stnamea[$s] = $stnames;
            $gendera[$s] = $genders;
            $fnamea[$s] = $fnames;
            $classa[$s] = $classs;
            $perioda[$s] = $periods;

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
           $stmt->bind_result($actualidc,$stnamec,$genderc,$fnamec,$classc,$periodc,$purposec);
   				 /* fetch value */
   				 while ($stmt->fetch()) {

   				 $res_arr = array();
   				   $sno[$c] = $c;
   				   $htno[$c] = $actualidc;
                   $stname[$c] = $stnamec;
			       $gender[$c] = $genderc;
                   $fname[$c] = $fnamec;
			       $class[$c] = $classc;
                   $period[$c] = $periodc;
                   $purpose[$c] = $purposec;
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




      $dbname = "study";

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

             $p = 1;

             foreach($tables as $tbl){
            /* create a prepared statement */
            $query = "SELECT `htno`, `stname`, `fname`, `gender`, `class`,`period` FROM ".$tbl." WHERE date(updatedon) like ? order by date(updatedon) asc";
            if ($stmt = $mysqli->prepare($query)) {

              $dt = date("Y-m-d",strtotime($_POST['printdate']));
              $dt = $dt."%";
                /* bind parameters for markers */
                $stmt->bind_param("s", $dt);

                /* execute query */
                 if($stmt->execute()){

                /* bind result variables */
                 $stmt->bind_result($actualide,$stnamee,$fnamee,$gendere,$classe,$periode);
         				 /* fetch value */
         				 while ($stmt->fetch()) {

         				 $res_arr = array();
         				   $sno[$p] = $p;
         				   $htnob[$p] = $actualide;
                           $stnameb[$p] = $stnamee;
      			           $genderb[$p] = $gendere;
                           $fnameb[$p] = $fnamee;
      			           $classb[$p] = $classe;
                           $periodb[$p] = $periode;
         				   $p++;
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


if($c>1 || $s>1|| $p>1){
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
	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('B'.$j, $htnoa[$i],PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('C'.$j, $stnamea[$i],PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('D'.$j, $gendera[$i],PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('E'.$j, $fnamea[$i],PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('F'.$j, $classa[$i],PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('G'.$j, $perioda[$i],PHPExcel_Cell_DataType::TYPE_STRING);

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

    $objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
    $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'COURSE COMPLETION CERTIFICATES GENERATED ON '.$dtid);
    $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);
    $j++;

  $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'S.No.');
  $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Hall Ticket No.');
  $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Student Name');
  $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Gender');
  $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Father Name');
  $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Class');
  $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Period');
  $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'Purpose');
  $objPHPExcel->getActiveSheet()->getStyle('A2:H2')->getFont()->setBold(true);
  $j++;


  	for($i=1;$i<$c;$i++)
  	{

  	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$j, $sno[$i]);
  	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('B'.$j, $htno[$i],PHPExcel_Cell_DataType::TYPE_STRING);
  	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('C'.$j, $stname[$i],PHPExcel_Cell_DataType::TYPE_STRING);
  	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('D'.$j, $gender[$i],PHPExcel_Cell_DataType::TYPE_STRING);
  	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('E'.$j, $fname[$i],PHPExcel_Cell_DataType::TYPE_STRING);
  	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('F'.$j, $class[$i],PHPExcel_Cell_DataType::TYPE_STRING);
  	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('G'.$j, $period[$i],PHPExcel_Cell_DataType::TYPE_STRING);
  	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('H'.$j, $purpose[$i],PHPExcel_Cell_DataType::TYPE_STRING);
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
  		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
    }
    else {
      $objPHPExcel->setActiveSheetIndex(1);
      $objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
      $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'COURSE COMPLETION CERTIFICATE(S) NOT GENERATED ON '.$dtid);
      $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);
      $objPHPExcel->getActiveSheet()->setTitle('COURSE COMPLETION CERTIFICATES');
    }
  $objPHPExcel->createSheet(2);
    if($p>1){

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


    	for($i=1;$i<$s;$i++)
    	{

    	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$j, $sno[$i]);
    	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('B'.$j, $htnob[$i],PHPExcel_Cell_DataType::TYPE_STRING);
    	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('C'.$j, $stnameb[$i],PHPExcel_Cell_DataType::TYPE_STRING);
    	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('D'.$j, $genderb[$i],PHPExcel_Cell_DataType::TYPE_STRING);
    	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('E'.$j, $fnameb[$i],PHPExcel_Cell_DataType::TYPE_STRING);
    	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('F'.$j, $classb[$i],PHPExcel_Cell_DataType::TYPE_STRING);
    	$objPHPExcel->getActiveSheet()->SetCellValueExplicit('G'.$j, $periodb[$i],PHPExcel_Cell_DataType::TYPE_STRING);

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
