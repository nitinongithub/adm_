<?php	
	session_start();
	require("dbconnect.php");
	
	$qry="SELECT * FROM foradmissionreport";
	$result = mysql_query($qry) or die(mysql_error());
	$count=1;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>. : General Registration Report : .</title>
        <?PHP require("headerinclude.php");?>
    </head>
    <body>
    	<center>
		<?PHP if(mysql_num_rows($result) >0){?>	
			<H3><font color="#000000">ADMISSION REPORT</font></H3>
            <table border="0" cellpadding="0" cellspacing="0" class="sortable" id="hovertable">
                <tr>
                    <th align="left">SN.</th>
                    <th align="center">REG. NO.</th>
                    <th align="left">NAME</th>
                    <th align="left">GENDER</th>
                    <th align="left">FATHER NAME</th>
                    <th align="left">COURSE</th>
                    <th align="left">QUOTA</th>
                    <th align="left">CATEGORY</th>
                    <th align="left">SUBCATEGORY</th>
                    <th align="left">ADMISSION DATE</th>
                    <th align="left">ADMISSION BY</th>
                 </tr>
                <?php while($row = mysql_fetch_array($result)){?>
                <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
                    <td align="center"><?PHP echo $count;?></td>
                    <td align="center"><?PHP echo $row['regID'];?></td>
                    <td align="left"><?PHP echo $row['name'];?></td>
                    <td align="left"><?PHP echo $row['gender'];?></td>
                    <td align="left"><?PHP echo $row['fname'];?></td>
                    <td align="left"><?PHP echo $row['courseID'];?></td>
                    <td align="left"><?PHP echo $row['quota'];?></td>
                    <td align="left"><?PHP echo $row['category'];?></td>
                    <td align="left"><?PHP echo $row['subcat'];?></td>
                    <td align="left"><?PHP echo $row['admissiondate'];?></td>
                    <td align="left"><?PHP echo $row['username'];?></td>
                 </tr> 
			<?PHP $count=$count+1;} ?>
		<?PHP }?>
        </table>
        </center>
	</body>
</html>