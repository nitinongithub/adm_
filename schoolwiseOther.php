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
                <H3><font color="#000000">Total Other Students from different School in Year <?php echo date('Y'); ?></font></H3>
                <H3 id="totalm_f"></H3>
                <div style="overflow: auto; width: 700px; height: auto">
                    <table border="0" cellpadding="0" cellspacing="0" class="sortable" id="hovertable" width="500" style="font-size: 20px">
                        <tr>
                            <th align="left">SN</th>
                            <th align="left">Institute/ School</th>
                            <th align="left">COUNT</th>
                        </tr>
                            <?php
								$tot_count = mysql_query("select count(*) as count_ from z1_view_student_qualifiation_other");
								$tc_ = mysql_fetch_array($tot_count);
								if($tc_['count_'] != 0){
									$total_ = $tc_['count_'];
								}
                                $qry = "SELECT `instname`, count(`instname`) as count FROM `z1_view_student_qualifiation_other` group by `instname`";
                                $result = mysql_query($qry) or die(mysql_error());
                                $cnt_ = 0;
                            ?>
                            <?php if(mysql_num_rows($result) != 0){ ?>
                                <?php while ($row = mysql_fetch_array($result)) { ?>
                                    <tr onmouseover="this.style.backgroundColor = '#ffff66';" onmouseout="this.style.backgroundColor = '#d4e3e5';">
                                        <td align="center"><?PHP echo $count; ?></td>
                                        <td align="left"><?PHP echo $row['instname']; ?></td>
                                        <td align="left"><?PHP echo $row['count']; ?></td>
                                    </tr> 
                                    <?PHP $count = $count + 1; ?>
                                <?php } ?>
                            <?php } ?>
                    </table>
                </div>
                <div style="clear: both"></div>
                <div style="width: 200px; text-align: right; position: fixed; top: 50px; right: 0px">
                <table border="0" width="200" cellpadding="5" cellspacing="0" style="font-size: 20px; float: right;">
                    <tr>
                        <td colspan="2" height="10"></td>
                    </tr>
                    <tr style="background: #f0f0f0">
                        <td>Total Count</td>
                        <td><?php echo $total_; ?></td>
                    </tr>
                    
                </table>
                </div>
        </center>
    </body>
</html>