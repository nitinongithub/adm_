
<?PHP
	$con = mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db($_SESSION['dbold'],$con) or die(mysql_error());//*/

?>