<script type="text/javascript" src="scripts/sorttable.js"></script>	
	<?php
		session_start();

		require("dbconnect.php");
		$totalreg=0;
		$totaladmission=0;
		
		
		$d1=$_POST["startdt"];
		$d2=$_POST["enddt"];
		
		$qry="SELECT * FROM course order by courseID";
		$result = mysql_query($qry) or die(mysql_error());
		
		$dt=date('d/m/Y');
		
		$r1=0;
		$r2=0;
		$a1=0;
		$a2=0;
		
		
		
		//list($day,$month,$year) = split('[/.-]', $d2);
		//echo "Month: $month; Day: $day; Year: $year<br />\n";		
		
		$list = explode("/", $d2);
		
			
		$od2=date($list[0]."/".$list[1]."/2010");
			
?>

 <table border="1" cellpadding="2" cellspacing="0" width="630"  align="center"  >
 <tr>
 <td align="center" valign="middle" bgcolor="#9999FF"><H3>COMPARATIVE REPORT</H3></td>
 </tr>
 </table>

 <table border="0" cellpadding="2" cellspacing="0" width="600" align="center" >
	
    <tr>
    	<td align="right"  bgcolor="#9999FF"><?PHP echo $d2;?></td>
        <td align="right" bgcolor="#9999FF"><?php echo $od2;?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
           
                
    </tr>
    <tr><td>

        <table border="1" cellpadding="2" cellspacing="0" width="420" class="sortable">
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
                <tr valign="top" align="left" class="rptContent" >
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
     	<td align="right" class="total"><b><?PHP echo $totalreg;?></b>&nbsp;&nbsp;&nbsp;</td>
        <td align="right" class="total"><b><?PHP echo $totaladmission;?></b>&nbsp;&nbsp;&nbsp;</td>
     </tr>
     <tr>
        <td class="tdStyle" height="1" bgcolor="#f0f0f0" colspan="5"></td>
     </tr>
     </table>
     
     </td>
     <td valign="top">
     		
            <?php
				//$qry="SELECT * FROM prevdataregadmission where str_to_date(dateRA,'%d/%m/%Y')= str_to_date('". $d2 . "','%d/%m/%Y')" . " order by courseID";
				$qry="SELECT * FROM prevdataregadmission where dateRA = '". $od2 ."' order by courseID";
				$result = mysql_query($qry) or die(mysql_error());
				
            ?>
            
     		<table border="1" cellpadding="2" cellspacing="0" width="200">
            <tr>
            	<td height="5" colspan="3"></td>
            </tr>
        	<tr align="left" height="25" bgcolor="#f0f0f0">
            	
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
                
                	<tr>
            			<td align="right"><?php echo $row['noOfReg'];?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><?php echo $row['noOfAdm'];?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        
            		</tr>
                     <tr>
                	<td colspan="3" height="10"></td>
                </tr>
                    
                    <?php 
						$r1=$r1+ $row['noOfReg'];
						$a1=$a1+ $row['noOfAdm'];
					}} ?>
           
           
          
      <tr bgcolor="#FFFF00" height="25">
     	
     	<td align="right" class="total"><b><?PHP echo $r1;?></b>&nbsp;&nbsp;&nbsp;</td>
        <td align="right" class="total"><b><?PHP echo $a1;?></b>&nbsp;&nbsp;&nbsp;</td>
     </tr>
     <tr>
        <td class="tdStyle" height="1" bgcolor="#f0f0f0" colspan="5"></td>
     </tr>
           
           
           
            </table>
     
     </td>
     
     </tr>
     </table>