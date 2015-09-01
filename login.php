    	<center>
        	<table border="0" cellpadding="0" cellspacing="0" class="txtContent">
            	<tr>
                	<td height="80"></td>
                </tr>
                
               
            	<form name="frmLogin" action="go.php" method="post">
            	
                <tr align="left">
                	<td class="txtContent" align="right">Choose Year   
                    	<select	name="cmbDatabase">
                        	<?php for($loop1=date('Y');$loop1>=2011; $loop1--){?>
                        	<option value='<?php echo $loop1; ?>'><?php echo $loop1; ?></option>
                            <?PHP }?>
                        </select>
                    </td>
                </tr>
                <tr>
                	<td height="10"></td>
                </tr>
                
                <tr align="left">
                	<td class="txtHead">Login</td>
                </tr>
                <tr>
                	<td height="10"></td>
                </tr>
                <tr align="left">
                	<td>Username</td>
                </tr>
                <tr align="left">
                    <td><input type="text" size="60" name="txtUName" /></td>
                </tr>
                <tr>
                	<td height="10"></td>
                </tr>
                <tr align="left">
                	<td>Password</td>
                </tr>
                <tr align="left">
                    <td><input type="password" size="60" name="txtPwd" /></td>
                </tr>
                <tr>
                	<td height="10"></td>
                </tr>
                <tr align="right">
                    <td><input type="submit" value="Go"/></td>
                </tr>
                </form>
            </table>
        </center>