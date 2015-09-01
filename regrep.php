<?php	
		
	
	$name=strtoupper($_SESSION['name']);
	$course=$_SESSION['course'];
	$cat=$_SESSION['cat'];
	$subcat=$_SESSION['subcat'];
	$loan=$_SESSION['loan'];
	
	$loop1 = 1;
		
	
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
            <table border="0" cellpadding="0" cellspacing="0" id="hovertable" class="sortable">
                <tr>
                	<th align="left">S. No.</th>
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
                    <th align="left">SUB CAT.</th>
                    <th align="left">REG DATE</th>
                    <th align="left">LOAN REQUIRED</th>
                </tr>
                <?php while($row = mysql_fetch_array($result)){?>
                <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
                    <td align="center"><?PHP echo $loop1;?></td>
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
                </tr> 
                </a>
                <?PHP $loop1 = $loop1 + 1?>       
			<?PHP } ?>
		<?PHP } ?>
        </table>


