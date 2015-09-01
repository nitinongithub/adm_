	<?PHP if(isset($_SESSION['regIDji'])){ ?>
  	<script type="text/javascript">
  		call sendRequest('uploaddocsinner.php');
  	</script>
  <?php }?>
        <table border="0" cellpadding="0" cellspacing="0" width="690">
        	<tr>
            	<td height="25" align="left" valign="bottom">
                	<table border="0" cellpadding="0" cellspacing="0" width="690">
                    	<tr>
                        	<td class="txtHead">Upload Documents</td>
                		</tr>
                	</table>
                </td>
            </tr>
            <tr> 
            	<td height="10"></td>
            </tr>
            <tr>
            	<td height="25" align="left" valign="bottom">
                	<table border="0" cellpadding="0" cellspacing="0" width="690">
                    	<form method="post">
                    	<tr>
                        	<td class="txtContent">
                                 <table border="0" cellpadding="0" cellspacing="0" class="txtCntn">
                                    <tr>
                                        <td class="txtAmt" valign="middle">Registration No</td>
                                        <td width="1">&nbsp;</td>
                                        <td width="1" bgcolor="#333333"></td>
                                        <td width="1"></td>
                                        <td align="right"><input type="text" id="txtregno" name="txtregno" class="txtAmt" value="<?php if(isset($_SESSION['regIDji'])) echo $_SESSION['regIDji'];?>" /></td>
                                        <td><input type="button" value=" Go " class="txtAmt" onclick="sendRequest('uploaddocsinner.php')"/></td>
                                    </tr>
                                </table>                                
                            </td>
                		</tr>
                        </form>
                	</table>
                </td>
            </tr>
		</table>
            