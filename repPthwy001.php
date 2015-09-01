<?PHP
	session_start();
		if($_GET['x'] == "x01"){
			$_SESSION['name']=strtoupper($_POST["txtname"]);
			$_SESSION['course']=$_POST["cmbCourse"];
			$_SESSION['cat']=$_POST["category"];
			$_SESSION['subcat']=$_POST["subcat"];
			$_SESSION['loan']=$_POST["loan"];
			
			$_SESSION['chkRep1'] = "1";
		}else if($_GET['x'] == "x00"){
			$_SESSION['name']="";
			$_SESSION['course']="";
			$_SESSION['cat']="";
			$_SESSION['subcat']="";
			$_SESSION['loan']="";
			
			$_SESSION['chkRep1'] = "0";
		}else{
			$_SESSION['chkRep1'] = "0";
		}
		header("Location: rep001.php");
?>