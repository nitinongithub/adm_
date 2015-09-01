<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css">
<?PHP 

	require("dbconnect.php");
	if($_SESSION['usrnm'] == "admin"){
		$Qry = "select menuItem, menuID , priority from menu where menuID <> 7 order by priority";
	}else{
		$Qry = "select menuItem, menuID , priority from menu where menuID in (select menuID from usersmenu where statusID=" . $_SESSION['stID'] . ") order by priority";
	}
	$rslt = mysql_query($Qry) or die(mysql_error());
?>
    <table border="0" cellpadding="0" cellspacing="0" width="140" class="clsMenu">
        <tr align="right">
            <td><a href="logout.php?xxxwwww=gthemerrosjdhfgdsjx21312323"><font color="#993300">Logout <b>?</b></font></a></td>
        </tr>
        <tr>
        	<td height="5"></td>
        </tr>
        <tr align="right">
        	<td><a href="pthwy.php?mID=chng&chk=a"><font color="#FF0000">change password <b>?</b></font></a></td>
        </tr>
        <tr>
        	<td height="3"></td>
        </tr>
        <tr>
        	<td bgcolor="#999999" height="1"></td>
        </tr>
        <tr>
            <td height="25"></td>
        </tr>
        <tr align="right">
            <td>
                <ul id="MenuBar1" class="MenuBarVertical">
					<?PHP while($row = mysql_fetch_array($rslt)){ ?>
                        <?PHP
                            $subQry = "select * from submenu where menuID=" . $row['menuID'] . " order by submenuID";
                            $subRslt = mysql_query($subQry) or die(mysql_error());
                            
                        if(mysql_num_rows($subRslt) > 0){
                        ?>
                        <li><a href="#" class="MenuBarItemSubmenu"><?PHP echo $row['menuItem'];?></a>
                            <ul>
                                <?PHP while($subRow = mysql_fetch_array($subRslt)){?>
                                    <?PHP echo $subRow['path'];?>
                                <?PHP }?>
                            </ul>
                        </li>
                        <?PHP }else{?>
                        <li><a href="pthwy.php?mID=<?PHP echo $row['menuID'];?>&chk=a"><?PHP echo $row['menuItem'];?></a></li>
                        <?PHP }?>
                    <?PHP }?>
                </ul>
            </td>
        </tr>
        <tr>
            <td height="15"></td>
        </tr>
        <tr>
        	<td align="left" height="50">
            </td>
        </tr>
        <?PHP if($_SESSION['stID'] == 1 || $_SESSION['stID'] == 2 || $_SESSION['stID'] == 5){?>
        <tr>
        	<td align="right" height="50">
            		<?PHP include("today1.php");?>
            </td>
        </tr>
        <?PHP }?>
    </table>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>