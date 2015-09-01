<?PHP
	session_start();
	ob_start();
	
	if($_SESSION['usrnm'] != "0100" and $_SESSION['PR'] == "printReceipt"){
		$_SESSION['txtreciptno'] = $_GET['txtRNoPrnt'];
		$pathJi = "feeprint_.php";
		$_SESSION['PR'] = "printReceipt";
	}else{
		$pathJi = "index.php";
		$_SESSION['PR'] = "farzi";
	}
	
	header("Location: " . $pathJi);
?>