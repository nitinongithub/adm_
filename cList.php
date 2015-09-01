<?PHP
	session_start();
	require("dbconnect.php");
	
	$chked = $_POST['chkLST'];
	$stus = 'F';
	$QrySChkLst = "update studentchklist set status='" . $stus . "' where regID =" . $_SESSION['regIDji']; 
	echo $QrySChkLst;
	
	$rsltSChkLst = mysql_query($QrySChkLst) or die(mysql_error());  
	
	$stus = 'T';
	for($loop1 = 0; $loop1 < count($chked); $loop1++){
		echo $chked[$loop1] . "<br>";
		$QrySChkLst = "update studentchklist set status='" . $stus . "' where ID=" . $chked[$loop1]; 
		$rsltSChkLst = mysql_query($QrySChkLst) or die(mysql_error());  
	}
	
	$_SESSION['RegIDJiIntimation'] = "<font color='#FF0000'>Check List of " . $_SESSION['regIDji'] . " is successfully updated.</font>";
	header("Location: main.php");
	
?>