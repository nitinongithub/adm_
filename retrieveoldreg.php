<?PHP
	ob_start();
	
	header("Cache-control: private, no-cache");
	header("Pragma: no-cache");
	
	session_start();
	require("dbconnect.php");
	
	/*Registration No. Generation [This code is not for this page]
	
	
	if old registration exists then
		1). copy all old data in new row for new registration 
		2). $QryForID = "update id_ji set ID=" . $NewID . " where ID=" . $prevID;
		    $rsltForIDJi = mysql_query($QryForID) or die(mysql_error());
	else
		Not registered yet
	end if
	//------------------------------------------------------------*/
	
	$Qry = "select ID, name, gender, mname, fname, dob, mob, yob, image from stud_personal where ID = '" . $_POST['txtregno'] . "'";
	$result = mysql_query($Qry) or die(mysql_error());
	
	$QryClg = "select * from college order by priority"; 
	$rsltClg = mysql_query($QryClg) or die(mysql_error());
	
	if(mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
?>
	<table border="0" cellpadding="0" cellspacing="0" class="txtCntn" align="left">
    <tr>
    <td width="10" bgcolor="#ffffff"></td>
    <td valign="top" bgcolor="#D8FEF3" width="300">
    	<table border="0" cellpadding="0" cellspacing="0" class="txtCntn" align="left">
        <form name="frmIICrsReg" method="post" action="newcrsregister.php"><input type="hidden" name="txtHdn" id="txtHdn" value="<?PHP echo $row['ID'];?>" />
        	<tr>
            	<td colspan="2" bgcolor="#006699" style="color:#FFF; font-weight:bold; width:300px; height:20px; padding:0px 0px 0px 3px">Registration for Certification</td>
            </tr>
            <tr>
            	<td colspan="2" height="5"></td>
            </tr>
            <tr>
            	<td style="padding:0px 0px 0px 3px">Choose Course</td>
                <td align="right">
                	<select name="chooseCourse" id="chooseCourse" class="combSingle" onchange="fillCourseToDisplay()" style="width:170px">
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
                    &nbsp;
                </td>
            </tr>
            <tr>
            	<td height="10" colspan="2"></td>
            </tr>
            <tr>
            	<td colspan="2" align="right"><div id="registerButton"><input type="button" value="Register" class="txtAmt" style="color:#006699" onClick="sendRequestNewCrsRegister('newcrsregister.php')" /></div>&nbsp;&nbsp;</td>
            </tr>
        </form>
        	<tr>
            	<td height="5" colspan="2"></td>
            </tr>
            <tr>
            	<td height="1" bgcolor="#666666" colspan="2"></td>
            </tr>
            <tr>
            	<td height="5" colspan="2"></td>
            </tr>
            <tr>
            	<td colspan="2">
                	<div id="newCrsReg" style="font:Verdana, Geneva, sans-serif; color:#CC0000; font-size:20px; text-align:center"></div>
                </td>
            </tr>
        </table>
    </td>
    <td width="5" bgcolor="#ffffff"></td>
    <td width="1" bgcolor="#666666"></td>
    <td width="5" bgcolor="#ffffff"></td>
    <td align="right">
        <table border="0" cellpadding="0" cellspacing="0" class="txtCntn" align="right">
                                <tr valign="top">
                                    <td class="tdStyle" colspan="3"><span style="font-weight:bold; color:#69F;">Personal Detail</span></td>
                                </tr>
                                <tr>
                                    <td colspan="3" height="3"></td>
                                </tr>
                                <tr valign="top">
                                    <td width="150" class="btmBase"><font color="#FF0000">Old registration no.</font></td>
                                    <td width="120"><b><font color="#0000FF"><?PHP echo $row['ID'];?></font></b></td>
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
                        </table>
    </td>
    </tr>
    </table>
<?PHP
	}else{
		echo "Not registered yet.";
	}
?>