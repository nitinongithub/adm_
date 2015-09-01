	<?php
		session_start();
		
		$totalfee = 0;
		$regFee = 0;
		$AdmFee = 0;
		$d1=$_POST["startdt"];
		$d2=$_POST["enddt"];
				
		require("dbconnect.php");
		$qry="SELECT sum(Amount) FROM fee where feetype='Registration' and str_to_date(date,'%d/%m/%Y') BETWEEN str_to_date('" . $d1 ."','%d/%m/%Y') AND str_to_date('". $d2 . "','%d/%m/%Y')";
		 
		$result = mysql_query($qry) or die(mysql_error());
		
		if(mysql_num_rows($result) >0){
			$row = mysql_fetch_array($result);
			if ($row['sum(Amount)']==0){
				//echo "No Registration Fee Submitteted<br>";
				echo "<font color=#ff0000><b>No Data found between the given dates.</b></font><br>";
			}
			else{
				$regFee =  $row['sum(Amount)'];	
				$totalfee = $totalfee + $regFee;
					
				$qry1="SELECT sum(Amount) FROM fee where feetype='Admission' and str_to_date(date,'%d/%m/%Y') BETWEEN str_to_date('" . $d1 ."','%d/%m/%Y') AND str_to_date('". $d2 . "','%d/%m/%Y')";
				$result1 = mysql_query($qry1) or die(mysql_error());
				
				if(mysql_num_rows($result1) >0){
					$row1 = mysql_fetch_array($result1);
					$AdmFee =  $row1['sum(Amount)'];
					$totalfee = $totalfee + $AdmFee;
?>
	
                <table border="0" cellpadding="0" cellspacing="0" width="500">
                    <tr>
                    	<td colspan="3" height="20"></td>
                    </tr>
                    <tr height="25" bgcolor="#f0f0f0">
                    	<td width="25" class="rptItems"></td>
                        <td class="rptItems" width="150">Registration Fee</td>
                        <td class="rptItems" width="150">Admission Fee</td>
                        <td class="rptItems" width="150">Total Fee</td>
                        <td width="25" class="rptItems"></td>
                    </tr>
                    <tr class="rptContent" height="22">
                    	<td></td>
                        <td><?PHP echo $regFee;?></td>
                        <td><?PHP echo $AdmFee;?></td>
                        <td><?PHP echo $totalfee?></td>
                        <td></td>
                    </tr>
                    <tr>
                    	<td class="tdStyle" height="1" bgcolor="#f0f0f0" colspan="5"></td>
                    </tr>
                </table>
<?PHP }}}?>