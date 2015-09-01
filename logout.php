<?PHP
	session_start();
	require("dbconnect.php");
	
	if($_SESSION['usrnm'] != "0100"){
		if($_GET['xxxwwww'] == "gthemerrosjdhfgdsjx21312323"){
			date_default_timezone_set ("Asia/Calcutta");
			$Qry = "update loginlog set logoutDate='" . date('d/m/Y') . "', logoutTime ='" . date('h:i:s A') . "' where username='". $_SESSION['usrnm'] . "' and ID = ". $_SESSION['loginIdJi'] ."";
			echo $Qry;
			$rslt = mysql_query($Qry) or die(mysql_error());
		}
	}
	
	header("Location: index.php");
?>