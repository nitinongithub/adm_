<?php	
	session_start();
	require("dbconnect.php");

		$regno = $_POST['txtregNo'];
		
		$qry="SELECT * FROM stud_personal where id='" . $regno . "'";
		$result = mysql_query($qry) or die(mysql_error());
		//echo mysql_num_rows($result);
		if(mysql_num_rows($result) > 0){
			$row = mysql_fetch_array($result);
			
			$qryCrs="SELECT printableAbrv, stdate FROM course where courseID ='" . $row['courseID'] . "'";
			$resultCrs = mysql_query($qryCrs) or die(mysql_error());
			//echo "<br>" . mysql_num_rows($resultCrs);
			if(mysql_num_rows($resultCrs) > 0){
				$rowCrs = mysql_fetch_array($resultCrs);
?>

<html>

<head>
 <title>. : Admission Letter : .</title>
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
		.tdStyleHead2{font-weight:normal; font-family:Arial, Helvetica, sans-serif; color:#000; font-size:20px}
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
                                	<td align="left" valign="top">Registration No:&nbsp;<?PHP echo $regno;?></td>
                                	<td align="right" valign="top">Date:&nbsp;<u><?PHP echo date('d/m/Y');?></u></td>
                                </tr>
                            </table>
                            </td>
                        </tr>
                        <tr>
                            <td height="50"></td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" class="tdStyleHead2"><b><u>ADMISSION LETTER</u></b></td>
                        </tr>
                        <tr>
                            <td height="20"></td>
                        </tr>
                    	<tr>
                            <td align="left">Dear <?PHP echo strtoupper($row['name']);?>,</td>
                        </tr>
                        <tr>
                        	<td height="10"></td>
                        </tr>
                    	<tr>
                        	<td class="LetterContent">
                            	<div align="justify">
                                    <span style="text-indent:85; line-height:30px; font-family:'Times New Roman', Times, serif"> 
                                    	<p>
                                            We welcome you to the Amrapali family as a student of<?PHP echo " <u>" . $rowCrs['printableAbrv'] . "</u> ";?>Programme. We hope
                                            that during your stay at Amrapali, you will enjoy the academic environment which will take you
                                            to new heights in your professional career. Please note that academic session is starting from
                                            __________________<?PHP //echo " <u>". $rowCrs['stdate'] . "</u> ";?>and your presence on the first day will be mandatory
                                            to complete th formalities for the said course.	
                                        </p>
                                        <p>
                                        	Please ensure that the balance fee (if any) along with documents which may not have been submitted
                                            at the time of counselling are brought alongwith originals of all the documents for verification by
                                            the admission cell.
                                        </p>
                                        <p>
                                        	Your admission shall remain provisional till submission of all required documents and verification
                                            of the same. University/Institute reserves the right of admission, it may be cancelled if required
                                            formalities are not completed within the given time.
                                        </p>
                                        <p>
                                        	We wish you the best of everything during your stay with us.
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
		}
}else{
		header("Location: main.php");
	}

	?>