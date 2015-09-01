<?php	
	session_start();
	require("dbconnect.php");

		$regno = $_POST['txtregno'];
		
		$qry="SELECT * FROM stud_personal where id='" . $regno . "'";
		$result = mysql_query($qry) or die(mysql_error());
		
		//echo mysql_num_rows($result);
		if(mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
			if($row['gender'] == 'M'){
				$gender = 'Mr.';
				$sondgtr = 'S/O';
				$hisher = "his";
			}else{
				$gender = 'Ms.';
				$sondgtr = 'D/O';
				$hisher = "her";
			}
			$qryCrs="SELECT printableAbrv, stdate FROM course where courseID ='" . $row['courseID'] . "'";
			$resultCrs = mysql_query($qryCrs) or die(mysql_error());
			//echo "<br>" . mysql_num_rows($resultCrs);
			
			if(mysql_num_rows($resultCrs) > 0){
				$rowCrs = mysql_fetch_array($resultCrs);
				
				$qryAdress = "SELECT * from stud_perm_adr_contact where STUD_ID = '" . $regno . "'";
				$resultAdrress = mysql_query($qryAdress);
				
				if(mysql_num_rows($resultAdrress) > 0){
					$rowAddress = mysql_fetch_array($resultAdrress);
?>

<html>

<head>
 <title>. : Address Proof : .</title>
	<script language="javascript">
     function printpage(){
		 //window.print();
	 }
    </script>
    <style type="text/css" media="all">
		.printPreview{font-family:Verdana, Geneva, sans-serif; font-size:14px; border:2px dashed #03F; display:}
		.printLetter{}
		.tdStyle1{border-bottom: 1px solid #000000; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#000; font-size:25px}
		.tdStyle2{border-bottom: 1px solid #000000; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#000; font-size:16px}
		.tdStyle3{font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#000; font-size:40px}
		.tdStyle4{font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#000; font-size:11px}
		.tdStyleHead{border-bottom: 1px solid #000000; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#000; font-size:35px}
		.tdStyleHead1{border-bottom: 0px solid #000000; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#000; font-size:35px}
		.tdStyleHead2{font-weight:normal; font-family:"Times New Roman", Times, serif; color:#000; font-size:23px}
		td{color:#000; font-family:Arial, Helvetica, sans-serif}
		.LetterContent{font-family:'Times New Roman', Times, serif; font-size:17px}
		.addr{font-family: Verdana, Geneva, sans-serif; font-size:10px; font-weight:normal}
		/*Remove Element*/
		#logo, #catnavi, .topnavi, .more-link, .navigation, #sidebartop, #related, #social, #sponsors, .tabs, #allpost, .toolbar, .splitbox, #commentform, #commentabs .idTabs, .postmeta-content .comments, #respond h3, .tag, .footerlinks {display:none;}
		
		/* Show URL */
		a:link, a:visited {display: none}
		.basecolor{background:#f0f0f0;}

	</style>
</head>

<body onLoad="printpage();" leftmargin="0" topmargin="0">
<center>
        <table border="0" cellpadding="0" cellspacing="0" width="756" class="printLetter">
        	<tr>
            	<td><img src="image/LetterHead.jpg" width="756" height="163" border="0" /></td>
            </tr>
            <tr>
            	<td align="center">
                	<table border="0" cellpadding="0" cellspacing="0" width="690" class="printLetter">
                    	<tr>
                            <td height="15"></td>
                        </tr>
                        <tr>
                        	<td>
                        	<table border="0" cellpadding="0" cellspacing="0" width="690" class="printLetter">
                            	<tr>
                                	<td align="left" valign="top">Registration No:&nbsp;<u><?PHP echo $regno;?></u></td>
                                	<td align="right" valign="top">Date:&nbsp;<u><?PHP echo date('d/m/Y');?></u></td>
                                </tr>
                            </table>
                            </td>
                        </tr>
                        <tr>
                            <td height="50"></td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" class="tdStyleHead2"><b><u>To Whom so ever it may concern</u></b></td>
                        </tr>
                        <tr>
                            <td height="20"></td>
                        </tr>
                        <tr>
                        	<td height="10"></td>
                        </tr>
                    	<tr>
                        	<td class="LetterContent">
                            	<div align="justify">
                                    <span style="text-indent:0; line-height:30px; font-family:'Times New Roman', Times, serif; font-size:19px"> 
                                    	<p>
                                        	This is to certify that <?PHP echo $gender . ' ' . $row['name'] . ' ' . $sondgtr;?> of Shri. <?PHP echo $row['fname'];?> 
                                            is a bonafide student of this Institute of course <?PHP echo " <u>" . $rowCrs['printableAbrv'] . "</u> ";?>
                                            of <b>batch <?PHP echo $_SESSION['year'];?></b>.                                            
                                        </p>
                                        <p>
                                        	As per the official record, <?PHP echo $hisher;?> address is as under:
                                        </p>
                                        <p style="padding:0px 0px 0px 95px; font-family: Verdana, Geneva, sans-serif; line-height:22px; font-size:16px">
                                        		<b><u>Address</u></b><br />
                                        	<?PHP
												echo "C/O " . $row['fname'] .  ",<br />";
												echo $rowAddress['address'] . ",<br />";
												echo "City - " . $rowAddress['city'] . ",<br />";
												echo "District - " . $rowAddress['district'] . ",<br />";
												echo $rowAddress['state'] . ", (" . $rowAddress['country'] . ")";
											?>
                                        </p>
                                        <p>
                                        	This certificate is being issued for opening a bank account.
                                        </p>
                                    </span>
                                </div>
                            </td>
                    	</tr>
                        <tr>
                        	<td height="100"></td>
                        </tr>
                        <tr>
                        	<td><b>Sanjay Pasricha</b><br><span style="font:Arial, Helvetica, sans-serif; font-size:12px">Dean Student Welfare</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
</center>
</body>

</html>
<?PHP
				}else{
					//header("Location: main.php");
					echo "gadbad: Address";
				}
		}
}else{
		echo "Gadbad: Course id";
		//header("Location: main.php");
	}

	?>