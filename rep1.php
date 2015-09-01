<?PHP session_start();?>

<?PHP if($_SESSION['usrnm'] != "0100"){ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>. : General Registration Report : .</title>
        <?PHP require("headerinclude.php");?>
    </head>
   



<body leftmargin="0" topmargin="0">
<?php
	//session_start();
	require("dbconnect.php");
?> 
<center>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
    	<td colspan="2" bgcolor="02a6c3" height="20"></td>
    </tr>
    <tr>
    	<td colspan="2" height="5">
    </tr>
    <tr>
        <td class="txtHead" align="center">REGISTRATION STATUS</td>
        <td align="right"><div id="msgJi" class="RegisteredCourse"></div></td>
    </tr>
    <tr>
    	<td colspan="2" height="10">
    </tr>
</table>
<?PHP if($_SESSION['chkRep1'] == "1"){?>
    <table border="0" cellpadding="0" cellspacing="0" width="1100">
        <tr><td colspan="11" height="3" bgcolor="#02a6c3"></td></tr>
        <tr><td colspan="11" height="3" ></td></tr>
        <tr>
        <form action="repPthwy.php?x=x01" name="repform" method="post">
            <td>Name</td>
            <td align="left"><input type="text" name="txtname" id="txtname" value="<?PHP echo $_SESSION['name'];?>" class="txtAmt"/> </td>
            <td width="80">
                Course	
            </td>
                 <?PHP $rsltCrs = "select * from course" ; 
                $rsltsl = mysql_query($rsltCrs) or die(mysql_error());
                ?>
            <td align="left" width="350">
                    <select name="cmbCourse" id="cmbCourse" class="txtAmt">
                        <option value="ALL">ALL</option>
                        <?PHP while($rowCrs = mysql_fetch_array($rsltsl)){?>
                        <?PHP if($rowCrs['courseID'] == $_SESSION['course']){?>
                        <option value="<?PHP echo $rowCrs['courseID'];?>" selected="selected"><?PHP echo $rowCrs['name'];?></option>
                        <?PHP }else{?>
                        <option value="<?PHP echo $rowCrs['courseID'];?>"><?PHP echo $rowCrs['name'];?></option>
                        <?PHP } ?>
                        <?PHP }?>
                    </select>
            </td>
                    
            <td width="100">Category</td>
                     <?PHP $QryCrs = "select * from maincat"; 
                 $rsltCrs = mysql_query($QryCrs) or die(mysql_error());?>
                 
            <td align="left">
                    <select name="category" id="category" class="txtAmt">
                            <option value="ALL">ALL</option>
                            <?PHP while($rowCrs = mysql_fetch_array($rsltCrs)){?>
                            <?PHP if($rowCrs['category'] == $_SESSION['cat']){?>
                            <option value="<?PHP echo $rowCrs['category'];?>" selected="selected"><?PHP echo $rowCrs['category'];?></option>
                            <?PHP }else{?>
                            <option value="<?PHP echo $rowCrs['category'];?>"><?PHP echo $rowCrs['category'];?></option>
                            <?PHP } ?>
                            <?PHP }?>
                    </select>
            </td>
                 <?PHP $QryCrs = "select * from subcat"; 
                 $rsltCrs = mysql_query($QryCrs) or die(mysql_error());?>
            <td width="120">Sub Cat.</td>
            <td align="left" width="100">
                 <select name="subcat" id="subcat" class="txtAmt">
                 <option value="ALL">ALL</option>
                     <?PHP while($rowCrs = mysql_fetch_array($rsltCrs)){?>
                     <?PHP if($rowCrs['subcat'] == $_SESSION['subcat']){?>
                     <option value="<?PHP echo $rowCrs['subcat'];?>" selected="selected"><?PHP echo $rowCrs['subcat'];?></option>
                     <?PHP }else{?>
                     <option value="<?PHP echo $rowCrs['subcat'];?>"><?PHP echo $rowCrs['subcat'];?></option>
                     <?PHP } ?>
                     <?PHP }?>
                 </select>
            </td>
            <td width="80">Loan</td>
            <td align="left">
                <select name="loan" id="loan" class="txtAmt">
                    <option value="ALL"<?PHP if($_SESSION['loan'] == "ALL")echo " selected='selected'";?>>ALL</option>
                    <option value="YES"<?PHP if($_SESSION['loan'] == "YES")echo " selected='selected'";?>>YES</option>
                    <option value="NO"<?PHP if($_SESSION['loan'] == "NO")echo " selected='selected'";?>>NO</option>
                </select>
            </td>
            <td align="right">
                <input type="submit" value="DISPLAY" />
            </td>
            </form>
        </tr>
         <tr><td colspan="11" height="3" ></td></tr>
        <tr><td colspan="11" height="3" bgcolor="#02a6c3"></td></tr>
        <tr>
        <td colspan="11">
                <?PHP include("regrep.php");?>
        </td>
        </tr>
    </table>
<?PHP }else{?>
    <table border="0" cellpadding="0" cellspacing="0" width="1100">
        <tr><td colspan="11" height="3" bgcolor="#02a6c3"></td></tr>
        <tr><td colspan="11" height="3" ></td></tr>
        <tr>
        <form action="repPthwy.php?x=x01" name="repform" method="post">
            <td>Name</td>
            <td><input type="text" name="txtname" id="txtname" value="ALL" class="txtAmt"/> </td>
            <td>
                Course	
            </td>
                 <?PHP $rsltCrs = "select * from course" ; 
                $rsltsl = mysql_query($rsltCrs) or die(mysql_error());
                ?>
            <td align="left" width="350">
                    <select name="cmbCourse" id="cmbCourse" class="txtAmt">
                        <option value="ALL">ALL</option>
                        <?PHP while($rowCrs = mysql_fetch_array($rsltsl)){?>
                        <option value="<?PHP echo $rowCrs['courseID'];?>"><?PHP echo $rowCrs['name'];?></option>
                        <?PHP }?>
                    </select>
            </td>
                    
            <td width="100">Category</td>
                     <?PHP $QryCrs = "select * from maincat"; 
                 $rsltCrs = mysql_query($QryCrs) or die(mysql_error());?>
                 
            <td align="left">
                    <select name="category" id="category" class="txtAmt">
                            <option value="ALL">ALL</option>
                            <?PHP while($rowCrs = mysql_fetch_array($rsltCrs)){?>
                            <option value="<?PHP echo $rowCrs['category'];?>"><?PHP echo $rowCrs['category'];?></option>
                                                            <?PHP }?>
                    </select>
            </td>
                 <?PHP $QryCrs = "select * from subcat"; 
                 $rsltCrs = mysql_query($QryCrs) or die(mysql_error());?>
            <td width="150">Sub Cat.</td>
            <td align="left">
                 <select name="subcat" id="subcat" class="txtAmt">
                 <option value="ALL">ALL</option>
                     <?PHP while($rowCrs = mysql_fetch_array($rsltCrs)){?>
                     <option value="<?PHP echo $rowCrs['subcat'];?>"><?PHP echo $rowCrs['subcat'];?></option>
                     <?PHP }?>
                 </select>
            </td>
            <td width="80">Loan</td>
            <td>
                <select name="loan" id="loan" class="txtAmt">
                    <option value="ALL">ALL</option>
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                
                </select>
            </td>
            <td align="right">
                <input type="submit" value="DISPLAY" />
            </td>
            </form>
        </tr>
         <tr><td colspan="11" height="3" ></td></tr>
        <tr><td colspan="11" height="3" bgcolor="#02a6c3"></td></tr>
    </table>
<?PHP }?>
</center>
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