<?PHP
	include("dbconnect.php");
	
	$QryClg = "select * from college order by priority"; 
	$rsltClg = mysql_query($QryClg) or die(mysql_error());  
	
?> 
        <table border="0" cellpadding="0" cellspacing="0" width="690">
        	<tr>
            	<td colspan="3" height="25" align="left" valign="bottom">
                	<table border="0" cellpadding="0" cellspacing="0" width="690">
                    	<tr>
                        	<td class="txtHead">Registration Form</td>
                            <td align="right"><div id="msgJi" class="RegisteredCourse"></div></td>
                		</tr>
                	</table>
                </td>
            </tr>
            <tr> 
            	<td height="1" colspan="3"></td>
            </tr>
        	<form name="frmReg" action="register.php" method="post" enctype="multipart/form-data">
            <tr>
            	<td valign="top" align="right" colspan="3">
                	<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="650">
                    	<tr>
            				<td width="650" class="txtContent" align="right">Upload Photo:&nbsp;<input type="file" name="uploadPic" id="uploadPic" class="txtImage" value="" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                        <tr>
                            <td colspan="2" class="tdStyle" height="25" valign="bottom" align="left"><span style="font-weight:bold; color:#69F;">Perosnal Information</span></td>
                        </tr>
                        <tr>
                        	<td colspan="2" height="5"></td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                                    <tr>
                                        <td valign="middle" align="left" width="100">Choose Course<span class="mendatory">*</span></td>
                                        <td valign="middle" align="left" width="200">
                                            <select name="chooseCourse" class="combSingle" onchange="fillCourseToDisplay()">
                                            		<option value="No Course Selected Yet...">Select Course</option>
													<?PHP while($rowClg = mysql_fetch_array($rsltClg)){
														$QryCrs = "select * from course where collegeID='" . $rowClg['collegeID'] . "'"; 
														$rsltCrs = mysql_query($QryCrs) or die(mysql_error());
                                                    ?>
                                                	<optgroup label="<?PHP echo strtoupper($rowClg['collegeID']);?>" class="optGrp"></optgroup>
                                                    <?PHP while($rowCrs = mysql_fetch_array($rsltCrs)){?>
														<option value="<?PHP echo $rowCrs['courseID'];?>" class="optionVal"><?PHP echo $rowCrs['name'];?></option>
													<?PHP }?>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                                    <tr>
                                        <td valign="middle" align="left" width="100">Name<span class="mendatory">*</span></td>
                                        <td valign="middle" align="left" width="200"><input type="text" name="txtName" size="40" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                                    <tr>
                                        <td valign="middle" align="left" width="100">Date of Birth<span class="mendatory">*</span></td>
                                        <td valign="middle" align="left">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td valign="top">
                                                        <select name="dobDD" class="combMultiple">
                                                            <option value="dd">DD</option>
                                                            <?PHP for($loop1=1; $loop1<=31; $loop1++){?>
                                                                <option value="<?PHP echo $loop1?>"><?PHP echo $loop1;?></option>
                                                            <?PHP }?>
                                                        </select>
                                                    </td>
                                                    <td valign="top">
                                                        <select name="dobMM" class="combMultiple">
                                                            <option value="mm">MM</option>
                                                            <?PHP for($loop1=1; $loop1<=12; $loop1++){?>
                                                                <option value="<?PHP echo $loop1?>"><?PHP echo monthsJi((int)$loop1);?></option>
                                                            <?PHP }?>
                                                        </select>
                                                    </td>
                                                    <td valign="top">
                                                        <select name="dobYY" class="combMultiple">
                                                            <option value="yyyy">YYYY</option>
                                                            <?PHP for($loop1=1947; $loop1<=date('Y'); $loop1++){?>
                                                                <option value="<?PHP echo $loop1?>"><?PHP echo $loop1;?></option>
                                                            <?PHP }?>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                                    <tr>
                                        <td valign="middle" align="left" width="100">Gender<span class="mendatory">*</span></td>
                                        <td valign="middle" align="left" width="200">
                                        	<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="214" bgcolor="#f0f0f0">
                                            	<tr align="left">
                                                	<td align="left" width="94"><label><input type="radio" name="optGender" value="M" checked/>Male</label></td>
                                                    <td align="left" width="120"><label><input type="radio" name="optGender" value="F" /></label>Female</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                                    <tr>
                                        <td valign="middle" align="left" width="100">Father's Name<span class="mendatory">*</span></td>
                                        <td valign="middle" align="left" width="200"><input type="text" name="txtFName" size="40" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                                    <tr>
                                        <td valign="middle" align="left" width="100">Mother's Name<span class="mendatory">*</span></td>
                                        <td valign="middle" align="left" width="200"><input type="text" name="txtMName" size="40" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                                    <tr>
                                        <td valign="middle" align="left" width="100">Nationality<span class="mendatory">*</span></td>
                                        <td valign="middle" align="left" width="200"><input type="text" value="INDIAN" name="txtNationality" size="40" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                                    <tr>
                                        <td valign="middle" align="left" width="100">State<span class="mendatory">*</span></td>
                                        <td valign="middle" align="left" width="200">
                                        	<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="214" bgcolor="#f0f0f0">
                                            	<tr align="left">
                                                	<td align="left" width="94"><label><input type="radio" name="optDomicile" value="UK" checked/>UK</label></td>
                                                    <td align="left" width="120"><label><input type="radio" name="optDomicile" value="OS" />Other State</label></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="300">
                                    <tr>
                                        <td valign="top" align="left" width="100">Category<span class="mendatory">*</span></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" align="left" width="200">
                                        	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            	<tr>
                                                	<td width="150"><input type="radio" value="GEN" name="optCateg" checked/>GEN</td>
                                                    <td width="150"><input type="radio" value="SC" name="optCateg" />SC</td>
                                                </tr>
                                                <tr>
                                                	<td><input type="radio" value="ST" name="optCateg" />ST</td>
                                                	<td><input type="radio" value="OBC" name="optCateg" />OBC</td> 
                                                </tr>  
                                            </table>                                         
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                            	<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="100%">
                                    <tr>
                                        <td valign="top" align="left" width="100">Horizontal Category<span class="mendatory">*</span></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" align="left" width="200">
                                        	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            	<tr>
                                                	<td><input type="radio" value="MAIN" name="optHCateg" checked />MAIN</td>
                                                	<td><input type="radio" value="WOMEN" name="optHCateg" />WOMEN</td>
                                                    <td><input type="radio" value="HANDICAPPED" name="optHCateg" />HANDICAPPED</td>
                                                </tr>
                                                <tr>
                                                	<td><input type="radio" value="EX-SERVICE" name="optHCateg" />EX-SERVICE</td>
                                                	<td colspan="2"><input type="radio" value="FREEDOM FIGHTER" name="optHCateg" />FREEDOM FIGHTER</td> 
                                                </tr>  
                                            </table>                                         
                                        </td>
                                    </tr>
                                </table>
                        </td>
                    </tr>
                    </table>
                </td>
                <td width="10"></td>
                <td valign="top" align="right">
                	<table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                    	<tr>
                            <td colspan="2" class="tdStyle" height="25" valign="bottom" align="left"><span style="font-weight:bold; color:#69F;">Address &amp; Contact</span></td>
                        </tr>
                        <tr>
                        	<td colspan="2" height="5"></td>
                        </tr>
                        <tr>
                            <td valign="top" align="right">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                                    <tr align="left">
                                        <td colspan="2" valign="middle" id="subHeadWall" height="20">&nbsp;<b>P</b>ermanent Address</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" valign="top">
                                            <textarea name="txtPAddress" rows="2" cols="60" onblur="blurStr(this)" onfocus="focusStr(this)">-x-</textarea>
                                        </td>
                                    </tr>
                                    <?PHP
										$QryCountry = "select * from country order by country";
										$rsltCountry = mysql_query($QryCountry) or die(mysql_error());
										
										$QryState = "select * from state order by state";
										$rsltState = mysql_query($QryState) or die(mysql_error());
										
										$QryDistt = "select * from district order by district";
										$rsltDistt = mysql_query($QryDistt) or die(mysql_error());
										
										$QryCity = "select * from city order by city";
										$rsltCity = mysql_query($QryCity) or die(mysql_error());
									?>
                                    <tr>
                                    	<td>Country&nbsp;
                                        	<select name="cmbPCountry">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowCntry = mysql_fetch_array($rsltCountry)){?>
                                                	<?PHP if($rowCntry['country'] == "INDIA"){?>
                                            		<option value="<?PHP echo $rowCntry['country'];?>" selected="selected"><?PHP echo $rowCntry['country'];?></option>
                                                    <?PHP }else{ ?>
                                                    <option value="<?PHP echo $rowCntry['country'];?>"><?PHP echo $rowCntry['country'];?></option>
                                                    <?PHP }?>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                        <td>State&nbsp;
                                        	<select name="cmbPState">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowState = mysql_fetch_array($rsltState)){?>
                                                        <option value="<?PHP echo $rowState['state']; ?>"><?PHP echo $rowState['state']; ?></option>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>District&nbsp;
                                        	<select name="cmbPDistt">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowDistt = mysql_fetch_array($rsltDistt)){?>
                                                        <option value="<?PHP echo $rowDistt['district']; ?>"><?PHP echo $rowDistt['district']; ?></option>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                        <td>City&nbsp;
                                        	<select name="cmbPCity">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowCity = mysql_fetch_array($rsltCity)){?>
                                                        <option value="<?PHP echo $rowCity['city']; ?>"><?PHP echo $rowCity['city']; ?></option>

                                                <?PHP }?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" align="right">
                                            Phone&nbsp;<input type="text" name="txtPPh" size="15" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-" />
                                        </td>
                                        <td valign="middle" align="right">
                                        	Mobile&nbsp;<input type="text" name="txtPMob" size="15" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-" />
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" align="right">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                                    <tr align="left">
                                        <td valign="middle" id="subHeadWall" height="20">&nbsp;<b>C</b>orrespondance Address</td>
                                        <td valign="middle"  id="subHeadWall" align="right"><input type="button" value="same as P" onClick="sameAsAbove(txtCAddress, cmbCCountry, cmbCState, cmbCDistt, cmbCCity, txtCPh, txtCMob)" class="linkForSame" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" valign="top">
                                            <textarea name="txtCAddress" id="txtCAddress" rows="2" cols="60" onblur="blurStr(this)" onfocus="focusStr(this)">-x-</textarea>
                                        </td>
                                    </tr>
                                    <?PHP
										$QryCountry = "select * from country order by country";
										$rsltCountry = mysql_query($QryCountry) or die(mysql_error());
										
										$QryState = "select * from state order by state";
										$rsltState = mysql_query($QryState) or die(mysql_error());
										
										$QryDistt = "select * from district order by district";
										$rsltDistt = mysql_query($QryDistt) or die(mysql_error());
										
										$QryCity = "select * from city order by city";
										$rsltCity = mysql_query($QryCity) or die(mysql_error());
									?>
                                    <tr>
                                    	<td>Country&nbsp;
                                        	<select name="cmbCCountry">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowCntry = mysql_fetch_array($rsltCountry)){?>
                                                	<?PHP if($rowCntry['country'] == "INDIA"){?>
                                            		<option value="<?PHP echo $rowCntry['country'];?>" selected="selected"><?PHP echo $rowCntry['country'];?></option>
                                                    <?PHP }else{ ?>
                                                    <option value="<?PHP echo $rowCntry['country'];?>"><?PHP echo $rowCntry['country'];?></option>
                                                    <?PHP }?>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                        <td>State&nbsp;
                                        	<select name="cmbCState">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowState = mysql_fetch_array($rsltState)){?>
                                                        <option value="<?PHP echo $rowState['state']; ?>"><?PHP echo $rowState['state']; ?></option>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>District&nbsp;
                                        	<select name="cmbCDistt">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowDistt = mysql_fetch_array($rsltDistt)){?>
                                                        <option value="<?PHP echo $rowDistt['district']; ?>"><?PHP echo $rowDistt['district']; ?></option>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                        <td>City&nbsp;
                                        	<select name="cmbCCity">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowCity = mysql_fetch_array($rsltCity)){?>
                                                        <option value="<?PHP echo $rowCity['city']; ?>"><?PHP echo $rowCity['city']; ?></option>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" align="right">
                                            Phone&nbsp;<input type="text" name="txtCPh" size="15" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-" />
                                        </td>
                                        <td valign="middle" align="right">
                                        	Mobile&nbsp;<input type="text" name="txtCMob" size="15" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-" />
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" align="right">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                                    <tr align="left">
                                        <td valign="middle" id="subHeadWall" height="20">&nbsp;<b>L</b>ocal Guardian Address</td>
                                        <td valign="middle" id="subHeadWall" align="right"><input type="button" value="same as P" onClick="sameAsAbove(txtLGAddress, cmbLGCountry, cmbLGState, cmbLGDistt, cmbLGCity, txtLGPh, txtLGMob)" class="linkForSame" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" valign="top">
                                            <textarea name="txtLGAddress" rows="2" cols="60" onblur="blurStr(this)" onfocus="focusStr(this)">-x-</textarea>
                                        </td>
                                    </tr>
                                    <?PHP
										$QryCountry = "select * from country order by country";
										$rsltCountry = mysql_query($QryCountry) or die(mysql_error());
										
										$QryState = "select * from state order by state";
										$rsltState = mysql_query($QryState) or die(mysql_error());
										
										$QryDistt = "select * from district order by district";
										$rsltDistt = mysql_query($QryDistt) or die(mysql_error());
										
										$QryCity = "select * from city order by city";
										$rsltCity = mysql_query($QryCity) or die(mysql_error());
										
										$QrySrcInfo = "select * from sourceofinfo";
										$rsltSrcInfo = mysql_query($QrySrcInfo) or die(mysql_error());
									?>
                                    <tr>
                                    	<td>Country&nbsp;
                                        	<select name="cmbLGCountry">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowCntry = mysql_fetch_array($rsltCountry)){?>
                                                	<?PHP if($rowCntry['country'] == "INDIA"){?>
                                            		<option value="<?PHP echo $rowCntry['country'];?>" selected="selected"><?PHP echo $rowCntry['country'];?></option>
                                                    <?PHP }else{ ?>
                                                    <option value="<?PHP echo $rowCntry['country'];?>"><?PHP echo $rowCntry['country'];?></option>
                                                    <?PHP }?>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                        <td>State&nbsp;
                                        	<select name="cmbLGState">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowState = mysql_fetch_array($rsltState)){?>
                                                        <option value="<?PHP echo $rowState['state']; ?>"><?PHP echo $rowState['state']; ?></option>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>District&nbsp;
                                        	<select name="cmbLGDistt">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowDistt = mysql_fetch_array($rsltDistt)){?>
                                                        <option value="<?PHP echo $rowDistt['district']; ?>"><?PHP echo $rowDistt['district']; ?></option>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                        <td>City&nbsp;
                                        	<select name="cmbLGCity">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowCity = mysql_fetch_array($rsltCity)){?>
                                                        <option value="<?PHP echo $rowCity['city']; ?>"><?PHP echo $rowCity['city']; ?></option>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" align="right">
                                            Phone&nbsp;<input type="text" name="txtLGPh" size="15" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-" />
                                        </td>
                                        <td valign="middle" align="right">
                                        	Mobile&nbsp;<input type="text" name="txtLGMob" size="15" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-" />
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
            	<td height="1" colspan="3"></td>
            </tr>
            <tr>
            	<td colspan="3">
                	<table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                    	<tr>
                            <td colspan="6" class="tdStyle" height="20" valign="bottom" align="left">
                            	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                    	<td colspan="6" height="20" valign="bottom" align="left"><span style="font-weight:bold; color:#69F;">Previous Qualification</span></td>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>        
                        </tr>
                        <tr>
                        	<td colspan="6" height="5"></td>
                        </tr>
                        <tr>
                        	<td colspan="6">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="100%">
                                    <tr>
	                                    <td colspan="6" align="left">School/College/Univ. last attended</td>
    	                                <td align="right"><input type="text" name="txtSCULA" size="90" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr height="20" align="left">
                            <td width="180"><b>Name of Examination</b></td>
                            <td width="170"><b>Institution</b></td>
                            <td width="100"><b>Board/Univ.</b></td>
                            <td width="70"><b>Year</b></td>
                            <td width="90"><b>Subjects</b></td>
                            <td width="90" align="right"><b>Marks %</b></td>
                        </tr>
                        <tr align="left">
                            <td>High School</td>
                            <td><input type="text" class="loginColor" name="txtHsInst" size="26" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="loginColor" name="txtHsBrdUniv" size="10" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="loginColor" name="txtHsYr" size="6" maxlength="4" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="loginColor" name="txtHsSbj" size="24" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td align="right"><input type="text" class="logintxt" name="txtHsMrks" value="0" size="5" maxlength="10" onblur="blurNum(this)" onfocus="focusNum(this)"></td>
                        </tr>
                        <tr align="left">
                            <td>Intermediate</td>
                            <td><input type="text" class="loginColor" name="txtIntInst" size="26" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="loginColor" name="txtIntBrdUniv" size="10" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="loginColor" name="txtIntYr" size="6" maxlength="4" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="loginColor" name="txtIntSbj" size="24" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td align="right"><input type="text" class="logintxt" name="txtIntMrks" value="0" size="5" maxlength="10" onblur="blurNum(this)" onfocus="focusNum(this)"></td>
                        </tr>
                        <tr align="left">
                            <td>Graduation</td>
                            <td><input type="text" class="logintxt" name="txtGdInst" size="26" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="logintxt" name="txtGdBrdUniv" size="10" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="logintxt" name="txtGdYr" size="6" maxlength="4" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="logintxt" name="txtGdSbj" size="24" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td align="right"><input type="text" class="logintxt" name="txtGdMrks" value="0" size="5" maxlength="10" onblur="blurNum(this)" onfocus="focusNum(this)"></td>
                        </tr>
                        <tr align="left">
                            <td>Other </td>
                            <td><input type="text" class="logintxt" name="txtOtInst" size="26" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="logintxt" name="txtOtBrdUniv" size="10" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="logintxt" name="txtOtYr" size="6" maxlength="4" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="logintxt" name="txtOtSbj" size="24" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td align="right"><input type="text" class="logintxt" name="txtOtMrks" value="0" size="5" maxlength="10" onblur="blurNum(this)" onfocus="focusNum(this)"></td>
                        </tr>
                        <tr>
                            <td colspan="6" height="2"></td>
                        </tr>											
                        <tr>
                            <td colspan="6" class="body1" height="1"></td>
                        </tr>
                        <tr>
                            <td colspan="6" class="insSecondLast" height="2"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="tdStyle" height="20" valign="bottom" align="left">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td colspan="6" height="20" valign="bottom" align="left"><span style="font-weight:bold; color:#69F;">Entrance Exam (If any)</span></td>
                            <td align="right">&nbsp;</td>
                        </tr>
                    </table>
                </td>        
            </tr>
            <tr>
            	<td colspan="3" align="center">
                       <table border="0" cellpadding="0" cellspacing="0" width="600">
                            <tr>
                                <td colspan="2" align="right">
                                        <table border='0' cellpadding='0' cellspacing='1' width='690' class='txtContent'>
                                            <tr align='left'>
                                                <td width='100'><b>&nbsp;Exam</font></b></font></td>
                                                <td width='110'><b>&nbsp;Roll Number</font></b></td>
                                                <td width='80'><b>&nbsp;Score</font></b></td>
                                                <td width='80'><b>&nbsp;Month</font></b></td>
                                                <td width='80'><b>&nbsp;Year</font></b></td>
                                                <td width='80'><b>&nbsp;ST Rank</font></b></td>
                                                <td width='80'><b>&nbsp;AI Rank</font></b></td>
                                                <td width='80'><b>&nbsp;Rank</font></b></td>
                                            </tr>
                                            <tr>
                                            <tr align='left'>
                                                <td><input type='text' name='txtExam' size='16' value='-x-' onblur='blurStr(this)' onfocus='focusStr(this)' /></td>
                                                <td><input type='text' name='txtRoll' size='20' value='-x-' onblur='blurStr(this)' onfocus='focusStr(this)' /></td>
                                                <td><input type='text' name='txtScore' size='10' value='-x-' onblur='blurStr(this)' onfocus='focusStr(this)' /></td>
                                                <td><input type='text' name='txtMonth' size='10' class='txtSubField' value='-x-' onblur='blurStr(this)' onfocus='focusStr(this)' /></td>
                                                <td><input type='text' name='txtYear' size='10' value='-x-' onblur='blurStr(this)' onfocus='focusStr(this)' /></td>
                                                <td><input type='text' name='txtStRank' size='10' value='-x-' onblur='blurStr(this)' onfocus='focusStr(this)' /></td>
                                                <td><input type='text' name='txtAIRank' size='10' value='-x-' onblur='blurStr(this)' onfocus='focusStr(this)' /></td>
                                                <td><input type='text' name='txtRank' size='10' value='-x-' onblur='blurStr(this)' onfocus='focusStr(this)' /></td>
                                            </tr>
                                        </table>
                                </td>
                            </tr>
                        </table> 
                </td>
            </tr>
            <tr>
            	<td colspan="3" height="10"></td>
            </tr>
            <tr>
            	<td colspan="3">
                	<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="690" bgcolor="#006699">
                    	<tr>
                        	<td width="570" align="right" style="color:#FFFFFF">Source of Information about Amrapali ?&nbsp;</td>
                            <td width="120" align="right">
                            	<select name="cmbSrcInfo" id="cmbSrcInfo" style="width:120px">
                                	<option value="Select...">Select...</option>
                                    <?PHP while($rowSrcInfo = mysql_fetch_array($rsltSrcInfo)){?>
                                    	<option value="<?PHP echo $rowSrcInfo['ID'];?>"><?PHP echo $rowSrcInfo['SOURCE'];?></option>
                                    <?PHP }?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
            	<td colspan="3" align="right" bgcolor="#f0f0f0">
                	<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="690">
                    	<tr>
                        	<td width="640" align="left">
                            	<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="600">
                                    <tr align="left">
                                        <td width="110"><font color="#FF0000"><b>Loan Required?</b></font></td>
                                        <td width="490">
                                        	<table border="0" cellpadding="0" cellspacing="0">
                                            	<tr align="left">
                                                	<td width="70"><input type="radio" value="YES" name="optLoan" />YES</td>
                                                    <td width="70"><input type="radio" value="NO" name="optLoan" checked />NO</td>
                                                </tr>  
                                            </table>  
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td align="right" width="50"><input type="button" value="submit" onclick="validateRegForm()" style="color:#000; font-weight:bold"/></td>
                        </tr>
                    </table>
                </td>
            </tr>
            </form>
        </table>