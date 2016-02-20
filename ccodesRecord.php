<?php

     //***************************************************************************************************************
     //  File :  ccodesRecord.php
     //  Implements an Authentication and redirection
     //  Developed by:  Esau Ruiz
     //  Project: GSR Database Traffic Reporter
     //  The University of Texas at El Paso
     //  Date: 18/01/2016
     //****************************************************************************************************************

    session_start();   // Get session values saved previously in the system

    
    if(isset($_SESSION['valid_user']))
    {



?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<!-- meta elements -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	
	<title>ccodes Control Records</title>
	<!-- links -->
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	
	<!--Scripts-->

	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.4.js" ></script>
	<script type="text/javascript" src="ajax_functions.js" ></script>
    <script type="text/javascript">
            //*************************************************************************
	    	//** Method: loadCodeInterfaceDataFromServer
	    	//*  It calls the AJAX getCodeDataFromServer(i) with index flag to
            //*  Load data from server to populate in the combo box
            //*******************************************************************************
            function loadCodeInterfaceDataFromServer()
	    		{		
		     		
	             	
						getIPDataFromServer(3);    //get the WorldClass Data from Sever
		     		
	    		}
	</script>  	
	<script>
		//****************************************************************************************************************
		// Function:  reload()
		//  
		//****************************************************************************************************************
		function reload()
		{
			location.reload();
		}
	</script>
	
	<script src="ajax_functions.js" type="text/javascript"></script>
        <script type="text/javascript">
		
	     /**  Method:  ValidateForm()
	     *   It first validate if the form has correct information
	     *   than it sends the data to AJAX to insert it into database
	     */
	function ValidateForm()
	{
	    var Numbers = /^[0-9]+$/;
	    var Letters = /[a-zA-Z]*/;
	    
	    //Validate the code
		ctlCode = document.getElementById("code");
			
			// validate input code input 
        if (!ctlCode.value.match(Letters) || !Letters.length == 0)
	       {
		      alert("ERROR: The Code contains invalid input.");
	          return false;
	       }
	       
		
		ctlCountry =document.getElementById("country"); 
		//Validate the Discipline Name
		
		if (!ctlCountry.value.match(Letters) || !ctlCountry.length == 0)
		{
			alert("ERROR: Country contains an invalid Input");
			return false;	
		}
		
		ctlWorldclass =document.getElementById("worldclass"); 
		//Validate the Discipline Name
		
		if (!ctlWorldclass.value.match(Numbers) || !ctlWorldclass.length == 0)
		{
			alert("ERROR: Worldclass contains an invalid Input, please input number only");
			return false;	
		}
						
						
		return true; 
	}
	    
	function sendDataToServer()
	{
		if (ValidateForm() == false)    //Validate Form Fields
			{
		    	return false;  
			}
		else                           
			{
			
		    //*********************** GET DATA FROM FORM ***********************************
		    /**************************** Basic data ***************************************/
        		var ccodesArray = [];
        		
				var varCode =  document.getElementById("code").value;
				var varCountry =  document.getElementById("country").value;
				var varWorldclass =  document.getElementById("worldclass").value;
				var varColor =  document.getElementById("color").value;

			     var dbCode = 'code=' + varCode;
			     var dbCountry = 'country=' + varCountry;
			     var dbWorldclass = 'worldclass=' + varWorldclass;
			     var dbColor = 'color=' + varColor;
			     			     
			     ccodesArray.push(dbCode);
			     ccodesArray.push(dbCountry);
			     ccodesArray.push(dbWorldclass);
			     ccodesArray.push(dbColor);
			     		     
				setccodesToServer(ccodesArray);

			 return true;
			}
	}	      	
	</script>
		
	<!-- ============================================================================================= -->
	<!-- ============================================================================================= -->	

</head>
	<!-- Header -->
	<header class="header_bg clearfix">
		<div class="container clearfix">
 			 <!-- Logo -->
			<div class="logo"><a href="index.html"><img src="images/astro_logo_Utep.png" height="80" width="80" alt="" /></a><br/></div>
			 <!-- /Logo -->
			
			<!-- Master Nav -->
			<nav class="main-menu">
				<ul>
					<li><a href="logout.php">Log out</a></li>
					<li><a href="mainAdminStaff.php">Home</a></li>
					
					<li><a>Domains Related Tables</a>
						<ul>
							<li><a href="InstitutionClassRecord.php">Science Registry</a></li>
							<li><a href="domainsRecord.php">domains</a></li>							
							<li><a href="domains_dcoreRecord.php">domains_dcore</a></li>
						</ul>
					</li>
					
					<li><a href="#">Suplemental Tables</a>
						<ul>
							<li><a href="ccodesRecord.php">ccodes</a></li>
							<li><a href="worldclassRecord.php">worldclass</a></li>
							<li><a href="OrgClassRecord.php">orgclass</a></li>
							<li><a href="DisciplinesRecord.php">disciplines</a></li>
							<li><a href="govagenciesRecord.php">govagencies</a></li>
							<li><a href="languageRecord.php">language<spam>*</spam></a></li>
						</ul>
					</li>

					<li><a>Traffic-Related Supp Tables</a>
						<ul>
							<li><a href="domain_month_sourceRecord.php">domain_month_source</a></li>
							<li><a href="domain_month_destRecord.php">domain_month_dest</a></li>
							<li><a href="domain_bytesRecord.php">domain_bytes<spam>*</spam></a></li>
							<li><a href="domains_dcoreRecord.php">domains_dcore<spam>*</spam></a></li>
						</ul>
					</li>
	
					<li><a href="#">IP Address-Related Tables</a>
						<ul>
							<li><a href="ipsClassRecord.php">ips</a></li>							
							<li><a href="ipstextRecord.php">ipstext</a></li>
							<li><a href="asnumsRecord.php">asnums</a></li>
							<li><a href="ipsRecord.php">ipsdns</a></li>
							<li><a href="ipsRecord.php">iplabels</a></li>							
							<li><a href="ipassignRecord.php">ipassign<spam>*</spam></a></li>
							<li><a href="ipunassignedRecord.php">ipunassigned<spam>*</spam></a></li>
						</ul>
					</li>
			       </ul>			</nav>
		</div>
	</header>
	<!-- /Header -->
<body onload = loadCodeInterfaceDataFromServer()>
	<!-- START CONTENT -->
	<section class="container clearfix">
		<!-- START PAGE INFO -->
		<header class="container page_info clearfix">	
			<h1 class="regular brown bottom_line">CCODES</h1>
			<div class="clear"></div>
		</header>
		<!-- END PAGE INFO -->
		<div class="padding15"></div>

		<!-- START COL 1/4 -->	
		<div class="col_1_4">
			<ul class="contact-address">
				<li class="add"><span><a href="addCcodesRecord.php">Add New Record</a></span></li>
				<li class="edit"><span><a href="editCcodesRecord.php">Search Record</a></span></li>
<!-- 				<li class="delete"><span><a href="deleteCcodesRecord.html">Delete Record</a></span></li> -->
			</ul>
			<p>
					<a href="javascript:void(0);" class="button navy" onclick="return sendDataToServer();">Save Information</a><br>
					<a href="javascript:void(0);" class="button navy"  onclick="reload();" >Clear</a>
			</p>
			<p>
			     <font size='3'><label for="name" id='result_legend'></font> </label>
			     <!--FOR DEBUG PURPOSES<font size="0"  id='result_legend' name='result_legend'></font> -->
			</p>
			<div class="clear"></div>
		</div>
		<!-- END COL 1/4 -->	
		
		<!-- START COL 1/3 -->	
		<div class="col_1_3">
			<h4 class="bottom_line regular"><b>CCODES Information</b></h4>
			<div class="padding10"></div>
			<p class="required_info"><span>*</span> Required</p>
			<!-- SUCCESS MESSAGE -->
			<div class="success_box none">Record Successfully Saved. Thank you!</div>
			<!-- END SUCCESS MESSAGE -->
			<!-- ERROR MESSAGE -->
			<div class="error_box none">Please complete all required fields.</div>
			<!-- END ERROR MESSAGE -->
			<!-- START CONTACT FORM -->	
			<form action="#" class="contact_form">
				<p>
					<label for="name"> code <span>*</span></label>
					<input class="inputText" type="text" id="code" name="code" readonly />
					<label for="name"> country <span>*</span></label>
					<input class="inputText" type="text" id="country" name="country" onkeyup="autocCodeClass()" placeholder="Type Country Name to search ..." />
					<nav id='autosuggest_container' float=""> </nav>															
					<label for="name"> WorldClass <span>*</span></label>
					<select class="inputText" type="text" id='worldclass' name='worldclass' readonly><select>
					<label for="name"> color</label>
					<input class="inputText" type="text" id="color" name="color" readonly />
				</p>
			</form>
		</div>	
		<div class="clear padding20"></div>
	</section>
	<!-- END CONTENT -->
	
	<!-- footer -->
	<footer class="footer_bg_bottom clearfix">
		<div class="footer_bottom container">
			<div class="col_2_3">
				<div class="menu">
					<ul>
						<li><a href="AdminPPal.html">Home</a></li>
						<li><a href="#">Users</a></li>
						<li><a href="#">Domain Records</a></li>
						<li><a href="#">Support Information Records</a></li>
						<li><a href="#">Reports</a></li>
					</ul>
				</div>
				<div class="clear padding20"></div>
				<p>
					The University of Texas at El Paso | College of Engineering | Engineering Building | NetLab UTEP | Ph.(915) 747-6955 </p>
			</div>
		<div class="clear padding20"></div>
		</div>
	</footer>
	<!-- /footer -->

    <!--wrapper end-->
</body>
</html>
<?php
   }
   else
   {
        echo "<p> You are not logged in. </p>";
	echo '<a href="index.html"> Back to index page </a>';
   }
?>