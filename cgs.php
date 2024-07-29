<?php

require("DBCredentials.php");
/**
 *
 */
class CGS extends DBCredentials
{
  private $myconn = "";
  private $myerr = 0;

  function __construct()
  {
    $this->myconn = new mysqli($this->getHost(),$this->getUser(),$this->getPass());

    if (mysqli_connect_errno()) {
      $this->myerr = mysqli_connect_errno();
    }

  }

// public function dateInWords($sdate){

  //  $words =array('1' =>"one ",'2' =>"two ",'3' =>"three ",'4' =>"four ",'5' =>"five ",'6' =>"six ",'7' =>"seven ",'8' =>"eight ",'9' =>"nine ",'0' =>"zero ",'-' =>"  " );
    //for($i=0;$i<strlen($sdate);i++){
      //echo $words[$sdate[i]];
  //  }
//  }


  public function getPurpose(){
    $purpose = array();
    if($this->myerr==0 && !empty($this->myconn)){
      if ($stmt = $this->myconn->prepare("SELECT `reason` FROM  st_details.purpose")) {
           if($stmt->execute()){
            $stmt->bind_result($purposes);
            $i = 0;
            while ($stmt->fetch()) {
              $purpose[$i] = $purposes;
              $i++;
            }
           }
       }
    }
    return $purpose;
  }


   public function sel($rollnum){
    if(empty($this->myerr) && !empty($this->myconn)){
    $res = array();
      $yr = substr($rollnum,0,2);
    if($sr = $this->myconn->prepare("SELECT `htno`, `stname`, `gender`, `fname`, `mname`, `year`, `sem`, `doj`, `dob` FROM st_details.year".$yr." where htno=? ")){
    $sr->bind_param("s",$rollnum);
    if($sr->execute()){

      $sr->bind_result($htnos,$stnames,$genders,$fnames,$mnames,$years,$sems,$dojs,$dobs);
        while ($sr->fetch()) {
            $res['htno'] = strtoupper($htnos);
            $res['stname'] = strtoupper($stnames);
            $res['gender'] = strtoupper($genders);
            $res['fname'] = strtoupper($fnames);
            $res['mname'] = strtoupper($mnames);
            $res['year'] = strtoupper($years);
            $res['sem'] = strtoupper($sems);
            $res['doj'] = strtoupper($dojs);
            $res['dob'] = strtoupper($dobs);
        }

    }
    }
    }
    return $res;
  }

     public function seltc($rollnum){
    if(empty($this->myerr) && !empty($this->myconn)){
    $res = array();
      $yr = substr($rollnum,0,2);
    if($sr = $this->myconn->prepare("SELECT `htno`, `stname`, `gender`, `fname`, `mname`, `year`, `sem`, `doj`, `dob`, `caste`, `subcaste`, `castename`, `religion`, `nationality` FROM st_details.year".$yr."c WHERE htno=? ")){
    $sr->bind_param("s",$rollnum);
    if($sr->execute()){

      $sr->bind_result($htnos,$stnames,$genders,$fnames,$mnames,$years,$sems,$dojs,$dobs,$castes,$subcastes,$castenames,$religions,$nationalitys);
        while ($sr->fetch()) {
            $res['htno'] = strtoupper($htnos);
            $res['stname'] = strtoupper($stnames);
            $res['gender'] = strtoupper($genders);
            $res['fname'] = strtoupper($fnames);
            $res['mname'] = strtoupper($mnames);
            $res['year'] = strtoupper($years);
            $res['sem'] = strtoupper($sems);
            $res['doj'] = strtoupper($dojs);
			$res['dob'] = strtoupper($dobs);
            $res['caste'] = strtoupper($castes);
			$res['subcaste'] = strtoupper($subcastes);
			$res['castename'] = strtoupper($castenames);
			$res['religion'] = strtoupper($religions);
			$res['nationality'] = strtoupper($nationalitys);
        }

    }
    }
    }
    return $res;
  }



   public function upd($htnou,$stnameu,$genderu,$fnameu,$mnameu,$yearu,$semu,$doju,$dobu){

    $res = array();
    $x=0;
    if(empty($this->myerr) && !empty($this->myconn)){
        $yr = substr($htnou,0,2);
      if($sr = $this->myconn->prepare("UPDATE st_details.year".$yr." SET `htno`=?,`stname`=?,`gender`=?,`fname`=?,`mname`=?,`year`=?,`sem`=?,`doj`=?,`dob`=? WHERE htno=?")){
      $sr->bind_param("ssssssssss",$htnou,$stnameu,$genderu,$fnameu,$mnameu,$yearu,$semu,$doju,$dobu,$htnou);
      if($sr->execute()){

        $res['htno'] = strtoupper($htnou);
        $res['stname'] = strtoupper($stnameu);
        $res['gender'] = strtoupper($genderu);
        $res['fname'] = strtoupper($fnameu);
        $res['mname'] = strtoupper($mnameu);

        $res['year'] = strtoupper($yearu);
        $res['sem'] = strtoupper($semu);
        $res['doj'] = strtoupper($doju);
        $res['dob'] = strtoupper($dobu);


      }


}
}
return $res;
}


 public function updtc($htnou,$stnameu,$genderu,$fnameu,$mnameu,$yearu,$semu,$doju,$dobu,$casteu,$subcasteu,$castenameu,$religionu,$nationalityu){

    $res = array();
    $x=0;
    if(empty($this->myerr) && !empty($this->myconn)){
        $yr = substr($htnou,0,2);
      if($sr = $this->myconn->prepare("UPDATE st_details.year".$yr."c"." SET `htno`=?,`stname`=?,`gender`=?,`fname`=?,`mname`=?,`year`=?,`sem`=?,`doj`=?,`dob`=?, `caste`=?,`subcaste`=?,`castename`=?,`religion`=?,`nationality`=? WHERE htno=?")){
      $sr->bind_param("sssssssssssssss",$htnou,$stnameu,$genderu,$fnameu,$mnameu,$yearu,$semu,$doju,$dobu,$casteu,$subcasteu,$castenameu,$religionu,$nationalityu,$htnou);
      if($sr->execute()){

        $res['htno'] = strtoupper($htnou);
        $res['stname'] = strtoupper($stnameu);
        $res['gender'] = strtoupper($genderu);
        $res['fname'] = strtoupper($fnameu);
        $res['mname'] = strtoupper($mnameu);

        $res['year'] = strtoupper($yearu);
        $res['sem'] = strtoupper($semu);
        $res['doj'] = strtoupper($doju);
        $res['dob'] = strtoupper($dobu);
		$res['caste'] = strtoupper($casteu);
    	$res['subcaste'] = strtoupper($subcasteu);
	    $res['castename'] = strtoupper($castenameu);
		$res['religion'] = strtoupper($religionu);
		$res['nationality'] = strtoupper($nationalityu);


      }


}
}
return $res;
}


  public function tcSrno(){
    if($this->myerr==0 && !empty($this->myconn)){
        $query ="SELECT ser_no FROM tc1.serialno where ser_id=1";
        if ($stmt = $this->myconn->prepare($query)) {
            if($stmt->execute()){
                $stmt->bind_result($x);
                while ($stmt->fetch()) {
                  $res = $x ;
                }
                $x++;

            }
        }
        $query1 ="UPDATE tc1.serialno SET `ser_no`= $x where ser_id=1";
        if ($stmt = $this->myconn->prepare($query1)) {
          if($stmt->execute()){}
        }
    }

    return $res;
  }


  public function coSrno(){
    if($this->myerr==0 && !empty($this->myconn)){
        $query ="SELECT ser_no FROM conduct.serialno where ser_id=1";
        if ($stmt = $this->myconn->prepare($query)) {
            if($stmt->execute()){
                $stmt->bind_result($x);
                while ($stmt->fetch()) {
                  $res = $x ;
                }
                $x++;

            }
        }
        $query1 ="UPDATE conduct.serialno SET `ser_no`= $x where ser_id=1";
        if ($stmt = $this->myconn->prepare($query1)) {
          if($stmt->execute()){}
        }
    }

    return $res;
  }

    public function getPurposecc(){
    $purpose = array();
    if($this->myerr==0 && !empty($this->myconn)){
      if ($stmt = $this->myconn->prepare("SELECT `reason` FROM  st_details.ccpurpose")) {
           if($stmt->execute()){
            $stmt->bind_result($purposes);
            $i = 0;
            while ($stmt->fetch()) {
              $purpose[$i] = $purposes;
              $i++;
            }
           }
       }
    }
    return $purpose;
  }

  public function getDocs(){
    $docs = array();
    if($this->myerr==0 && !empty($this->myconn)){
      if ($stmt = $this->myconn->prepare("SELECT `shortname`,`fullname` FROM  st_details.docs order by sortby")) {
           if($stmt->execute()){
            $stmt->bind_result($shorts,$fulls);
            while ($stmt->fetch()) {
              $docs[$shorts] = $fulls;
            }
           }
       }
    }
    return $docs;
  }

  public function getCourse($htnoc){
    $course = "";
    if($this->myerr==0 && !empty($this->myconn)){
      $cr = substr($htnoc,5,1); /*  In substr func. 1st arg is string,2nd arg is position,3rd arg is no.of characters */
      if ($stmt = $this->myconn->prepare("SELECT longname FROM  st_details.coursenames WHERE  `coursecodes`=?")) {
          $stmt->bind_param("s",$cr);

           if($stmt->execute()){

            $stmt->bind_result($courses);
            while ($stmt->fetch()) {
              $course = $courses;
            }
           }
       }
    }
    return $course;
  }


  public function getSpec($htnos){
    $spec = "";
    if($this->myerr==0 && !empty($this->myconn)){
      $cr = substr($htnos,5,1);
      $sp = substr($htnos,6,2);
      if ($stmt = $this->myconn->prepare("SELECT `spec` FROM  st_details.specializations WHERE  `spec_code`=? AND  `cr_code`=?")) {
          $stmt->bind_param("ss",$sp,$cr);

           if($stmt->execute()){

            $stmt->bind_result($specs);
            while ($stmt->fetch()) {
              $spec = $specs;
            }
           }
       }
    }
    return $spec;
  }


  public function getStDetails($htnoa){
    $htnoa = strtoupper($htnoa);
    $res = array();
    $res['status'] = 0;

    if($this->myerr==0 && !empty($this->myconn)){
      $course = $this->getCourse($htnoa);
      $spec = $this->getSpec($htnoa);
      $yr = substr($htnoa,0,2);
      $query = "SELECT `stname`, `gender`, `fname`, `mname`, `year`, `sem`, `doj`, `dob` FROM st_details.year".$yr." WHERE `htno`=?";
      if ($stmt = $this->myconn->prepare($query)) {
          $stmt->bind_param("s",$htnoa);

           if($stmt->execute()){
            /* bind result variables */
            $stmt->bind_result($stname1,$gender1,$fname1,$mname1,$year1,$sem1,$doj1,$dob1);
            while ($stmt->fetch()) {
              $res['htno'] = strtoupper($htnoa);
              $res['stname'] = strtoupper($stname1);
              $res['fname'] = strtoupper($fname1);
              $res['mname'] = strtoupper($mname1);
              $res['gender'] = strtoupper($gender1);
              $res['year'] = strtoupper($year1);
              $res['sem'] = strtoupper($sem1);
              $res['doj'] = strtoupper($doj1);
              $res['dob'] = strtoupper($dob1);
              if(!empty($course) && !empty($spec)){
                $res['status'] = 1;
                $res['course'] = $course;
                $res['spec'] = $spec;
              }
            }/*while loop close*/
           }
           else{
             $res['status'] = 0;
             $res['error'] = "Data Error";
           }
       }
       else{
         $res['status'] = 0;
         $res['error'] = "Query Error";
       }
    }
    else{
      $res['status'] = 0;
      $res['error'] = "Error";
    }

    return $res;
  }

   public function getStDetails1($htnoa){
    $htnoa = strtoupper($htnoa);
    $res = array();
    $res['status'] = 0;

    if($this->myerr==0 && !empty($this->myconn)){
      $course = $this->getCourse($htnoa);
      $spec = $this->getSpec($htnoa);
      $yr = substr($htnoa,0,2);
      echo $yr;
      $query = "SELECT `stname`, `gender`, `fname`, `mname`, `year`, `sem`, `doj`, `dob`,`caste`,`subcaste`,`castename`,`religion`,`nationality` FROM st_details.year".$yr."c"." WHERE `htno`=?";
      if ($stmt = $this->myconn->prepare($query)) {
          $stmt->bind_param("s",$htnoa);

           if($stmt->execute()){
            /* bind result variables */
            $stmt->bind_result($stname1,$gender1,$fname1,$mname1,$year1,$sem1,$doj1,$dob1,$caste1,$subcaste1,$castename1,$religion1,$nationality1);
            while ($stmt->fetch()) {
              $res['htno'] = strtoupper($htnoa);
              $res['stname'] = strtoupper($stname1);
              $res['fname'] = strtoupper($fname1);
              $res['mname'] = strtoupper($mname1);
              $res['gender'] = strtoupper($gender1);
              $res['year'] = strtoupper($year1);
              $res['sem'] = strtoupper($sem1);
              $res['doj'] = strtoupper($doj1);
              $res['dob'] = strtoupper($dob1);
			  $res['caste'] = strtoupper($caste1);
			  $res['subcaste'] = strtoupper($subcaste1);
			  $res['castename'] = strtoupper($castename1);
			  $res['religion'] = strtoupper($religion1);
			  $res['nationality'] = strtoupper($nationality1);
              if(!empty($course) && !empty($spec)){
                $res['status'] = 1;
                $res['course'] = $course;
                $res['spec'] = $spec;
              }
            }/*while loop close*/
           }
           else{
             $res['status'] = 0;
             $res['error'] = "Data Error";
           }
       }
       else{
         $res['status'] = 0;
         $res['error'] = "Query Error";
       }
    }
    else{
      $res['status'] = 0;
      $res['error'] = "Error";
    }

    return $res;
  }



  public function studyCert($htnos,$stnames,$fnames,$genders,$classs,$periods,$bywhoms){
    $insres = 0;
    if($this->myerr==0 && !empty($this->myconn)){
      $classs = preg_replace('/–-+/', '-', $classs);//str_replace('–',"-",$classs);
      $yr = substr($htnos,0,2);

      if ($stmt = $this->myconn->prepare("INSERT INTO study.study".$yr."(`htno`, `stname`, `fname`, `gender`, `class`, `period`, `bywhom`) VALUES (?,?,?,?,?,?,?)")) {
          $stmt->bind_param("sssssss",$htnos,$stnames,$fnames,$genders,$classs,$periods,$bywhoms);

           if($stmt->execute()){
             $insres = 1;
           }
       }
    }
    return $insres;
  }


   public function tcCert($x,$htnot,$stnamet,$casrel,$dojt,$dobt,$classt,$qualifyt,$payt,$medicalt,$ldatet,$appdatet,$bywhomt){
    $insres = 0;
    if($this->myerr==0 && !empty($this->myconn)){
      $classt = preg_replace('/–-+/', '-', $classt);//str_replace('–',"-",$classt);
      $yr = substr($htnot,0,2);

      if ($stmt = $this->myconn->prepare("INSERT INTO tc1.year".$yr."(`sno`,`htno`, `stname`, `nationality,caste,religion`, `doj`, `dob`, `class`, `qualify`, `pay`, `medical`, `ldate`, `appdate`, `bywhom`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)")) {
          $stmt->bind_param("sssssssssssss",$x,$htnot,$stnamet,$casrel,$dojt,$dobt,$classt,$qualifyt,$payt,$medicalt,$ldatet,$appdatet,$bywhomt);

          if($stmt->execute()){

            $insres = 1;
          }

       }
    }
    return $insres;
  }


  public function bonafideCert($htnob,$stnameb,$fnameb,$genderb,$classb,$periodb,$purposeb,$bywhomb){
    $insres = 0;
    if($this->myerr==0 && !empty($this->myconn)){
      $yr = substr($htnob,0,2);
      $query = "INSERT INTO bonafide.study".$yr." (`htno`, `stname`, `gender`, `fname`, `class`, `period`, `purpose`, `bywhom`) VALUES (?,?,?,?,?,?,?,?)";
      if ($stmt = $this->myconn->prepare($query)) {
          $stmt->bind_param("ssssssss",$htnob,$stnameb,$genderb,$fnameb,$classb,$periodb,$purposeb,$bywhomb);

           if($stmt->execute()){
			   if($this->myconn->affected_rows){
				$insres = 1;
			   }
           }
       }
    }
    return $insres;
  }


   public function courseCert($htnob,$stnameb,$fnameb,$genderb,$classb,$periodb,$purposeb,$bywhomb){
    $insres = 0;
    if($this->myerr==0 && !empty($this->myconn)){
      $yr = substr($htnob,0,2);
      $query = "INSERT INTO coursec.study".$yr." (`htno`, `stname`, `gender`, `fname`, `class`, `period`, `purpose`, `bywhom`) VALUES (?,?,?,?,?,?,?,?)";
      if ($stmt = $this->myconn->prepare($query)) {
          $stmt->bind_param("ssssssss",$htnob,$stnameb,$genderb,$fnameb,$classb,$periodb,$purposeb,$bywhomb);

           if($stmt->execute()){
			   if($this->myconn->affected_rows){
				$insres = 1;
			   }
           }
       }
    }
    return $insres;
  }

    public function conductCert($sno,$htnoc,$stnamec,$fnamec,$genderc,$classc,$periodc,$bywhomc){
    $insres = 0;
    if($this->myerr==0 && !empty($this->myconn)){
      $yr = substr($htnoc,0,2);
      $query = "INSERT INTO conduct.study".$yr." (`sno`,`htno`, `stname`, `fname`, `gender`, `class`, `period`, `bywhom`) VALUES (?,?,?,?,?,?,?,?)";
      if ($stmt = $this->myconn->prepare($query)) {
          $stmt->bind_param("ssssssss",$sno,$htnoc,$stnamec,$fnamec,$genderc,$classc,$periodc,$bywhomc);

           if($stmt->execute()){
			   if($this->myconn->affected_rows){
				$insres = 1;
			   }
           }
       }
    }
    return $insres;
  }

  public function custodialCert($htnoc,$stnamec,$fnamec,$genderc,$classc,$docsc,$dobc,$purposec,$bywhomc){
    $insres = 0;
    if($this->myerr==0 && !empty($this->myconn)){
      $yr = substr($htnoc,0,2);
      $query = "INSERT INTO custodial.study".$yr." (`htno`, `stname`, `fname`, `gender`, `class`, `docs`, `dob`, `purpose`, `bywhom`) VALUES (?,?,?,?,?,?,?,?,?)";
      if ($stmt = $this->myconn->prepare($query)) {
          $stmt->bind_param("sssssssss",$htnoc,$stnamec,$fnamec,$genderc,$classc,$docsc,$dobc,$purposec,$bywhomc);
           if($stmt->execute()){
			          if($this->myconn->affected_rows){
				              $insres = 1;
			          }
           }
       }
    }
    return $insres;
  }


	public function showValues($date){
     $res=array();
     $s=1;
       if($this->myerr==0 && !empty($this->myconn)){
         $a=new PCGS();
         $x= array();
         $x=$a->showTables();
         foreach($x as $tbl){
    $query = "SELECT `htno`, `stname`, `gender`, `fname`,`class`,`period`,`purpose`,`conduct` FROM study.".$tbl." WHERE date(updatedon) like ? order by date(updatedon) asc";
    if ($stmt = $this->myconn->prepare($query)) {
		$dt = date("Y-m-d",strtotime($date));
     $dt = $dt."%";
       /* bind parameters for markers */
       $stmt->bind_param("s", $dt);

       /* execute query */
        if($stmt->execute()){

       /* bind result variables */
        $stmt->bind_result($actualids,$stnames,$genders,$fnames,$classes,$periods,$purpose,$conduct);
         /* fetch value */
         while ($stmt->fetch()) {
           $res['sno'][$s] = $s;
           $res['htno'][$s] = $actualids;
           $res['stname'][$s] = $stnames;


           $res['gender'][$s] = $genders;
		   $res['fname'][$s] = $fnames;

           $res['class'][$s] = $classes;
           $res['period'][$s] = $periods;
           $res['purpose'][$s] = $purposes;
           $res['conduct'][$s] = $conducts;

           $s++;
         }
         $res['value']=$s;
         $res['date']=$dt;
          }else{
               header('Location: getreport.php?id=dateerror');
          }

      }
      else{
        header('Location: getreport.php?id=networkdberror');
      }
    }
  }
    else{
      echo "error";
    }

    return $res;
  }
  function __destruct(){
    if(!empty($this->myconn)){
      $this->myconn->close();
    }
  }


}

 ?>
