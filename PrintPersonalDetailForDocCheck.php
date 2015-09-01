<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="300">
                    	<tr>
                            <td colspan="2" class="tdStyle" height="25" valign="bottom" align="left"><span style="font-weight:bold; color:#69F;">Personal Detail</span></td>
                        </tr>
                        <tr>
                        	<td colspan="2" align="left" valign="top">
                            	<table border="0" cellpadding="0" cellspacing="0" class="txtCntn">
                                	<?PHP if(mysql_num_rows($result) > 0){?>
									<?PHP while($row = mysql_fetch_array($result)){?>
                                        <tr valign="top">
                                            <td width="150" class="btmBase"><font color="#FF0000">Registration No</font></td>
                                            <td width="100"><b><font color="#0000FF"><?PHP echo $row['ID'];?></font></b></td>
                                            <td width="100" align="right"><img src="regPicsUploads/<?PHP echo $row['image'];?>" width="80" height="100" alt="<?PHP echo $row['ID'];?>"/></td>
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
                                    <?PHP }else{?>
                                    	<tr>
                                        	<td>No Data Found...</td>
                                        </tr>
                                    <?PHP }?>
                                </table>
                            </td>
                        </tr>
                    </table>