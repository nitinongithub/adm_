<?PHP
	session_start();
	require("dbconnect.php");
	
	$_SESSION['regIDji'] = $_POST['txtregno'];
	
	$QryChkLst = "select * from checkList order by chkLstID"; 
	$rsltChkLst = mysql_query($QryChkLst) or die(mysql_error());  
	
	$qry="SELECT * FROM stud_personal where id='" . $_SESSION['regIDji'] . "'";
	$result = mysql_query($qry) or die(mysql_error());
?> 
	<form name="frmReg" action="cList.php" method="post" enctype="multipart/form-data">
            <table border="0" cellpadding="0" cellspacing="0" width="690">
            <tr> 
            	<td height="1" colspan="3"></td>
            </tr>
            <tr>
                <td valign="top">
                	<?PHP if(mysql_num_rows($result) > 0){?>
                    <table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="300">
                        <tr>
                            <td colspan="2">
                            	<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="300">
                                	<td class="tdStyle" height="25" valign="bottom" align="left"><span style="font-weight:bold; color:#69F;">Check List</span></td>
                                    <td class="tdStyle" valign="middle" align="right">
                                    	<a href="#" onclick="checkUnCheck(1)"><span style="color:#F00; font-size:10px"><img src="image/checkAll.jpg" border="0" /></span></a>
                                        <a href="#" onclick="checkUnCheck(0)"><span style="color:#F00; font-size:10px"><img src="image/UnCheckAll.jpg" border="0" /></span></a>
                                    </td>
                                </table>
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="2" height="5"></td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                                	<?PHP while($rowCL = mysql_fetch_array($rsltChkLst)){?>
                                    <?PHP
										$QrySChkLst = "select ID, chkListID, status from studentchklist where regID=" . $_SESSION['regIDji'] . " AND chkListID=" . $rowCL['chkLstID'];
										//echo $QrySChkLst . "<br>";
										$rsltSChkLst = mysql_query($QrySChkLst) or die(mysql_error());
										
										if(mysql_num_rows($rsltSChkLst) > 0){
											$rowSCL = mysql_fetch_array($rsltSChkLst);
											$checked = ($rowSCL['status'] == 'T')? " checked ": " " ;
										}else{$checked = " ";}
										//echo "->" . $checked . " - " . $rowSCL['ID'] . "<br>";
									?>
                                    <tr>
                                    	<td valign="middle" align="left"><input type="checkbox" name="chkLST[]" id="chkLST[]" value="<?PHP echo $rowSCL['ID'];?>"<?PHP echo $checked;?>/></td>
                                        <td valign="middle" align="left"><?PHP echo $rowCL['checkList'];?></td>
                                    </tr>
                                    <?PHP }?>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <?PHP }else{?>
                    <table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="300">
                        <tr>
                            <td class="tdStyle" height="25" valign="bottom" align="left"><span style="font-weight:bold; color:#69F;">Check List</span></td>
                        </tr>
                        <tr>
                            <td height="5"></td>
                        </tr>
                        <tr>
                            <td align="left">No Check List...</td>
                        </tr>
                    </table>
                    <?PHP }?>
                </td>
                <td width="10"></td>
                <td valign="top" align="right">
                	<?PHP include("PrintPersonalDetailForDocCheck.php");?>
                </td>
            </tr>
            <tr>
            	<td height="1" colspan="3"></td>
            </tr>
            <?PHP if(mysql_num_rows($result) > 0){?>
            <tr bgcolor="#f0f0f0">
            	<td align="right" width="50" colspan="3"><input type="submit" value="Update" /></td>
            </tr>
            <?PHP }?>
        </table>
	</form>