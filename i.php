<?PHP
$uploadDir = 'regPicsUploads/';
	
	if($_FILES['uploadPic']['name'] == ""){
		$path = "Not Any Image"; // NAI -> Not Any Image
		echo $path;
	}else{
		$extJi = end(explode(".", $_FILES['uploadPic']['name']));
		$img = $fileName = $IDJI;
		
		$img = $fileName . "." . $extJi;
		$path = $uploadDir . $img;
			
		copy($_FILES['uploadPic']['tmp_name'], $path);
	}
?>