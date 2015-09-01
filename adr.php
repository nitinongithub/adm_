
<?PHP
	session_start();
	include("dbconnect.php");
	
	
	if($_GET['adr'] == 1){
		$QryChk = "select * from country where country = '" . strtoupper($_POST['txtCntry']) . "'";
		$rsltChk = mysql_query($QryChk) or die(mysql_error());
		if(mysql_num_rows($rsltChk) != 0){
			// do nothing
			$_SESSION['NewEntryMsg'] = "Country Already Exists";
		}else{
			$Qry = "insert into country (country) values('" . strtoupper($_POST['txtCntry']) . "')";
			$rslt = mysql_query($Qry) or die(mysql_error());
		}
	}else if($_GET['adr'] == 2){
		$QryChk = "select * from state where state = '" . strtoupper($_POST['txtState']) . "'";
		$rsltChk = mysql_query($QryChk) or die(mysql_error());
		if(mysql_num_rows($rsltChk) != 0){
			// do nothing
			$_SESSION['NewEntryMsg'] = "State Already Exists";
		}else{
			$Qry = "insert into state (state) values('" . strtoupper($_POST['txtState']) . "')";
			$rslt = mysql_query($Qry) or die(mysql_error());
		}
	}else if($_GET['adr'] == 3){
		$QryChk = "select * from district where district = '" . strtoupper($_POST['txtDistt']) . "'";
		$rsltChk = mysql_query($QryChk) or die(mysql_error());
		if(mysql_num_rows($rsltChk) != 0){
			// do nothing
			$_SESSION['NewEntryMsg'] = "District Already Exists";
		}else{
			$Qry = "insert into district (district) values('" . strtoupper($_POST['txtDistt']) . "')";
			$rslt = mysql_query($Qry) or die(mysql_error());
		}
	}else if($_GET['adr'] == 4){
		$QryChk = "select * from city where city = '" . strtoupper($_POST['txtCity']) . "'";
		$rsltChk = mysql_query($QryChk) or die(mysql_error());
		if(mysql_num_rows($rsltChk) != 0){
			// do nothing
			$_SESSION['NewEntryMsg'] = "City Already Exists";
		}else{
			$Qry = "insert into city (city) values('" . strtoupper($_POST['txtCity']) . "')";
			$rslt = mysql_query($Qry) or die(mysql_error());
		}
	}
	
	header("Location: main.php");
?>