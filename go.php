<?PHP
	
	//ob_start();
	session_start();
	
	$_SESSION['year']= $_POST['cmbDatabase'];
	 
	$_SESSION['db'] = 'ai_admission_' . addslashes($_POST['cmbDatabase']);
	$_SESSION['dbold'] = 'ai_admission_' . addslashes($_POST['cmbDatabase']-1);
		
	require("dbconnect.php");
	
	$_SESSION['usrnm'] = addslashes($_POST['txtUName']);
	$pwd = addslashes($_POST['txtPwd']);
	
	$Qry = "select * from login where username='" . $_SESSION['usrnm'] . "' AND password=PASSWORD('" . $pwd . "')";
	$rslt = mysql_query($Qry) or die(mysql_error()); 
	
	if(mysql_num_rows($rslt) > 0){
		$row = mysql_fetch_array($rslt);
		$_SESSION['stID'] = $row['statusID'];
		/*if(date('Y')!=$_SESSION['year']){
			if($row['statusID']==5)
			{
				$_SESSION['stID']=7;
			}
			else
			{
				$_SESSION['stID']=6;
			}
		}
		else
			$_SESSION['stID'] = $row['statusID'];
		*/
			
		date_default_timezone_set ("Asia/Calcutta");
		$Qry = "insert into loginlog (username, loginDate, logoutDate, loginTime, logoutTime) values ('" . $_SESSION['usrnm'] . "', '" . date('d/m/Y') . "', '-', '" . date('h:i:s A') . "', '-')";
		$rslt = mysql_query($Qry) or die(mysql_error());
		$_SESSION['loginIdJi'] = mysql_insert_id($con);
	}else{
		$path = "main.php";
		$_SESSION['usrnm'] = "0100";
	}
	//echo $path;
	header("Location: pthwy.php?mID=7");
	//ob_end_clean();
?>