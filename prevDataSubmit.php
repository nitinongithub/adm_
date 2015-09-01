<?PHP
	session_start();
	require("dbconnect.php");
	
	if($_SESSION['usrnm'] != "0100"){
		$crs = $_POST['crs'];
		$reg = $_POST['reg'];
		$admsn = $_POST['admsn'];
		
		for($loop1 = 0; $loop1 < count($crs); $loop1++){
			$Qry = "insert into prevdataregadmission (courseID, dateRA, noOfReg, noOfAdm, username) values('" . $crs[$loop1] . "',";
			$Qry = $Qry .  "'" . $_POST['startdt'] . "', '" . $reg[$loop1] . "', '" . $admsn[$loop1] . "', '" . $_SESSION['usrnm'] . "'"; 
			$Qry = $Qry . ")";
			
			mysql_query($Qry);
		}
	}
	
	header("Location: main.php");
?>