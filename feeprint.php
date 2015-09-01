<?php	
	session_start();
	require("dbconnect.php");
	
	$reciptno=$_SESSION['txtreciptno'];
	$regno=$_SESSION['regno'];
?>

<html>

<head>
 <title>Receipt No <?PHP echo $reciptno;?></title>
 	
	<script language="javascript">
     function printpage(){
		 window.print();
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
		td{color:#000; font-family:Arial, Helvetica, sans-serif; font-size:12px}
		.LetterContent{font-family:'Times New Roman', Times, serif; font-size:17px}
		.addr{font-family: Verdana, Geneva, sans-serif; font-size:10px; font-weight:normal}
		/*Remove Element*/
		#logo, #catnavi, .topnavi, .more-link, .navigation, #sidebartop, #related, #social, #sponsors, .tabs, #allpost, .toolbar, .splitbox, #commentform, #commentabs .idTabs, .postmeta-content .comments, #respond h3, .tag, .footerlinks {display:none;}
		
		/* Show URL */
		a:link, a:visited {display: none}

	</style>
</head>

<body onLoad="printpage();" leftmargin="0" topmargin="0">
<center>
	<?PHP
		for($loop1 = 1; $loop1<=2; $loop1++){
		$qry="SELECT * FROM stud_personal where id='" . $regno . "'";
		$result = mysql_query($qry) or die(mysql_error());
	?>

	<?PHP if(mysql_num_rows($result) >0){?>
        <p>&nbsp;</p>
 		<table border="1" cellpadding="10" cellspacing="0" width="600" bordercolor="#000000"><tr><td>
        <table border="0" cellpadding="0" cellspacing="0" width="600">
        	<tr>
            	<td colspan="2">
                	<table border="0" cellpadding="0" cellspacing="0" width="600">
                    	<tr>
                        	<td align="left" width="90"><img src="image/aiLogo.jpg" width="90" /></td>
                        	<td valign="middle" align="center" class="tdStyle3" width="420">Amrapali Institute</td>
                            <td align="left" width="90">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        	<tr>
            	<td align="center" class="tdStyle1" colspan="2">Fee Receipt</td>
            </tr>
            <tr>
            	<td colspan="2" height="3"></td>
            </tr>
            <tr>
            	<td align="left" class="tdStyle2" height="25">&nbsp;Receipt No. <span style="font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#000; font-size:18px"><?PHP echo $reciptno;?></span></td>
            	<td align="right" class="tdStyle2"><span style="color:#000000;">Date: <?php echo date('d/m/Y');?></span>&nbsp;</td>
            </tr>
            <tr>
            	<td colspan="2" height="4"></td>
            </tr>
            
            <tr>
            	<td align="left" valign="top" width="50%">
                	<table border="0" cellpadding="0" cellspacing="0" class="txtCntn">
                        <?PHP while($row = mysql_fetch_array($result)){?>
                            
                            <tr>
                            	<td colspan="2" height="3"></td>
                            </tr>
                            <tr valign="top">
                                <td width="140"><b>&nbsp;Registration No</b></td>
                                <td width="180"><b><?PHP echo $row['ID'];?></b></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="5"></td>
                            </tr>
                            <tr valign="top">
                                <td>&nbsp;Name</td>
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
                                <td>&nbsp;Course Choosen</td>
                                <td><font color="#000000"><b><?PHP echo $row['courseID'];?>  [PROVISIONAL]</b></font></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="3"></td>
                            </tr>
                        <?PHP }?>
                    </table>
				</td>
                <td valign="bottom" align="right" width="50%">
                		<?php
						$fqry="SELECT * FROM fee where regID='" . $regno . "' and feeID ='". $reciptno . "' order by date";
						$fresult = mysql_query($fqry);

						if(mysql_num_rows($fresult) >0){
						?>
						<table border="0" cellpadding="0" cellspacing="0"  class="txtCntn" width="250">
						
                            <?PHP $totFee = 0;?>
						   	<?php while($row = mysql_fetch_array($fresult)){?>
							<tr>
                                <td align="left"><b>Fee Head</b></td>
                                <td align="left"><b><?PHP echo $row['feetype'];?></b></td>
                             </tr>
                             
                             <tr>
                             	<td align="left"><font face="Arial, Helvetica, sans-serif" size="2"><b>Fee Mode</b></font></td>
                            	<td><font face="Arial, Helvetica, sans-serif" size="2"><?PHP echo $row['feemode'];?></font></td>
                            </tr>
                            <?PHP if($row['feemode'] != "Cash"){?>
                            <tr>
                             	<td align="left"><font face="Arial, Helvetica, sans-serif" size="2"><b>Bank</b></font></td>
                            	<td><font face="Arial, Helvetica, sans-serif" size="2"><?PHP echo $row['bankname'];?></font></td>
                            </tr>
                            <tr>
                             	<td align="left"><font face="Arial, Helvetica, sans-serif" size="2"><b>Number</b></font></td>
                            	<td><font face="Arial, Helvetica, sans-serif" size="2"><?PHP echo $row['ddno'];?></font></td>
                            </tr>
                            <?PHP }?>
                             <tr>
                             	<td colspan="2" height="10"></td>
                             </tr>
                            <tr>
                                <td align="left"><b>Fee Submitted On</b></td>
                                <td align="left"><?PHP echo $row['date'];?></td>
                             </tr>
                             <tr>
                                <td align="left"><b>Amount Received</b></td>
                                <td align="left">Rs. <?PHP echo $row['Amount'];?> /-</td>
                              </tr>
                              <tr>
                              	<td colspan="2" height="1"></td>
                              </tr>
								<?PHP $totFee = $totFee + $row['Amount'];?>
							<?PHP }?>
						</table>
					   <?php } 
					   else
							echo "No fee Submitted On This Recipt NO";
						?>     
                </td>
            </tr>
            <tr>
                <td colspan="2" height="1" class="tdStyle2">&nbsp;</td>
            </tr>
            <tr>
            	<td colspan="2" align="left" valign="middle">
                	<table border="0" cellpadding="0" cellspacing="0" width="600">
                    	<tr>
                        	<td class="addr" valign="bottom">
                            <b>Address:</b> 
                            <br>Amrapali Group of Institutes, Shiksha Nagar, <br>
                            Kaladhungi Road, Haldwani - 263139, <b>Ph.:</b> 05946-238200, 201, <br>
                            <b>websites:</b> www.amrapaliinstitute.ac.in, www.amrapaliinstitute.info,<br>
                            www.amrapali.ac.in
                            </td>
                            <td colspan="2" height="50" align="right" valign="bottom">Authorized Signatory</td>
                        </tr>
                    </table>
                
                </td>
            </tr>
        </table>
        </td></tr></table>
        <p>&nbsp;</p>
        <?PHP }}?>
</center>
</body>

</html>