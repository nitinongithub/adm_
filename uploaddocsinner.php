<?PHP
	session_start();
	require("dbconnect.php");
	
	$_SESSION['regIDji'] = $_POST['txtregno'];
	
	$QryChkLst = "select * from checkList order by chkLstID"; 
	$rsltChkLst = mysql_query($QryChkLst) or die(mysql_error());  
	
	$qry="SELECT * FROM stud_personal where id='" . $_SESSION['regIDji'] . "'";
	$result = mysql_query($qry) or die(mysql_error());
	
	if(mysql_numrows($result) > 0){
		$row = mysql_fetch_array($result);
		$_SESSION['crs_'] = $crs = $row['courseID'];	
	}else{ $_SESSION['crs_'] = $crs = 'x'; }

	$qry="SELECT * FROM stud_personal where id='" . $_SESSION['regIDji'] . "'";
	$result = mysql_query($qry) or die(mysql_error());
	
	$Qry_sem = "select * from semesters where courseID = '$crs' order by id";
	$result_sem = mysql_query($Qry_sem) or die(mysql_error());
?> 
<!-- <script type="text/javascript">
$.noConflict();
</script>
<script type="text/javascript" src="scripts/jquery.form.js"></script>
<script type="text/javascript">
$(function(){
	alert('hello');
	$('#frmRegUploadDocs').on('submit',(function(e){
	    e.preventDefault();
	    	if($('#cmbChkList').val() == ''){
	    		$('#msg_').html("<div style='text-align:center; color:#ff0000'>X: Please select document type</div>");
	    	}else if($('#cmbSem').val() == ''){
	    		$('#msg_').html("<div style='text-align:center; color:#ff0000'>X: Please select Semester type</div>");
	    	}else if($('#txtDoc').val() == '' || $('#txtDoc').val() == 'x'){
	    		$('#msg_').html("<div style='text-align:center; color:#ff0000'>X: Please name the document as per document type</div>");
	    	}else{
	    		$('#submit_upload').attr('disabled', ''); // disable upload button
		        //show uploading message
		        $("#msg_").html('<div style="padding:10px"><img src="images/loading.gif" alt="Please Wait"/> <span>Uploading...</span></div>');
		        $(this).ajaxSubmit({
			        target: '#msg_',
			        success:  function(data){
			        	//$('#frmCompare').resetForm();  // reset form
			    	    $('#submit_upload').removeAttr('disabled'); //enable submit button
			        } //call function after success
		        });
	    	}
	return false;
	}));
});
</script> -->
<form name="frmRegUploadDocs" id="frmRegUploadDocs" action="upload_file_.php" method="post" enctype="multipart/form-data">
            <table border="0" cellpadding="0" cellspacing="0" width="690">
            <tr> 
            	<td height="1" colspan="3"></td>
            </tr>
        	
            <tr>
                <td valign="top">
                	<?PHP if(mysql_num_rows($result) > 0){?>
                    <table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="300">
                        <tr>
                            <td colspan="2">
                            	<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="300">
                                	<td class="tdStyle" height="25" valign="bottom" align="left"><span style="font-weight:bold; color:#69F;">Document(s)</span></td>
                                </table>
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="2" height="5"></td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                                	<tr>
                                		<td style="font-weight:bold; color:#690000;" align="left">Document Type</td>
                                	</tr>
                                	<tr>
                                    	<td valign="middle" align="left">
	                                    	<select name="cmbChkList" id="cmbChkList" style="width:100px" onclick="enter_doc_();">
	                                    			<option value="x">Select</option>
		                                		<?PHP while($rowCL = mysql_fetch_array($rsltChkLst)){?>
		                                			<option value="<?php echo $rowCL['chkLstID'];?>" title="hello..."><?php echo $rowCL['checkList'];?></option>
		                                		<?PHP }?>
	                                		</select>
                                    	</td>
                                    </tr>
                                </table>
                            </td>
                            <td valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" class="txtContent">
                                	<tr>
                                		<td style="font-weight:bold; color:#690000;" align="left">Semester</td>
                                	</tr>
                                	<tr>
                                    	<td valign="middle" align="left">
	                                    	<select name="cmbSem" id="cmbSem" style="width:100px">
	                                    			<option value="x">Select</option>
	                                		<?PHP while($rowsem = mysql_fetch_array($result_sem)){?>
	                                			<option value="<?php echo $rowsem['sem'];?>"><?php echo $rowsem['courseID'].'-'.$rowsem['sem'];?></option>
	                                		<?PHP }?>
	                                		</select>
                                    	</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                        	<td height="10" colspan="2"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" >
                        		<table border="0" cellpadding="0" cellspacing="0" class="txtContent">
	                        		<tr>
	                                	<td style="font-weight:bold; color:#690000;" align="left">Document</td>
	                                </tr>
                                </table>
                        	</td>
                        </tr>
                        <tr>
                        	<td colspan="2">
                        		<table border="0" cellpadding="0" cellspacing="0" class="txtContent">
	                        		<tr>
	                                	<td style="font-weight:bold; color:#690000;" align="left"><input type="text" value="x" name="txtDoc" id="txtDoc" style="width:250px; color:#0000ff; border:0px border-bottom:#FF0000 dotted 0px; border-top:#FF0000 dotted 1px" /></td>
	                                </tr>
                                </table>
                        	</td>
                        </tr>
                        <tr>
                        	<td height="10" colspan="2"></td>
                        </tr>
                        <tr>
                        	<td colspan="2">
                        		<table border="0" cellpadding="0" cellspacing="0" class="txtContent">
	                        		<tr>
	                                	<td style="font-weight:bold; color:#690000;" align="left"><input type="file" value="" name="txtUpload_" id="txtUpload_" style="width:250px; color:#0000ff; border:0px border-bottom:#FF0000 dotted 0px; border-top:#FF0000 dotted 1px" /></td>
	                                </tr>
                                </table>
                        	</td>
                        </tr>
                        <tr>
			            	<td colspan="2" height="5" bgcolor="#ffffff"></td>
			            </tr>
                        <?PHP if(mysql_num_rows($result) > 0){?>
			            <tr bgcolor="#f0f0f0">
			            	<td align="left" width="100%" colspan="2"><input type="button" name="submit_upload_" id="submit_upload_" value="Upload" style="background:#ff0000; width:100px; height:30px; border:#ff0000 solid 0px; color:#ffffff; font-size:15px" onclick="upload_doc();"></td>
			            </tr>
			            <tr>
			            	<td colspan="2" height="1" bgcolor="#909090"></td>
			            </tr>
			            <?PHP }?>
                    </table>
                    
                    <?PHP }else{?>
                    <table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="300">
                        <tr>
                            <td class="tdStyle" height="25" valign="bottom" align="left"><span style="font-weight:bold; color:#69F;">Check List</span></td>
                        </tr>
                        <tr>
                            <td height="5"></td>
                        </tr>
                        <tr>
                            <td align="left">No Check List...</td>
                        </tr>
                    </table>
                    <?PHP }?>
                </td>
                <td width="10"></td>
                <td valign="top" align="right">
                	<?PHP include("PrintPersonalDetailForDocCheck.php");?>
                </td>
            </tr>
            <tr>
            	<td height="1" colspan="3"></td>
            </tr>
        </table>
        </form>
        
        <?php
                        	$q = "select * from documents where courseID='".$_SESSION['crs_']."' and stud_id='".$_SESSION['regIDji']."'"; 
                        	$resdocs = mysql_query($q) or die(mysql_error());
                        ?>
                        <div style="float:left; padding:0px 0px 0px 15px">
                        <form name="frmShowFile" id="frmShowFile" action="showdoc.php" method="post" target="_blank">
                        		<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="340">
                        				<tr>
                        					<td height="5" colspan="2"></td>
                        				</tr>
	                        			<tr>
	                        				<td align="left" style="padding:0px 0px 0px 3px; color:#000000; font-weight:bold; color:#900000" colspan="2">Documents already Uploaded</td>
	                        			</tr>
	                        			<?php if(mysql_num_rows($resdocs) > 0){?>
	                        			<tr>
		                        			<td align="left" width="250">
		                        				<select name="cmbDocuments" id="cmbDocuments" multiple style="width:250px" onclick="choose_file_for_display();">
		                        					<?php while($row = mysql_fetch_array($resdocs)){?>
		                        						<option value="<?php echo $row['upload_id']; ?>"><?php echo $row['documentName']; ?></option>
		                        					<?php }?>
		                        				</select>
		                        			</td>
		                        			<td width="90">
		                        				<table border="0" cellpadding="0" cellspacing="0" class="txtContent" width="100%" height="100%">
		                        					<tr>
		                        						<td height="22"><input type="hidden" name="txtFileID" id="txtFileID" value="x" size="5"><input type="hidden" name="chk_ji" id="chk_ji" /> </td>
		                        					</tr>
		                        					<tr>
		                        						<td>
		                        							<input type="button" value="Show" style="background:#ffff00; color:#ff0000; font-weight:bold" onclick="print_uploaded_file();"><br />
		                        							<input type="button" value="Delete" style="background:#ff0000; color:#ffff00; font-weight:bold" onclick="print_uploaded_file_();">
		                        						</td>
		                        					</tr>
		                        				</table>
		                        			</td>
	                        			</tr>
	                        			<?php }else{?>
	                        			<tr>
	                        				<td align="left">
	                        				<select name="cmbDocuments" id="cmbDocuments" multiple style="width:250px">
	                        					<option value="x">No document uploaded yet...</option>
	                        				</select>
	                        			</td>
	                        			</tr>
	                        			<?php }?>
                        		</table>
                        </form>
                        </div>