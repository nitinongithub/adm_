<?PHP
	session_start();

	$_SESSION['txtregno'] = addslashes($_POST['txtregno']);
	$_SESSION['cntnt'] = "editReg1.php";
	
	header("Location: main.php");
?>