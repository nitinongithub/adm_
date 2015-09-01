<?php	
	session_start();
	require("dbconnect.php");
	
	$qry="SELECT * FROM dhmctmeritwithno";
	$result = mysql_query($qry) or die(mysql_error());
	$count=1;
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>. : DHM-CT Merit Report : .</title>
        <?PHP require("headerinclude.php");?>
    </head>
    <body>
    	<center>
		<?PHP if(mysql_num_rows($result) >0){?>	
			<H3><font color="#000000">DHM-CT MERIT LIST</font></H3>
            <table border="0" cellpadding="0" cellspacing="0" class="sortable" id="hovertable">
                <tr>
                    <th align="left">SN.</th>
                    <th align="center">REG. NO.</th>
                    <th align="left">NAME</th>
                    <th align="left">COURSE</th>
                     <th align="left">ADMISSION STATUS</th>
                    <th align="left">PERCENTAGE</th>
                    <th align="left">BOARD</th>
                    <th align="left">YEAR</th>
                    <th align="left">SUBJECTS</th>
                    <th align="left">PHONE1</th>
                    <th align="left">PHONE2</th>
                    <th align="left">PHONE3</th>
                    <th align="left">PHONE4</th>
                    <th align="left">PHONE5</th>
                    <th align="left">PHONE6</th>
               </tr>
                <?php while($row = mysql_fetch_array($result)){?>
                <?php
					 $qry1="SELECT * FROM admission where regID='".$row['ID']."'";
					 $result1 = mysql_query($qry1) or die(mysql_error());
					 if(mysql_num_rows($result1) >0){
				?>
                
                <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
                    <td align="center"><?PHP echo $count;?></td>
                    <td align="center"><?PHP echo $row['ID'];?></td>
                    <td align="left"><?PHP echo $row['name'];?></td>
                    <td align="left"><?PHP echo $row['courseID'];?></td>
                    <td align="left"><?PHP  echo "ADMISSION TAKEN";?></td>
                    <td align="left"><?PHP echo $row['marksobt'];?></td>
                    <td align="left"><?PHP echo $row['boarduniv'];?></td>
                    <td align="left"><?PHP echo $row['yearofpassing'];?></td>
                    <td align="left"><?PHP echo $row['subjects'];?></td>
                    <td align="left"><?PHP echo $row['phone1'];?></td>
                    <td align="left"><?PHP echo $row['mobile1'];?></td>
                    <td align="left"><?PHP echo $row['phone2'];?></td>
                    <td align="left"><?PHP echo $row['mobile2'];?></td>
                    <td align="left"><?PHP echo $row['phone3'];?></td>
                    <td align="left"><?PHP echo $row['mobile3'];?></td>
                   
                 </tr> 
                 
                 <?php } else {?>
                 	
                 	<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
                    <td align="center"><?PHP echo $count;?></td>
                    <td align="center"><?PHP echo $row['ID'];?></td>
                    <td align="left"><?PHP echo $row['name'];?></td>
                    <td align="left"><?PHP echo $row['courseID'];?></td>
                     <td align="left"><?PHP echo "";?></td>
                    <td align="left"><?PHP echo $row['marksobt'];?></td>
                    <td align="left"><?PHP echo $row['boarduniv'];?></td>
                    <td align="left"><?PHP echo $row['yearofpassing'];?></td>
                    <td align="left"><?PHP echo $row['subjects'];?></td>
                    <td align="left"><?PHP echo $row['phone1'];?></td>
                    <td align="left"><?PHP echo $row['mobile1'];?></td>
                    <td align="left"><?PHP echo $row['phone2'];?></td>
                    <td align="left"><?PHP echo $row['mobile2'];?></td>
                    <td align="left"><?PHP echo $row['phone3'];?></td>
                    <td align="left"><?PHP echo $row['mobile3'];?></td>
                    
                 </tr> 
                    
                 <?php }?>
                 
			<?PHP $count=$count+1;} ?>
		<?PHP }?>
        </table>
        </center>
	</body>
</html>