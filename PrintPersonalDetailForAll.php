<?PHP $admissiontaken = 0 ;?>
<table border="0" cellpadding="0" cellspacing="0" class="txtCntn">
                        <?PHP while($row = mysql_fetch_array($result)){?>
                            <tr valign="top">
                                <td class="tdStyle" colspan="3"><span style="font-weight:bold; color:#69F;">Personal Detail</span></td>
                            </tr>
                            <tr>
                            	<td colspan="3" height="3"></td>
                            </tr>
                            <tr valign="top">
                                <td width="110" class="btmBase"><font color="#FF0000">Registration No</font></td>
                                <td width="110"><b><font color="#0000FF"><?PHP echo $row['ID'];?></font></b></td>
                                <td width="90" align="right"><img src="regPicsUploads/<?PHP echo $row['image'];?>" width="85"  alt="<?PHP echo $row['ID'];?>"/></td>
                            </tr>
                            <tr>
                            	<td colspan="3" height="1" bgcolor="#fff0f0"></td>
                            </tr>
                            <tr>
                            	<td colspan="3" height="3"></td>
                            </tr>
                            <tr valign="top">
                                <td class="btmBase">Name</td>
                                <td colspan="2"><?PHP echo $row['name'];?></td>
                            </tr>
                            <tr>
                            	<td colspan="3" height="1" bgcolor="#fff0f0"></td>
                            </tr>
                            <tr>
                            	<td colspan="3" height="3"></td>
                            </tr>
                            <tr valign="top">
                                <td class="btmBase">Gender</td>
                                <td colspan="2"><?PHP echo $row['gender']?></td>
                            </tr>
                            <tr>
                            	<td colspan="3" height="1" bgcolor="#fff0f0"></td>
                            </tr>
                            <tr>
                            	<td colspan="3" height="3"></td>
                            </tr>
                            <tr valign="top">
                                <td class="btmBase">Date Of Birth</td>
                                <td colspan="2"><?PHP echo $row['dob'] ."/". $row['mob'] ."/". $row['yob'];?></td>
                            </tr>
                            <tr>
                            	<td colspan="3" height="1" bgcolor="#fff0f0"></td>
                            </tr>
                            <tr>
                            	<td colspan="3" height="3"></td>
                            </tr>
                            <tr valign="top">
                                <td class="btmBase">Father's Name</td>
                                <td colspan="2"><?PHP echo $row['fname'];?></td>
                            </tr>
                            <tr>
                            	<td colspan="3" height="1" bgcolor="#fff0f0"></td>
                            </tr>
                            <tr>
                            	<td colspan="3" height="3"></td>
                            </tr>
                            <tr valign="top">
                                <td class="btmBase">Mother's Name</td>
                                <td colspan="2"><?PHP echo $row['mname'];?></td>
                            </tr>
                            <tr>
                            	<td colspan="3" height="1" bgcolor="#fff0f0"></td>
                            </tr>
                            <tr>
                            	<td colspan="3" height="3"></td>
                            </tr>
                            
                            <tr>
                            	<?php $courseid=$row['courseID'];?>
                                <?php $course=$row['courseID'];?>
                                <td class="btmBase">Course</td>
                                <td colspan="2"><font color="#ff0000"><b><?PHP echo $row['courseID'];?></b></font></td>
                            </tr>
                            <tr>
                            	<td colspan="3" height="1" bgcolor="#02a6c3"></td>
                            </tr>
                            <tr>
                            	<td colspan="3" height="3"></td>
                            </tr>
                        <?PHP }?>
                        
                        
                        
                        
                        
                         <?PHP
                                    $testqry="SELECT * FROM admission where regID='" . $_SESSION['regno'] . "'";
                                    $fresult = mysql_query($testqry) or die(mysql_error());
                            ?>
                            <tr>
                                <td colspan="3" bgcolor="#000000" align="center">
                                    <?PHP if(mysql_num_rows($fresult) > 0){?>
                                    	<?php $admissiontaken=1;?>
                                        <?PHP $rowAdmission = mysql_fetch_array($fresult) or die(mysql_error());?>
                                        <font color="#ffffff"><b>Admission taken in <font color="#ffff00"><?PHP echo $rowAdmission['courseID'];?> </font>Course.</b></font>
                                    <?PHP }?>
     
                    </table>