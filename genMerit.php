<?PHP //$_SESSION['PR'] = "printReceipt"; ?>
<?PHP
	require("dbconnect.php");
	
	$QryClg = "select * from college order by priority"; 
	$rsltClg = mysql_query($QryClg) or die(mysql_error());  
	
?> 
<table border="0" cellpadding="0" cellspacing="0" width="690">
			
        	<tr>
            	<td colspan="3" height="25" align="left" valign="bottom">
                	<table border="0" cellpadding="0" cellspacing="0" width="690">
                    	<tr>
                        	<td class="txtHead">Generate Merit List</td>
                            <td align="right"></td>
                		</tr>
                	</table>
                </td>
            </tr>
            <tr> 
            	<td height="20" colspan="3"></td>
            </tr>
            <tr>
            	<td colspan="3" height="25" align="left" valign="bottom">
                	<table border="0" cellpadding="0" cellspacing="0">
                    	<form name="frmMeritGen" method="post" action="generate.php" target="_blank">
                    	<tr>
                        	<td class="txtContent">
                                 <table border="0" cellpadding="0" cellspacing="0" class="txtCntn">
                                    <tr>
                                        <td class="txtAmt" valign="middle">Choose Course</td>
                                        <td width="1">&nbsp;</td>
                                        <td width="1" bgcolor="#333333"></td>
                                        <td width="1"></td>
                                        <td align="right">
                                        	<select name="crsid" id="crsid" class="txtAmt" style="width:200px">
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
                                        <td><input type="button" value="Generate" class="txtAmt" onclick="validateCrs();"/></td>
                                    </tr>
                                </table>                                
                            </td>
                		</tr>
                        </form>
                	</table>
                </td>
            </tr>
</table>
