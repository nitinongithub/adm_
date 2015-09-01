<?PHP
	ob_start();
	
	session_start();
	require("dbconnect.php");
	
	$QryForID = "select ID from id_ji";
	$rsltForIDJi = mysql_query($QryForID) or die(mysql_error());
	$row = mysql_fetch_array($rsltForIDJi);

	$prevID= $row['ID'];
	
	$NewID = $IDJI = $prevID  + 1;
	echo $IDJI = date('Y') . date('m') . $IDJI;

	$SRCID = $_POST['cmbSrcInfo'];
	include("i.php");
	$chkQry = "select ID from stud_personal where ID='" . $IDJI . "'";
	$rsltChk = mysql_query($chkQry) or die(mysql_error()); 
	
	if(mysql_num_rows($rsltChk) == 0){
		$Qry = "insert into stud_personal (ID, admstID, name, gender, mname, fname, dob, mob, yob, nationality, domicile, category, hzcateg, courseID, lastAttendedAcademicPlace, username, image, regDate, loan, codeID) values";
		$Qry = $Qry . " (" . $IDJI . ", 'R', '" . addslashes($_POST['txtName']) . "', '" . $_POST['optGender'] . "', '" . addslashes($_POST['txtMName']) . "', '" . addslashes($_POST['txtFName']) . "', "; 
		$Qry = $Qry . "'" . $_POST['dobDD'] . "', '" . $_POST['dobMM'] . "', '" . $_POST['dobYY'] . "', ";
		$Qry = $Qry . "'" . addslashes($_POST['txtNationality']) . "', '" . addslashes($_POST['optDomicile']) . "', '" . $_POST['optCateg'] . "', '" . $_POST['optHCateg'] . "', '" . $_POST['chooseCourse'] . "', ";
		$Qry = $Qry . "'" . addslashes($_POST['txtSCULA']) . "', '" . $_SESSION['usrnm'] . "', '" . $img . "', '" . date('d/m/Y') . "', '" . $_POST['optLoan'] . "', " . $NewID . ")";
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";
		
		$Qry = "insert into stud_perm_adr_contact (address, city, district, state, country, phone, mobile, STUD_ID) values";
		$Qry = $Qry . " ('" . addslashes($_POST['txtPAddress']) . "', '" . $_POST['cmbPCity'] . "', '" . $_POST['cmbPDistt'] . "', '" . $_POST['cmbPState'] . "', '" . $_POST['cmbPCountry'] . "', '" . $_POST['txtPPh'] . "', '" . $_POST['txtPMob'] . "', " . $IDJI . ")";
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";
		
		$Qry = "insert into stud_cores_adr_contact (address, city, district, state, country, phone, mobile, STUD_ID) values";
		$Qry = $Qry . " ('" . addslashes($_POST['txtCAddress']) . "', '" . $_POST['cmbCCity'] . "', '" . $_POST['cmbCDistt'] . "', '" . $_POST['cmbCState'] . "', '" . $_POST['cmbCCountry'] . "', '" . $_POST['txtCPh'] . "', '" . $_POST['txtCMob'] . "', " . $IDJI . ")";
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";
		
		$Qry = "insert into stud_lg_adr_contact (address, city, district, state, country, phone, mobile, STUD_ID) values";
		$Qry = $Qry . " ('" . addslashes($_POST['txtLGAddress']) . "', '" . $_POST['cmbLGCity'] . "', '" . $_POST['cmbLGDistt'] . "', '" . $_POST['cmbLGState'] . "', '" . $_POST['cmbLGCountry'] . "', '" . $_POST['txtLGPh'] . "', '" . $_POST['txtLGMob'] . "', " . $IDJI . ")";
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";
		
		$Qry = "insert into prev_qualification (instname, boarduniv, yearofpassing, subjects, marksobt, qualifID, stud_ID) values";
		$Qry = $Qry . " ('" . addslashes($_POST['txtHsInst']) . "', '" . addslashes($_POST['txtHsBrdUniv']) . "', '" . addslashes($_POST['txtHsYr']) . "',";
		$Qry = $Qry . "'" . addslashes($_POST['txtHsSbj']) . "', " . $_POST['txtHsMrks'] . ", " . 1 . ", " . $IDJI . ")";
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";
		
		$Qry = "insert into prev_qualification (instname, boarduniv, yearofpassing, subjects, marksobt, qualifID, stud_ID) values";
		$Qry = $Qry . " ('" . addslashes($_POST['txtIntInst']) . "', '" . addslashes($_POST['txtIntBrdUniv']) . "', '" . addslashes($_POST['txtIntYr']) . "',";
		$Qry = $Qry . "'" . addslashes($_POST['txtIntSbj']) . "', " . $_POST['txtIntMrks'] . ", " . 2 . ", " . $IDJI . ")";
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";
		
		$Qry = "insert into prev_qualification (instname, boarduniv, yearofpassing, subjects, marksobt, qualifID, stud_ID) values";
		$Qry = $Qry . " ('" . addslashes($_POST['txtGdInst']) . "', '" . addslashes($_POST['txtGdBrdUniv']) . "', '" . addslashes($_POST['txtGdYr']) . "',";
		$Qry = $Qry . "'" . addslashes($_POST['txtGdSbj']) . "', " . $_POST['txtGdMrks'] . ", " . 3 . ", " . $IDJI . ")";
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";
		
		$Qry = "insert into prev_qualification (instname, boarduniv, yearofpassing, subjects, marksobt, qualifID, stud_ID) values";
		$Qry = $Qry . " ('" . addslashes($_POST['txtOtInst']) . "', '" . addslashes($_POST['txtOtBrdUniv']) . "', '" . addslashes($_POST['txtOtYr']) . "',";
		$Qry = $Qry . "'" . addslashes($_POST['txtOtSbj']) . "', " . $_POST['txtOtMrks'] . ", " . 4 . ", " . $IDJI . ")";
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";
	
		$QryCL = "select chkLstID from checklist";
		$rsltCL =  mysql_query($QryCL) or die(mysql_error());
		
		while($row = mysql_fetch_array($rsltCL)){
			$QrySCL = "insert into studentchklist (regID, chkListID, status, detail) values(" . $IDJI . ", " . $row['chkLstID'] . ", 'F', '-')";
			$rsltSCL =  mysql_query($QrySCL) or die(mysql_error());
		}
		
		$Qry = "insert into exam_attended (studID, exam, rollno, score, month, year, staterank, allindiarank, rank) values";
		$Qry = $Qry . " (" . $IDJI . ", '" . addslashes($_POST['txtExam']) . "', '" . addslashes($_POST['txtRoll']) . "', '" . addslashes($_POST['txtScore']) . "',";
		$Qry = $Qry . "'" . addslashes($_POST['txtMonth']) . "', '" . addslashes($_POST['txtYear']) . "', '" . addslashes($_POST['txtStRank']) . "', ";
		$Qry = $Qry . "'" . addslashes($_POST['txtAIRank']) . "', '" . addslashes($_POST['txtRank']) . "')";
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";
		
		$Qry = "insert into studentsourceinfo (SRCID, REGID) values($SRCID, $IDJI)";
		$rslt= mysql_query($Qry) or die(mysql_error());
		
		$QryForID = "update id_ji set ID=" . $NewID . " where ID=" . $prevID;
		//echo $QryForID . "<br><br>";
		$rsltForIDJi = mysql_query($QryForID) or die(mysql_error());
		
		$_SESSION['RegIDJiIntimation'] = "Registration Number of <font color='#FF00FF'>" . $_POST['txtName'] . "</font> is <font color='#990000'><u>" . $IDJI . "</u></font>.";
	}else{
		$QryMaxId = "select MAX(codeID) as maxID from stud_personal";
		$rsltMaxId = mysql_query($QryMaxId) or die(mysql_error()); 
		$rw = mysql_fetch_array($rsltMaxId);
		//echo $rw['maxID'] . "<br>";
		$QryForID = "update id_ji set ID=" . $rw['maxID'] . " where ID=" . $prevID;
		//echo $QryForID . "<br><br>";
		$rsltForIDJi = mysql_query($QryForID) or die(mysql_error());
		
		$_SESSION['RegIDJiIntimation'] = "<h3>Sorry for inconvinience. Please Input the record of <font color='#FF00FF'>" . $_POST['txtName'] . "</font> again!!!<br> Server Error!!!</h3>";
	}
	header("Location: main.php");
	
?>