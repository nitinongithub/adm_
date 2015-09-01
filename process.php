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
	$netfeepaid=0;
	
	
	$qry="SELECT * FROM stud_personal where id='" . $regno . "'";
	$result = mysql_query($qry) or die(mysql_error());
?>

		<?PHP if(mysql_num_rows($result) >0){?>
		
        
        
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
					   else{
							echo "No fee Submitted yet";
						$tfqry="SELECT * FROM course where courseID='" . $course . "'";
									$tfresult = mysql_query($tfqry )or die(mysql_error());
									$tfrow = mysql_fetch_array($tfresult);
									$coursefee=$tfrow['actualFee'];
									$intake1=$tfrow['intake'];
						}
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
                        	<?PHP $QryCrs = "select * from course where courseID='" . $courseid . "'"; 
 									$rsltCrs = mysql_query($QryCrs) or die(mysql_error());?>
                                        
                                        
                                    <?PHP $Qrysl = "select * from admission where courseID='". $course."'" ; 
 									$rsltsl = mysql_query($Qrysl) or die(mysql_error());
									$x=mysql_num_rows($rsltsl);
									$intake1=$intake1-$x;
									?>
                            <tr>
                  				<td class="tdStyle">
                                	<table border="0" cellpadding="0" cellspacing="0" class="tbHead" width="700">
                                    	<tr valign="middle" >
                                    		<td align="left"><span style="font-weight:bold; color:#69F;">Select Course for Admission</span></td>
                                        	<td align="right"><b><font color="#FF0000"> &nbsp;&nbsp;&nbsp; Seats Left in <?php echo $course; echo "   "; echo $intake1;?>&nbsp;&nbsp;</font><b></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                            	<td height="5"></td>
                            </tr>
                            <tr>
                            	<td align="left" valign="top">
                                    <table border="0" cellpadding="0" cellspacing="0" class="txtCntn" width="700">
                                    	<tr>
											<td colspan="5"></td>
                                          	<td valign="top" align="right" rowspan="6"><input type='button' value='' onClick="AdmissionvalidateForm()" class="txtAmt1" /></td>
                                         </tr>
										<tr>
                                            <td class="txtAmt" valign="middle">SELECT COURSE</td>
                                            <td width="1">&nbsp;</td>
                                            <td width="1" bgcolor="#333333"></td>
                                            <td width="1"></td>
                                            <td align="left">
                                            	<select name="cmbCourse" id="cmbCourse" class="txtAmt">
													<?PHP while($rowCrs = mysql_fetch_array($rsltCrs)){?>
                                                		<option value="<?PHP echo $rowCrs['courseID'];?>"><?PHP echo $rowCrs['name'];?></option>
													<?PHP }?>
                                            	</select>
                                            </td>
                                        </tr>
                                            <?PHP
												$fqry1="SELECT * FROM fee where regID='" . $regno . "' AND feetype = 'Admission' order by feeID";
												$fresult1 = mysql_query($fqry1);
												$frow1=mysql_num_rows($fresult1);
											?>
                                            <input type="hidden" name="feerow" value="<?PHP echo $netfeepaid;?>"/>
                                          
                                           <?PHP $QryCrs = "select * from quota"; 
		 									$rsltCrs = mysql_query($QryCrs) or die(mysql_error());?>
                                          
                                        <tr>
                                              <td>Select Quota</td>
                                              <td width="1">&nbsp;</td>
                                              <td width="1" bgcolor="#333333"></td>
                                              <td width="1"></td>
                                              <td align="left">
                                                <select name="quota" id="quota" class="txtAmt">
                                                        <?PHP while($rowCrs = mysql_fetch_array($rsltCrs)){?>
                                                        <option value="<?PHP echo $rowCrs['quotaID'];?>"><?PHP echo $rowCrs['quotaDesc'];?></option>
                                                    <?PHP }?>
                                                </select>
                                              </td>
                                         </tr>

                                         <?PHP $QryCrs = "select * from maincat"; 
		 									$rsltCrs = mysql_query($QryCrs) or die(mysql_error());?>
                                        <tr>
                                              <td>Select Category</td>
                                              <td width="1">&nbsp;</td>
                                              <td width="1" bgcolor="#333333"></td>
                                              <td width="1"></td>
                                              <td align="left">
                                                    <select name="category" id="category" class="txtAmt">
                                                            <?PHP while($rowCrs = mysql_fetch_array($rsltCrs)){?>
                                                            <option value="<?PHP echo $rowCrs['category'];?>"><?PHP echo $rowCrs['category'];?></option>
                                                        <?PHP }?>
                                                    </select>
                                              </td>
                                          </tr>

                                          <?PHP $QryCrs = "select * from subcat"; 
		 									$rsltCrs = mysql_query($QryCrs) or die(mysql_error());?>
                                        <tr>
                                              <td>Select Sub Category</td>
                                              <td width="1">&nbsp;</td>
                                              <td width="1" bgcolor="#333333"></td>
                                              <td width="1"></td>
                                              <td align="left">
                                                    <select name="subcat" id="subcat" class="txtAmt">
                                                            <?PHP while($rowCrs = mysql_fetch_array($rsltCrs)){?>
                                                            <option value="<?PHP echo $rowCrs['subcat'];?>"><?PHP echo $rowCrs['subcat'];?></option>
                                                        <?PHP }?>
                                                    </select>
                                              </td>
                                          </tr>
                                         <tr>
                                         	<td height="15" colspan="6"></td>
                                         </tr>
                                         </form>
                                         <?PHP if ($admissiontaken == 1){?>
											 
                                         <form name='PrintLetter' method='post' action="printAdmissionLetter.php" target="_new">
                                        <tr>
                                         	<td colspan="6"><input type="hidden" name="txtregNo" value="<?PHP echo $_SESSION['regno'];?>"/><input type='submit' value='Print Admission Letter' class="txtAmt" /></td>
                                         </tr>
                                         </form>
										 <?PHP }?>
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