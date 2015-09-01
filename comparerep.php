<table border="0" cellpadding="0" cellspacing="0" width="700" align="center">
            <tr>
                <td colspan="3" height="25" align="center" valign="bottom">
                    <table border="0" cellpadding="0" cellspacing="0" width="500">
                        <tr>
                            <td class="txtHead"><h3>Comparative Registration and Admission Status</h3></td>
                            <td align="right"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr> 
            	<td height="30" colspan="3"></td>
            </tr>
            <form name="feerpt" method="post" action="compare.php">
            <tr>
            	<td colspan="3" height="25" align="center" valign="bottom">
                    <table border="0" width="500" cellpadding="0" cellspacing="0">
                    	<tr>
                        	<td colspan="2" height="1" bgcolor="#0099CC"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" height="5"></td>
                        </tr>
                        <tr align="left">
                            <td class="txtContent">Start Date</td>
                            <td class="txtContent">End Date</td>
                        </tr>
                        <tr align="left">
                            <td><input type="text" name="startdt" id="date1"  value="<?PHP echo "01/04/2011"; ?>" size="20" tabindex="1" /><span class="frmt">(dd/mm/yyyy)</span></td>
                            <td><input type="text" name="enddt" id="date2" value="<?PHP echo date('d/m/Y');?>" size="20" tabindex="2" /><span class="frmt">(dd/mm/yyyy)</span></td>
                        </tr>
                        <tr>
                        	<td colspan="2" height="5"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" height="1" bgcolor="#0099CC"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" height="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right"><input type="submit" value="Display Comparision Report"  /></td>
                        </tr>
                        <tr>
                        	<td colspan="2" height="2"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" height="1" bgcolor="#0099CC"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" height="15"></td>
                        </tr>
                    </table>
                </td>
            </tr>
			</form>
        </table>	

