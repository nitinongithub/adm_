<?PHP
	session_start();
	require("dbconnect.php");
	
	if($_GET['chk'] == 'a'){
		if($_GET['mID'] == 'chng'){
			$_SESSION['cntnt'] = "changePwd.php";
		}else{
			$Qry = "select content from menu where menuID=" . $_GET['mID'];
			$rslt = mysql_query($Qry) or die(mysql_error());
			$row = mysql_fetch_array($rslt);
			$_SESSION['cntnt'] = $row['content'];
		}
	}else if($_GET['chk'] == 'b'){
		if($_GET['mID'] == 'chng'){
			$_SESSION['cntnt'] = "changePwd.php";
		}else{
			$Qry = "select content from submenu where submenuID =" . $_GET['mID'];
			$rslt = mysql_query($Qry) or die(mysql_error());
			$row = mysql_fetch_array($rslt);
			$_SESSION['cntnt'] = $row['content'];
		}
	}
	header("Location: main.php");
?>