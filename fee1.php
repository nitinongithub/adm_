<?php	
	session_start();
	require("dbconnect.php");
	
	$_SESSION['regno']=$_POST["txtregno"];
	$regno=$_POST["txtregno"];
	//$logid='Pramod';
	$courseid=0;
	$coursefee=0;
	$totFee = 0;
	$wfee=0;
	$fees=0;
	$regfee=0;
	$admfee = 0;
	$ctpdfee = 0;
	$skillcert = 0;
	$hostel = 0;
	$hostel_ = 0;
	$admfeesubmit = 0;
	$skillcertfee = 0;
	
	$acad_ = 0;
	$tuitionfee = 0;
	$securityfee = 0;
	$insurancefee = 0;
	$bookbankfee = 0;
	
	$univ_ = 0;
	$enrollfee = 0;
	$univexamfee = 0;
	$welfarefee = 0;
	$devlopmentfee = 0;
	$univsportsfee = 0;
	
	$ctpdfeesubmit = 0;
	$skillcertfeesubmit = 0;
	$hostelfeesubmit = 0;
	$admfeesubmit=0;
	$admstatus='A';

	$qry="SELECT * FROM stud_personal where id='" . $regno . "'";
	$result = mysql_query($qry) or die(mysql_error());
?>
	<?PHP if(mysql_num_rows($result) >0){?>
		<script type="text/javascript">
			function enable_disable(obj){
				obj.value = '34';
			}	
		</script>
        <table border="0" cellpadding="0" cellspacing="0" width="700">
        	<tr>
            	<td align="left" valign="top" width="330">
                	<?PHP include("PrintPersonalDetailForAll.php");?>
                </td>
                <td valign="top" align="right" width="370">
                		<?php
						$fqry="SELECT * FROM fee where regID='" . $regno . "' order by feeID";
						$fresult = mysql_query($fqry);
						
						if(mysql_num_rows($fresult) >0){
						?>
						<table border="0" cellpadding="0" cellspacing="0"  class="txtCntn" width="350">
                        	<tr valign="top">
                                <td class="tdStyle" colspan="5" align="left"><span style="font-weight:bold; color:#69F;">Fee Detail</span></td>
                           </tr>
                            <tr>
                            	<td colspan="5">
                            		<div style="padding:0px; width:100%; height:15px; background:#ffff00">
                            			<div style="width:71px; float:left"><b>Recpt No</b></div>
                            			<div style="width:84px; float:left"><b>Date</b></div>
                            			<div style="width:92px; float:left"><b>Fee Head</b></div>
                            			<div style="width:70px; float:left"><b>Amount</b></div>
                            		</div>
                            		<div style="clear:both"></div>
                            		<div style="padding:0px; width:100%; height:100px; border:#ff0000 dotted 0px; overflow: auto">
                            		<?php while($row = mysql_fetch_array($fresult)){?>
                            			<div style="width:71px; height:15px; float:left; padding:2px 0px"><?PHP echo $row['feeID'];?></div>
                            			<div style="width:84px; height:15px; float:left; padding:2px 0px"><?PHP echo $row['date'];?></div>
                            			<div style="width:92px; height:15px; float:left; padding:2px 0px"><?PHP echo $row['feetype'];?></div>
                            			<div style="width:60px; height:15px; float:left; padding:2px 0px"><?PHP echo $row['Amount'];?></div>
                            			<div style="width:auto; height:15px; float:left; padding:0px 0px"><a href="fpr_.php?txtRNoPrnt=<?PHP echo $row['feeID'];?>" target="_blank"><img src="image/print.png" width="17" border="0"/></a></div>
                            		<?PHP }?>
                            		</div>
                            	</td>
                            </tr>
							

                            <?php 
								
								$ttqry="SELECT * FROM fee where feetype='Admission' and regID='" . $regno . "'";
								$ttresult = mysql_query($ttqry) or die(mysql_error());
								 if(mysql_num_rows($ttresult) >0){
										while($ttrow = mysql_fetch_array($ttresult)){
							     			$admfee = $admfee  + $ttrow['Amount'];
										}
										$totFee = $totFee + $admfee;
								 }
								 $admfeesubmit=$admfee;
							?>
							<?php 
								
								$ttqry="SELECT * FROM fee where feetype='CTPD*' and regID='" . $regno . "'";
								$ttresult = mysql_query($ttqry) or die(mysql_error());
								 if(mysql_num_rows($ttresult) >0){
										while($ttrow = mysql_fetch_array($ttresult)){
							     			$ctpdfee = $ctpdfee + $ttrow['Amount'];
										}
										$totFee = $totFee + $ctpdfee;
								 }
								 $ctpdfeesubmit=$ctpdfee;
							?>
							<?php 
								
								$ttqry="SELECT * FROM fee where feetype='SKILL_CERT*' and regID='" . $regno . "'";
								$ttresult = mysql_query($ttqry) or die(mysql_error());
								 if(mysql_num_rows($ttresult) >0){
										while($ttrow = mysql_fetch_array($ttresult)){
							     			$skillcert = $skillcert + $ttrow['Amount'];
										}
										$totFee = $totFee + $skillcert ;
								 }
								 $skillcertfeesubmit=$skillcert;
							?>
							<?php 
								
								$ttqry="SELECT * FROM fee where feetype='Hostel*' and regID='" . $regno . "'";
								$ttresult = mysql_query($ttqry) or die(mysql_error());
								 if(mysql_num_rows($ttresult) >0){
										while($ttrow = mysql_fetch_array($ttresult)){
							     			$hostel_ = $hostel_ + $ttrow['Amount'];
										}
										//$totFee = $totFee + $hostel_ ;
								 }
								 $hostelfeesubmit=$hostel_;
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
                            
									$tfqry="SELECT * FROM course where courseID='" . $courseid . "'";
									$tfresult = mysql_query($tfqry )or die(mysql_error());
									$tfrow = mysql_fetch_array($tfresult);
									
									$acad_ = 0;
									$univ_ = 0;
									$optional_ = 0;
									$total = 0;
									
									// Totalling Fee Academic --------------
									$acad_ = $acad_ + $tfrow['SECURITY_FEE'];
									$acad_ = $acad_ + $tfrow['BOOK_BANK_FEE'];
									$acad_ = $acad_ + $tfrow['INSURANCE_FEE'];
									$acad_ = $acad_ + $tfrow['TUITION_FEE'];
									//--------------------------------------
									
									// Totalling Fee University ------------
									$univ_ = $univ_ + $tfrow['ENROLLMENT_FEE'];
									$univ_ = $univ_ + $tfrow['UNIV_EXAM_FEE'];
									$univ_ = $univ_ + $tfrow['UNIV_SPORTS_FEE'];
									$univ_ = $univ_ + $tfrow['WELFARE_FEE'];
									$univ_ = $univ_ + $tfrow['DEVELOPMENT_FEE'];
									//--------------------------------------
									$admissionActualFee = $acad_ + $univ_; 
									
									// Totalling Fee Academic --------------
									$optional_ = $optional_ + $tfrow['CTPD_FEE'];
									$optional_ = $optional_ + $tfrow['SKILL_CERTFICATION_FEE'];
									$optional_ = $optional_ + $tfrow['HOSTEL'];
									//--------------------------------------
									
									$coursefee = $total = $actualfee=$tfrow['actualFee'];
									$total = $total + ($securityfee=$tfrow['SECURITY_FEE']);
									$total = $total + ($enrollfee=$tfrow['ENROLLMENT_FEE']);
									$total = $total + ($univexamfee=$tfrow['UNIV_EXAM_FEE']);
									$total = $total + ($univsportsfee=$tfrow['UNIV_SPORTS_FEE']);
									$total = $total + ($bookbankfee=$tfrow['BOOK_BANK_FEE']);
									$total = $total + ($insurancefee=$tfrow['INSURANCE_FEE']);
									$total = $total + ($ctpdfee = $tfrow['CTPD_FEE']);
									$total = $total + ($welfarefee = $tfrow['WELFARE_FEE']);
									$total = $total + ($devlopmentfee = $tfrow['DEVELOPMENT_FEE']);
									$total = $total + ($skillcertfee = $tfrow['SKILL_CERTFICATION_FEE']);
									$total = $total + ($tuitionfee = $tfrow['TUITION_FEE']);
									$total = $total + ($hostel = $tfrow['HOSTEL']);                          
							?>
                           <?php 
                           		$fees=$totFee-$wfee;
								//$admfeesubmit=$fees;
								
								$tfqry="SELECT * FROM course where courseID='" . $courseid . "'";
								$tfresult = mysql_query($tfqry )or die(mysql_error());
								$tfrow = mysql_fetch_array($tfresult);
								
								$admfeesubmitdue = $admissionActualFee - $admfeesubmit;
								$ctpdfeesubmitdue = $tfrow['CTPD_FEE'] - $ctpdfeesubmit;
								$skillcertfeesubmitdue = $tfrow['SKILL_CERTFICATION_FEE'] - $skillcertfeesubmit;
								$hostelfeesubmitdue = $tfrow['HOSTEL'] - $hostelfeesubmit;
                           ?>
                           <style type="text/css">
                           	.fee_size_{font-size:10px;}
                           	.due_amt{color:#ff0000}
                           </style>
                            <tr>
                            	<td colspan="5" height="1" bgcolor="#02a6c3"></td>
                            </tr>
                            <tr>
                            	<td colspan="5" height="15" class="fee_size_ due_amt"><span style="color:#69F;">Admission Fee due: </span><b><?PHP if($admfeesubmitdue == 0){echo '<span style="color:#0000ff">Nil</span>'; }else{ echo $admfeesubmitdue;} ;?></b></td>
                            </tr>
                            <tr>
                            	<td colspan="5" height="1" bgcolor="#02a6c3"></td>
                            </tr>
                            <tr>
                            	<td colspan="5" height="15" class="fee_size_ due_amt"><span style="color:#69F;">CTPD Fee due :  </span><b><?PHP if($ctpdfeesubmitdue == 0){echo '<span style="color:#0000ff">Nil</span>'; }else{ echo $ctpdfeesubmitdue;} ;?></b></td>
                            </tr>
                            
                            <tr>
                            	<td colspan="5" height="1" bgcolor="#02a6c3"></td>
                            </tr>
                            <tr>
                            	<td colspan="5" height="15" class="fee_size_ due_amt"><span style="color:#69F;">Skill Certfication Fee due :  </span><b><?PHP if($skillcertfeesubmitdue == 0){echo '<span style="color:#0000ff">Nil</span>'; }else{ echo $skillcertfeesubmitdue;} ;?></b></td>
                            </tr>
                            
                            <tr>
                            	<td colspan="5" height="1" bgcolor="#02a6c3"></td>
                            </tr>
                            <tr>
                            	<td colspan="5" height="15" class="fee_size_ due_amt"><span style="color:#69F;">Hostel Fee due :  </span><b><?PHP if($hostelfeesubmitdue == 0){echo '<span style="color:#0000ff">Nil</span>'; }else{ echo $hostelfeesubmitdue;} ;?></b></td>
                            </tr>
                            
                            <tr>
                            	<td colspan="5" height="1" bgcolor="#02a6c3"></td>
                            </tr>
                            
                            <tr>
                            	<td colspan="5" height="20"><span style="color:#69F;"><b>Total Course Fee : </b>  </span><b><?PHP echo $coursefee;?></b></td>
                            </tr>
                            
                            <tr>
                            	<td colspan="5" height="1" bgcolor="#02a6c3"></td>
                            </tr>
                            <tr>
                            	<td colspan="5" height="20" class="fee_size_"><span style="color:#69F;"><b>Total Fee Submitted: </b>  </span><b><?PHP echo $fees;?></b></td>
                            </tr>
                            
                            <tr>
                            	<td colspan="5" height="1" bgcolor="#02a6c3"></td>
                            </tr>
                             <tr>
                            	<td colspan="5" height="20"><span style="color:#69F;"><b><font color="#FF0000">Fee Due : </b> </font> </span><b><font color="#FF0000"><?PHP echo $coursefee-$fees;?></font></b></td>
                            </tr>
                            <tr>
                            	<td colspan="5" height="1" bgcolor="#02a6c3"></td>
                            </tr>
						</table>
					   <?php } else{
						   echo "No fee Submitted yet";
					   }
						?>     
                </td>
            </tr>
            <tr>
            	<td colspan="2" height="15"></td>
            </tr>
        </table>

							<?php 
								
								$swqry="SELECT * FROM fee where feetype='Registration' and regID='" . $regno . "'";
								$swresult = mysql_query($swqry) or die(mysql_error());
								 if(mysql_num_rows($swresult) >0)
								 {
										$regfee=1;
								 }
								 else
								 {
									 	$regfee=0;
								 }
                            ?>
                          
							
						<?php
                                        
                        	$qry="SELECT * FROM stud_personal where id='" . $regno . "'";
                            $result = mysql_query($qry) or die(mysql_error());
                        	if(mysql_num_rows($result) >0)
							{
									$row = mysql_fetch_array($result);
									$admstatus=$row['admstID'];	
							}
								
						?>

			<!-- This Part will execute whenever year is less than to Year 2014 -->
			<form name='myForm' id='myForm' method='post'>
	        	<table border="0" cellpadding="0" cellspacing="0" width="700">
	                <tr>
	                    <td align="center">
	                        <table border="0" cellpadding="0" cellspacing="0" width="700">
	                            <tr>
	                                <td class="tdStyle" bgcolor="#ffffff" valign="top" align="left"><span style="font-weight:bold; color:#69F;">Select Fee Type</span></td>
	                               	<td class="tdStyle" bgcolor="#ffffff" valign="top" align="left"><span style="font-weight:bold; color:#69F;">Select Payment Mode</span></td>
	                            </tr>
	                            <style type="text/css">
	                            	.fee_label{float:left; padding:2px 0px 0px 0px; visibitily:visible; border:#ff0000 solid 0px; width:80px;}
	                            	.fee_label_1{font-size:11px; float:left; padding:2px 0px 0px 0px; visibitily:visible; border:#ff0000 solid 0px; width:80px;}
	                            	.fee_label_right{ width:90px; padding:3px 0px 0px 0px }
	                            	.fee_content{font-size:10px}
	                            	.fee_content_head{font-size:13px; font-weight:bold; color:#066d93}
	                            	.fee_txt{ padding:0px; width:35px; height:12px; text-align:right }
	                            	.fee_txt_total{ width:105px; text-align:right }
	                            	#fee_segregation{float:left; visibility:visible; position:relative; left:0px}
	                            	.txt_{ padding:0px; font-size:11px; height:15px; }
	                            </style>
	                            <tr>
	                            	<td class="tbHead" valign="top">
	                                    <table border="0" cellpadding="0" cellspacing="0">
	                                    	<tr>
	                                    		<td colspan="6" height="5"></td>
	                                    	</tr>
	                                    	<tr>
	                                    		<td width="100" valign="top">
		                                    		<select name="feetype" id="feetype" style="width:150px; height:120px" multiple>
		                                    			<option value="x" style="color:#009000; background:#f0f0f0" selected="selected">Choose from below</option>
		                                    			<option value="Registration">Registration</option>
		                                    			<option value="Admission">Admission</option>
		                                    			<option value="Withdrawl">Withdrawl</option>
		                                    			<option value="CTPD*">CTPD</option>
		                                    			<option value="SKILL_CERT*">Skill Certification</option>
		                                    			<option value="Hostel*">Hostel</option>
		                                    		</select>
	                                    		</td>
	                                    		<td class="txtAmt" valign="top"></td>
	                                            <td width="1">&nbsp;</td>
	                                            <td width="1" bgcolor="#333333"></td>
	                                            <td width="1"></td>
	                                    		<td align="left" valign="top">
	                                    			<table border="0" cellpadding="0" cellspacing="0" class="txtCntn" width="150">
	                                    				<tr>
	                                    					<td>
	                                    						<b>ENTER AMOUNT</b><br />
	                                    						<input type="text" name="txtAmount" id="txtAmount" style="font-size:12px; font-weight:bold; color:#000090" />
	                                    					</td>
	                                    				</tr>
				                                        <?PHP if($_SESSION['RegFee'] <> ""){?>
				                                        <tr>
				                                        	<td align="right" bgcolor="#FFFF99" height="20" valign="middle"><font color="#FF0000" size="1"><b><?PHP echo $_SESSION['RegFee']; $_SESSION['RegFee']="";?>&nbsp;</b></font></td>
				                                        </tr>
				                                        <?PHP }?>
				                                        <tr>
				                                        	<td align="left"><input type="button" value="Submit Fee" class="txtAmt" onClick="FeevalidateForm()"/></td>
				                                        </tr>
				                                        <tr>
				                                        	<td height="5"></td>
				                                        </tr>
				                                    </table>
	                                    		</td>
	                                    	</tr>
	                                    	<tr>
	                                            <td><input type="hidden" name="regfeesubmit" id="regfeesubmit" value="<?php echo $regfee; ?>" class="txtAmt" /></td>
	                                            <td>
	                                            	<input type="hidden" name="admfeesubmit" id="admfeesubmit" value="<?php echo $admfeesubmit; ?>" class="txtAmt" />
	                                            	<input type="hidden" name="ctpdfeesubmit" id="ctpdfeesubmit" value="<?php echo $ctpdfeesubmit; ?>" class="txtAmt" />
	                                            	<input type="hidden" name="skillcertfeesubmit" id="skillcertfeesubmit" value="<?php echo $skillcertfeesubmit; ?>" class="txtAmt" />
	                                            	<input type="hidden" name="hostelfeesubmit" id="hostelfeesubmit" value="<?php echo $hostelfeesubmit; ?>" class="txtAmt" />
	                                            </td> 
	                                            <td><input type="hidden" name="admstatus" id="admstatus" value="<?php echo $admstatus; ?>" class="txtAmt" /></td>
	                                            <td></td>
	                                            <td><div id="success" style="background-color:#FF0;"></div></td>
	                                        </tr>
	                                        
	                                    </table>
	                                </td>
	                                <td align="center" valign="top">
	                                	 <table border="0" cellpadding="0" cellspacing="0" width="300">
	                                     		<tr>
	                                                <td><input type="radio" value="cash" onclick="showhidefield()" name="feemode" id="feemode" checked /></td>
	                                                <td>By Cash</td>
	                                                <td width="25"></td>
	                                                <td><input type="radio" value="dd" onclick="showhidefield()" name="feemode" id="feemode" /></td>
	                                                <td>By DD</td>
	                                                <td width="20"></td>
	                                                <td><input type="radio" value="cheque" onclick="showhidefield()" name="feemode" id="feemode" /></td>
	                                                <td>By Cheque</td>
	                                                <td width="20"></td>
	                                        	</tr>
	                                        	<tr>
                                        			<td align="right" valign="top" colspan="9">
					                                	<table border="0" cellpadding="0" cellspacing="0" class="txtCntn">
					                                        <tr>
					                                            <td align="right" valign="top">
						                                            <div id='hideablearea'  style='float:right; visibility:hidden; font-size:11px; background:#f6fff4; padding:0px'>
						                                                <div style="float:right; text-align:right; padding:0px">Bank<input type="text" name="bank" id="bank" class="txtAmt txt_"></div>
																		<div style="clear:both; padding:0px;"></div>
						                                                <div style="float:right; text-align:right; padding:0px">DD/Cheque No<input type="text" name="ddno" id="ddno" class="txtAmt txt_"></div>
						                                            	<div style="clear:both; padding:0px"></div>
						                                            	<div style="float:right; text-align:right; padding:0px">Date<input type="text" name="dddate" id="dddate" class="txtAmt txt_"></div>
						                                            </div>
					                                            </td>
					                                         </tr>
					                                    </table>
					                                </td>
	                                        	</tr>
	                                      </table>
	                                </td>
	                            </tr> 
	                            <tr>
	                            	<td height="1" colspan="10"></td>
	                            </tr>
								<?php $disable_ = 'disabled="disabled"'; ?>
	                            <tr>
                                   <td colspan="10" align="left">
                                       <div id="fee_segregation" style="visibility:visible; float:left">
				                           <?php include 'fee_segregation.php';?>
				                       </div>
                                   </td>
                                </tr>
	                            <tr>
	                                <td height="15" colspan="10"></td>
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

