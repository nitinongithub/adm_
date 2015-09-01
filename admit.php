<?php
session_start();
$regno=$_SESSION['regno'];
$course=$_POST["cmbCourse"];
$quota=$_POST["quota"];
$cat1=$_POST["category"];
$subcat=$_POST["subcat"];
$logid=$_SESSION['usrnm'];
$dt=date('d/m/Y');

//$con = mysql_connect("localhost","root","");
//if (!$con)
//  {
//  die('Could not connect: ' . mysql_error());
//  }

//mysql_select_db("ai_admission", $con);



require("dbconnect.php");




    $testqry="SELECT * FROM admission where regID='" . $_SESSION['regno'] . "'";
	$fresult = mysql_query($testqry) or die(mysql_error());
    	
	$feedata=mysql_num_rows($fresult);
	
	if($feedata >0)
	{
		//echo "You had already taken admission";
	}
	else
	{


			$sql="INSERT INTO admission (regID, courseID, admissiondate ,quota,category,subcat,username) VALUES ('" ;
			$sql=$sql . $regno . "','";
			 $sql=$sql. $course . "','";
			 $sql=$sql . $dt ."','";
			 $sql=$sql . $quota ."','";
			 $sql=$sql . $cat1 ."','";
			 $sql=$sql . $subcat ."','";
			 $sql=$sql. $_SESSION['usrnm']."')";
			
			if (!mysql_query($sql,$con))
			  {
			  die('Error: ' . mysql_error());
			  }else{
				  //echo "Admission Granted - Click Print for Letter";
				  
				  $qryd="UPDATE stud_personal set admstID='A' where id='" . $regno . "'";
				  $resultd = mysql_query($qryd) or die(mysql_error());
				  
			  }
	}
	
	$qryd="UPDATE stud_personal set admstID='A' where id='" . $regno . "'";
	$resultd = mysql_query($qryd) or die(mysql_error());
	//echo $qryd;
	
?>
