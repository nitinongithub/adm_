<?PHP
	session_start();
	
	require("dbconnect.php");
	if($_GET['i'] == 2){
		$usrnm = $_SESSION['usrnm'];
		$oldPw = addslashes($_POST['txtPwdOld']);
		$newPw = addslashes($_POST['txtPwdNew1']);
		
		$Qry = "select * from login where username ='" . $usrnm . "' AND password =PASSWORD('" . $oldPw . "')";
		$rsltOld = mysql_query($Qry) or die(mysql_error());
	
		if(mysql_num_rows($rsltOld) > 0){
			$Qry="";
			$Qry="update login set password=PASSWORD('" . $newPw . "') where username ='" . $usrnm . "'";
			$rsltNew = mysql_query($Qry) or die(mysql_error());
			echo "<font color='#009000'>------------------------------------------</font><br>";
			echo "<font color='#009000'>Password successfully changed.</font><br>";
			echo "<font color='#009000'>------------------------------------------</font><br>";
		}else{
			echo "Old password is not matching. Are you really <font color='#FF0000'>" . $_SESSION['usrnm'] . "</font>?" ;
		}
	}else{
		$usrnm = $_POST['smbLogin'];
		$Qry1="";
		$Qry1="update login set password=PASSWORD('123456') where username ='" . $usrnm . "'";
		$rsltNew1 = mysql_query($Qry1) or die(mysql_error());
		
		echo "Password Reset successfully changed for username  <font color='#FF0000'><b>" . $usrnm . "</b></font>.";
	}
	
?>