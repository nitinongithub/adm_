<?PHP
	ob_start();
	
	header("Cache-control: private, no-cache");
	header("Pragma: no-cache");
	
	session_start();
	require("dbconnect.php");
	
	$oldID = $_POST['txtHdn'];
	$NewCrs= $_POST['chooseCourse'];
	$unameji = $_SESSION['usrnm'];
	//New Registration No. Generation
	$QryForID = "select ID from id_ji";
	$rsltForIDJi = mysql_query($QryForID) or die(mysql_error());
	$row = mysql_fetch_array($rsltForIDJi);
	$prevID= $row['ID'];
	$NewID = $IDJI = $prevID  + 1;
	$IDJI = date('Y') . date('m') . $IDJI;
	//----------------------------------------------------------
	
	$chkQry = "select ID from stud_personal where ID='" . $IDJI . "'";
	$rsltChk = mysql_query($chkQry) or die(mysql_error());
	
	if(mysql_num_rows($rsltChk) == 0){
		$Qry = "insert into stud_personal (ID, admstID, name, gender, mname, fname, dob, mob, yob, nationality, domicile, category, hzcateg, courseID, lastAttendedAcademicPlace, username, image, regDate, loan, codeID) ";
		$Qry = $Qry . "select '$IDJI', 'R', name, gender, mname, fname, dob, mob, yob, nationality, domicile, category, hzcateg, '$NewCrs', lastAttendedAcademicPlace, '$unameji', image, regDate, loan, $NewID from stud_personal where ID = '$oldID'";
		$result = mysql_query($Qry) or die(mysql_error());
		//echo $Qry;
		$Qry = "insert into stud_perm_adr_contact (address, city, district, state, country, phone, mobile, STUD_ID) ";
		$Qry = $Qry . "select address, city, district, state, country, phone, mobile, '$IDJI' from stud_perm_adr_contact where STUD_ID = '$oldID'";
		$result = mysql_query($Qry) or die(mysql_error());
		
		$Qry = "insert into stud_cores_adr_contact (address, city, district, state, country, phone, mobile, STUD_ID) ";
		$Qry = $Qry . "select address, city, district, state, country, phone, mobile, '$IDJI' from stud_cores_adr_contact where STUD_ID = '$oldID'";
		$result = mysql_query($Qry) or die(mysql_error());
		
		$Qry = "insert into stud_lg_adr_contact (address, city, district, state, country, phone, mobile, STUD_ID) ";
		$Qry = $Qry . "select address, city, district, state, country, phone, mobile, '$IDJI' from stud_lg_adr_contact where STUD_ID = '$oldID'";
		$result = mysql_query($Qry) or die(mysql_error());
		
		$Qry = "insert into prev_qualification (instname, boarduniv, yearofpassing, subjects, marksobt, qualifID, stud_ID) ";
		$Qry = $Qry . "select instname, boarduniv, yearofpassing, subjects, marksobt, qualifID, '$IDJI' from prev_qualification where stud_ID = '$oldID'";
		$result = mysql_query($Qry) or die(mysql_error());
		
		$Qry = "insert into studentchklist (regID, chkListID, status, detail) ";
		$Qry = $Qry . "select '$IDJI', chkListID, status, detail from studentchklist where regID = '$oldID'";
		$result = mysql_query($Qry) or die(mysql_error());
		
		$Qry = "insert into exam_attended (studID, exam, rollno, score, month, year, staterank, allindiarank, rank) ";
		$Qry = $Qry . "select '$IDJI', exam, rollno, score, month, year, staterank, allindiarank, rank from exam_attended where studID = '$oldID'";
		$result = mysql_query($Qry) or die(mysql_error());
		
		/*$Qry = "insert into fee (regID, date, Amount, username, feetype, feemode, bankname, ddno, dddate) ";
		$Qry = $Qry . "select '$IDJI', date, Amount, username, 'Registration', feemode, bankname, ddno, dddate from fee where regID = '$oldID' AND feetype = 'Registration'";
		$result = mysql_query($Qry) or die(mysql_error());*/
		
		$QryForID = "update id_ji set ID=" . $NewID . " where ID=" . $prevID;
		$rsltForIDJi = mysql_query($QryForID) or die(mysql_error());
		
		$Qry = "insert into new_old_crs_reg_log (oldid, newid, date) values('$oldID', '$IDJI' , '" . date('d/m/Y') . "')";
		$result = mysql_query($Qry) or die(mysql_error());
		
		echo "<div style='color:#000000; font-weight:bold; text-decoration:underline; font-size:13px; height:20px; border:#909090 solid 0px; clear:both'>Your New Registration No.</div>" . $IDJI . "<br /><div style='color:#000090'>in Course: " . $NewCrs . "</div>";
	}else{
	}
	//new_old_crs_reg_log : oldid : newid
?>