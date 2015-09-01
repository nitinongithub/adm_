<?php session_start();
	include 'dbconnect.php';
	
	$u_name = $_SESSION['usrnm'];
	$up_id = $_POST['cmbDocuments'];
	$chk_ji = $_POST['chk_ji'];
	
	if($chk_ji != 'delete'){
		$qry = "select * from documents where upload_id='$up_id'";
		$result = mysql_query($qry) or die(mysql_error());
	
		if(mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
		}
		$file_open = $row['path_'];
	
?>
		<center>
			<img src="<?php echo $file_open; ?>" />
		</center>

<?php	}else{

	$qry = "select * from documents where upload_id='$up_id'";
	$result = mysql_query($qry) or die(mysql_error());
	
	if(mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
	}
	$file_open = $row['path_'];
	unlink($file_open);
	
	 $qry = "delete from documents where upload_id='$up_id'";
	 $result = mysql_query($qry) or die(mysql_error());
	 
	 $QRY_ = "update studentchklist set status='1', up_status = '0' where regID = '$stud_id' and chkListID ='$cmbChkList'";
	 mysql_query($QRY_);
	 
	 header('Location: main.php');
	}?>