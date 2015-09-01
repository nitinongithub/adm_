<?php
		//session_start();
		require("dbconnect.php");
		
		$totalreg=0;
		$totaladmission=0;
		
		$d1=date('d/m/Y');
		$d2=date('d/m/Y');
		
		$qry="SELECT * FROM viewbycollege";
		$result = mysql_query($qry) or die(mysql_error());
		
	?>
    <div style="float:left; width:auto; border:#02a6c3 solid 1px; padding:2px 2px 2px 2px">
        <table border="0" cellpadding="0" cellspacing="0" style="font-size:10px; font-family:Arial, Helvetica, sans-serif" align="center" width="120">
            <tr>
            	<td colspan="3">
                	<div style="background:#02a6c3; color:#FFFFFF; font-weight:bold; width:auto; text-align:center; padding:1px 0px 1px 0px">ADMISSION<br />TODAY'S ACTIVITY</div>
                </td>
            </tr>
            <tr>
            	<td colspan="3" height="2"></td>
            </tr>
            <tr>
            	<td colspan="3" height="1" bgcolor="#02a6c3"></td>
            </tr>
        	<tr bgcolor="#D8FEF3">
            	<th align="left" width="64">Course</th>
                <th width="1" bgcolor="#02a6c3"></th>
                <th align="center" width="65">Admission</th>
            </tr>
            <tr>
            	<td colspan="3" height="1" bgcolor="#02a6c3"></td>
            </tr>
        <?php
		if(mysql_num_rows($result) >0){
			while($row = mysql_fetch_array($result)){
				?>
					<?php                       
						$qry2="SELECT * FROM admission where courseID='" . $row['courseID'] . "'and str_to_date(admissiondate,'%d/%m/%Y') BETWEEN str_to_date('" . $d1 ."','%d/%m/%Y') AND str_to_date('". $d2 . "','%d/%m/%Y')" ;
						
						$result2 = mysql_query($qry2) or die(mysql_error());
						$countadmission=mysql_num_rows($result2);
						//$totaladmission=$totaladmission+$countadmission;
                    ?>
                    <?php
                    if($countadmission>0)
                    { ?> 
                    <tr valign="top" align="left" onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#ffffff';">              
                    	<td>&nbsp;<?PHP echo $row['courseID'];?></td>
                        <td width="1" bgcolor="#02a6c3"></td>
						<td align="right"><?PHP echo $countadmission;?>&nbsp;&nbsp;</td>
                        </tr>
                    <tr>
                        <td colspan="3" height="2"></td>
                    </tr>
                    <?php } ?>
					<?php
						
						
						$result2 = mysql_query($qry2) or die(mysql_error());
						$countadmission=mysql_num_rows($result2);
						$totaladmission=$totaladmission+$countadmission;
			}
			
		}	
	?>
     <tr>
        <td height="1" bgcolor="#900000" colspan="5"></td>
     </tr>
     <tr style="color:#F00; background:#FF0">
     	<td align="left"><b>&nbsp;Total</b></td>
        <td width="1" bgcolor="#02a6c3"></td>
     	<td align="right"><b><?PHP echo $totaladmission;?>&nbsp;&nbsp;</td>
      </tr>
     <tr>
        <td height="1" bgcolor="#900000" colspan="5"></td>
     </tr>
     </table>
    </div>
     
     
     
     
     
     
