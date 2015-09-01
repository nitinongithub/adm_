<?PHP
/*
CREATE OR REPLACE VIEW `meritall` AS 
	select 
    `stud_personal`.`ID` AS `ID`,
    `prev_qualification`.`stud_ID` AS `stud_ID`,
    `stud_personal`.`name` AS `name`,
    `stud_personal`.`gender` AS `gender`,
    `stud_personal`.`fname` AS `Fathers name`,
    `stud_personal`.`mname` AS `Mothers name`,
    `stud_personal`.`dob` AS `dd`,
    `stud_personal`.`mob` AS `mm`,
    `stud_personal`.`yob` AS `yyyy`,
    `stud_personal`.`courseID` AS `courseID`,
    `prev_qualification`.`marksobt` AS `marksobt`,
    `prev_qualification`.`boarduniv` AS `boarduniv`,
    `prev_qualification`.`yearofpassing` AS `yearofpassing`,
    `prev_qualification`.`subjects` AS `strmsub`,
	`prev_qualification`.`qualifID` AS `qualifID` 
    from (`stud_personal` join `prev_qualification`) 
    where ((`stud_personal`.`ID` = `prev_qualification`.`stud_ID`)) 
    order by 
    `prev_qualification`.`marksobt` desc;


CREATE OR REPLACE VIEW `meritallwithaddress` AS 
	select 
	`meritall`.`ID` AS `ID`,
	`meritall`.`stud_ID` AS `stud_ID`,
	`meritall`.`name` AS `name`,
	`meritall`.`gender` AS `gender`,
	`meritall`.`Fathers name` AS `Fathers name`,
                `meritall`.`Mothers name` AS `Mothers name`,
	`meritall`.`dd` AS `dd`,
	`meritall`.`mm` AS `mm`,
	`meritall`.`yyyy` AS `yyyy`,
	`meritall`.`courseID` AS `courseID`,
	`meritall`.`marksobt` AS `marksobt`,
	`meritall`.`boarduniv` AS `boarduniv`,
	`meritall`.`yearofpassing` AS `yearofpassing`,
	`meritall`.`strmsub` AS `strmsub`,
	`meritall`.`qualifID` AS `qualifID`,
	`stud_perm_adr_contact`.`address` AS `address`,
	`stud_perm_adr_contact`.`city` AS `city`,
	`stud_perm_adr_contact`.`district` AS `district`,
	`stud_perm_adr_contact`.`state` AS `state`,
	`stud_perm_adr_contact`.`country` AS `country`,
	`stud_perm_adr_contact`.`phone` AS `phone1`,
	`stud_perm_adr_contact`.`mobile` AS `mobile1`,
	`stud_cores_adr_contact`.`phone` AS `phone2`,
	`stud_cores_adr_contact`.`mobile` AS `mobile2` 
	from ((`meritall` join `stud_perm_adr_contact`) join `stud_cores_adr_contact`)
	where 
	(
	(`meritall`.`stud_ID` = `stud_perm_adr_contact`.`STUD_ID`) and 
	(`meritall`.`stud_ID` = `stud_cores_adr_contact`.`STUD_ID`)
	) order by `meritall`.`marksobt` desc;
	
	
	
	CREATE OR REPLACE VIEW `meritallwithaddress` AS 
	select 
	`meritall`.`ID` AS `ID`,
	`meritall`.`stud_ID` AS `stud_ID`,
	`meritall`.`name` AS `name`,
	`meritall`.`gender` AS `gender`,
	`meritall`.`Fathers name` AS `Fathers name`,
                `meritall`.`Mothers name` AS `Mothers name`,
	`meritall`.`dd` AS `dd`,
	`meritall`.`mm` AS `mm`,
	`meritall`.`yyyy` AS `yyyy`,
	`meritall`.`courseID` AS `courseID`,
	`meritall`.`marksobt` AS `marksobt`,
	`meritall`.`boarduniv` AS `boarduniv`,
	`meritall`.`yearofpassing` AS `yearofpassing`,
	`meritall`.`strmsub` AS `strmsub`,
	`meritall`.`qualifID` AS `qualifID`,
	`stud_perm_adr_contact`.`address` AS `address`,
	`stud_perm_adr_contact`.`city` AS `city`,
	`stud_perm_adr_contact`.`district` AS `district`,
	`stud_perm_adr_contact`.`state` AS `state`,
	`stud_perm_adr_contact`.`country` AS `country`,
	`stud_perm_adr_contact`.`phone` AS `phone1`,
	`stud_perm_adr_contact`.`mobile` AS `mobile1`,
	`stud_cores_adr_contact`.`phone` AS `phone2`,
	`stud_cores_adr_contact`.`mobile` AS `mobile2` 
	from ((`meritall` join `stud_perm_adr_contact`) join `stud_cores_adr_contact`) join `admission` 
	where 
	(
	(`meritall`.`stud_ID` = `stud_perm_adr_contact`.`STUD_ID`) and 
	(`meritall`.`stud_ID` = `stud_cores_adr_contact`.`STUD_ID`) and
	(`meritall`.`stud_ID` = `admission`.`regID`)
	) order by `meritall`.`marksobt` desc;
*/
//
?>
<?php	
	session_start();
	require("dbconnect.php");
	
	$QryCrs = "select eligibility from course where courseID ='" . $_POST['crsid'] . "'"; 
	$rsltCrs = mysql_query($QryCrs) or die(mysql_error());
	if(mysql_num_rows($rsltCrs) > 0){
		$row = mysql_fetch_array($rsltCrs);
		$eligibility = $row['eligibility'];
	}else{
		$eligibility = 0;
	}
	$qry="SELECT * FROM meritallwithaddress where courseID = '" . $_POST['crsid'] . "' and qualifID = $eligibility";
	$result = mysql_query($qry) or die(mysql_error());
	$count=1;
	//echo $_POST['crsid'] . ' + ' . $eligibility;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>. : <?PHP echo $_POST['crsid'];?> Merit Report : .</title>
        <?PHP require("headerinclude.php");?>
    </head>
    <body>
    	<center>
		<?PHP if(mysql_num_rows($result) >0){?>	
			<H3><font color="#000000"><?PHP echo $_POST['crsid'];?> MERIT LIST</font></H3>
            <table border="0" cellpadding="0" cellspacing="0" class="sortable" id="hovertable">
                <tr>
                    <th align="left">SN.</th>
                    <th align="left">Admission status</th>
                    <th align="left">COURSE</th>
                    <th align="center">REG. NO.</th>
                    <th align="left">NAME</th>
                    <th align="left">GENDER</th>
                    <th align="left">DOB</th>
                    <th align="left">FATHER</th>
                    <th align="left">MOTHER</th>
                    <th align="left">%age</th>
                    <th align="left">BOARD</th>
                    <th align="left">YEAR</th>
                    <th align="left">SUBJECTS/Stream</th>
                    <th align="left">PHONE1</th>
                    <th align="left">MOBILE1</th>
                    <th align="left">PHONE2</th>
                    <th align="left">MOBILE2</th>
                    <th align="left">ADDRESS</th>
                    <th align="left">CITY</th>
                    <th align="left">DISTRICT</th>
                    <th align="left">STATE</th>
                    <th align="left">COUNTRY</th>
               </tr>
                <?php while($row = mysql_fetch_array($result)){?>
                <?php
					 $qry1="SELECT * FROM admission where regID='".$row['stud_ID']."'";
					 $result1 = mysql_query($qry1) or die(mysql_error());
				
				$QryWdrl = "select * from withdrawal where REGNO = " . $row['stud_ID'] . "";
				$resWdrl = mysql_query($QryWdrl);
				
				if(mysql_num_rows($resWdrl) > 0){
				}else{
					 if(mysql_num_rows($result1)> 0){
				?>
                
                <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
                    <td align="center"><?PHP echo $count;?></td>
                    <td align="left"><img src="image/tick.png" />0</td>
                    <td align="left"><?PHP echo $row['courseID'];?></td>
                    <td align="center"><?PHP echo $row['stud_ID'];?></td>
                    <td align="left"><?PHP echo $row['name'];?></td>
                    <td align="left"><?PHP echo $row['gender'];?></td>
                    <td align="left"><?PHP echo $row['dd'] . '/' . $row['mm'] . '/' . $row['yyyy'];?></td>
                    <td align="left"><?PHP echo $row['Fathers name'];?></td>
                    <td align="left"><?PHP echo $row['Mothers name'];?></td>
                    <td align="left"><?PHP echo $row['marksobt'];?></td>
                    <td align="left"><?PHP echo $row['boarduniv'];?></td>
                    <td align="left"><?PHP echo $row['yearofpassing'];?></td>
                    <td align="left"><?PHP echo $row['strmsub'];?></td>
                    <td align="left"><?PHP echo $row['phone1'];?></td>
                    <td align="left"><?PHP echo $row['mobile1'];?></td>
                    <td align="left"><?PHP echo $row['phone2'];?></td>
                    <td align="left"><?PHP echo $row['mobile2'];?></td>
                    <td align="left"><?PHP echo $row['address'];?></td>
                    <td align="left"><?PHP echo $row['city'];?></td>
                    <td align="left"><?PHP echo $row['district'];?></td>
                    <td align="left"><?PHP echo $row['state'];?></td>
                    <td align="left"><?PHP echo $row['country'];?></td>
                 </tr> 
                 
                 <?php } else {?>
                 	
                 <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
                    <td align="center"><?PHP echo $count;?></td>
                    <td align="left"><img src="image/notTick.png" />1</td>
                    <td align="left"><?PHP echo $row['courseID'];?></td>
                    <td align="center"><?PHP echo $row['ID'];?></td>
                    <td align="left"><?PHP echo $row['name'];?></td>
                    <td align="left"><?PHP echo $row['gender'];?></td>
                    <td align="left"><?PHP echo $row['dd'] . '/' . $row['mm'] . '/' . $row['yyyy'];?></td>
                    <td align="left"><?PHP echo $row['Fathers name'];?></td>
                    <td align="left"><?PHP echo $row['Mothers name'];?></td>
                    <td align="left"><?PHP echo $row['marksobt'];?></td>
                    <td align="left"><?PHP echo $row['boarduniv'];?></td>
                    <td align="left"><?PHP echo $row['yearofpassing'];?></td>
                    <td align="left"><?PHP echo $row['strmsub'];?></td>
                    <td align="left"><?PHP echo $row['phone1'];?></td>
                    <td align="left"><?PHP echo $row['mobile1'];?></td>
                    <td align="left"><?PHP echo $row['phone2'];?></td>
                    <td align="left"><?PHP echo $row['mobile2'];?></td>
                    <td align="left"><?PHP echo $row['address'];?></td>
                    <td align="left"><?PHP echo $row['city'];?></td>
                    <td align="left"><?PHP echo $row['district'];?></td>
                    <td align="left"><?PHP echo $row['state'];?></td>
                    <td align="left"><?PHP echo $row['country'];?></td>
                   
                 </tr> 
                    
                 <?php }  }?>
                 
			<?PHP $count=$count+1;} ?>
		<?PHP }?>
        
        </table>
        </center>
	</body>
</html>
