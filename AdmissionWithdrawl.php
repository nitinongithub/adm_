<?php	
	session_start();
	require("dbconnect.php");
	
	$regno=$_SESSION['regno'];
	$reason=$_POST["reason"];
	
	$qry="SELECT * FROM Admission where regID='" . $regno . "'";
	$result = mysql_query($qry) or die(mysql_error());


	if(mysql_num_rows($result) >0)
	{
		$row = mysql_fetch_array($result);
		
		$sql="INSERT INTO  withdrawal(REGNO,WITHDRAWDATE,WITHDWAWNFROM,Admissiondate,category,REASON,username) VALUES ('" ;
		$sql=$sql . $regno . "','";
		$sql=$sql. date('d/m/Y') . "','";
		$sql=$sql . $row['courseID']."','" ;
		$sql= $sql . $row['admissiondate'] . "','" ;
		$sql= $sql . $row['category'] . "','" ;
		$sql= $sql . $reason . "','" ;
		$sql=$sql . $_SESSION['usrnm'] ."')";
	
		$rsltForIDJi = mysql_query($sql) or die(mysql_error());	
	}
	
	
	$qryd="DELETE FROM Admission where regID='" . $regno . "'";
	$resultd = mysql_query($qryd) or die(mysql_error());
	//echo $qryd . "<BR>";
	
	$qryd="UPDATE stud_personal set admstID='W' where id='" . $regno . "'";
	$resultd = mysql_query($qryd) or die(mysql_error());
	//echo $qryd;
	
	
	//echo "Withdrawn.....";
?>
		
        