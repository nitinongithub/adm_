<?PHP
	session_start();
	$_SESSION['usrnm'] = "0100";
	$_SESSION['RegIDJiIntimation']="";
	$_SESSION['NewEntryMsg'] = "";
	$_SESSION['cntnt'] = "wall.php";
	$_SESSION['chkRep1'] = "0";
	$_SESSION['PR'] = "farzi"; //Print Receipt
	$_SESSION['RegFee'] = "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?PHP require("headerinclude.php");?>
    </head>

    <body leftmargin="0" topmargin="0">
    	<center>
        	<table cellpadding="0" cellspacing="0" width="100%" border="0">
            	<tr>
                	<td bgcolor="#02a6c3" align="center">
                    	<table border="0" cellpadding="0" cellspacing="0" width="1024">
                        	<tr>
                            	<td><img src="image/ai.jpg" width="266" border="0"></td>
                                <td width="627"></td>
                                <td><img src="image/admissionCorner.jpg" width="131" border="0"></td>
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
                                	
                                </td>
                                <td width="1" bgcolor="#999999"></td>
                                <td width="718" align="center" valign="top" height="500">
                                	<?PHP include("login.php"); ?>
                                </td>
                                <td width="1" bgcolor="#999999"></td>
                                <td width="150"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>