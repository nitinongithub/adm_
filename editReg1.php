
<?PHP
	//session_start();
	//ob_start();
	header("Cache-control: private, no-cache");
	header("Pragma: no-cache");

	require("dbconnect.php");
	//include("headers/libN.php");
	
	$QryClg = "select * from college order by priority"; 
	$rsltClg = mysql_query($QryClg) or die(mysql_error());  
	
	
	$regno = $_SESSION['txtregno'];
	
	$qryPrsnl="SELECT * FROM stud_personal where id='" . $regno . "'";
	$rsltPrsnl = mysql_query($qryPrsnl) or die(mysql_error());
	
	if(mysql_num_rows($rsltPrsnl) > 0 ){	
		$rowPrsnl = mysql_fetch_array($rsltPrsnl) or die(mysql_error());
?> 
        <table border="0" cellpadding="0" cellspacing="0" width="690">
        	<tr>
            	<td colspan="3" height="25" align="left" valign="bottom">
                	<table border="0" cellpadding="0" cellspacing="0" width="690">
                    	<tr>
                        	<td class="txtHead">Edit Registration Detail</td>
                            <td align="right"><div id="msgJi" class="RegisteredCourse"></div></td>
                		</tr>
                	</table>
                </td>
            </tr>
            <tr> 
            	<td height="5" colspan="3"></td>
            </tr>
        	<form name="frmReg" action="updateregister.php" method="post" enctype="multipart/form-data">
            <tr>
            	<td valign="top" align="right" colspan="3">
                	<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="650">
                    	<tr>
                        	<td align="right">
                            	<img src="regPicsUploads/<?PHP echo $rowPrsnl['image'];?>" width="85"  alt="<?PHP echo $rowPrsnl['ID'];?>"/>
                            </td>
                        </tr>
                    	<tr>
            				<td width="650" class="txtContent">Upload Photo:&nbsp;<input type="file" name="uploadPic" id="uploadPic" class="txtImage" value="" /></td>
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
                                                    	<?PHP if($rowPrsnl['courseID'] == $rowCrs['courseID']){?>
                                                        <option value="<?PHP echo $rowCrs['courseID'];?>" class="optionVal" selected="selected"><?PHP echo $rowCrs['name'];?></option>
                                                        <?PHP }else{ ?>
														<option value="<?PHP echo $rowCrs['courseID'];?>" class="optionVal"><?PHP echo $rowCrs['name'];?></option>
                                                        <?PHP }?>
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
                                        <td valign="middle" align="left" width="200"><input type="text" name="txtName" size="40" value="<?PHP echo $rowPrsnl['name'];?>" /></td>
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
                                                            	<?PHP if($rowPrsnl['dob'] == $loop1){ ?>
                                                                <option value="<?PHP echo $loop1?>" selected="selected"><?PHP echo $loop1;?></option>
                                                                <?PHP }else{?>
                                                                <option value="<?PHP echo $loop1?>"><?PHP echo $loop1;?></option>
                                                                <?PHP }?>
                                                            <?PHP }?>
                                                        </select>
                                                    </td>
                                                    <td valign="top">
                                                        <select name="dobMM" class="combMultiple">
                                                            <option value="mm">MM</option>
                                                            <?PHP for($loop1=1; $loop1<=12; $loop1++){?>
                                                            	<?PHP if($rowPrsnl['mob'] == $loop1){ ?>
                                                                	<option value="<?PHP echo $loop1?>" selected="selected"><?PHP echo monthsJi((int)$loop1);?></option>
                                                                <?PHP }else{?>
                                                                	<option value="<?PHP echo $loop1?>"><?PHP echo monthsJi((int)$loop1);?></option>
                                                                <?PHP }?>
                                                            <?PHP }?>
                                                        </select>
                                                    </td>
                                                    <td valign="top">
                                                        <select name="dobYY" class="combMultiple">
                                                            <option value="yyyy">YYYY</option>
                                                            <?PHP for($loop1=1975; $loop1<=date('Y'); $loop1++){?>
                                                            	<?PHP if($rowPrsnl['yob'] == $loop1){ ?>
                                                                <option value="<?PHP echo $loop1?>" selected="selected"><?PHP echo $loop1;?></option>
                                                                <?PHP }else{?>
                                                                <option value="<?PHP echo $loop1?>"><?PHP echo $loop1;?></option>
                                                                <?PHP }?>
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
                                        	<?PHP if($rowPrsnl['gender'] == 'M'){?>
                                        	<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="214" bgcolor="#f0f0f0">
                                            	<tr align="left">
                                                	<td align="left" width="94"><label><input type="radio" name="optGender" value="M" checked/>Male</label></td>
                                                    <td align="left" width="120"><label><input type="radio" name="optGender" value="F" /></label>Female</td>
                                                </tr>
                                            </table>
                                            <?PHP }else{?>
                                            <table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="214" bgcolor="#f0f0f0">
                                            	<tr align="left">
                                                	<td align="left" width="94"><label><input type="radio" name="optGender" value="M" />Male</label></td>
                                                    <td align="left" width="120"><label><input type="radio" name="optGender" value="F" checked /></label>Female</td>
                                                </tr>
                                            </table>
                                            <?PHP }?>
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
                                        <td valign="middle" align="left" width="200"><input type="text" name="txtFName" size="40" value="<?PHP echo $rowPrsnl['fname'];?>" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                                    <tr>
                                        <td valign="middle" align="left" width="100">Mother's Name<span class="mendatory">*</span></td>
                                        <td valign="middle" align="left" width="200"><input type="text" name="txtMName" size="40" value="<?PHP echo $rowPrsnl['mname'];?>" /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                                    <tr>
                                        <td valign="middle" align="left" width="100">Nationality<span class="mendatory">*</span></td>
                                        <td valign="middle" align="left" width="200"><input type="text" value="<?PHP echo $rowPrsnl['nationality'];?>" name="txtNationality" size="40" /></td>
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
                                        	<?PHP if($rowPrsnl['domicile'] == 'UK'){?>
                                        	<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="214" bgcolor="#f0f0f0">
                                            	<tr align="left">
                                                	<td align="left" width="94"><label><input type="radio" name="optDomicile" value="UK" checked="checked" />UK</label></td>
                                                    <td align="left" width="120"><label><input type="radio" name="optDomicile" value="OS" />Other State</label></td>
                                                </tr>
                                            </table>
                                            <?PHP }else{?>
                                            <table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="214" bgcolor="#f0f0f0">
                                            	<tr align="left">
                                                	<td align="left" width="94"><label><input type="radio" name="optDomicile" value="UK" />UK</label></td>
                                                    <td align="left" width="120"><label><input type="radio" name="optDomicile" value="OS" checked="checked" />Other State</label></td>
                                                </tr>
                                            </table>
                                            <?PHP }?>
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
                                                	<td width="150">
														<?PHP if($rowPrsnl['category'] == 'GEN'){?>
                                                        	<input type="radio" value="GEN" name="optCateg" checked="checked"/>GEN
                                                        <?PHP }else{?>
                                                        	<input type="radio" value="GEN" name="optCateg" />GEN
                                                        <?PHP }?>
                                                    </td>
                                                    <td width="150">
                                                    	<?PHP if($rowPrsnl['category'] == 'SC'){?>
                                                    		<input type="radio" value="SC" name="optCateg" checked="checked"/>SC
                                                        <?PHP }else{?>
                                                        	<input type="radio" value="SC" name="optCateg" />SC
                                                        <?PHP }?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td>
                                                    	<?PHP if($rowPrsnl['category'] == 'ST'){?>
                                                    		<input type="radio" value="ST" name="optCateg" checked="checked" />ST
                                                        <?PHP }else{?>
                                                        	<input type="radio" value="ST" name="optCateg" />ST
                                                        <?PHP }?>
                                                    </td>
                                                	<td>
                                                    	<?PHP if($rowPrsnl['category'] == 'OBC'){?>
                                                    		<input type="radio" value="OBC" name="optCateg" checked="checked" />OBC
                                                        <?PHP }else{?>
                                                        	<input type="radio" value="OBC" name="optCateg" />OBC
                                                        <?PHP }?>
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
                            	<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="100%">
                                    <tr>
                                        <td valign="top" align="left" width="100">Horizontal Category<span class="mendatory">*</span></td>
                                    </tr>
                                    <tr>
                                        <td valign="top" align="left" width="200">
                                        	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            	<tr>
                                                	<td>
                                                    	<?PHP if($rowPrsnl['hzcateg'] == 'None' || $rowPrsnl['hzcateg'] == 'MAIN'){?>
                                                    		<input type="radio" value="MAIN" name="optHCateg" checked="checked" />MAIN
                                                        <?PHP }else{?>
                                                        	<input type="radio" value="MAIN" name="optHCateg" />MAIN
                                                        <?PHP }?>
                                                    </td>
                                                	<td>
                                                    	<?PHP if($rowPrsnl['hzcateg'] == 'WOMEN'){?>
                                                    		<input type="radio" value="WOMEN" name="optHCateg" checked="checked" />WOMEN
                                                        <?PHP }else{?>
                                                        	<input type="radio" value="WOMEN" name="optHCateg" />WOMEN
                                                        <?PHP }?>
                                                    </td>
                                                    <td>
                                                    	<?PHP if($rowPrsnl['hzcateg'] == 'HANDICAPPED'){?>
                                                    		<input type="radio" value="HANDICAPPED" name="optHCateg" checked="checked" />HANDICAPPED
                                                        <?PHP }else{?>
                                                        	<input type="radio" value="HANDICAPPED" name="optHCateg" />HANDICAPPED
                                                        <?PHP }?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td>
                                                    	<?PHP if($rowPrsnl['hzcateg'] == 'EX-SERVICE'){?>
                                                    		<input type="radio" value="EX-SERVICE" name="optHCateg" checked="checked" />EX-SERVICE
                                                        <?PHP }else{?>
                                                        	<input type="radio" value="EX-SERVICE" name="optHCateg" />EX-SERVICE
                                                        <?PHP }?>
                                                    </td>
                                                	<td colspan="2">
                                                    	<?PHP if($rowPrsnl['hzcateg'] == 'FREEDOM FIGHTER'){?>
                                                    		<input type="radio" value="FREEDOM FIGHTER" name="optHCateg" checked="checked" />FREEDOM FIGHTER
                                                        <?PHP }else{?>
                                                        	<input type="radio" value="FREEDOM FIGHTER" name="optHCateg" />FREEDOM FIGHTER
                                                        <?PHP }?>
                                                    </td> 
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
                                    <?PHP
										$QryCountry = "select * from country order by country";
										$rsltCountry = mysql_query($QryCountry) or die(mysql_error());
										
										$QryState = "select * from state order by state";
										$rsltState = mysql_query($QryState) or die(mysql_error());
										
										$QryDistt = "select * from district order by district";
										$rsltDistt = mysql_query($QryDistt) or die(mysql_error());
										
										$QryCity = "select * from city order by city";
										$rsltCity = mysql_query($QryCity) or die(mysql_error());
										
										$QryAdr = "select * from stud_perm_adr_contact where STUD_ID='" . $regno . "'";
										$rsltAdr = mysql_query($QryAdr) or die(mysql_error());
										$rowAdr = mysql_fetch_array($rsltAdr) or die(mysql_error());
									?>
                                    <tr>
                                        <td colspan="2" valign="top">
                                            <textarea name="txtPAddress" rows="2" cols="60" onblur="blurStr(this)" onfocus="focusStr(this)"><?PHP echo $rowAdr['address'];?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>Country&nbsp;
                                        	<select name="cmbPCountry">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowCntry = mysql_fetch_array($rsltCountry)){?>
                                                	<?PHP if($rowCntry['country'] == $rowAdr['country']){?>
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
                                                	<?PHP if($rowState['state'] == $rowAdr['state']){?>
                                                        <option value="<?PHP echo $rowState['state']; ?>" selected="selected"><?PHP echo $rowState['state']; ?></option>
                                                    <?PHP }else{ ?>
                                                        <option value="<?PHP echo $rowState['state']; ?>"><?PHP echo $rowState['state']; ?></option>
                                                    <?PHP } ?>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>District&nbsp;
                                        	<select name="cmbPDistt">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowDistt = mysql_fetch_array($rsltDistt)){?>
                                                	<?PHP if($rowDistt['district'] == $rowAdr['district']){?>
                                                        <option value="<?PHP echo $rowDistt['district']; ?>" selected="selected"><?PHP echo $rowDistt['district']; ?></option>
                                                    <?PHP }else{ ?>
                                                        <option value="<?PHP echo $rowDistt['district']; ?>"><?PHP echo $rowDistt['district']; ?></option>
                                                    <?PHP } ?>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                        <td>City&nbsp;
                                        	<select name="cmbPCity">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowCity = mysql_fetch_array($rsltCity)){?>
                                                	<?PHP if($rowCity['city'] == $rowAdr['city']){?>
                                                        <option value="<?PHP echo $rowCity['city']; ?>" selected="selected"><?PHP echo $rowCity['city']; ?></option>
                                                    <?PHP }else{ ?>
                                                        <option value="<?PHP echo $rowCity['city']; ?>"><?PHP echo $rowCity['city']; ?></option>
                                                    <?PHP } ?>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" align="right">
                                            Phone&nbsp;<input type="text" name="txtPPh" size="15" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rowAdr['phone'];?>" />
                                        </td>
                                        <td valign="middle" align="right">
                                        	Mobile&nbsp;<input type="text" name="txtPMob" size="15" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rowAdr['mobile'];?>" />
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
                                    <?PHP
										$QryCountry = "select * from country order by country";
										$rsltCountry = mysql_query($QryCountry) or die(mysql_error());
										
										$QryState = "select * from state order by state";
										$rsltState = mysql_query($QryState) or die(mysql_error());
										
										$QryDistt = "select * from district order by district";
										$rsltDistt = mysql_query($QryDistt) or die(mysql_error());
										
										$QryCity = "select * from city order by city";
										$rsltCity = mysql_query($QryCity) or die(mysql_error());
										
										$QryAdr = "select * from stud_cores_adr_contact where STUD_ID='" . $regno . "'";
										$rsltAdr = mysql_query($QryAdr) or die(mysql_error());
										$rowAdr = mysql_fetch_array($rsltAdr) or die(mysql_error());
									?>
                                    <tr>
                                        <td colspan="2" valign="top">
                                            <textarea name="txtCAddress" id="txtCAddress" rows="2" cols="60" onblur="blurStr(this)" onfocus="focusStr(this)"><?PHP echo $rowAdr['address'];?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>Country&nbsp;
                                        	<select name="cmbCCountry">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowCntry = mysql_fetch_array($rsltCountry)){?>
                                                	<?PHP if($rowCntry['country'] == $rowAdr['country']){?>
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
                                                	<?PHP if($rowState['state'] == $rowAdr['state']){?>
                                                        <option value="<?PHP echo $rowState['state']; ?>" selected="selected"><?PHP echo $rowState['state']; ?></option>
                                                    <?PHP }else{ ?>
                                                        <option value="<?PHP echo $rowState['state']; ?>"><?PHP echo $rowState['state']; ?></option>
                                                    <?PHP } ?>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>District&nbsp;
                                        	<select name="cmbCDistt">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowDistt = mysql_fetch_array($rsltDistt)){?>
                                                	<?PHP if($rowDistt['district'] == $rowAdr['district']){?>
                                                        <option value="<?PHP echo $rowDistt['district']; ?>" selected="selected"><?PHP echo $rowDistt['district']; ?></option>
                                                    <?PHP }else{ ?>
                                                        <option value="<?PHP echo $rowDistt['district']; ?>"><?PHP echo $rowDistt['district']; ?></option>
                                                    <?PHP } ?>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                        <td>City&nbsp;
                                        	<select name="cmbCCity">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowCity = mysql_fetch_array($rsltCity)){?>
                                                	<?PHP if($rowCity['city'] == $rowAdr['city']){?>
                                                        <option value="<?PHP echo $rowCity['city']; ?>" selected="selected"><?PHP echo $rowCity['city']; ?></option>
                                                    <?PHP }else{ ?>
                                                        <option value="<?PHP echo $rowCity['city']; ?>"><?PHP echo $rowCity['city']; ?></option>
                                                    <?PHP } ?>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                    </tr>
                                        <td valign="middle" align="right">
                                            Phone&nbsp;<input type="text" name="txtCPh" size="15" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rowAdr['phone'];?>" />
                                        </td>
                                        <td valign="middle" align="right">
                                        	Mobile&nbsp;<input type="text" name="txtCMob" size="15" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rowAdr['mobile'];?>" />
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
                                        <td valign="middle"  id="subHeadWall" align="right"><input type="button" value="same as P" onClick="sameAsAbove(txtLGAddress, cmbLGCountry, cmbLGState, cmbLGDistt, cmbLGCity, txtLGPh, txtLGMob)" class="linkForSame" /></td>
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
										
										$QryAdr = "select * from stud_lg_adr_contact where STUD_ID='" . $regno . "'";
										$rsltAdr = mysql_query($QryAdr) or die(mysql_error());
										$rowAdr = mysql_fetch_array($rsltAdr) or die(mysql_error());
									?>
                                    <tr>
                                        <td colspan="2" valign="top">
                                            <textarea name="txtLGAddress" id="txtLGAddress" rows="2" cols="60" onblur="blurStr(this)" onfocus="focusStr(this)"><?PHP echo $rowAdr['address'];?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>Country&nbsp;
                                        	<select name="cmbLGCountry">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowCntry = mysql_fetch_array($rsltCountry)){?>
                                                	<?PHP if($rowCntry['country'] == $rowAdr['country']){?>
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
                                                	<?PHP if($rowState['state'] == $rowAdr['state']){?>
                                                        <option value="<?PHP echo $rowState['state']; ?>" selected="selected"><?PHP echo $rowState['state']; ?></option>
                                                    <?PHP }else{ ?>
                                                        <option value="<?PHP echo $rowState['state']; ?>"><?PHP echo $rowState['state']; ?></option>
                                                    <?PHP } ?>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>District&nbsp;
                                        	<select name="cmbLGDistt">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowDistt = mysql_fetch_array($rsltDistt)){?>
                                                	<?PHP if($rowDistt['district'] == $rowAdr['district']){?>
                                                        <option value="<?PHP echo $rowDistt['district']; ?>" selected="selected"><?PHP echo $rowDistt['district']; ?></option>
                                                    <?PHP }else{ ?>
                                                        <option value="<?PHP echo $rowDistt['district']; ?>"><?PHP echo $rowDistt['district']; ?></option>
                                                    <?PHP } ?>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                        <td>City&nbsp;
                                        	<select name="cmbLGCity">
                                            		<option value="-x-">Select</option>
                                            	<?PHP while($rowCity = mysql_fetch_array($rsltCity)){?>
                                                	<?PHP if($rowCity['city'] == $rowAdr['city']){?>
                                                        <option value="<?PHP echo $rowCity['city']; ?>" selected="selected"><?PHP echo $rowCity['city']; ?></option>
                                                    <?PHP }else{ ?>
                                                        <option value="<?PHP echo $rowCity['city']; ?>"><?PHP echo $rowCity['city']; ?></option>
                                                    <?PHP } ?>
                                                <?PHP }?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" align="right">
                                            Phone&nbsp;<input type="text" name="txtLGPh" size="15" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rowAdr['phone'];?>" />
                                        </td>
                                        <td valign="middle" align="right">
                                        	Mobile&nbsp;<input type="text" name="txtLGMob" size="15" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rowAdr['mobile'];?>" />
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
                	<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="680">
                    	<tr>
                            <td class="tdStyle" height="20" valign="bottom" align="left" colspan="6">
                            	<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                    	<td colspan="6" height="20" valign="bottom" align="left"><span style="font-weight:bold; color:#69F;">Previous Qualification</span></td>
                                        <td align="right">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>        
                        </tr>
                        <tr>
                        	<td height="5"></td>
                        </tr>                        
                        <tr>
                        	<td colspan="6">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="100%">
                                    <tr>
	                                    <td colspan="6" align="left">School/College/Univ. last attended</td>
    	                                <td align="right"><input type="text" name="txtSCULA" size="90" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rowPrsnl['lastAttendedAcademicPlace']; ?>" /></td>
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
                        <?PHP
							$qryPQ = "";
							$qryPQ="SELECT * FROM prev_qualification where stud_ID='" . $regno . "' AND qualifID=" . 1;
							$rsltPQ = mysql_query($qryPQ) or die(mysql_error());
						?>	
                        <?PHP if(mysql_num_rows($rsltPQ) > 0){ ?>
                        <?PHP $rw = mysql_fetch_array($rsltPQ) or die(mysql_error());?>
                            <tr align="left">
                                <td>High School</td>
                                <td><input type="text" class="loginColor" name="txtHsInst" size="26" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rw['instname'];?>"></td>
                                <td><input type="text" class="loginColor" name="txtHsBrdUniv" size="10" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rw['boarduniv'];?>"></td>
                                <td><input type="text" class="loginColor" name="txtHsYr" size="6" maxlength="4" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rw['yearofpassing'];?>"></td>
                                <td><input type="text" class="loginColor" name="txtHsSbj" size="24" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rw['subjects'];?>"></td>
                                <td align="right"><input type="text" class="logintxt" name="txtHsMrks" size="5" maxlength="10" onblur="blurNum(this)" onfocus="focusNum(this)" value="<?PHP echo $rw['marksobt'];?>"></td>
                            </tr>
                        <?PHP }else{ ?>
                            <tr align="left">
                                <td>High School</td>
                                <td><input type="text" class="loginColor" name="txtHsInst" size="26" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                                <td><input type="text" class="loginColor" name="txtHsBrdUniv" size="10" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                                <td><input type="text" class="loginColor" name="txtHsYr" size="6" maxlength="4" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                                <td><input type="text" class="loginColor" name="txtHsSbj" size="24" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                                <td align="right"><input type="text" class="logintxt" name="txtHsMrks" value="0" size="5" maxlength="10" onblur="blurNum(this)" onfocus="focusNum(this)"></td>
                            </tr>
                        <?PHP } ?>
                        
                        <?PHP
							$qryPQ = "";
							$qryPQ="SELECT * FROM prev_qualification where stud_ID='" . $regno . "' AND qualifID=" . 2;
							$rsltPQ = mysql_query($qryPQ) or die(mysql_error());
						?>	
                        <?PHP if(mysql_num_rows($rsltPQ) > 0){ ?>
                        <?PHP $rw = mysql_fetch_array($rsltPQ) or die(mysql_error());?>
                            <tr align="left">
                                <td>Intermediate</td>
                                <td><input type="text" class="loginColor" name="txtIntInst" size="26" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rw['instname'];?>"></td>
                                <td><input type="text" class="loginColor" name="txtIntBrdUniv" size="10" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rw['boarduniv'];?>"></td>
                                <td><input type="text" class="loginColor" name="txtIntYr" size="6" maxlength="4" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rw['yearofpassing'];?>"></td>
                                <td><input type="text" class="loginColor" name="txtIntSbj" size="24" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rw['subjects'];?>"></td>
                                <td align="right"><input type="text" class="logintxt" name="txtIntMrks" size="5" maxlength="10" onblur="blurNum(this)" onfocus="focusNum(this)" value="<?PHP echo $rw['marksobt'];?>"></td>
                            </tr>
                        <?PHP }else{?>
                            <tr align="left">
                                <td>Intermediate</td>
                                <td><input type="text" class="loginColor" name="txtIntInst" size="26" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                                <td><input type="text" class="loginColor" name="txtIntBrdUniv" size="10" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                                <td><input type="text" class="loginColor" name="txtIntYr" size="6" maxlength="4" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                                <td><input type="text" class="loginColor" name="txtIntSbj" size="24" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                                <td align="right"><input type="text" class="logintxt" name="txtIntMrks" value="0" size="5" maxlength="10" onblur="blurNum(this)" onfocus="focusNum(this)"></td>
                            </tr>
                        <?PHP }?>
                        
                        <?PHP
							$qryPQ = "";
							$qryPQ="SELECT * FROM prev_qualification where stud_ID='" . $regno . "' AND qualifID=" . 3;
							$rsltPQ = mysql_query($qryPQ) or die(mysql_error());
						?>	
                        <?PHP if(mysql_num_rows($rsltPQ) > 0){ ?>
                        <?PHP $rw = mysql_fetch_array($rsltPQ) or die(mysql_error());?>
                        <tr align="left">
                            <td>Graduation</td>
                            <td><input type="text" class="logintxt" name="txtGdInst" size="26" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rw['instname'];?>"></td>
                            <td><input type="text" class="logintxt" name="txtGdBrdUniv" size="10" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rw['boarduniv'];?>"></td>
                            <td><input type="text" class="logintxt" name="txtGdYr" size="6" maxlength="4" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rw['yearofpassing'];?>"></td>
                            <td><input type="text" class="logintxt" name="txtGdSbj" size="24" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rw['subjects'];?>"></td>
                            <td align="right"><input type="text" class="logintxt" name="txtGdMrks" size="5" maxlength="10" onblur="blurNum(this)" onfocus="focusNum(this)" value="<?PHP echo $rw['marksobt'];?>"></td>
                        </tr>
                        <?PHP }else{ ?>
                        <tr align="left">
                            <td>Graduation</td>
                            <td><input type="text" class="logintxt" name="txtGdInst" size="26" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="logintxt" name="txtGdBrdUniv" size="10" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="logintxt" name="txtGdYr" size="6" maxlength="4" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="logintxt" name="txtGdSbj" size="24" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td align="right"><input type="text" class="logintxt" name="txtGdMrks" value="0" size="5" maxlength="10" onblur="blurNum(this)" onfocus="focusNum(this)"></td>
                        </tr>
                        <?PHP } ?>
                        
                        <?PHP
							$qryPQ = "";
							$qryPQ="SELECT * FROM prev_qualification where stud_ID='" . $regno . "' AND qualifID=" . 4;
							$rsltPQ = mysql_query($qryPQ) or die(mysql_error());
						?>	
                        <?PHP if(mysql_num_rows($rsltPQ) > 0){ ?>
                        <?PHP $rw = mysql_fetch_array($rsltPQ) or die(mysql_error());?>
                        <tr align="left">
                            <td>Other </td>
                            <td><input type="text" class="logintxt" name="txtOtInst" size="26" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rw['instname'];?>"></td>
                            <td><input type="text" class="logintxt" name="txtOtBrdUniv" size="10" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rw['boarduniv'];?>"></td>
                            <td><input type="text" class="logintxt" name="txtOtYr" size="6" maxlength="4" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rw['yearofpassing'];?>"></td>
                            <td><input type="text" class="logintxt" name="txtOtSbj" size="24" onblur="blurStr(this)" onfocus="focusStr(this)" value="<?PHP echo $rw['subjects'];?>"></td>
                            <td align="right"><input type="text" class="logintxt" name="txtOtMrks" size="5" maxlength="10" onblur="blurNum(this)" onfocus="focusNum(this)" value="<?PHP echo $rw['marksobt'];?>"></td>
                        </tr>
                        <?PHP }else{ ?>
                        <tr align="left">
                            <td>Other </td>
                            <td><input type="text" class="logintxt" name="txtOtInst" size="26" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="logintxt" name="txtOtBrdUniv" size="10" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="logintxt" name="txtOtYr" size="6" maxlength="4" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td><input type="text" class="logintxt" name="txtOtSbj" size="24" onblur="blurStr(this)" onfocus="focusStr(this)" value="-x-"></td>
                            <td align="right"><input type="text" class="logintxt" name="txtOtMrks" value="0" size="5" maxlength="10" onblur="blurNum(this)" onfocus="focusNum(this)"></td>
                        </tr>
                        <?PHP } ?>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="tdStyle" height="20" valign="bottom" align="left">
                    <table border="0" cellpadding="0" cellspacing="0" width="680">
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
											<?PHP
												$qryAE = "";
												$qryAE="SELECT * FROM exam_attended where studID='" . $regno . "'";
												$rsltAE = mysql_query($qryAE) or die(mysql_error());
											?>	
											<?PHP if(mysql_num_rows($rsltAE) > 0){ ?>
											<?PHP $rw = mysql_fetch_array($rsltAE) or die(mysql_error());?>
                                            <tr align='left'>
                                                <td><input type='text' name='txtExam' size='16' value='<?PHP echo $rw['exam']; ?>' onblur='blurStr(this)' onfocus='focusStr(this)' /></td>
                                                <td><input type='text' name='txtRoll' size='20' value='<?PHP echo $rw['rollno']; ?>' onblur='blurStr(this)' onfocus='focusStr(this)' /></td>
                                                <td><input type='text' name='txtScore' size='10' value='<?PHP echo $rw['score']; ?>' onblur='blurStr(this)' onfocus='focusStr(this)' /></td>
                                                <td><input type='text' name='txtMonth' size='10' value='<?PHP echo $rw['month']; ?>' onblur='blurStr(this)' onfocus='focusStr(this)' /></td>
                                                <td><input type='text' name='txtYear' size='10' value='<?PHP echo $rw['year']; ?>' onblur='blurStr(this)' onfocus='focusStr(this)' /></td>
                                                <td><input type='text' name='txtStRank' size='10' value='<?PHP echo $rw['staterank']; ?>' onblur='blurStr(this)' onfocus='focusStr(this)' /></td>
                                                <td><input type='text' name='txtAIRank' size='10' value='<?PHP echo $rw['allindiarank']; ?>' onblur='blurStr(this)' onfocus='focusStr(this)' /></td>
                                                <td><input type='text' name='txtRank' size='10' value='<?PHP echo $rw['rank']; ?>' onblur='blurStr(this)' onfocus='focusStr(this)' /></td>
                                            </tr>
                                            <?PHP }else{ ?>
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
                                            <?PHP } ?>
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
            	<td colspan="3" align="right" bgcolor="#f0f0f0">
                	<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="690">
                    	<tr>
                        	<td width="640" align="left">
                            	<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="600">
                                    <tr align="left">
                                        <td width="110"><font color="#FF0000"><b>Loan Required?</b></font></td>
                                        <td width="490">
                                        	<table border="0" cellpadding="0" cellspacing="0">
                                            	<?PHP if($rowPrsnl['loan'] == "YES"){ ?>
                                            	<tr align="left">
                                                	<td width="70"><input type="radio" value="YES" name="optLoan" checked="checked" />YES</td>
                                                    <td width="70"><input type="radio" value="NO" name="optLoan"  />NO</td>
                                                </tr> 
                                                <?PHP }else{ ?>
                                                <tr align="left">
                                                	<td width="70"><input type="radio" value="YES" name="optLoan" />YES</td>
                                                    <td width="70"><input type="radio" value="NO" name="optLoan" checked="checked" />NO</td>
                                                </tr>
                                                <?PHP } ?> 
                                            </table>  
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td align="right" width="50"><input type="button" value="Update" onclick="validateEditRegForm()" style="color:#000; font-weight:bold"/></td>
                        </tr>
                    </table>
                </td>
            </tr>
            </form>
        </table>
<?PHP
	}else{
		echo "<h3><font color='#900000'>No Data found !!!<br><h2>Invalid Registration No - <font color='#ff0000'>" . $regno . "</font>.</h2></font></h3>";
	}
?>