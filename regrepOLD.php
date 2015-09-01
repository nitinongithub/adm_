<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>. : General Registration Report : .</title>
        <?PHP require("headerinclude.php");?>
    </head>
<body>
<?php
	session_start();
	require("dbconnect.php");
?>   
<?php	
		
	
	$name=strtoupper($_POST["txtname"]);
	$course=$_POST["cmbCourse"];
	$cat=$_POST["category"];
	$subcat=$_POST["subcat"];
	$loan=$_POST["loan"];
	
		
	
	if($name=="ALL")
	{
			if($course=="ALL")
			{
						if($cat=="ALL")
						{
								if($subcat=="ALL")
								{
										if($loan=="ALL")
										{
											$qry="SELECT * FROM registeredstudents ORDER BY COURSE";
										}
										else
										{
											$qry="SELECT * FROM registeredstudents where `LOAN REQUIRED`='".$loan."'";
										}
								}
								else
								{
									
										if($loan=="ALL")
										{
											$qry="SELECT * FROM registeredstudents WHERE SUBCAT='".$subcat."'";
										}
										else
										{
											$qry="SELECT * FROM registeredstudents where SUBCAT='".$subcat."' AND `LOAN REQUIRED`='".$loan."'";
										}
													
								}
						}
						else
						{
								if($subcat=="ALL")
								{
										if($loan=="ALL")
										{
											$qry="SELECT * FROM registeredstudents WHERE CATEGORY='".$cat."'";
										}
										else
										{
											$qry="SELECT * FROM registeredstudents where CATEGORY='".$cat."' AND`LOAN REQUIRED`='".$loan."'";
										}
								}
								else
								{
									
										if($loan=="ALL")
										{
											$qry="SELECT * FROM registeredstudents WHERE CATEGORY='".$cat."' AND SUBCAT='".$subcat."'";
										}
										else
										{
											$qry="SELECT * FROM registeredstudents where CATEGORY='".$cat."' AND SUBCAT='".$subcat."' AND `LOAN REQUIRED`='".$loan."'";
										}
													
								}	
									
						}
			}
			else
			{
						
						if($cat=="ALL")
						{
								if($subcat=="ALL")
								{
										if($loan=="ALL")
										{
											$qry="SELECT * FROM registeredstudents WHERE COURSE='".$course."'";
										}
										else
										{
											$qry="SELECT * FROM registeredstudents where  COURSE='".$course."' AND `LOAN REQUIRED`='".$loan."'";
										}
								}
								else
								{
									
										if($loan=="ALL")
										{
											$qry="SELECT * FROM registeredstudents WHERE  COURSE='".$course."' AND SUBCAT='".$subcat."'";
										}
										else
										{
											$qry="SELECT * FROM registeredstudents where  COURSE='".$course."' AND SUBCAT='".$subcat."' AND `LOAN REQUIRED`='".$loan."'";
										}
													
								}
						}
						else
						{
								if($subcat=="ALL")
								{
										if($loan=="ALL")
										{
											$qry="SELECT * FROM registeredstudents WHERE  COURSE='".$course."' AND CATEGORY='".$cat."'";
										}
										else
										{
											$qry="SELECT * FROM registeredstudents where  COURSE='".$course."' AND CATEGORY='".$cat."' AND`LOAN REQUIRED`='".$loan."'";
										}
								}
								else
								{
									
										if($loan=="ALL")
										{
											$qry="SELECT * FROM registeredstudents WHERE  COURSE='".$course."' AND CATEGORY='".$cat."' AND SUBCAT='".$subcat."'";
										}
										else
										{
											$qry="SELECT * FROM registeredstudents where  COURSE='".$course."' AND CATEGORY='".$cat."' AND SUBCAT='".$subcat."' AND `LOAN REQUIRED`='".$loan."'";
										}
													
								}	
									
						}	
			}
	}
	else
	{
			if($course=="ALL")
			{
						if($cat=="ALL")
						{
								if($subcat=="ALL")
								{
										if($loan=="ALL")
										{
											$qry="SELECT * FROM registeredstudents where name like '". $name ."%'";
										}
										else
										{
											$qry="SELECT * FROM registeredstudents where name like '". $name ."%' AND `LOAN REQUIRED`='".$loan."'";
										}
								}
								else
								{
									
										if($loan=="ALL")
										{
											$qry="SELECT * FROM registeredstudents WHERE name like '". $name ."%' AND SUBCAT='".$subcat."'";
										}
										else
										{
											$qry="SELECT * FROM registeredstudents where name like '". $name ."%' AND SUBCAT='".$subcat."' AND `LOAN REQUIRED`='".$loan."'";
										}
													
								}
						}
						else
						{
								if($subcat=="ALL")
								{
										if($loan=="ALL")
										{
											$qry="SELECT * FROM registeredstudents WHERE name like '". $name ."%' AND CATEGORY='".$cat."'";
										}
										else
										{
											$qry="SELECT * FROM registeredstudents where name like '". $name ."%' AND CATEGORY='".$cat."' AND`LOAN REQUIRED`='".$loan."'";
										}
								}
								else
								{
									
										if($loan=="ALL")
										{
											$qry="SELECT * FROM registeredstudents WHERE name like '". $name ."%' AND CATEGORY='".$cat."' AND SUBCAT='".$subcat."'";
										}
										else
										{
											$qry="SELECT * FROM registeredstudents where name like '". $name ."%' AND CATEGORY='".$cat."' AND SUBCAT='".$subcat."' AND `LOAN REQUIRED`='".$loan."'";
										}
													
								}	
									
						}
			}
			else
			{
						
						if($cat=="ALL")
						{
								if($subcat=="ALL")
								{
										if($loan=="ALL")
										{
											$qry="SELECT * FROM registeredstudents WHERE name like '". $name ."%' AND COURSE='".$course."'";
										}
										else
										{
											$qry="SELECT * FROM registeredstudents where  name like '". $name ."%' AND COURSE='".$course."' AND `LOAN REQUIRED`='".$loan."'";
										}
								}
								else
								{
									
										if($loan=="ALL")
										{
											$qry="SELECT * FROM registeredstudents WHERE  name like '". $name ."%' AND COURSE='".$course."' AND SUBCAT='".$subcat."'";
										}
										else
										{
											$qry="SELECT * FROM registeredstudents where  name like '". $name ."%' AND COURSE='".$course."' AND SUBCAT='".$subcat."' AND `LOAN REQUIRED`='".$loan."'";
										}
													
								}
						}
						else
						{
								if($subcat=="ALL")
								{
										if($loan=="ALL")
										{
											$qry="SELECT * FROM registeredstudents WHERE  name like '". $name ."%' AND COURSE='".$course."' AND CATEGORY='".$cat."'";
										}
										else
										{
											$qry="SELECT * FROM registeredstudents where  name like '". $name ."%' AND COURSE='".$course."' AND CATEGORY='".$cat."' AND`LOAN REQUIRED`='".$loan."'";
										}
								}
								else
								{
									
										if($loan=="ALL")
										{
											$qry="SELECT * FROM registeredstudents WHERE  name like '". $name ."%' AND COURSE='".$course."' AND CATEGORY='".$cat."' AND SUBCAT='".$subcat."'";
										}
										else
										{
											$qry="SELECT * FROM registeredstudents where  name like '". $name ."%' AND COURSE='".$course."' AND CATEGORY='".$cat."' AND SUBCAT='".$subcat."' AND `LOAN REQUIRED`='".$loan."'";
										}
													
								}	
									
						}	
			}		
	}
	
	
	
	
	
		$result = mysql_query($qry) or die(mysql_error());
?>






		<?PHP if(mysql_num_rows($result) >0){?>	
			<br />
            <table border="0" cellpadding="0" cellspacing="0" class="sortable" id="hovertable">
                <tr>
                    <th align="center">REG. NO.</th>
                    <th align="left">NAME</th>
                    <th align="left">GENDER</th>
                    <th align="left">DATE OF BIRTH</th>
                    <th align="left">FATHER NAME</th>
                    <th align="left">MOTHER NAME</th>
                    <th align="left">COURSE</th>
                    <th align="left">NATIONALITY</th>
                    <th align="left">STATE</th>
                    <th align="left">CATEGORY</th>
                    <th align="left">SUB CATEGORY</th>
                    <th align="left">REG DATE</th>
                    <th align="left">LOAN REQUIRED</th>
                </tr>
                <?php while($row = mysql_fetch_array($result)){?>
                <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
                	<a href="dispRegDetail.php?txtregno=<?PHP echo $row['REGISTRATION NO'] ;?>" target="_blank">
                    <td align="center"><?PHP echo $row['REGISTRATION NO'];?></td>
                    <td align="left"><?PHP echo $row['NAME'];?></td>
                    <td align="left"><?PHP echo $row['GENDER'];?></td>
                    <td align="left"><?PHP echo $row['DOB'];?></td>
                    <td align="left"><?PHP echo $row['FATHER NAME'];?></td>
                    <td align="left"><?PHP echo $row['MOTHER NAME'];?></td>
                    <td align="left"><?PHP echo $row['COURSE'];?></td>
                    <td align="left"><?PHP echo $row['NATIONALITY'];?></td>
                    <td align="left"><?PHP echo $row['STATE'];?></td>
                    <td align="left"><?PHP echo $row['CATEGORY'];?></td>
                    <td align="left"><?PHP echo $row['SUBCAT'];?></td>
                    <td align="left"><?PHP echo $row['REG DATE'];?></td>
                    <td align="left"><?PHP echo $row['LOAN REQUIRED'];?></td>
                    </a>
                </tr>        
			<?PHP } ?>
		<?PHP } ?>
        </table>
	</body>
</html>


