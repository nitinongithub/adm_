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
                <H3><font color="#000000">Total Male &amp; Female Admitted in Year <?php echo date('Y'); ?></font></H3>
                <H3 id="totalm_f"></H3>
                <div style="overflow: auto; width: 700px; height: auto">
                    <table border="0" cellpadding="0" cellspacing="0" class="sortable" id="hovertable" width="500" style="font-size: 20px">
                        <tr>
                            <th align="left">COURSE</th>
                            <th align="left">GENDER</th>
                            <th align="left">COUNT</th>
                        </tr>
                        <?php $cnt_male = 0; $cnt_female = 0; ?>
                        <?php while ($rw = mysql_fetch_array($res_crs)) { ?>
                        <tr>
                            <td rowspan="3" style="background: #000000; color: #ffffff"><?php echo $rw['courseID']; ?></td>
                        </tr>
                            <?php
                                $qry = "SELECT crsID, gender, count(gender) as count_gender from admittedstudents where crsID = '" . $rw['courseID'] . "' group by crsID, gender";
                                $result = mysql_query($qry) or die(mysql_error());
                                $cnt_ = 0;
                            ?>
                            <?php if(mysql_num_rows($result) == 2){ ?>
                                <?php while ($row = mysql_fetch_array($result)) { ?>
                                    <tr onmouseover="this.style.backgroundColor = '#ffff66';" onmouseout="this.style.backgroundColor = '#d4e3e5';">
                                        <!--td align="center"><?PHP //echo $count; ?></td -->
                                        <td align="left"><?PHP if ($row['gender'] == 'M') { echo 'Male'; } else { echo 'Female'; } ?></td>
                                        <td align="left"><?PHP echo $row['count_gender']; ?></td>                   
                                    </tr> 
                                    <?php $cnt_ = $cnt_ + $row['count_gender']; ?>
                                    <?php if ($row['gender'] == 'M') { $cnt_male = $cnt_male + $row['count_gender']; } else { $cnt_female = $cnt_female + $row['count_gender']; } ?>
                                    <?PHP $count = $count + 1; ?>
                                <?php } ?>
                            <?php } else if(mysql_num_rows($result) == 1) { ?>
                                <?php while ($row = mysql_fetch_array($result)) { ?>
                                    <tr onmouseover="this.style.backgroundColor = '#ffff66';" onmouseout="this.style.backgroundColor = '#d4e3e5';">
                                        <!--td align="center"><?PHP //echo $count; ?></td -->
                                        <td align="left"><?PHP if ($row['gender'] == 'M') { echo 'Male'; } else { echo 'Female'; } ?></td>
                                        <td align="left"><?PHP echo $row['count_gender']; ?></td>                   
                                    </tr> 
                                    <?php $cnt_ = $cnt_ + $row['count_gender']; ?>
                                    <?php if ($row['gender'] == 'M') { $cnt_male = $cnt_male + $row['count_gender']; } else { $cnt_female = $cnt_female + $row['count_gender']; } ?>
                                    <?PHP $count = $count + 1; ?>
                                <?php } ?>
                                    <tr onmouseover="this.style.backgroundColor = '#ffff66';" onmouseout="this.style.backgroundColor = '#d4e3e5';">
                                        <td align="left" colspan="2">-</td>                   
                                    </tr>
                            <?php } else { ?>
                                <tr onmouseover="this.style.backgroundColor = '#ffff66';" onmouseout="this.style.backgroundColor = '#d4e3e5';">
                                    <td align="left" colspan="2">-</td>                   
                                </tr>
                        <tr onmouseover="this.style.backgroundColor = '#ffff66';" onmouseout="this.style.backgroundColor = '#d4e3e5';">
                                    <td align="left"  colspan="2">-</td>                   
                                </tr>
                            <?php } ?>
                        <tr>
                            <td colspan="3" height="15" style="background: #ffffff; text-align: right"></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                <div style="clear: both"></div>
                <div style="width: 700px; text-align: right; position: fixed; top: 0px; right: 0px">
                <table border="0" width="200" cellpadding="5" cellspacing="0" style="font-size: 20px; float: right;">
                    <tr>
                        <td colspan="2" height="10"></td>
                    </tr>
                    <tr style="background: #f0f0f0">
                        <td>Total Male</td>
                        <td><?php echo $cnt_male; ?></td>
                    </tr>
                    <tr style="background: #D0D0D0">
                        <td>Total Female </td>
                        <td onload="total_count(2,3);"><?php echo $cnt_female;?></td>
                    </tr>
                </table>
                </div>  
            <?php } ?>
        </center>
    </body>
</html>