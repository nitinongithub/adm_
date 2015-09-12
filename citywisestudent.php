<?php
session_start();
require("dbconnect.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>. : Total Male &amp; Female Student Admitted : .</title>
        <?PHP require("headerinclude.php"); ?>
        <?php
        $count = 1;
        ?>
        <style type="text/css">
            table{font-size: 20px}
        </style>
    </head>
    <body>
        <center>
                <H3><font color="#000000">Total Students from the different locations in Year <?php echo date('Y'); ?></font></H3>
                <H3 id="totalm_f"></H3>
                <div style="overflow: auto; width: 700px; height: auto">
                    <table border="0" cellpadding="0" cellspacing="0" class="sortable" id="hovertable" width="500" style="font-size: 20px">
                        <tr>
                            <th align="left">CITY</th>
                            <th align="left">COUNT</th>
                        </tr> 
                            <?php
                                $qry = "SELECT city, count(b.city) as count from stud_personal a, stud_perm_adr_contact b where a.ID = b.STUD_ID AND city <> '-x-' AND a.ID = ANY (select regID from admittedstudents) group by city";
                                $result = mysql_query($qry) or die(mysql_error());
                                $cnt_ = 0;
                            ?>
                                <?php while ($row = mysql_fetch_array($result)) { ?>
                                    <tr onmouseover="this.style.backgroundColor = '#ffff66';" onmouseout="this.style.backgroundColor = '#d4e3e5';">
                                        <!--td align="center"><?PHP //echo $count; ?></td -->
                                        <td align="left"><?PHP echo $row['city']; ?></td>
                                        <td align="left"><?PHP echo $row['count']; ?></td>                   
                                    </tr> 
                                    <?PHP $count = $count + 1; ?>
                                <?php } ?>
                    </table>
                </div>
                <div style="clear: both"></div>
        </center>
    </body>
</html>