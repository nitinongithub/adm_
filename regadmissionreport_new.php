<script type="text/javascript" src="scripts/sorttable.js"></script>	
	<?php
		session_start();
		require("dbconnect.php");
		$totalreg=0;
		$totaladmission=0;
		
		
		$d1=$_POST["startdt"];
		$d2=$_POST["enddt"];
		
		$qry="SELECT * FROM viewbycollege where SORTCRS = 0 and DELCRS = 'n'";
		$result = mysql_query($qry) or die(mysql_error());
		
		?>

        <table border="0" cellpadding="2" cellspacing="0" width="500" class="sortable">
            <tr>
            	<td height="5" colspan="3"></td>
            </tr>
        	<tr align="left" height="25" bgcolor="#f0f0f0">
            	<th class="rptItems" align="left">&nbsp;Course</th>
                <th align="right" class="rptItems">Registration</th>
                <th align="right" class="rptItems">Admission&nbsp;&nbsp;</th> 
            </tr>
            <tr>
            	<td colspan="3" height="5"></td>
            </tr>
        <?php
		if(mysql_num_rows($result) >0){
			while($row = mysql_fetch_array($result)){
				?>
                <tr valign="top" align="left" class="rptContent" onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#ffffff';">
                	<td>&nbsp;<?PHP echo $row['courseID'];?></td>
					<?php
                        //$qry1="SELECT * FROM stud_personal where courseID='" . $row['courseID'] . "'" ;
                        
						$qry1="SELECT * FROM stud_personal where courseID='" . $row['courseID'] . "' and str_to_date(regDate,'%d/%m/%Y') BETWEEN str_to_date('" . $d1 ."','%d/%m/%Y') AND str_to_date('". $d2 . "','%d/%m/%Y')" ;
						
						
                        $result1 = mysql_query($qry1) or die(mysql_error());
                        $countreg=mysql_num_rows($result1);
                        $totalreg=$totalreg+$countreg;
                    ?>
					<td align="right"><?PHP echo $countreg;?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<?php
						$qry2="SELECT * FROM admission where courseID='" . $row['courseID'] . "'and str_to_date(admissiondate,'%d/%m/%Y') BETWEEN str_to_date('" . $d1 ."','%d/%m/%Y') AND str_to_date('". $d2 . "','%d/%m/%Y')" ;
						
						$result2 = mysql_query($qry2) or die(mysql_error());
						$countadmission=mysql_num_rows($result2);
						$totaladmission=$totaladmission+$countadmission;
                    ?>
					<td align="right"><?PHP echo $countadmission;?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="3" height="10"></td>
                </tr>
				<?php
			}
			
		}	
	?>

<?PHP
	$qry="SELECT * FROM viewbycollege where SORTCRS = 9 and DELCRS = 'n'";
		$result = mysql_query($qry) or die(mysql_error());
?>
<?php
		if(mysql_num_rows($result) >0){
			while($row = mysql_fetch_array($result)){
				?>
                <tr valign="top" align="left" class="rptContent" onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#ffffff';">
                	<td>&nbsp;<?PHP echo $row['courseID'];?></td>
					<?php
                        //$qry1="SELECT * FROM stud_personal where courseID='" . $row['courseID'] . "'" ;
                        
						$qry1="SELECT * FROM stud_personal where courseID='" . $row['courseID'] . "' and str_to_date(regDate,'%d/%m/%Y') BETWEEN str_to_date('" . $d1 ."','%d/%m/%Y') AND str_to_date('". $d2 . "','%d/%m/%Y')" ;
						
						
                        $result1 = mysql_query($qry1) or die(mysql_error());
                        $countreg=mysql_num_rows($result1);
                        $totalreg=$totalreg+$countreg;
                    ?>
					<td align="right"><?PHP echo $countreg;?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<?php
						$qry2="SELECT * FROM admission where courseID='" . $row['courseID'] . "'and str_to_date(admissiondate,'%d/%m/%Y') BETWEEN str_to_date('" . $d1 ."','%d/%m/%Y') AND str_to_date('". $d2 . "','%d/%m/%Y')" ;
						
						$result2 = mysql_query($qry2) or die(mysql_error());
						$countadmission=mysql_num_rows($result2);
						$totaladmission=$totaladmission+$countadmission;
                    ?>
					<td align="right"><?PHP echo $countadmission;?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="3" height="10"></td>
                </tr>
				<?php
			}
			
		}	
	?>
     <tr>
        <td class="tdStyle" height="1" bgcolor="#f0f0f0" colspan="5"></td>
     </tr>
     <tr bgcolor="#FFFF00" height="25">
     	<td class="total" align="left"><b>&nbsp;Total</b></td>
     	<td align="right" class="total"><b><?PHP echo $totalreg;?>&nbsp;&nbsp;&nbsp;</td>
        <td align="right" class="total"><b><?PHP echo $totaladmission;?>&nbsp;&nbsp;&nbsp;</td>
     </tr>
     <tr>
        <td class="tdStyle" height="1" bgcolor="#f0f0f0" colspan="5"></td>
     </tr>
     </table>