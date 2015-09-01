<?php
	session_start();
	
	require("dbconnect.php");
	
	$regno=$_SESSION['regno'];
	$feetype=$_POST["feetype"];
	$amt=$_POST["txtAmount"];
	
	$feemode=$_POST["feemode"];
	$bank=$_POST["bank"];
	$ddno=$_POST["ddno"];
	$dddate=$_POST["dddate"];
	
	if($feetype == "Registration"){
		$sqlChk = "select * from fee where regID = '" . $regno . "' and feetype='Registration'";
		$rsltChk = mysql_query($sqlChk) or die(mysql_error()); 
		
		if(mysql_num_rows($rsltChk) > 0){
			$_SESSION['RegFee'] = "Registration Fee can be Submitteted only once !!";
		}else{
			$sql="INSERT INTO fee (regID,date,feetype,Amount,username,feemode,bankname,ddno,dddate) VALUES ('" ;
			$sql=$sql . $regno . "','";
			$sql=$sql. date('d/m/Y') . "','";
			$sql=$sql . $feetype."','" ;
			$sql= $sql . $amt . "','" ;
			$sql=$sql . $_SESSION['usrnm'] . "','" ;
			$sql= $sql . $feemode . "','" ;
			$sql= $sql . $bank . "','" ;
			$sql= $sql . $ddno . "','" ;
			$sql= $sql . $dddate . "')" ;
			
			$rsltForIDJi = mysql_query($sql) or die(mysql_error());
			$_SESSION['RegFee'] = "";
		}
	}else{
		$sql="INSERT INTO fee (regID,date,feetype,Amount,username,feemode,bankname,ddno,dddate) VALUES ('" ;
		$sql=$sql . $regno . "','";
		$sql=$sql. date('d/m/Y') . "','";
		$sql=$sql . $feetype."','" ;
		$sql= $sql . $amt . "','" ;
		$sql=$sql . $_SESSION['usrnm'] . "','" ;
		$sql= $sql . $feemode . "','" ;
		$sql= $sql . $bank . "','" ;
		$sql= $sql . $ddno . "','" ;
		$sql= $sql . $dddate . "')" ;
		
		$rsltForIDJi = mysql_query($sql) or die(mysql_error());
		$_SESSION['RegFee'] = "";
	}
	

?>

