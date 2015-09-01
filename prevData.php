<?php
	require("dbconnect.php");
	
	$qry="SELECT * FROM viewbycollege order by collegeID";
	$result = mysql_query($qry) or die(mysql_error());
?>
<table border="0" cellpadding="0" cellspacing="0" width="690"><tr><td align="left">
        <table border="0" cellpadding="0" cellspacing="0" width="690">
            <tr>
                <td class="txtHead">Previous Data Entry Form</td>
                <td align="right"><div id="msgJi" class="RegisteredCourse"></div></td>
            </tr>
        </table>
</td></tr>
<tr><td align="center">

		<form name="frmPrevData" method="post" action="prevDataSubmit.php" onsubmit="return validPrevDataDate()">
        <table border="0" cellpadding="0" cellspacing="0" width="400" class="sortable">
            <tr>
            	<td height="15" colspan="3"></td>
            </tr>
            <tr>
            	<td colspan="3" valign="middle" align="left">Date upto: <input type="text" name="startdt" id="date1" size="20" /><span class="frmt">(dd/mm/yyyy)</span></td>
            </tr>
            <tr>
            	<td height="15" colspan="3"></td>
            </tr>
        	<tr align="left" height="25" bgcolor="#FFFFCC">
            	<th class="rptItems" align="left">&nbsp;Course</th>
                <th align="left" class="rptItems">&nbsp;Registration</th>
                <th align="left" class="rptItems">&nbsp;Admission</th> 
            </tr>
            <tr>
            	<td colspan="3" height="2"></td>
            </tr>
            <?PHP $colr = "#f0f0f0"; $flagji = 1;?>
        <?php
		if(mysql_num_rows($result) >0){
			while($row = mysql_fetch_array($result)){
				if($flagji == 1){ $colr = "#f0f0f0"; $flagji = 0;}else{$colr = "#D0D0D0"; $flagji = 1;}
				?>
                <tr valign="middle" align="left" class="rptContent" bgcolor=<?PHP echo $colr;?>>
                	<td>&nbsp;<?PHP echo $row['courseID'];?><input type="hidden" name="crs[]" size="10" value="<?PHP echo $row['courseID'];?>" /></td>
					<td align="left"><input type="text" name="reg[]" id="reg" value="0" onblur="blurNum(this)" onfocus="focusNum(this)" /></td>
					<td align="left"><input type="text" name="admsn[]" id="admsn" value="0" onblur="blurNum(this)" onfocus="focusNum(this)" /></td>
                </tr>
                <tr>
                	<td colspan="3" height="1"></td>
                </tr>
				<?php
			}
			
		}	
	?>
     <tr>
        <td class="tdStyle" height="1" bgcolor="#f0f0f0" colspan="5"></td>
     </tr>
     <tr bgcolor="#FFFF00" height="25">
     	<td class="total" align="right" colspan="3"><input type="submit" value="SUBMIT" /></td>
     </tr>
     <tr>
        <td class="tdStyle" height="1" bgcolor="#f0f0f0" colspan="5"></td>
     </tr>
     </table>
     </form>
     </td></tr>
</table>