<?php	
	session_start();
	require("dbconnect.php");
	
	$regno=$_SESSION['regno'];
	$newcourse=$_POST["cmbCourse"];
	
	$qry="SELECT * FROM stud_personal where ID='" . $regno . "'";
	$result = mysql_query($qry) or die(mysql_error());


	if(mysql_num_rows($result) >0)
	{
		$row = mysql_fetch_array($result);
		
		$sql="INSERT INTO  alterregcourse(regID,precourseID,newcourseID,alterdate,userID) VALUES ('" ;
		$sql=$sql . $regno . "','";
		$sql=$sql . $row['courseID']."','" ;
		$sql=$sql . $newcourse."','" ;
		$sql=$sql. date('d/m/Y') . "','";
		$sql=$sql . $_SESSION['usrnm'] ."')";
	
		$rsltForIDJi = mysql_query($sql) or die(mysql_error());	
	}
	
	
	$qryd="UPDATE stud_personal SET courseID='". $newcourse. "' where ID='" . $regno . "'";
	$resultd = mysql_query($qryd) or die(mysql_error());
	
	
	//echo "Registration Altered";
?>
		
        