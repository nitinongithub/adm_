<?PHP
$uploadDir = 'regPicsUploads/';
	
	if($_FILES['uploadPic']['name'] != ""){
		$booljiImage = 0;
		
		$extJi = end(explode(".", $_FILES['uploadPic']['name']));
		$img = $fileName = $IDJI;
		
		$img = $fileName . "." . $extJi;
		$path = $uploadDir . $img;
			
		copy($_FILES['uploadPic']['tmp_name'], $path);
	}else{
		$booljiImage = 1;
	}
?>