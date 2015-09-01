// JavaScript Document
var x;
var obj;
var dt = new Date();
var _validFileExtensions = [".jpg", ".JPG", ".jpeg", ".JPEG", ".bmp", ".BMP", ".gif", ".GIF", ".png", ".PNG"];

function validPrevDataDate(){
	if(document.getElementById("date1").value == ""){
		alert("Please fill in the date first.");
		document.getElementById("date1").focus();
		return false;
	}else{
		x = document.getElementById("date1").value;
		x = x.split("/");
		//alert(x[2] + " - " + dt.getFullYear());
		if(x[2] >= dt.getFullYear()){
			alert("Year cannot be greater than current year.");
			document.getElementById("date1").focus();
			return false;
		}else{
			return true;
		}
	}
}
	
function checkUnCheck(val){
	chkBoxesLog = document.getElementsByName("chkLST[]");
	if(val == 1){ 
		for(var loop1 = 0; loop1<=chkBoxesLog.length; loop1++) chkBoxesLog[loop1].checked=true;
	}else{for(var loop1 = 0; loop1<=chkBoxesLog.length; loop1++) chkBoxesLog[loop1].checked=false;}
}
	
String.prototype.trim = function() {
	return this.replace(/^\s+|\s+$/g,"");
}
String.prototype.ltrim = function() {
	return this.replace(/^\s+/,"");
}
String.prototype.rtrim = function() {
	return this.replace(/\s+$/,"");
}

function validateDateFormat(){
	var i = new Array();
	var str = feerpt.startdt.value;
	alert(str);
	var i = str.split('/');
}
function gD(){
	var currentTime = new Date();
	var month = currentTime.getMonth() + 1;
	var day = currentTime.getDate();
	var year = currentTime.getFullYear();
	this.value = month + "/" + day + "/" + year;
}

function blurNum(num){
	obj = num;
	obj.value=obj.value.trim();
	if(isNaN(obj.value.trim())==true){obj.value = 0;}
	if(obj.value.trim() == ""){obj.value = 0;}
}
function focusNum(num){
	obj = num;
	obj.value=obj.value.trim();
	if(isNaN(obj.value.trim())==true){obj.value = 0;}
	if(obj.value.trim() == 0){obj.value = "";}
}

function blurStrReason(str){
	obj = str;
	if(obj.value.trim() == ""){obj.value = "Write reason here...";}
}

function focusStrReason(str){
	obj = str;
	if(obj.value.trim() == "Write reason here..."){obj.value = "";}
}

function blurStr(str){
	obj = str;
	if(obj.value.trim() == ""){obj.value = "-x-";}
}
function focusStr(str){
	obj = str;
	if(obj.value.trim() == "-x-"){obj.value = "";}
}
function sameAsAbove(txtArea, cmbCntry, cmbState, cmbDistt, cmbCity , txtPh, txtMb){
	objCntry = cmbCntry;
	objState = cmbState;
	objDistt = cmbDistt;
	objCity = cmbCity;
	
	objArea = txtArea;
	objPh = txtPh;
	objMob = txtMb;

	objCntry.value = frmReg.cmbPCountry.value;
	objState.value = frmReg.cmbPState.value;
	objDistt.value = frmReg.cmbPDistt.value;
	objCity.value = frmReg.cmbPCity.value;
	objArea.value = frmReg.txtPAddress.value;
	objPh.value = frmReg.txtPPh.value;
	objMob.value = frmReg.txtPMob.value;
}

 jQuery((function($) {
       //$.mask.definitions['~'] = "[+-]";
	   
	   //$.datepicker.formatDate('dd-mm-yy', new Date(2007, 1 - 1, 26));
        $("#date1").mask("99/99/9999");
		//.datepicker({dateFormat: 'yy-mm-dd'});
				//.datepicker({ nextText: "", prevText: "", changeMonth: true, changeYear: true })
		
				
		$("#date2").mask("99/99/9999");
		//.datepicker({ nextText: "", prevText: "", changeMonth: true, changeYear: true })
		
		
        //$("#phone").mask("(999) 999-9999");
        //$("#phoneExt").mask("(999) 999-9999? x99999");
        //$("#iphone").mask("+33 999 999 999");
        //$("#tin").mask("99-9999999");
        //$("#ssn").mask("999-99-9999");
        //$("#product").mask("a*-999-a999", { placeholder: " " });
        //$("#eyescript").mask("~9.99 ~9.99 999");
        //$("#po").mask("PO: aaa-999-***");
		//$("#pct").mask("99%");

        //$("input").blur(function() {
        //    $("#info").html("Unmasked value: " + $(this).mask());
        //}).dblclick(function() {
        //    $(this).unmask();
       // });
    }));

function validateEditRegForm(){
	if(frmReg.chooseCourse.value=="No Course Selected Yet..."){
		frmReg.chooseCourse.focus();
	}else if(frmReg.txtName.value.trim()==""){
		alert("Please enter the contestent name first.");
		frmReg.txtName.value=frmReg.txtName.value.trim();
		frmReg.txtName.focus();
	}else if(frmReg.dobDD.value=="dd"){
		alert("Please Select Date in Date of Birth Section.");
		frmReg.dobDD.focus();
	}else if(frmReg.dobMM.value=="mm"){
		alert("Please Select Month in Date of Birth Section.");
		frmReg.dobMM.focus();
	}else if(frmReg.dobYY.value=="yyyy"){
		alert("Please Select Year in Date of Birth Section.");
		frmReg.dobMM.focus();
	}else if(frmReg.txtFName.value.trim()==""){
		alert("Please enter father's Name first.");
		frmReg.txtFName.value=frmReg.txtFName.value.trim();
		frmReg.txtFName.focus();
	}else if(frmReg.txtMName.value.trim()==""){
		alert("Please enter mothers's Name first.");
		frmReg.txtMName.value=frmReg.txtMName.value.trim();
		frmReg.txtMName.focus();
	}else if(frmReg.txtNationality.value.trim()==""){
		alert("Please enter Nationality first.");
		frmReg.txtNationality.value=frmReg.txtNationality.value.trim();
		frmReg.txtNationality.focus();
	}else{
			if(frmReg.optLoan[1].checked == true){
				ansji = confirm("Loan is not required. Are you sure?");
				if(ansji == true){frmReg.submit();}
			}else{
				frmReg.submit();
			}
		}
}


function validateRegForm(){
	if(frmReg.uploadPic.value==""){
		alert("Please choose the photo first.");
		frmReg.uploadPic.focus();
	}else if(frmReg.chooseCourse.value=="No Course Selected Yet..."){
		frmReg.chooseCourse.focus();
	}else if(frmReg.txtName.value.trim()==""){
		alert("Please enter the contestent name first.");
		frmReg.txtName.value=frmReg.txtName.value.trim();
		frmReg.txtName.focus();
	}else if(frmReg.dobDD.value=="dd"){
		alert("Please Select Date in Date of Birth Section.");
		frmReg.dobDD.focus();
	}else if(frmReg.dobMM.value=="mm"){
		alert("Please Select Month in Date of Birth Section.");
		frmReg.dobMM.focus();
	}else if(frmReg.dobYY.value=="yyyy"){
		alert("Please Select Year in Date of Birth Section.");
		frmReg.dobMM.focus();
	}else if(frmReg.txtFName.value.trim()==""){
		alert("Please enter father's Name first.");
		frmReg.txtFName.value=frmReg.txtFName.value.trim();
		frmReg.txtFName.focus();
	}else if(frmReg.txtMName.value.trim()==""){
		alert("Please enter mothers's Name first.");
		frmReg.txtMName.value=frmReg.txtMName.value.trim();
		frmReg.txtMName.focus();
	}else if(frmReg.txtNationality.value.trim()==""){
		alert("Please enter Nationality first.");
		frmReg.txtNationality.value=frmReg.txtNationality.value.trim();
		frmReg.txtNationality.focus();
	}else if(frmReg.cmbSrcInfo.value == "Select..."){
		alert("Please select Source of Information first.");
		frmReg.cmbSrcInfo.focus();
	}else{
			if(frmReg.optLoan[1].checked == true){
				ansji = confirm("Loan is not required. Are you sure?");
				if(ansji == true){frmReg.submit();}
			}else{
				frmReg.submit();
			}
		}
}

function fillCourseToDisplay(){
	document.getElementById("msgJi").innerHTML = frmReg.chooseCourse.value;
}
//----
function FeevalidateForm()
{
	
	if(document.myForm.feemode[1].checked == true)
	{
		var x=document.forms["myForm"]["bank"].value;
		if (x==null || x=="")
		{
				alert("Kindly Enter the Bank Name First");
				document.forms["myForm"]["bank"].focus();
				return false;
		}
		else
		{
			var x=document.forms["myForm"]["ddno"].value;
			if (x==null || x=="")
			{
				alert("Kindly Enter the DD/Ch. No First");
				document.forms["myForm"]["ddno"].focus();
				return false;
			}
		}
		
			var x=document.forms["myForm"]["dddate"].value;
			if (x==null || x=="")
			{
				alert("Kindly Enter the DD Date First");
				document.forms["myForm"]["dddate"].focus();
				return false;
			}
		
		
			
	}
		
	
	
	
	
	
	if(document.myForm.feemode[2].checked == true)
	{
		var x=document.forms["myForm"]["bank"].value;
		if (x==null || x=="")
		{
				alert("Kindly Enter Bank Name First");
				document.forms["myForm"]["bank"].focus();
				return false;
		}
		else
		{
			var x=document.forms["myForm"]["ddno"].value;
			if (x==null || x=="")
			{
				alert("Kindly Enter the DD/Ch. No First");
				document.forms["myForm"]["ddno"].focus();
				return false;
			}
		}
		
			var x=document.forms["myForm"]["dddate"].value;
			if (x==null || x=="")
			{
				alert("Kindly Enter the Date First");
				document.forms["myForm"]["dddate"].focus();
				return false;
			}
	}
		
		
			
			
				var ft="";
				
				/*
				 if(document.myForm.feetype[0].checked == true){
					ft = "Registration";
				}
				
				if(document.myForm.feetype[1].checked == true){
					ft = "Admission";
				}
				
				if(document.myForm.feetype[2].checked == true){
					ft = "Withdrawal";
				} 
				 */
				
			
			ft = document.myForm.feetype.value;	
			
			if(ft=="x"){
				alert("Please select fee type first");
			return false;
			}
	
			if(ft=="Registration")
			{
					var rfee=document.forms["myForm"]["regfeesubmit"].value;
					var fs=document.forms["myForm"]["txtAmount"].value;
					var xr = parseInt(rfee, 10);
					var ffs= parseInt(fs, 10);
					if(xr > 0)
					{
						alert("Registration Fee can be Submitteted only once");
						return false;
					}
					
					if(ffs!=2000)
					{
						alert("Registration Fee is Rs. 2000 only");
						return false;
					}
					
					
			}else{
				var rfee=document.forms["myForm"]["regfeesubmit"].value;
				
				var admfee = document.forms["myForm"]["admfeesubmit"].value;
				var ctpdfee = document.forms["myForm"]["ctpdfeesubmit"].value;
				var skillcertfee = document.forms["myForm"]["skillcertfeesubmit"].value;
				var hostelfee = document.forms["myForm"]["hostelfeesubmit"].value;
				
				var totadmfee = parseInt(document.getElementById('txtTotalAcademics').value,10) + parseInt(document.getElementById('txtTotalUniversity').value,10);
				var totctpdfee = parseInt(document.getElementById('txtCTPD').value,10);
				var totskillcertfee = parseInt(document.getElementById('txtSkillCert').value,10);
				var tothostelfee = parseInt(document.getElementById('txtHostel').value,10);
				
				var amountFeeded = parseInt(document.getElementById('txtAmount').value, 0);
				
				var xr = parseInt(rfee, 10);
				if(xr<1)
				{
					alert("Kindly Deposit Registration Fee First");
					return false;
				}
				
				//Admission Fee
				if(ft == "Admission" && (totadmfee - (admfee)) <= 0){
					alert("Admission Fee already submitted");
				return false;
				}
				
				if(ft == "Admission" && (totadmfee < amountFeeded)){
					alert("Admission Fee amount exceeded");
				return false;
				}

				if(ft == "Admission" && (totadmfee < (parseInt(amountFeeded, 10) + parseInt(admfee, 10)))){
					alert("Admission Fee amount exceeded");
				return false;
				}
				//------------
				
				//CTPD Fee
				if(ft == "CTPD*" && (totctpdfee - (ctpdfee)) <= 0){
					alert("CTPD Fee already submitted");
				return false;
				}
				
				if(ft == "CTPD*" && (totctpdfee < amountFeeded)){
					alert("CTPD Fee amount exceeded");
				return false;
				}
				
				if(ft == "CTPD*" && (totctpdfee < (parseInt(amountFeeded, 10) + parseInt(ctpdfee, 10)))){
					alert("CTPD Fee amount exceeded");
				return false;
				}
				//---------
				
				//Skill Certification Fee
				if(ft == "SKILL_CERT*" && (totskillcertfee - (skillcertfee)) <= 0){
					alert("Skill Certification Fee already submitted");
				return false;
				}
				
				if(ft == "SKILL_CERT*" && (totskillcertfee < amountFeeded)){
					alert("Skill Certification Fee amount exceeded");
				return false;
				}
				
				if(ft == "SKILL_CERT*" && (totskillcertfee < (parseInt(amountFeeded, 10) + parseInt(skillcertfee, 10)))){
					alert("Skill Certification Fee amount exceeded");
				return false;
				}
				//-------------------
				
				//Hostel Fee

				if(ft == "Hostel*" && (tothostelfee - (hostelfee)) <= 0){
					alert("Hostel Fee already submitted");
				return false;
				}

				if(ft == "Hostel*" && (tothostelfee < amountFeeded)){
					alert("Hostel Fee amount exceeded");
				return false;
				}
				
				if(ft == "Hostel*" && (tothostelfee < (parseInt(amountFeeded, 10) + parseInt(hostelfee, 10)))){
					alert("Hostel Fee amount exceeded");
				return false;
				}
				//-------------
			}	
				
				
			/*		
			if(ft=="Admission" || ft=="Withdrawal" || ft!="Registration")
			{
					
			}
			*/
			
			
			
			if(ft=="Withdrawal")
			{
					var adfee=document.forms["myForm"]["admfeesubmit"].value;
					var wfee=document.forms["myForm"]["txtAmount"].value;
					var admst=document.forms["myForm"]["admstatus"].value;
					var adfee1 = parseInt(adfee, 10);
					var wfee1 = parseInt(wfee, 10);
					
					
					if(admst=='A')
					{
							alert("Can not Withdraw fees, Admission Taken");
							return fals;
					}
					
					if(wfee1>adfee1)
					{
						alert("Can not withdraw Rs "+ wfee1 +", You have Submitteted Only Rs."+adfee1+" Against Admission Fee");
						return false;
					}
					
					
			}
			
			
			
			
			
			
		
	
	
			var x=document.forms["myForm"]["txtAmount"].value;
			if (x==null || x==""){
				alert("Kindly Enter the Fee First");
				document.forms["myForm"]["txtAmount"].focus();
				return false;
			}else{
				var inpVal = parseInt(x, 10);
				if (isNaN(inpVal)){
					alert ("Please enter a number only.");
					document.forms["myForm"]["txtAmount"].value="";
					document.forms["myForm"]["txtAmount"].focus();
					return false;
				}else{
					if(inpVal<=0){
						alert ("Please enter positive or NonZero values only");
						document.forms["myForm"]["txtAmount"].value="";
						document.forms["myForm"]["txtAmount"].focus();
						return false;
					}else{
						sendRequestAmt('feesubmit.php');
					}
				}
			}
	
}

//----
function validateEditReg(str){
	if(document.getElementById("txtregno").value.trim() == ""){
		document.getElementById("txtregno").value=document.getElementById("txtregno").value.trim();
		alert("Enter Registration no to proceed.");
	}else{
		frmEditReg.submit();
	}
}

function AdmissionvalidateForm()
{

var x=document.forms["feeForm"]["feerow"].value;
 
  var inpVal = parseInt(x, 10);
        if (inpVal<1) 
		{
            alert ("Please Submit Your Admission Fee First.");
			return false;
		}else{
			sendRequestAdmission('admit.php');
		}
 }
 
 
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx 
 






function AlterRegistration()
{
			
			
			
		var x=document.forms["feeForm"]["ataken"].value;
   		var inpVal = x;
        if (inpVal>0) 
		{
            alert ("Can not Alter! Admission Taken in This Course,\n To Alter Withdraw Admission First");
			return false;
		}else{
			sendRequestAlter('AlterSubmit.php');
		}
			
			
			
			
			
			
			
			
			
			
		
 }
 
 
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx 
 













 
function AdmissionWithdrawl()
{

var x=document.forms["feeForm"]["admissiontaken"].value;
   var inpVal = x;
        if (inpVal<1) 
		{
            alert ("Can not withdraw Admission not Taken");
			return false;
		}else{
			sendRequestW('AdmissionWithdrawl.php');
		}
 }
 
 
 
 
 
 
 
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    function createHTTP()
			{
				if(typeof XMLHttpRequest != 'undefined')
				{
					return (new XMLHttpRequest());
				}else if(window.ActiveXObject)
				{
					var rVersion = [
										"Microsoft.MSXML",
										"MSXML2.XMLHttp",
										"MSXML2.XMLHttp.3.0",
										"MSXML2.XMLHttp.4.0",
										"MSXML2.XMLHttp.5.0",
										"MSXML2.XMLHttp.6.0"
									];
					for(var i=0;i<rVersion.length;i++)
					{
						try
						{
							var temp = new ActiveXObject(rVersion[i]);
							return temp;
						}
						catch(rError)
						{
						}
					}
				}
				throw new error("Object is not created");
			}
			
			function sendRequest(url)
			{
				//alert(document.getElementById("txtregno").value);
				var xmlhttp = createHTTP();
				var parameters="txtregno="+encodeURIComponent(document.getElementById("txtregno").value);
				xmlhttp.open("POST",url,true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				 
				xmlhttp.onreadystatechange= function (){
					if(xmlhttp.readyState==4)
					{
						if(xmlhttp.status==200){
							document.getElementById('detailJi').innerHTML= xmlhttp.responseText;
						}
					}
				}
				xmlhttp.send(parameters);
			}
			
			
			
			function sendRequestAmt(url)
			{
				var strFeeType;
				var strFeeMode;
				
				//alert(document.getElementById("txtregno").value);
				var xmlhttp = createHTTP();
				strFeeType = document.myForm.feetype.value;
				
				/* if(document.myForm.feetype[0].checked == true)
				{
					strFeeType = "Registration";
				}
				if(document.myForm.feetype[1].checked == true)
				{
					strFeeType = "Admission";
				}
				
				if(document.myForm.feetype[2].checked == true)
				{
					strFeeType = "Withdrawal";
				}
				
				*/
				
				
				
				if(document.myForm.feemode[0].checked == true)
				{
					strFeeMode = "Cash";
				}
				if(document.myForm.feemode[1].checked == true)
				{
					strFeeMode = "DD";
				}
				
				if(document.myForm.feemode[2].checked == true)
				{
					strFeeMode = "Cheque";
				}
				
				
				
				
				
				
				
				
				
				
				
				var parameters="txtAmount="+encodeURIComponent(document.getElementById("txtAmount").value)+"&feetype="+encodeURIComponent(strFeeType)+"&feemode="+encodeURIComponent(strFeeMode)+"&bank="+encodeURIComponent(document.getElementById("bank").value)+"&ddno="+encodeURIComponent(document.getElementById("ddno").value)+"&dddate="+encodeURIComponent(document.getElementById("dddate").value);
					
				xmlhttp.open("POST",url,true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				 
				xmlhttp.onreadystatechange= function (){
					if(xmlhttp.readyState==4)
					{
						if(xmlhttp.status==200){
							document.getElementById('success').innerHTML= xmlhttp.responseText;
							sendRequest('fee1.php');
						}
					}
				}
				xmlhttp.send(parameters);
			}
			
			
			
			
			function sendRequestAdmission(url)
			{
				
				var xmlhttp = createHTTP();
				
				var parameters="cmbCourse="+encodeURIComponent(document.getElementById("cmbCourse").value)+"&quota="+encodeURIComponent(document.getElementById("quota").value)+"&category="+encodeURIComponent(document.getElementById("category").value)+"&subcat="+encodeURIComponent(document.getElementById("subcat").value);
				
				//alert(parameters);
				xmlhttp.open("POST",url,true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
				 
				xmlhttp.onreadystatechange= function (){
					if(xmlhttp.readyState==4)
					{
						if(xmlhttp.status==200){
							document.getElementById('admission').innerHTML= xmlhttp.responseText;
							sendRequest('process.php');
						}
					}
				}
				xmlhttp.send(parameters);
				
			}
			
			
			
			
			
			
			
			
			function sendRequestAlter(url)
			{
				
				var xmlhttp = createHTTP();
				
				var parameters="cmbCourse="+encodeURIComponent(document.getElementById("cmbCourse").value);
				
				
				xmlhttp.open("POST",url,true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
				 
				xmlhttp.onreadystatechange= function (){
					if(xmlhttp.readyState==4)
					{
						if(xmlhttp.status==200){
							document.getElementById('admission').innerHTML= xmlhttp.responseText;
							sendRequest('alterRegProcess.php');
						}
					}
				}
				xmlhttp.send(parameters);
				
			}
			
			
			
			
			
			
			
			
			
			
			
			
			
			function sendRequestW(url)
			{
				
				var xmlhttp = createHTTP();
				
				var parameters="reason="+encodeURIComponent(document.getElementById("reason").value);
				
				//alert(parameters);
				xmlhttp.open("POST",url,true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
				 
				xmlhttp.onreadystatechange= function (){
					if(xmlhttp.readyState==4)
					{
						if(xmlhttp.status==200){
							document.getElementById('admission').innerHTML= xmlhttp.responseText;
							sendRequest('admwi.php');
						}
					}
				}
				xmlhttp.send(parameters);
				
			}
			
			
			
			
			
			
			
			
			function sendRequestUploadPhoto(url)
			{
				//alert(document.getElementById("uploadPic").value + " -> " + url);
				var xmlhttp = createHTTP();
				var boundaryString = ',';
				var parameters="uploadPic="+encodeURIComponent(document.getElementById("uploadPic").value);
				alert(document.getElementById("uploadPic").value + " -> " + url + parameters);

				xmlhttp.open("POST",url,true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
				xmlHttp.setRequestHeader("Content-type", "multipart/form-data;"); 
				xmlhttp.onreadystatechange= function (){
					if(xmlhttp.readyState==4)
					{
						if(xmlhttp.status==200){
							alert("agaya - " + xmlhttp.responseText);
							document.getElementById('regPic').innerHTML= xmlhttp.responseText;
							//sendRequest('process.php');
						}
					}
				}
				xmlhttp.send();
			}
			
			function sendRequestFeeReport(url)
			{
				//alert(document.getElementById("date2").value);
				var xmlhttp = createHTTP();
				var parameters="startdt="+encodeURIComponent(document.getElementById("date1").value)+"&enddt="+encodeURIComponent(document.getElementById("date2").value);
				
				//alert(parameters);
				
				xmlhttp.open("POST",url,true);
				
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
				
				xmlhttp.onreadystatechange= function (){
					if(xmlhttp.readyState==4)
					{
						if(xmlhttp.status==200){
							//alert("agaya...");
							document.getElementById('detailJi').innerHTML= xmlhttp.responseText;
						}
					}
				}
				xmlhttp.send(parameters);
			}
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx



function sendRequestRegReport(url)
			{
				//alert(document.getElementById("date2").value);
				var xmlhttp = createHTTP();
				var parameters="startdt="+encodeURIComponent(document.getElementById("date1").value)+"&enddt="+encodeURIComponent(document.getElementById("date2").value);
				
				//alert(parameters);
				
				xmlhttp.open("POST",url,true);
				
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
				
				xmlhttp.onreadystatechange= function (){
					if(xmlhttp.readyState==4)
					{
						if(xmlhttp.status==200){
							//alert("agaya...");
							document.getElementById('detailJi').innerHTML= xmlhttp.responseText;
						}
					}
				}
				xmlhttp.send(parameters);
			}




//new################################
function showhidefieldData()
  {

		document.getElementById("CSDC").style.visibility = (document.getElementById("CSDC").style.visibility == "visible") ? "hidden" : "visible";
	
  }

function showhidefield()
  {
    if(document.myForm.feemode[0].checked == true)
	{
		document.getElementById("hideablearea").style.visibility = "hidden";
	}
	 else if(document.myForm.feemode[1].checked == true)
			{
				document.getElementById("hideablearea").style.visibility = "visible";
			}
			 else if(document.myForm.feemode[2].checked == true)
				{
					document.getElementById("hideablearea").style.visibility = "visible";
				}
	
  }

function resetPwd(url){
	if(document.getElementById("smbLogin").value == "Select..."){
		alert("First Select username first to reset.");
	}else{
		makeRequestToChngPwd_2(url, 0);
	}
}


function makeRequestToChngPwd_2(url, x) {

        var httpRequest;

        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
            httpRequest = new XMLHttpRequest();
            if (httpRequest.overrideMimeType) {
                httpRequest.overrideMimeType('text/xml');
                // See note below about this line
            }
        } 
        else if (window.ActiveXObject) { // IE
            try {
                httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } 
            catch (e) {
                try {
                    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } 
                catch (e) {}
            }
        }

        if (!httpRequest) {
            alert('Giving up :( Cannot create an XMLHTTP instance');
            return false;
        }
		if(x == 1){
			var parameters="txtPwdOld="+encodeURIComponent(document.getElementById("txtPwdOld").value)+"&txtPwdNew1="+encodeURIComponent(document.getElementById("txtPwdNew1").value)+"&txtPwdNew2="+encodeURIComponent(document.getElementById("txtPwdNew2").value);
		}else{
			var parameters="smbLogin="+encodeURIComponent(document.getElementById("smbLogin").value);
		}
        httpRequest.onreadystatechange = function() { alertContents(httpRequest); };
        //alert(parameters);
		httpRequest.open('POST', url, true);
		httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        httpRequest.send(parameters);
    }

function matchPwds(url){
	var str = "";
	if(document.getElementById("txtPwdOld").value == document.getElementById("txtPwdNew1").value){
		alert("New password should not be same as old.");
	}else if(document.getElementById("txtPwdNew1").value != document.getElementById("txtPwdNew2").value){
		alert("Confirm password does not match.");
		document.getElementById("txtPwdNew2").value = "";
		document.getElementById("txtPwdNew2").focus();
	}else{
		str = document.getElementById("txtPwdNew1").value;
		len = str.length;
		if(len < 6){
			alert("Password must be atleast six character long");
		}else{
			makeRequestToChngPwd_2(url, 1);
		}
	}
}

function makeRequestToChngPwd(url) {

        var httpRequest;

        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
            httpRequest = new XMLHttpRequest();
            if (httpRequest.overrideMimeType) {
                httpRequest.overrideMimeType('text/xml');
                // See note below about this line
            }
        } 
        else if (window.ActiveXObject) { // IE
            try {
                httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } 
            catch (e) {
                try {
                    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } 
                catch (e) {}
            }
        }

        if (!httpRequest) {
            alert('Giving up :( Cannot create an XMLHTTP instance');
            return false;
        }
        httpRequest.onreadystatechange = function() { alertContents(httpRequest); };
		
        httpRequest.open('GET', url, true);
		
        httpRequest.send('');
    }

    function alertContents(httpRequest) {
		//alert(httpRequest.responseText);
        if (httpRequest.readyState == 4) {
            if (httpRequest.status == 200) {
				//document.write(httpRequest.responseText);
				$('#loadGif').html('');
				document.getElementById("detailJi").innerHTML = httpRequest.responseText;
            } else {
                alert('There was a problem with the request.');
            }
        }
    }
  function sendRequestRegRept(url)
			{
				//alert(document.getElementById("txtregno").value);
				var xmlhttp = createHTTP();
				var parameters="txtname="+encodeURIComponent(document.getElementById("txtname").value)+"&cmbCourse="+encodeURIComponent(document.getElementById("cmbCourse").value)+"&category="+encodeURIComponent(document.getElementById("category").value)+"&subcat="+encodeURIComponent(document.getElementById("subcat").value)+"&loan="+encodeURIComponent(document.getElementById("loan").value);
				xmlhttp.open("POST",url,true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
				 
				xmlhttp.onreadystatechange= function (){
					if(xmlhttp.readyState==4)
					{
						if(xmlhttp.status==200){
							document.getElementById('detailJi').innerHTML= xmlhttp.responseText;
						}
					}
				}
				xmlhttp.send(parameters);
			}
			
			function sendRequestNewCrsRegister(url)
			{
				if(document.frmIICrsReg.chooseCourse.value == "No Course Selected Yet..."){
					alert("Please Select Course for New Registration first !!");
				}else{
					var xmlhttp = createHTTP();
				
					var parameters="txtHdn="+encodeURIComponent(document.getElementById("txtHdn").value)+"&chooseCourse="+encodeURIComponent(document.getElementById("chooseCourse").value);
					
					//alert(parameters);
					xmlhttp.open("POST",url,true);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
					
					document.getElementById('newCrsReg').innerHTML = '<img src="loading_1.gif"><br />...Please Wait...'
					
					xmlhttp.onreadystatechange= function (){
						if(xmlhttp.readyState==4)
						{
							if(xmlhttp.status==200){
								document.getElementById('newCrsReg').innerHTML= xmlhttp.responseText;
								document.getElementById('registerButton').innerHTML = "";
							}
						}
					}
					xmlhttp.send(parameters);
				}
			}
function validateCrs(){
	if(document.frmMeritGen.crsid.value == 'No Course Selected Yet...'){
		alert("sdfdsf");
	}else{
		frmMeritGen.submit();
	}
}
function hasExtension(inputID, exts) {
    var fileName = inputID;
    return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
}

function enter_doc_(){
	document.getElementById('txtDoc').value = document.getElementById('cmbChkList').options[document.getElementById('cmbChkList').value].text;
}
function upload_doc(){
	if(document.getElementById('cmbChkList').value == 'x'){
		alert('Please select document type.');
	}else if(document.getElementById('cmbSem').value == 'x'){
		alert('Please select Semester type.');
	}else if(document.getElementById('txtDoc').value == '' || document.getElementById('txtDoc').value == 'x'){
		alert('Please name the document as per document type.');
	}else if(document.getElementById('txtUpload_').value == ''){
		alert('Please Select file to upload');
	}else if(! hasExtension(document.getElementById('txtUpload_').value, [".jpg", ".JPG", ".jpeg", ".JPEG", ".bmp", ".BMP", ".gif", ".GIF", ".png", ".PNG"])){
		alert('Uploading file should be image having extentions (.jpg, .jpeg, .gif, .bmp, .png) only.');
	}else{
		document.frmRegUploadDocs.submit();
	}
}
function choose_file_for_display(){
	document.getElementById('txtFileID').value = document.getElementById('cmbDocuments').value;
}
function print_uploaded_file(){
	if(document.getElementById('txtFileID').value == 'x'){
		alert("Please select file to display.");
	}else{
		document.getElementById('chk_ji').value = 'upload';
		document.frmShowFile.submit();
	}
}
function print_uploaded_file_(){
	if(document.getElementById('txtFileID').value == 'x'){
		alert("Please select file to delete.");
	}else{
		document.getElementById('chk_ji').value = 'delete';
		document.frmShowFile.submit();
	}
}