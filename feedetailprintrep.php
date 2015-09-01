	
	<?php
		session_start();
		$regcash = 0;
		$regcheque = 0;
		$regdd = 0;
		$regFee = 0;
		$AdmFee = 0;
		$WidFee=0;
		$total=0;
		$d1=$_POST["startdt"];
		$d2=$_POST["enddt"];
		$sn=1;
				
		require("dbconnect.php");
		$qry="SELECT * FROM fee where str_to_date(date,'%d/%m/%Y') BETWEEN str_to_date('" . $d1 ."','%d/%m/%Y') AND str_to_date('". $d2 . "','%d/%m/%Y')";
		 
		$result = mysql_query($qry) or die(mysql_error());
		
		if(mysql_num_rows($result) <1)
		{
							
				echo "<font color=#ff0000><b>No Data found between the given dates.</b></font><br>";
		}
		else
		{
						
				
		?>
				
			<H4>&nbsp;</H4>
			<h2 align="center">FEE REPORT FROM <?PHP echo $d1;?> TO <?PHP echo $d2;?> </h2>
	
                <table border="0" cellpadding="0" cellspacing="0" align="center" width="700">
                    <tr>
                    	<td colspan="3" height="20"></td>
                    </tr>
                    <tr height="25" bgcolor="#f0f0f0">
                    	<td width="25" class="rptItems"></td>
                        <th class="rptItems" width="50">SN</td>
                        <th class="rptItems" width="140">REG NO</td>
                        <th class="rptItems" width="100" align="left">DATE</td>
                        <th class="rptItems" width="110" align="left">FEE HEAD</td>
                        <th class="rptItems" width="100" align="right">AMOUNT</td>
                        <th class="rptItems" width="80">MODE</td>
                        <th class="rptItems" width="250">BANK NAME</td>
                        <th class="rptItems" width="80">NO</td>
                        <th class="rptItems" width="100">DATE</td>
                        <th width="25" class="rptItems"></td>
                    </tr>
                    
                   <?php while($row = mysql_fetch_array($result)){?>
                    <tr class="rptContent" height="22">
                    	<td></td>
                        <td align="center"><?PHP echo $sn;?></td>
                        <td align="center"><?PHP echo $row['regID'];?></td>
                         <td><?PHP echo $row['date'];?></td>
                          <td align="left"><?PHP echo $row['feetype'];?></td>
                           <td align="right"><?PHP echo $row['Amount'];?></td>
                            <td align="center"><?PHP echo $row['feemode'];?></td>
                             <td><?PHP echo $row['bankname'];?></td>
                             <td><?PHP echo $row['ddno'];?></td>
                             <td><?PHP echo $row['dddate'];?></td>
                                                        
                        
                        <td></td>
                    </tr>
                    <tr>
                    	<td class="tdStyle" height="1" bgcolor="#f0f0f0" colspan="10"></td>
                    </tr>
                    
                    <?PHP 
						$sn=$sn+1;
						if($row['feetype']=="Registration")
						{
							$regFee=$regFee+$row['Amount'];
						}
						else if($row['feetype']=="Admission")
								{
									$AdmFee=$AdmFee+$row['Amount'];
								}
								else
								{
									$WidFee=$WidFee+$row['Amount'];
								}
						$total=$regFee+$AdmFee;			
			 
						
						if($row['feemode']=="Cash" && $row['feetype']!="Withdrawal")
						{
							$regcash=$regcash+$row['Amount'];
						}
						else if($row['feemode']=="Cheque" && $row['feetype']!="Withdrawal")
								{
									$regcheque=$regcheque+$row['Amount'];
								}
								else if($row['feemode']=="DD" && $row['feetype']!="Withdrawal")
								{
									$regdd=$regdd+$row['Amount'];
								}
						
		}}?>
             
               <TR>
               <TD>&nbsp;<TD>
               </TR>
              	<TR>  
                	<TD colspan="10" align="left"><b>TOTAL FEE RECEIVED</b></TD>
                </TR>
                <TR>
                <td colspan="10"> 
                <table border="0" align="left" width="600" cellpadding="3" cellspacing="3">
                <tr>
                	<th width="150" align="right" bgcolor="#f0f0f0">REGISTRATION  </th>
                    <th width="150" align="right" bgcolor="#f0f0f0">ADMISSION  </th>
                    <th width="150" align="right" bgcolor="#f0f0f0">WITHDRAWL  </th>
			<th width="150" align="right" bgcolor="#f0f0f0">TOTAL FEE  </th>                    
                </tr>
                <TR>
                	<td align="right">Rs. <?php echo $regFee;?> /-</td>
                    <td align="right">Rs. <?php echo $AdmFee;?> /-</td>
                    <td align="right">Rs. <?php echo $WidFee;?> /-</td>
			<td align="right">Rs. <?php echo $total;?> /-</td>
                </TR>

                <tr>
                	<th width="150" align="right" bgcolor="#f0f0f0">BY CASH  </th>
                    <th width="150" align="right" bgcolor="#f0f0f0">BY CHEQUE  </th>
                    <th width="150" align="right" bgcolor="#f0f0f0">BY DD </th>
                </tr>
                <TR>
                	<td align="right">Rs. <?php echo $regcash;?> /-</td>
                    <td align="right">Rs. <?php echo $regcheque;?> /-</td>
                    <td align="right">Rs. <?php echo $regdd;?> /-</td>
			<td align="right">Rs. <?php echo $total;?> /-</td>
                </TR>


                </table>
                </td>
                </TR>
                
          </table>
