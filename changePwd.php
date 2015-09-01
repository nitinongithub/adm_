<br />
<center>
<?PHP
	session_start();

	include("dbconnect.php");
?>
<table border="0" cellpadding="0" cellspacing="0" height="100"><tr><td></td></tr></table>

<table border="0" cellpadding="0" cellspacing="0" width="260">
		<tr>
        	<td colspan="2" align="left" class="tdStyle"><b>Change Password</b></td>
        </tr>
        <tr>
        	<td colspan="2" height="5"></td>
        </tr>
    <form name="frmChngPwd">
        <tr>
            <td align="left">Old pwd</td>
            <td align="right"><input type="password" name="txtPwdOld" id="txtPwdOld" size="30" /></td>
        </tr>
        <tr>
        	<td colspan="2" height="3"></td>
        </tr>
        <tr>
            <td align="left">New pwd</td>
            <td align="right"><input type="password" name="txtPwdNew1" id="txtPwdNew1" size="30" /></td>
        </tr>
        <tr>
        	<td colspan="2" height="3"></td>
        </tr>
        <tr>
            <td align="left">Confirm pwd</td>
            <td align="right"><input type="password" name="txtPwdNew2" id="txtPwdNew2" size="30" /></td>
        </tr>
        <tr>
        	<td colspan="2" height="5"></td>
        </tr>
        <tr>
        	<td colspan="2" bgcolor="02a6c3" height="1"></td>
        </tr>
        <tr>
        	<td colspan="2" height="3"></td>
        </tr>
        <tr>
            <td colspan="2" align="right"><input type="button" value="change" style="color:#000" onclick="matchPwds('chngPwd.php?i=2')"/></td>
        </tr>
		<tr>
        	<td height="2" colspan="2"></td>
        </tr>
        <tr>
        	<td colspan="2" bgcolor="02a6c3" height="1"></td>
        </tr>
        <tr>
        	<td align="right" colspan="2"><font face="Arial, Helvetica, sans-serif" color="#FF0000" size="1">*At least 6 characters are compulsory</font></td>
        </tr>
        </form>
        <?PHP if($_SESSION['usrnm'] == 'admin'){?>
        <?PHP
			$QryAll = "select * from login";
			$rsltAll = mysql_query($QryAll) or die(mysql_error());
		?>
        	<form name="frmReset">
            <tr>
        	<td height="10" colspan="2"></td>
        </tr>
            <tr>
        	<td colspan="2" bgcolor="02a6c3" height="1"></td>
        </tr>
        	<tr>
            	<td colspan="2" align="right">
                	<select name="smbLogin" id="smbLogin">
                    <option value="Select...">Select</option>
                    <?PHP while($row = mysql_fetch_array($rsltAll)){?>
                    	<?PHP if($row['username'] != "admin"){?>
						<option value="<?PHP echo $row['username'];?>"><?PHP echo $row['username'];?></option>
                        <?PHP }?>
					<?PHP }?>
                    
                    </select>
                    <input type="button" value="Reset"  style="color:#000" onclick="resetPwd('chngPwd.php?i=1')"/>
                </td>
            </tr>
        <?PHP }?>
        	</form>
</table>
</center>