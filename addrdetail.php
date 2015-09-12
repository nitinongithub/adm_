<?php
session_start();
require("dbconnect.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>. : Address Detail for <?php echo date('Y'); ?> : .</title>
        <?PHP require("headerinclude.php"); ?>
        <?php
        $qry_crs = "select courseID, name from course order by courseID";
        $res_crs = mysql_query($qry_crs) or die(mysql_error());
        $count = 1;
        ?>
        <style type="text/css">
            table{font-size: 20px}
        </style>
    </head>
    <body>
        <center>
            <?PHP if (mysql_num_rows($res_crs) > 0) { ?>	
                <H3><font color="#000000">Address Detail for <?php echo date('Y'); ?></font></H3>
                    <table border="0" cellpadding="0" cellspacing="0" class="sortable" id="hovertable" width="500" style="font-size: 12px">
                        <tr>
                            <th align="left">SN</th>
                            <th align="left">COURSE</th>
                            <th align="left">REG ID</th>
                            <th align="left">NAME</th>
                            <th align="left">MOTHER</th>
                            <th align="left">FATHER</th>
                            <th align="left">ADDRESS</th>
                            <th align="left">CITY</th>
                            <th align="left">DISTRICT</th>
                            <th align="left">STATE</th>
                            <th align="left">COUNTRY</th>
                            <th align="left">PHONE</th>
                            <th align="left">MOBILE</th>
                        </tr>
                        <?php $cnt_male = 0; $cnt_female = 0; ?>
                        <?php while ($rw = mysql_fetch_array($res_crs)) { ?>
                            <?php
                                $qry = "SELECT a.courseID, a.ID, a.name, a.mname, a.fname, b.address, b.city, b.district, b.state, b.country, b.phone, b.mobile from stud_personal a, stud_perm_adr_contact b where a.ID = b.STUD_ID AND a.courseID = '" . $rw['courseID'] . "' AND a.ID = ANY (select regID from admittedstudents)";
                                $result = mysql_query($qry) or die(mysql_error());
                                $cnt_ = 0;
                            ?>
                                <?php while ($row = mysql_fetch_array($result)) { ?>
                                    <tr onmouseover="this.style.backgroundColor = '#ffff66';" onmouseout="this.style.backgroundColor = '#d4e3e5';">
                                        <td align="center"><?PHP echo $count; ?></td>
                                        <td align="left"><?PHP echo $row['courseID']; ?></td>
                                        <td align="left"><?PHP echo $row['ID']; ?></td>  
                                        <td align="left"><?PHP echo $row['name']; ?></td>
                                        <td align="left"><?PHP echo $row['mname']; ?></td>
                                        <td align="left"><?PHP echo $row['fname']; ?></td>
                                        <td align="left"><?PHP echo $row['address']; ?></td>  
                                        <td align="left"><?PHP echo $row['city']; ?></td>
                                        <td align="left"><?PHP echo $row['district']; ?></td>
                                        <td align="left"><?PHP echo $row['state']; ?></td>
                                        <td align="left"><?PHP echo $row['country']; ?></td>  
                                        <td align="left"><?PHP echo $row['phone']; ?></td>
                                        <td align="left"><?PHP echo $row['mobile']; ?></td>
                                    </tr> 
                                    <?PHP $count = $count + 1; ?>
                                <?php } ?>
                        <?php } ?>
                    </table>
                <div style="clear: both"></div>
            <?php } ?>
        </center>
    </body>
</html>