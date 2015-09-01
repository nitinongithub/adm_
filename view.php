<?PHP
session_start();
	require("dbconnect.php");
	
	$QryForID = "select * from submenu where menuID=" . 1;
	$rsltForIDJi = mysql_query($QryForID) or die(mysql_error());
?>

<center>|
	<?PHP while($row = mysql_fetch_array($rsltForIDJi)){ ?>
    	 <a href="<?PHP echo $row['content'];?>" target="_new"><b><?PHP echo $row['submenuItem'];?></b></a> |
    <?PHP }?>
</center>