<?PHP
	session_start();

	require("dbconnect.php");
	
	$QryForID = "select ID from id_ji";
	$rsltForIDJi = mysql_query($QryForID) or die(mysql_error());
	$row = mysql_fetch_array($rsltForIDJi);
	$prevID= $row['ID'];
	
	$IDJI = $prevID  + 1;
	
	$uploadDir = 'regPicsUploads/';
	
	if($_FILES['uploadPic']['name'] == ""){
		$path = "Not Any Image"; // NAI -> Not Any Image
		echo $path;
	}else{
		$img = $fileName = $IDJI;
		$extJi = split("[/\\.]", $_FILES['uploadPic']['name']);
		echo $extJi;
		$img = $img . $extJi;
		$img = $id . "_" . $img;
		$path = $uploadDir . $img;
		
		copy($_FILES['uploadPic']['tmp_name'], $path);

		echo "<img src='" .$path . "' />";
	}
	
	
?>