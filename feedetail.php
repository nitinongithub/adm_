<?php
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
	
	$row = mysql_fetch_array($result);
	$courseid=$row['courseID'];
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
                            		<div style="padding:0px; width:100%; height:auto; border:#ff0000 dotted 0px; overflow: auto">
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