<?PHP
	session_start();
	
if($_SESSION['usrnm'] == "0100"){
	header("Location: index.php");
}else{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>. : Amrapali Admission Automation : .</title>
        <?PHP require("headerinclude.php");?>
        <?PHP include("popUp.php");?>
    </head>

    <body leftmargin="0" topmargin="0">
    <?PHP echo $strJi;?>
    	<center>
        	<table cellpadding="0" cellspacing="0" width="100%" border="0">
            	<tr>
                	<td bgcolor="#02a6c3" align="center">
                    	<table border="0" cellpadding="0" cellspacing="0" width="1024">
                        	<tr bgcolor="#02a6c3">
                            	<td height="35" width="324" valign="bottom" align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif" size="4">Amrapali Institute</font></td>
                                <td width="450"></td>
                                <td width="250" align="left" valign="bottom"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif" size="3">&nbsp;Logged in as <font color="#FFFF00"><b><?PHP echo $_SESSION['usrnm'];?></b></font>&nbsp;</font></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                	<td align="center">
                        <table border="0" cellpadding="0" cellspacing="0" width="1020">
                        	<tr>
                            	<td height="10" colspan="5"></td>
                            </tr>
                            <tr>
                            	<td width="150" height="150" valign="top" bgcolor="#ffffff" align="center">
                                	<?PHP include("menu.php"); ?>
                                </td>
                                <td width="1" bgcolor="#999999"></td>
                                <td width="718" align="center" valign="top" height="500">
                                	<?PHP
										include($_SESSION['cntnt']);
									?><br />
                                    <div id="detailJi"></div>
                                </td>
                                <td width="1" bgcolor="#999999"></td>
                                <td width="150" valign="top" align="center">
                                	<table border="0" cellpadding="3" cellspacing="0" width="145">
                                    	<tr>
                                        	<td height="100" class="txtIntimateRegID" align="left" valign="top"><?PHP echo $_SESSION['RegIDJiIntimation'];?></td>
                                        </tr>
                                        <?PHP if($_SESSION['cntnt'] == "registration.php"){?>
                                        <tr>
                                        	<td height="35">
                                            </td>
                                        </tr>
                                        <?PHP if($_SESSION['NewEntryMsg'] != ""){?>
                                        <tr>
                                        	<td bgcolor="#FFFF00">
                                            	<?PHP if(isset($_SESSION['NewEntryMsg'])){ echo '<font color="#990000"><b>'.$_SESSION['NewEntryMsg'].'</b></font>'; unset($_SESSION['NewEntryMsg']);}?>
                                            </td>
                                        </tr>
                                        <?PHP $_SESSION['NewEntryMsg'] = ""; ?>
                                        <?PHP }?>
                                        <tr>
                                        	<td align="left"><a href="#" onclick="showhidefieldData()">Add Data</a></td>
                                        </tr>
                                        <tr>
                                        	<td align="center">
                                            	<div id="CSDC" style='visibility:hidden;'>
                                            	<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                                                	<form name="frmCountry" action="adr.php?adr=1" method="post">
                                                    	<div id="country">
                                                        <tr align="center">
                                                            <td>Add Country</td>
                                                        </tr>
                                                        <tr align="center">
                                                            <td><input type="text" name="txtCntry" /></td>
                                                        </tr>
                                                        <tr align="center">
                                                        	<td><input type="submit" value="Add" />
                                                        </tr>
                                                        </div>
                                                    </form>
                                                    	<tr>
                                                        	<td height="15"></td>
                                                        </tr>
                                                    <form name="frmState" action="adr.php?adr=2" method="post">
                                                    	<div id="state">
                                                        <tr align="center">
                                                            <td>Add State</td>
                                                        </tr>
                                                        <tr align="center">
                                                            <td><input type="text" name="txtState" /></td>
                                                        </tr>
                                                        <tr align="center">
                                                        	<td><input type="submit" value="Add" />
                                                        </tr>
                                                        </div>
                                                    </form>
                                                    	<tr>
                                                        	<td height="15"></td>
                                                        </tr>
                                                    <form name="frmDistt" action="adr.php?adr=3" method="post">
                                                    	<div id="district">
                                                        <tr align="center">
                                                            <td>Add District</td>
                                                        </tr>
                                                        <tr align="center">
                                                            <td><input type="text" name="txtDistt" /></td>
                                                        </tr>
                                                        <tr align="center">
                                                        	<td><input type="submit" value="Add" />
                                                        </tr>
                                                        </div>
                                                    </form>
                                                    	<tr>
                                                        	<td height="15"></td>
                                                        </tr>
                                                    <form name="frmCity" action="adr.php?adr=4" method="post">
                                                    	<div id="city">
                                                        <tr align="center">
                                                            <td>Add City</td>
                                                        </tr>
                                                        <tr align="center">
                                                            <td><input type="text" name="txtCity" /></td>
                                                        </tr>
                                                        <tr align="center">
                                                        	<td><input type="submit" value="Add" />
                                                        </tr>
                                                        </div>
                                                    </form>
                                                </table>
                                                </div>
                                            </td>
                                        </tr>
                                        <?PHP }?>
                                        <tr>
                                        	<td height="180"></td>
                                        </tr>
                                        <?PHP if($_SESSION['stID'] == 1 || $_SESSION['stID'] == 2 || $_SESSION['stID'] == 5){?>
                                        <tr>
                                            <td align="right" height="50" valign="top">
                                                    <?PHP include("today2.php");?>
                                            </td>
                                        </tr>
                                        <?PHP }?>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <?PHP $_SESSION['RegIDJiIntimation'] = "";?>
                    </td>
                </tr>
            </table>
        </center> 
    </body>
</html>

<?PHP
}
?>