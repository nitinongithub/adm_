<?PHP $_SESSION['PR'] = "printReceipt"; ?>

<table border="0" cellpadding="0" cellspacing="0" width="690">
        	<tr>
            	<td colspan="3" height="25" align="left" valign="bottom">
                	<table border="0" cellpadding="0" cellspacing="0" width="690">
                    	<tr>
                        	<td class="txtHead">Certification Course Registration</td>
                            <td align="right"></td>
                		</tr>
                	</table>
                </td>
            </tr>
            <tr> 
            	<td height="10" colspan="3"></td>
            </tr>
            <tr>
            	<td colspan="3" height="25" align="left" valign="bottom">
                	<table border="0" cellpadding="0" cellspacing="0" width="690">
                    	<form method="post">
                    	<tr>
                        	<td class="txtContent">
                                 <table border="0" cellpadding="0" cellspacing="0" class="txtCntn">
                                    <tr>
                                        <td class="txtAmt" valign="middle">Old registration no.</td>
                                        <td width="1">&nbsp;</td>
                                        <td width="1" bgcolor="#333333"></td>
                                        <td width="1"></td>
                                        <td align="right"><input type="text" id="txtregno" name="txtregno" class="txtAmt" /></td>
                                        <td><input type="button" value=" Go " class="txtAmt" onclick="sendRequest('retrieveoldreg.php')"/></td>
                                    </tr>
                                </table>                                
                            </td>
                		</tr>
                        </form>
                	</table>
                </td>
            </tr>
</table>
