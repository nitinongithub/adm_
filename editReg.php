
<link rel="stylesheet" href="dtheme/cascade.css" type="text/css"  media="screen" />
<style type="text/css">
input, textarea, select { 
	font-family : "Trebuchet MS", "Lucida Grande", "Bitstream Vera Sans", Arial, Helvetica, sans-serif;
	font-size:11px;
	border : 1; 
	margin : 2px; 
	padding : 2 2px; 
	color : #00F; 
}
</style>

<table border="0" cellpadding="0" cellspacing="0" width="690">
        	<tr>
            	<td colspan="3" height="25" align="left" valign="bottom">
                	<table border="0" cellpadding="0" cellspacing="0" width="690">
                    	<tr>
                        	<td class="txtHead">Edit Registration Detail</td>
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
                    	<form name="frmEditReg" method="post" action="editpthwy.php" target="_parent">
                    	<tr>
                        	<td class="txtContent">
                                 <table border="0" cellpadding="0" cellspacing="0" class="txtCntn">
                                    <tr>
                                        <td class="txtAmt" valign="middle">Registration No</td>
                                        <td width="1">&nbsp;</td>
                                        <td width="1" bgcolor="#333333"></td>
                                        <td width="1"></td>
                                        <td align="right"><input type="text" id="txtregno" name="txtregno" class="txtAmt" /></td>
                                        <td><input type="button" value=" Go " class="txtAmt" onclick="validateEditReg()"/></td>
                                    </tr>
                                </table>                                
                            </td>
                		</tr>
                        </form>
                	</table>
                </td>
            </tr>
</table>
