<?PHP session_start();?>

<?PHP if($_SESSION['usrnm'] != "0100"){ ?>

<?php	
	//session_start();
	require("dbconnect.php");
	
	$qry="SELECT * FROM registeredstudents ORDER BY COURSE";
	$result = mysql_query($qry) or die(mysql_error());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>. : General Registration Report : .</title>
        <?PHP require("headerinclude.php");?>
    </head>
    <body>
		<?PHP if(mysql_num_rows($result) >0){?>	
			<H3>REGISTRATION STATUS</H3>
            <table border="0" cellpadding="0" cellspacing="0" class="sortable" id="hovertable">
                <tr>
                    <th align="center">REG. NO.</th>
                    <th align="left">NAME</th>
                    <th align="left">GENDER</th>
                    <th align="left">DATE OF BIRTH</th>
                    <th align="left">FATHER NAME</th>
                    <th align="left">MOTHER NAME</th>
                    <th align="left">COURSE</th>
                    <th align="left">NATIONALITY</th>
                    <th align="left">STATE</th>
                    <th align="left">CATEGORY</th>
                    <th align="left">SUB CATEGORY</th>
                    <th align="left">REG DATE</th>
                    <th align="left">LOAN REQUIRED</th>
                </tr>
                <?php while($row = mysql_fetch_array($result)){?>
                <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
                    <td align="center"><?PHP echo $row['REGISTRATION NO'];?></td>
                    <td align="left"><?PHP echo $row['NAME'];?></td>
                    <td align="left"><?PHP echo $row['GENDER'];?></td>
                    <td align="left"><?PHP echo $row['DOB'];?></td>
                    <td align="left"><?PHP echo $row['FATHER NAME'];?></td>
                    <td align="left"><?PHP echo $row['MOTHER NAME'];?></td>
                    <td align="left"><?PHP echo $row['COURSE'];?></td>
                    <td align="left"><?PHP echo $row['NATIONALITY'];?></td>
                    <td align="left"><?PHP echo $row['STATE'];?></td>
                    <td align="left"><?PHP echo $row['CATEGORY'];?></td>
                    <td align="left"><?PHP echo $row['SUBCAT'];?></td>
                    <td align="left"><?PHP echo $row['REG DATE'];?></td>
                    <td align="left"><?PHP echo $row['LOAN REQUIRED'];?></td>
                </tr>        
			<?PHP } ?>
		<?PHP } ?>
        </table>
	</body>
<?PHP }else{ ?>
<script type="text/javascript">
	function clsJi(){
		window.close();
	}
</script>
<body onload="clsJi()">
</body>
<?PHP }?>
</html>