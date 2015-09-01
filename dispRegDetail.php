<?php	
	session_start();
	require("dbconnect.php");
	
	$regno=$_GET["txtregno"];

	$qry="SELECT * FROM stud_personal where id='" . $regno . "'";
	$result = mysql_query($qry) or die(mysql_error());
	
	if(mysql_num_rows($result) > 0){

	$qryPAdr="SELECT * FROM stud_perm_adr_contact where STUD_ID ='" . $regno . "'";
	$resultPAdr = mysql_query($qryPAdr) or die(mysql_error());
	
	$qryCAdr="SELECT * FROM stud_cores_adr_contact where STUD_ID ='" . $regno . "'";
	$resultCAdr = mysql_query($qryCAdr) or die(mysql_error());
	
	$qryLGAdr="SELECT * FROM stud_lg_adr_contact where STUD_ID='" . $regno . "'";
	$resultLGAdr = mysql_query($qryLGAdr) or die(mysql_error());
	
	$qryPrevQualf="SELECT * FROM view_prevqualificationwithexam where stud_ID='" . $regno . "' order by qualifID";
	$resultPQ = mysql_query($qryPrevQualf) or die(mysql_error());
	
	$qryFee="SELECT * FROM fee where feetype='Registration' and regID='" . $regno . "'";
	$resultFee = mysql_query($qryFee) or die(mysql_error());
	}else{
		header("Location: main.php");
	}
?>

<html>

<head>
 <title>Registration No. <?PHP echo $regno;?></title>
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
    <?PHP require("headerinclude.php");?>
</head>

<body>
<center>

	<?PHP if(mysql_num_rows($result) >0){?>
 		<table border="0" cellpadding="15" cellspacing="0" width="700" bordercolor="#000000"><tr><td>
        <table border="0" cellpadding="0" cellspacing="0" width="700">
        	<tr>
            	<td colspan="2" class="tdStyleHead">
                	<table border="0" cellpadding="0" cellspacing="0" width="700">
                        <tr>
                        <td align="center" class="tdStyle3">Student Registration Detail<br><span class="tdStyle2"></span></td>
                        </tr>
                        <tr>
                            <td height="5"></td>
                        </tr>
                    </table>
            	</td>
            </tr>
            <tr>
            	<td colspan="2" height="3"></td>
            </tr>
             <?PHP
					$testqry="SELECT * FROM admission where regID='" . $regno . "'";
					$fresult = mysql_query($testqry) or die(mysql_error());
					if(mysql_num_rows($fresult) > 0){
						$clrJi = "#000000";
					}else{
						$clrJi = "#ffff00";
					}
			?>
                                
            <tr>
            	<td align="left" class="tdStyle2" height="25" width="350">&nbsp;Registration No. <span style="font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#000; font-size:18px"><?PHP echo $regno;?></span></td>
				<td bgcolor="<?PHP echo $clrJi;?>" align="right" class="tdStyle2" width="350">
				<?PHP if(mysql_num_rows($fresult) > 0){?>
                        <?PHP $rowAdmission = mysql_fetch_array($fresult) or die(mysql_error());?>
                        <font color="#ffffff"><b>Admission taken in <font color="#ffff00"><?PHP echo $rowAdmission['courseID'];?> </font>Course.</b></font>
                <?PHP }else{?>
                		<font color="#ff0000"><b>Admission Still not taken.</b></font>
                <?PHP }?>
                </td>
            </tr>
            <tr>
            	<td colspan="2" height="3"></td>
            </tr>
            <tr>
            	<td align="left" valign="top" width="550">
                	<table border="0" cellpadding="2" cellspacing="0" class="txtCntn">
                        <?PHP while($row = mysql_fetch_array($result)){?>
                            <tr>
                            	<td colspan="2" height="5"></td>
                            </tr>
                            <tr valign="top">
                                <td width="150">&nbsp;Name</td>
                                <td><?PHP echo $row['name'];?></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="1" bgcolor="#fff0f0"></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="3"></td>
                            </tr>
                            <tr valign="top">
                                <td>&nbsp;Gender</td>
                                <td><?PHP echo $row['gender']?></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="1" bgcolor="#fff0f0"></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="3"></td>
                            </tr>
                            <tr valign="top">
                                <td>&nbsp;Date Of Birth</td>
                                <td><?PHP echo $row['dob'] ."/". $row['mob'] ."/". $row['yob'];?></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="1" bgcolor="#fff0f0"></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="3"></td>
                            </tr>
                            <tr valign="top">
                                <td>&nbsp;Father's Name</td>
                                <td><?PHP echo $row['fname'];?></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="1" bgcolor="#fff0f0"></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="3"></td>
                            </tr>
                            <tr valign="top">
                                <td>&nbsp;Mother's Name</td>
                                <td><?PHP echo $row['mname'];?></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="1" bgcolor="#fff0f0"></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="3"></td>
                            </tr>
                            <tr>
                                <td>&nbsp;Course</td>
                                <td><font color="#000000"><b><?PHP echo $row['courseID'];?></b></font></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="3"></td>
                            </tr>
                    </table>
				</td>
                <td valign="top" align="right">
                	<img src="regPicsUploads/<?PHP echo $row['image'];?>" width="120" height="140" border="0"/>
                </td>
            </tr>
            <?PHP }?>
            <tr>
            	<td height="5" colspan="2" class="tdStyle2"></td>
            </tr>
            <tr>
            	<td height="5" colspan="2"></td>
            </tr>
            <tr>
            	<td colspan="2">
                	<table border="0" cellpadding="0" cellspacing="0" class="txtCntn">
                            <tr>
                            	<td colspan="2" height="3"></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="5"></td>
                            </tr>
                            <tr>
                            	<td colspan="2">
                                    <table border="0" cellpadding="0" cellspacing="0" class="txtCntn" width="220">
                                        <tr>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="txtCntn" width="220">
                                                    <?PHP while($rowAdr = mysql_fetch_array($resultPAdr)){?>
                                                    <tr valign="top">
                                                        <td width="150" colspan="2"><b><u>Perm. Address</u></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <?PHP echo $rowAdr['address'];?><br>
                                                            <b>City:</b> <?PHP echo $rowAdr['city'];?><br>
                                                            <b>District:</b> <?PHP echo $rowAdr['district'];?><br>
                                                            <b>State:</b> <?PHP echo $rowAdr['state'];?><br>
                                                            <b>Country:</b> <?PHP echo $rowAdr['country'];?><br>
                                                            <b>Phone: </b><?PHP echo $rowAdr['phone']?><br>
                                                            <b>Mobile: </b><?PHP echo $rowAdr['mobile'];?>
                                                        </td>
                                                    </tr>
                                                    <?PHP }?>
                                                </table>
                                            </td>
                                            <td width="5" bgcolor="#ffffff">&nbsp;</td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="txtCntn" width="220">
                                                    <?PHP while($rowAdr = mysql_fetch_array($resultCAdr)){?>
                                                    <tr valign="top">
                                                        <td width="150" colspan="2"><b><u>Corres. Address</u></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <?PHP echo $rowAdr['address'];?><br>
                                                            <b>City:</b> <?PHP echo $rowAdr['city'];?><br>
                                                            <b>District:</b> <?PHP echo $rowAdr['district'];?><br>
                                                            <b>State:</b> <?PHP echo $rowAdr['state'];?><br>
                                                            <b>Country:</b> <?PHP echo $rowAdr['country'];?><br>
                                                            <b>Phone: </b><?PHP echo $rowAdr['phone']?><br>
                                                            <b>Mobile: </b><?PHP echo $rowAdr['mobile'];?>
                                                        </td>
                                                    </tr>
                                                    <?PHP }?>
                                                </table>
                                            </td>
                                            <td width="5" bgcolor="#ffffff">&nbsp;</td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="txtCntn" width="220">
                                                    <?PHP while($rowAdr = mysql_fetch_array($resultLGAdr)){?>
                                                    <tr valign="top">
                                                        <td width="150" colspan="2"><b><u>LG Address</u></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <?PHP echo $rowAdr['address'];?><br>
                                                            <b>City:</b> <?PHP echo $rowAdr['city'];?><br>
                                                            <b>District:</b> <?PHP echo $rowAdr['district'];?><br>
                                                            <b>State:</b> <?PHP echo $rowAdr['state'];?><br>
                                                            <b>Country:</b> <?PHP echo $rowAdr['country'];?><br>
                                                            <b>Phone: </b><?PHP echo $rowAdr['phone']?><br>
                                                            <b>Mobile: </b><?PHP echo $rowAdr['mobile'];?>
                                                        </td>
                                                    </tr>
                                                    <?PHP }?>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                    </table>
                </td>
            </tr>
            <tr>
            	<td height="5" colspan="2"></td>
            </tr>
            <tr>
            	<td height="1" colspan="2" bgcolor="#000000"></td>
            </tr>
            <tr>
            	<td height="5" colspan="2"></td>
            </tr>
            <tr>
                <td height="5" colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2"><b>Previous Qualification</b></td>
            </tr>
            <tr>
            	<td colspan="2">
                	<table border="1" cellpadding="2" cellspacing="0" class="txtCntn" width="700" bordercolor="#000000">
                            <tr bgcolor="#f0f0f0">
                            	<td><b>Name of Examination</b></td>
                                <td><b>Institution</b></td>
                                <td><b>Board/Univ</b></td>
                                <td><b>Year</b></td>
                                <td><b>Subjects</b></td>
                                <td><b>Marks(%)</b></td>
                            </tr>
                             <?PHP while($rowPQ = mysql_fetch_array($resultPQ)){?>
                            <tr valign="top">
                            	<td><?PHP echo $rowPQ['name'];?></td>
                                <td><?PHP echo $rowPQ['instname'];?></td>
                                <td><?PHP echo $rowPQ['boarduniv']?></td>
                                <td><?PHP echo $rowPQ['yearofpassing'];?></td>
                                <td><?PHP echo $rowPQ['subjects'];?></td>
                                <td><?PHP echo $rowPQ['marksobt'];?></td>
                            </tr>
                        <?PHP }?>
                    </table>
                </td>
            </tr>
            <tr>
            	<td height="5" colspan="2"></td>
            </tr>
            <tr>
            	<td height="5" colspan="2"></td>
            </tr>
				<?PHP
                    $QryEE = "select * from exam_attended where studID='" . $regno . "'";
                    $rsltEE = mysql_query($QryEE) or die(mysql_error());			
                ?>
                <?PHP if(mysql_num_rows($rsltEE) > 0){?>
                <?PHP $rowEE = mysql_fetch_array($rsltEE) or die(mysql_error()); ?>
				<?PHP if($rowEE['exam'] != '-x-'){?>
                <tr>
                    <td height="5" colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="2"><b>Entrance Exam</b></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table border="1" cellpadding="2" cellspacing="0" class="txtCntn" width="700" bordercolor="#000000">
                            <tr class="basecolor">
                                <td><b>Exam</b></td>
                                <?PHP if($rowEE['rollno'] != '-x-'){?>
                                <td><b>Roll No</b></td>
                                <?PHP }?>
                                <?PHP if($rowEE['score'] != '-x-'){?>
                                <td><b>Score</b></td>
                                <?PHP }?>
                                <?PHP if($rowEE['month'] != '-x-'){?>
                                <td><b>Month</b></td>
                                <?PHP }?>
                                <?PHP if($rowEE['year'] != '-x-'){?>
                                <td><b>Year</b></td>
                                <?PHP }?>
                                <?PHP if($rowEE['staterank'] != '-x-'){?>
                                <td><b>State Rank</b></td>
                                <?PHP }?>
                                <?PHP if($rowEE['allindiarank'] != '-x-'){?>
                                <td><b>AI Rank</b></td>
                                <?PHP }?>
                                <?PHP if($rowEE['rank'] != '-x-'){?>
                                <td><b>Rank</b></td>
                                <?PHP }?>
                            </tr>
                            <tr>
                                <td><?PHP echo $rowEE['exam'];?></td>
                                <?PHP if($rowEE['rollno'] != '-x-'){?>
                                <td><?PHP echo $rowEE['rollno'];?></td>
                                <?PHP }?>
                                <?PHP if($rowEE['score'] != '-x-'){?>
                                <td><?PHP echo $rowEE['score'];?></td>
                                <?PHP }?>
                                <?PHP if($rowEE['month'] != '-x-'){?>
                                <td><?PHP echo $rowEE['month'];?></td>
                                <?PHP }?>
                                <?PHP if($rowEE['year'] != '-x-'){?>
                                <td><?PHP echo $rowEE['year'];?></td>
                                <?PHP }?>
                                <?PHP if($rowEE['staterank'] != '-x-'){?>
                                <td><?PHP echo $rowEE['staterank'];?></td>
                                <?PHP }?>
                                <?PHP if($rowEE['allindiarank'] != '-x-'){?>
                                <td><?PHP echo $rowEE['allindiarank'];?></td>
                                <?PHP }?>
                                <?PHP if($rowEE['rank'] != '-x-'){?>
                                <td><?PHP echo $rowEE['rank'];?></td>
                                <?PHP }?>
                            </tr>
                        </table>
                    </td>
                </tr>
                <?PHP }?>
            <?PHP }?>
            <tr>
                <td height="10" colspan="2"></td>
            </tr>
            <?PHP while($rowFee = mysql_fetch_array($resultFee)){?>
            <tr>
            	<td colspan="2" align="left">
                    <?PHP include ("feedetail.php");?>
                </td>
            </tr>
            <?PHP }?>
        </table>
        </td></tr>
        
        </table>
        </td></tr></table>
        <?PHP } ?>
</center>
</body>

</html>