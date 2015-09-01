<?PHP
	ob_start();
	
	session_start();
	require("dbconnect.php");
	
	$booljiImage = 0;
	
	$IDJI = $_SESSION['txtregno'];
	include("u.php");
		if($booljiImage == 0){
			$Qry = "update stud_personal set ";
			$Qry = $Qry . "name = '" . addslashes($_POST['txtName']) . "', gender = '" . $_POST['optGender'] . "', mname = '" . addslashes($_POST['txtMName']) . "', fname ='" .addslashes($_POST['txtFName']) . "', "; 
			$Qry = $Qry . "dob = '" . $_POST['dobDD'] . "', mob ='" . $_POST['dobMM'] . "', yob='" . $_POST['dobYY'] . "', ";
			$Qry = $Qry . "nationality='" . addslashes($_POST['txtNationality']) . "', domicile='" . addslashes($_POST['optDomicile']) . "', category= '" . $_POST['optCateg'] . "',hzcateg= '" . $_POST['optHCateg'] . "', courseID= '" . $_POST['chooseCourse'] . "', ";
			$Qry = $Qry . "lastAttendedAcademicPlace ='" . addslashes($_POST['txtSCULA']) . "', username ='" . $_SESSION['usrnm'] . "',image = '" . $img . "', loan = '" . $_POST['optLoan'] . "'";
			$Qry = $Qry . " where ID ='" . $IDJI  . "'";
		}else if($booljiImage == 1){
			$Qry = "update stud_personal set ";
			$Qry = $Qry . "name = '" . addslashes($_POST['txtName']) . "', gender = '" . $_POST['optGender'] . "', mname = '" . addslashes($_POST['txtMName']) . "', fname ='" .addslashes($_POST['txtFName']) . "', "; 
			$Qry = $Qry . "dob = '" . $_POST['dobDD'] . "', mob ='" . $_POST['dobMM'] . "', yob='" . $_POST['dobYY'] . "', ";
			$Qry = $Qry . "nationality='" . addslashes($_POST['txtNationality']) . "', domicile='" . addslashes($_POST['optDomicile']) . "', category= '" . $_POST['optCateg'] . "',hzcateg= '" . $_POST['optHCateg'] . "', courseID= '" . $_POST['chooseCourse'] . "', ";
			$Qry = $Qry . "lastAttendedAcademicPlace ='" . addslashes($_POST['txtSCULA']) . "', username ='" . $_SESSION['usrnm'] . "', loan = '" . $_POST['optLoan'] . "'";
			$Qry = $Qry . " where ID ='" . $IDJI  . "'";
		}
		
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";

		$Qry = "update stud_perm_adr_contact set ";
		$Qry = $Qry . "address ='" . addslashes($_POST['txtPAddress']) . "', city = '" . $_POST['cmbPCity'] . "', district ='" . $_POST['cmbPDistt'] . "', state ='" . $_POST['cmbPState'] . "', country ='" . $_POST['cmbPCountry'] . "', phone = '" . addslashes($_POST['txtPPh']) . "', mobile ='" . addslashes($_POST['txtPMob']) . "'";
		$Qry = $Qry . " where STUD_ID ='" . $IDJI  . "'";
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";
		
		$Qry = "update stud_cores_adr_contact set ";
		$Qry = $Qry . "address ='" . addslashes($_POST['txtCAddress']) . "', city= '" . $_POST['cmbCCity'] . "', district= '" . $_POST['cmbCDistt'] . "', state= '" . $_POST['cmbCState'] . "', country= '" . $_POST['cmbCCountry'] . "', phone= '" . addslashes($_POST['txtCPh']) . "', mobile= '" . addslashes($_POST['txtCMob']) . "'";
		$Qry = $Qry . " where STUD_ID ='" . $IDJI  . "'";
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";
		
		$Qry = "update stud_lg_adr_contact set ";
		$Qry = $Qry . "address ='" . addslashes($_POST['txtLGAddress']) . "', city= '" . $_POST['cmbLGCity'] . "', district= '" . $_POST['cmbLGDistt'] . "', state= '" . $_POST['cmbLGState'] . "', country= '" . $_POST['cmbLGCountry'] . "', phone= '" . addslashes($_POST['txtLGPh']) . "', mobile= '" . addslashes($_POST['txtLGMob']) . "'";
		$Qry = $Qry . " where STUD_ID ='" . $IDJI  . "'";
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";
		
		$Qry = "update prev_qualification set ";
		$Qry = $Qry . "instname ='" . addslashes($_POST['txtHsInst']) . "', boarduniv= '" . addslashes($_POST['txtHsBrdUniv']) . "', yearofpassing= '" . addslashes($_POST['txtHsYr']) . "',";
		$Qry = $Qry . "subjects='" . addslashes($_POST['txtHsSbj']) . "', marksobt= " . $_POST['txtHsMrks'];
		$Qry = $Qry . " where stud_ID ='" . $IDJI  . "' AND qualifID=" . 1;
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";
		
		$Qry = "update prev_qualification set ";
		$Qry = $Qry . "instname= '" . addslashes($_POST['txtIntInst']) . "', boarduniv='" . addslashes($_POST['txtIntBrdUniv']) . "', yearofpassing= '" . addslashes($_POST['txtIntYr']) . "',";
		$Qry = $Qry . "subjects='" . addslashes($_POST['txtIntSbj']) . "', marksobt= " . $_POST['txtIntMrks'];
		$Qry = $Qry . " where stud_ID ='" . $IDJI  . "' AND qualifID=" . 2;
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";
		
		$Qry = "update prev_qualification set "; ", , , , , qualifID, stud_ID) values";
		$Qry = $Qry . "instname='" . addslashes($_POST['txtGdInst']) . "', boarduniv= '" . addslashes($_POST['txtGdBrdUniv']) . "', yearofpassing= '" . addslashes($_POST['txtGdYr']) . "',";
		$Qry = $Qry . "subjects='" . addslashes($_POST['txtGdSbj']) . "', marksobt=" . $_POST['txtGdMrks'];
		$Qry = $Qry . " where stud_ID ='" . $IDJI  . "' AND qualifID=" . 3;
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";
		
		$Qry = "update prev_qualification set "; ", , , , , qualifID, stud_ID) values";
		$Qry = $Qry . "instname='" . addslashes($_POST['txtOtInst']) . "', boarduniv= '" . addslashes($_POST['txtOtBrdUniv']) . "', yearofpassing= '" . addslashes($_POST['txtOtYr']) . "',";
		$Qry = $Qry . "subjects='" . addslashes($_POST['txtOtSbj']) . "', marksobt=" . $_POST['txtOtMrks'];
		$Qry = $Qry . " where stud_ID ='" . $IDJI  . "' AND qualifID=" . 4;
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";
		
		$Qry = "update exam_attended set ";
		$Qry = $Qry . "exam='" . addslashes($_POST['txtExam']) . "', rollno= '" . addslashes($_POST['txtRoll']) . "', score='" . addslashes($_POST['txtScore']) . "',";
		$Qry = $Qry . "month='" . addslashes($_POST['txtMonth']) . "', year= '" . addslashes($_POST['txtYear']) . "', staterank= '" . addslashes($_POST['txtStRank']) . "', ";
		$Qry = $Qry . "allindiarank='" . addslashes($_POST['txtAIRank']) . "', rank= '" . addslashes($_POST['txtRank']) . "'";
		$Qry = $Qry . " where studID ='" . $IDJI  . "'";
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		//echo $Qry . "<br><br>";//*/
		
		$Qry = "insert into editregistration_log (studID, username, editDdate) values('" . $IDJI . "', '" . $_SESSION['usrnm'] . "', '" . date("d/m/Y") . "')";
		$rslt = mysql_query($Qry) or die(mysql_error()); 
		
		$_SESSION['RegIDJiIntimation'] = "Detail of <font color='#FF00FF'>" . $_POST['txtName'] . "</font> is having Reg. No. <font color='#990000'><u>" . $_SESSION['txtregno'] . "</u></font> is updated.";
		$_SESSION['cntnt'] = "editReg.php";
		
	header("Location: main.php");
	
?>