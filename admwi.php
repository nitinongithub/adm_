<?php	
	session_start();
	require("dbconnect.php");
	
	$_SESSION['regno']=$_POST["txtregno"];
	$regno=$_POST["txtregno"];
	//$logid='Pramod';
	
	$intake1=0;
	$course="";
	
	
	
	$courseid=0;
	$coursefee=0;
	$totFee = 0;
	$wfee=0;
	$fees=0;
	$admissiontaken=0;
	
	
	$qry="SELECT * FROM stud_personal where id='" . $regno . "'";
	$result = mysql_query($qry) or die(mysql_error());
?>

		<?PHP if(mysql_num_rows($result) >0){?>
		
        
        <script src="scripts/validate.js" type="text/javascript" ></script>
        <table border="0" cellpadding="0" cellspacing="0" width="700">
        	<tr>
            	<td align="left" valign="top">
                	<?PHP include("PrintPersonalDetailForAll.php");?>
                </td>
                <td valign="top" align="right">
                		<?php
						$fqry="SELECT * FROM fee where regID='" . $regno . "' order by feeID";
						$fresult = mysql_query($fqry);

						if(mysql_num_rows($fresult) >0){
						?>
                        
                        
                       
                        
						<table border="0" cellpadding="0" cellspacing="0"  class="txtCntn" width="300">
                        	<tr valign="top">
                                <td class="tdStyle" colspan="4" align="left"><span style="font-weight:bold; color:#69F;">Fee Detail</span></td>
                            </tr>
							<tr bgcolor="#ffff00">
                            	<td align="left"><b>Recipt No</b></td>
                            	<td align="left"><b>Date</b></td>
								<td align="left"><b>Fee Head</b></td>
								<td align="right"><b>Amount</b></td>
							</tr>	
                            <?PHP $totFee = 0;?>
						   	<?php while($row = mysql_fetch_array($fresult)){?>
							<tr>
                            	<td align="center"><?PHP echo $row['feeID'];?></td>
                                <td align="left"><?PHP echo $row['date'];?></td>
                                <td align="left"><?PHP echo $row['feetype'];?></td>
                                <td align="right"><?PHP echo $row['Amount'];?></td>
                                
							</tr>
							<?PHP }?>
                            
                            
                            <?php 
								
								$ttqry="SELECT * FROM fee where feetype='Admission' and regID='" . $regno . "'";
								$ttresult = mysql_query($ttqry) or die(mysql_error());
								 if(mysql_num_rows($ttresult) >0)
								 {
										while($ttrow = mysql_fetch_array($ttresult))
										{
									
							     			$totFee = $totFee + $ttrow['Amount'];
										}
								 }
                            ?>

                            
                            
                            
                            
                            <?php 
								
								$wqry="SELECT * FROM fee where feetype='Withdrawal' and regID='" . $regno . "'";
								$wresult = mysql_query($wqry) or die(mysql_error());
								 if(mysql_num_rows($wresult) >0)
								 {
										while($wrow = mysql_fetch_array($wresult))
										{
									
							     			$wfee = $wfee + $wrow['Amount'];
										}
								 }
                            ?>
                           <?php 
                           		$fees=$totFee-$wfee;
                           ?>
                           
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <tr>
                            	<td colspan="4" height="1" bgcolor="#02a6c3"></td>
                            </tr>
                            <tr>
                            	<td colspan="4" height="20"><span style="color:#69F;">Total Admission Fee Submited: </span><b><?PHP echo $fees;?></b></td>
                            </tr>
                            <tr>
                            	<td colspan="4" height="1" bgcolor="#02a6c3"></td>
                            </tr>
                            
                            
                            <?php
                            
									$tfqry="SELECT * FROM course where courseID='" . $course . "'";
									$tfresult = mysql_query($tfqry )or die(mysql_error());
									$tfrow = mysql_fetch_array($tfresult);
									$coursefee=$tfrow['actualFee'];
									$intake1=$tfrow['intake'];
									                            
							?>
                            
                            <tr>
                            	<td colspan="4" height="20"><span style="color:#69F;"><b>Total Course Fee : </b>  </span><b><?PHP echo $coursefee;?></b></td>
                            </tr>
                            <tr>
                            	<td colspan="4" height="1" bgcolor="#02a6c3"></td>
                            </tr>
                            
                            
                             <tr>
                            	<td colspan="4" height="20"><span style="color:#69F;"><b><font color="#FF0000">Fee Due : </b> </font> </span><b><font color="#FF0000"><?PHP echo $coursefee-$fees;?></font></b></td>
                            </tr>
                            <tr>
                            	<td colspan="4" height="1" bgcolor="#02a6c3"></td>
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
 
 		 <?php
                            
							$tfqry="SELECT * FROM course where courseID='" . $courseid . "'";
							$tfresult = mysql_query($tfqry )or die(mysql_error());
							$tfrow = mysql_fetch_array($tfresult);
							$coursefee=$tfrow['actualFee'];
									                            
			?>
        
 		
		<form name='feeForm' method='post' onsubmit='return AdmissionvalidateForm()'>
        	<table border="0" cellpadding="0" cellspacing="0" width="700">
                <tr>
                    <td align="center">
                        <table border="0" cellpadding="0" cellspacing="0" class="tbHead" width="700">
                            <tr>
                                <td class="tdStyle" bgcolor="#ffffff" valign="top" align="left"><span style="font-weight:bold; color:#69F;"></span></td>
                            </tr>
                            <tr>
                            	<td height="5"></td>
                            </tr>
                            <tr>
                            	<td align="left" valign="top">
                                    <table border="0" cellpadding="0" cellspacing="0" class="txtCntn">
                                    <?PHP $QryCrs = "select * from course"; 
 									$rsltCrs = mysql_query($QryCrs) or die(mysql_error());?>
                                        
                                        
                                    <?PHP $Qrysl = "select * from admission where courseID='". $course."'" ; 
 									$rsltsl = mysql_query($Qrysl) or die(mysql_error());
									$x=mysql_num_rows($rsltsl);
									$intake1=$intake1-$x;
									?>
                                    
                                        
                                        <tr>
                                            <td class="txtAmt" valign="middle">WRITE A REASON</td>
                                            <td width="1">&nbsp;</td>
                                            <td width="1" bgcolor="#333333"></td>
                                            <td width="1">
                                            	<input type="hidden" name="admissiontaken" value=<?php echo $admissiontaken;?>>
                                            </td>
                                            <td align="right">
                                            	<textarea rows="3" cols="50" name="reason" id="reason" class="txtAmt"  onblur='blurStrReason(this)' onfocus='focusStrReason(this)' />Write reason here...</textarea> 
                                                													
                                                                                     
                                          <td><input type='button' value='Confirm Withdrawl' onClick="AdmissionWithdrawl()" class="txtAmt" /></td>
                                         </tr>
                                         <tr>
                                         	<td height="15" colspan="6"></td>
                                         </tr>
                                         </form>
                                         <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><div id="admission" style="widows:200px; color: #900"></div></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> 
                        </table>	
                    </td>
                </tr>
            </table>	

		<?php	
        }else{
            echo "Sorry you are not registred with us, kindly get registered first ";
        }?>