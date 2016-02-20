<?php

     //***************************************************************************************************************
     //  File :  InstitutionClassRecord.php
     //  Implements an Authentication and redirection
     //  Developed by:  Esau Ruiz
     //  Project: GSR Database Traffic Reporter
     //  The University of Texas at El Paso
     //  Date: 31/01/2016
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
	
	<title>Institutional Data Records</title>
	<!-- links -->
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.4.js" ></script>
	
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
	<script type="text/javascript" src="ajax_functions.js" ></script>
    <script type="text/javascript">
            //*************************************************************************
	    	//** Method: loadInstitutionDataFromServer
	    	//*  It calls the AJAX getIPDataFromServer(2) with index 2 to
            //*  Load data from server to populate Country combo box
            //*******************************************************************************
            function loadInstitutionDataFromServer()
	    		{		
		     		         	
						getIPDataFromServer(2);    //Get the Country names from DB
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
	    var Letters = /^(([A-Z][a-z]+)\s([A-Z][a-zA-Z-]+)|([A-Z][a-z]+))$/;
	    var Organization = /^\b(\w+)\s+\1\b$/;
	    var City = /^([A-Z]{1}[a-z]{1,})$|^([A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,})$|^([A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,})$|^$/;	    
	    var LettersNumber = /^[0-9a-zA-Z]+$/;
	    var LettersCcode = /^[a-zA-Z]{2}$/;
	    var Latitude = /^-?(?:90(?:(?:\.0{1,7})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,7})?))$/;

		ctlOrganization = document.getElementById("organization");
		ctlCity = document.getElementById("city");
		ctlPostalcode = document.getElementById("postalcode");
		ctlCcode = document.getElementById("ccode");
		ctlLatitude = document.getElementById("latitude");
		ctlLongitude = document.getElementById("longitude");		
		
			// validate input institutional input 
	       				
	
		if (ctlOrganization.value.match(Organization) && !ctlOrganization.value.match(City))
			{	
				alert("ERROR: Organization contains invalid Input");
				return false;	
			}
				
		if(!ctlCity.value.match(City) && ctlCity.value.match(Organization))		
			{
			    alert("ERROR: City contains invalid Input, Only accepts [a-zA-Z]");
			    return false;	
	         }


		if(!ctlPostalcode.value.match(LettersNumber))	
			{
			    alert("ERROR: Posta Code contains invalid Input, Only accepts [a-zA-Z]");
			    return false;	
	         }
	         					
		if(!ctlCcode.value.match(City))		
			{
			    alert("ERROR: Ccode contains invalid Input, Only accepts 2 digits");
			    return false;	
	         }



		if(!ctlLatitude.value.match(Latitude) && !ctlLatitude.value == "")		
			{
			    alert("ERROR: Latitude contains invalid Input, valid input i.e. -90; -90.0; -89.99; 0; 0.000; 89.99; 90.0; 90");
			    return false;	
	         }
	         
		if(!ctlLongitude.value.match(Latitude) && !ctlLongitude.value == "")		
			{
			    alert("ERROR: Longitude contains invalid Input,  valid input i.e. -90; -90.0; -89.99; 0; 0.000; 89.99; 90.0; 90");
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
        		var instclassArray = [];
        		
				var varOrganization =  document.getElementById("organization").value;
				var varCity =  document.getElementById("city").value;
				var e =  document.getElementById("regioncode");
				var varRegioncode = e.options[e.selectedIndex].value;
				
				var varPostalcode =  document.getElementById("postalcode").value;				
				var varCcode =  document.getElementById("ccode").value;
				var varLatitude =  document.getElementById("latitude").value;
				var varLongitude =  document.getElementById("longitude").value;
				var varCreatedby =  document.getElementById("user").value;
				var varModifiedby =  document.getElementById("user").value;
				
				
			    var dbOrganization = 'organization=' + varOrganization;
			    var dbCity = 'city=' + varCity;
			    var dbRegioncode = 'regioncode=' + varRegioncode;
			    var dbPostalcode = 'postalcode=' + varPostalcode;
			    var dbCcode = 'ccode=' + varCcode;
			    var dbLatitude = 'latitude=' + varLatitude;
			    var dbLongitude = 'longitude=' + varLongitude;
			    var dbCreatedby = 'createdby=' + varCreatedby;
			    var dbModifiedby = 'modifiedby=' + varModifiedby;
			    
			     
			     			     
				instclassArray.push(dbOrganization);
			    instclassArray.push(dbCity);
			    instclassArray.push(dbRegioncode);
			    instclassArray.push(dbPostalcode);
			    instclassArray.push(dbCcode);
			    instclassArray.push(dbLatitude);
			    instclassArray.push(dbLongitude);
			    instclassArray.push(dbCreatedby);
			    instclassArray.push(dbModifiedby);
			    
 				setInstClassToServer(instclassArray);

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
					
					<li><a>Domains Related</a>
						<ul>
							<li><a href="InstitutionClassRecord.php">Science Registry</a></li>
							<li><a href="domainsRecord.php">domains<spam>*</spam></a></li>							
							<li><a href="domains_dcoreRecord.php">domains_dcore<spam>*</spam></a></li>
						</ul>
					</li>
					
					<li><a href="#">Suplemental</a>
						<ul>
							<li><a href="ccodesRecord.php">ccodes</a></li>
							<li><a href="worldclassRecord.php">worldclass</a></li>
							<li><a href="OrgClassRecord.php">orgclass</a></li>
							<li><a href="DisciplinesRecord.php">disciplines</a></li>
							<li><a href="govagenciesRecord.php">govagencies<spam>*</spam></a></li>
							<li><a href="languageRecord.php">language<spam>*</spam></a></li>
						</ul>
					</li>

					<li><a>Traffic-Related Supp</a>
						<ul>
							<li><a href="domain_month_sourceRecord.php">domain_month_source<spam>*</spam></a></li>
							<li><a href="domain_month_destRecord.php">domain_month_dest<spam>*</spam></a></li>
							<li><a href="domain_bytesRecord.php">domain_bytes<spam>*</spam></a></li>
							<li><a href="domains_dcoreRecord.php">domains_dcore<spam>*</spam></a></li>
						</ul>
					</li>
	
					<li><a href="#">IP Address-Related</a>
						<ul>
							<li><a href="ipsClassRecord.php">ips</a></li>							
							<li><a href="ipstextRecord.php">ipstext<spam>*</spam></a></li>
							<li><a href="asnumsRecord.php">asnums<spam>*</spam></a></li>
							<li><a href="ipsRecord.php">ipsdns<spam>*</spam></a></li>
							<li><a href="ipsLabels.php">iplabels<spam>*</spam></a></li>							
							<li><a href="ipassignRecord.php">ipassign<spam>*</spam></a></li>
							<li><a href="ipunassignedRecord.php">ipunassigned<spam>*</spam></a></li>
						</ul>
					</li>
			       </ul>
				</nav>
		</div>
	</header>
	<!-- /Header -->
<body onload = loadInstitutionDataFromServer()>
	
<!-- <body onload = "loadInstitutionDataFromServer()"> -->
	<!-- START CONTENT -->
	<section class="container clearfix">
		<!-- START PAGE INFO -->
		<header class="container page_info clearfix">	
			<h1 class="regular brown bottom_line"> Institutional Data </h1>
			<div class="clear"></div>
		</header>
		<!-- END PAGE INFO -->
		<div class="padding15">
		<br /><br />
		</div>
		<!-- START COL 1/4 -->	
		<div class="col_1_4">
			
			<ul class="contact-address">
				<li class="add"><span><a href="addInstitutionClassRecord.php">Add New Record</a></span></li>

			</ul>
			<p>
					<a href="javascript:void(0);" class="button navy" onclick="return sendDataToServer();">Save Information</a><br>
					<a href="javascript:void(0);" class="button navy"  onclick="return reload();" >Clear</a>

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
			<h4 class="bottom_line regular"><b>Institutional Information</b></h4>
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
					<label for="name"> Organization <span>*</span></label>
					<input class="inputTextList" type="text" id="organization" onkeyup="autoSuggest()" name="organization" placeholder="Search for an Institution ..." />
					<nav id='autosuggest_container' float=""> </nav>
					<label for="name"> City </label>
					<input class="inputText" type="text" id="city" name="city" />
					<label for="name"> Region  </label>
					<select class="inputText" type="text" id="regioncode" name="regioncode" />						

						<option value="AF">Africa</option>
  						<option value="AN">Antartica</option>
  						<option value="AS">Asia</option>
  						<option value="AU">Australia</option>
  						<option value="CR">Caribean</option>
  						<option value="CA">Central America</option>
  						<option value="EU">Europe</option>
  						<option value="ME">Middle East</option>
						<option value="NA" selected="selected">North America</option>  	
  						<option value="Ot">Other</option>
  						<option value="SC">Scandinavia</option>
  						<option value="SA">South America</option>
  						<option value="Un">Unknown</option>
  						<option value="WI">West Indies</option>
				</select>
			<label for="name"> Postal Code </label>
		<input class="inputText" type="text" id="postalcode" name="postalcode" />
		<label for="name"> Country </label>
		<select class="inputText" type="text" id='country' name='country' readonly><select>
		<b>Latitude, Longitude</b><br/>					
		<input class="inputText1" type="number" id="latitude" name="latitude" placeholder="Latitude" readonly />
		<input class="inputText1" type="number" id="longitude" name="longitude" placeholder="Longitude" readonly /><br />
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
						<li><a href="mainAdminStaff.php">Home</a></li>
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