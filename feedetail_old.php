<?php
$wfee=0;
$course="";

	$qry="SELECT * FROM stud_personal where id='" . $regno . "'";
	$result = mysql_query($qry) or die(mysql_error());
	$row = mysql_fetch_array($result);
	
	$course=$row['courseID'];

						$fqry="SELECT * FROM fee where regID='" . $regno . "' order by feeID";
						$fresult = mysql_query($fqry);

						if(mysql_num_rows($fresult) >0){
						?>
                        

						<table border="0" cellpadding="0" cellspacing="0"  class="txtCntn" width="300">
                        	<tr valign="top">
                                <td class="tdStyle" colspan="4" align="left"><span style="font-weight:bold; color:#00F;">Fee Detail</span></td>
                            </tr>
							<tr bgcolor="#FFFF00">
                            	<td align="left"><b>Recipt No</b></td>
                            	<td align="left"><b>Date</b></td>
								<td align="left"><b>Fee Head</b></td>
								<td align="right"><b>Amount</b></td>
							</tr>	
                            <?PHP $totFee = 0;?>
						   	<?php while($row = mysql_fetch_array($fresult)){?>
							<tr>
                            	<td align="left"><?PHP echo $row['feeID'];?></td>
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
								$netfeepaid=$fees;
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