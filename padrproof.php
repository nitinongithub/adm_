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
                        	<td class="txtHead">Print Address Proof</td>
                            <td align="right"></td>
                		</tr>
                	</table>
                </td>
            </tr>
            <tr> 
            	<td height="20" colspan="3"></td>
            </tr>
            <script type="text/javascript">
				function validAddressProof(){
					if(document.frmAddressProof.txtregno.value == ""){
						alert("Please fill registration no. first.");
					}else{
						document.frmAddressProof.submit();
					}
				}
			</script>
            <tr>
            	<td colspan="3" height="25" align="left" valign="bottom">
                	<table border="0" cellpadding="0" cellspacing="0">
                    	<form name="frmAddressProof" method="post" action="printAddressProof.php" target="_blank">
                    	<tr>
                        	<td class="txtContent">
                                 <table border="0" cellpadding="0" cellspacing="0" class="txtCntn">
                                    <tr>
                                        <td class="txtAmt" valign="middle">Registration No</td>
                                        <td width="1">&nbsp;</td>
                                        <td width="1" bgcolor="#333333"></td>
                                        <td width="1"></td>
                                        <td align="right"><input type="text" id="txtregno" name="txtregno" class="txtAmt" /></td>
                                        <td><input type="button" value="Print Address Proof" class="txtAmt" onClick="validAddressProof();"/></td>
                                    </tr>
                                </table>                                
                            </td>
                		</tr>
                        </form>
                	</table>
                </td>
            </tr>
</table>
