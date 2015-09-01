<?php	
	session_start();
	require("dbconnect.php");
	
	$_SESSION['regIDji']=$_POST["txtregno"];
	$regno=$_POST["txtregno"];
	//$logid='Pramod';

	$qry="SELECT * FROM stud_personal where id='" . $regno . "'";
	$result = mysql_query($qry) or die(mysql_error());
?>

	<?PHP if(mysql_num_rows($result) >0){?>
		<table border="0" cellpadding="0" cellspacing="0" width="700">
        	<tr>
            	<td align="left">
                	<table border="0" cellpadding="0" cellspacing="0" class="txtCntn">
                        <?PHP while($row = mysql_fetch_array($result)){?>
                            <tr valign="top">
                                <td class="tdStyle" colspan="2"><span style="font-weight:bold; color:#69F;">Personal Detail</span></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="3"></td>
                            </tr>
                            <tr valign="top">
                                <td width="120" class="btmBase"><b><font color="#FF0000">Registration No</font></b></td>
                                <td width="200"><b><font color="#FF0000"><?PHP echo $row['ID'];?></font></b></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="1" bgcolor="#fff0f0"></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="3"></td>
                            </tr>
                            <tr valign="top">
                                <td class="btmBase">Name</td>
                                <td><?PHP echo $row['name'];?></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="1" bgcolor="#fff0f0"></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="3"></td>
                            </tr>
                            <tr valign="top">
                                <td class="btmBase">Gender</td>
                                <td><?PHP echo $row['gender']?></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="1" bgcolor="#fff0f0"></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="3"></td>
                            </tr>
                            <tr valign="top">
                                <td class="btmBase">Date Of Birth</td>
                                <td><?PHP echo $row['dob'] ."/". $row['mob'] ."/". $row['yob'];?></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="1" bgcolor="#fff0f0"></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="3"></td>
                            </tr>
                            <tr valign="top">
                                <td class="btmBase">Father's Name</td>
                                <td><?PHP echo $row['fname'];?></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="1" bgcolor="#fff0f0"></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="3"></td>
                            </tr>
                            <tr valign="top">
                                <td class="btmBase">Mother's Name</td>
                                <td><?PHP echo $row['mname'];?></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="1" bgcolor="#fff0f0"></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="3"></td>
                            </tr>
                            <tr>
                                <td class="btmBase">Course Choosen</td>
                                <td><font color="#ff0000"><b><?PHP echo $row['courseID'];?></b></font></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="1" bgcolor="#02a6c3"></td>
                            </tr>
                            <tr>
                            	<td colspan="2" height="3"></td>
                            </tr>
                        <?PHP }?>
                    </table>
                </td>
                <td valign="top" align="right">
                		<?php
						$fqry="SELECT * FROM fee where regID='" . $regno . "' order by date";
						$fresult = mysql_query($fqry);

						if(mysql_num_rows($fresult) >0){
						?>
						<table border="0" cellpadding="0" cellspacing="0"  class="txtCntn" width="300">
                        	<tr valign="top">
                                <td class="tdStyle" colspan="3" align="left"><span style="font-weight:bold; color:#69F;">Fee Detail</span></td>
                            </tr>
							<tr bgcolor="#ffff00">
                            	<td align="left"><b>Date</b></td>
								<td align="left"><b>Fee Head</b></td>
								<td align="right"><b>Amount</b></td>
							</tr>	
                            <?PHP $totFee = 0;?>
						   	<?php while($row = mysql_fetch_array($fresult)){?>
							<tr>
                                <td align="left"><?PHP echo $row['date'];?></td>
                                <td align="left"><?PHP echo $row['feetype'];?></td>
                                <td align="right"><?PHP echo $row['Amount'];?></td>
                                <?PHP $totFee = $totFee + $row['Amount'];?>
							</tr>
							<?PHP }?>
                            <tr>
                            	<td colspan="3" height="1" bgcolor="#02a6c3"></td>
                            </tr>
                            <tr>
                            	<td colspan="3" height="20"><span style="color:#69F;">Total Admission Fee Submited: </span><b><?PHP echo $totFee-1000;?></b></td>
                            </tr>
                            <tr>
                            	<td colspan="3" height="1" bgcolor="#02a6c3"></td>
                            </tr>
						</table>
					   <?php } 
					   else
							echo "No fee Submitted yet";
						?>     
                </td>
            </tr>
            <tr>
            	<td colspan="2" height="15"></td>
            </tr>
        </table>    
 
		<form name='feeForm' method='post' action='admit.php' onsubmit='return AdmissionvalidateForm()'>
        	<table border="0" cellpadding="0" cellspacing="0" width="700">
                <tr>
                    <td align="center">
                        <table border="0" cellpadding="0" cellspacing="0" class="tbHead" width="700">
                            <tr>
                                <td class="tdStyle" bgcolor="#ffffff" valign="top" align="left"><span style="font-weight:bold; color:#69F;">Select Fee Type</span></td>
                            </tr>
                            <tr>
                            	<td height="5"></td>
                            </tr>
                            <tr>
                            	<td align="left">
                                    <table border="0" cellpadding="0" cellspacing="0" class="txtCntn">
                                    <?PHP $QryCrs = "select * from course"; 
 									$rsltCrs = mysql_query($QryCrs) or die(mysql_error());?>
                                        <tr>
                                            <td class="txtAmt" valign="middle">SELECT COURSE</td>
                                            <td width="1">&nbsp;</td>
                                            <td width="1" bgcolor="#333333"></td>
                                            <td width="1"></td>
                                            <td align="right">
                                            	<select name="course">
													<?PHP while($rowCrs = mysql_fetch_array($rsltCrs)){?>
                                                		<option value="<?PHP echo $rowCrs['courseID'];?>"><?PHP echo $rowCrs['name'];?></option>
													<?PHP }?>
                                            	</select>
                                            </td>
                                            <td><input type='submit' value='Confirm Admission' ><input type="button" value="Submit Fee" class="txtAmt" onClick="sendRequestAmt('feesubmit.php')"/></td>
                                            <td><div id="success" style="background-color:#FF0;"></div></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> 
                        </table>	
                    </td>
                </tr>
            </table>	
		</form>

		<?php	
        }else{
            echo "Sorry you are not registred with us, kindly get registered first ";
        }?>