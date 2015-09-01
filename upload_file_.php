<?php session_start();
	include 'dbconnect.php';
	
	$cmbChkList = $_POST['cmbChkList'];
	$cmbSem = $_POST['cmbSem'];
	$txtDoc = $_POST['txtDoc'];
	$doc_withsem = 'Sem '.$cmbSem.' - ' . $txtDoc;
	$stud_id = $_SESSION['regIDji'];
	$crs = $_SESSION['crs_'];
	$u_name = $_SESSION['usrnm'];
	
	
	$uploadDir = 'stud_docs/'.$stud_id.'/';
	$uploadDir_db = 'stud_docs/'.$stud_id.'/';
	
	
	if(! is_dir($uploadDir)){ mkdir($uploadDir); }
	
	if($_FILES['txtUpload_']['name'] == ""){
		$path = 'xpath';
	}else{
		$extJi = end(explode(".", $_FILES['txtUpload_']['name']));
		$fileName = $txtDoc.'_SEM_'.$cmbSem.'_'.$stud_id;
		
		$file = $fileName . "." . $extJi;
		$path_ = $uploadDir . $file;
		copy($_FILES['txtUpload_']['tmp_name'], $path_);
		$path = $uploadDir_db . $file;
	}
	$Qry = "INSERT INTO documents(
			`stud_id`, 
			`checklist_id`, 
			`courseID`, 
			`semID`, 
			`documentName`, 
			`path_`,
			`date_`, 
			`username`
			) 
			VALUES (
				'$stud_id',
				'$cmbChkList',
				'$crs',
				'$cmbSem',
				'$doc_withsem',
				'$path', '". date('d/m/Y'). "',
				'$u_name'
			)";
	mysql_query($Qry);
	
	$Q = "select * from studentchklist where chkListID ='$cmbChkList' and regID = '$stud_id'";
	$result = mysql_query($Q) or die(mysql_error());
	
	if(mysql_num_rows($result) > 0){
		$QRY_ = "update studentchklist set status='1', up_status = '1' where regID = '$stud_id' and chkListID ='$cmbChkList'";
	}else{
		$QRY_ = "INSERT INTO `studentchklist`
				(
					`regID`, 
					`chkListID`, 
					`status`, 
					`up_status`, 
					`detail`
				) VALUES (
					'$stud_id',
					'$cmbChkList',
					'1',
					'1',
					'-'
				)";
	}
	mysql_query($QRY_);
	//echo 'hello';
	header('Location: main.php');
?>