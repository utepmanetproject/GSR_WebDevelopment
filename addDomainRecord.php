<?php
    session_start();
    
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
	
	<title>Administrator Menu</title>
	<!-- links -->
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<!--[if (gte IE 6)&(lte IE 8)]>
	
	<!--Scripts-->
	<script type="text/javascript" src="js/html5.js"></script>
	<script type="text/javascript" src="js/selectivizr-min.js"></script>
	<link rel="stylesheet" href="css/ie.css" type="text/css" />
	<![endif]-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
	<script type="text/javascript" src="js/all-in-one.js"></script>
	<script type="text/javascript" src="js/setup.js"></script>
	<script type="text/javascript" src="js/contact-form.js"></script>
	<script type="text/javascript">
	$(window).load(function(){
		$('#demo-side-bar').removeAttr('style');
	});
	</script>
	
	<style type="text/css">
	.demobar{display:none;}
	#demo-side-bar{top:53px!important;left:90%!important;display:block!important;}
	</style>
	
	<script src="ajax_functions.js" type="text/javascript"></script>
	<script type="text/javascript">
		//****************************************************************************************************************
		// Function:  reload()
		//  Show militaryStatus if military Status is selected
		//****************************************************************************************************************
		function reload()
		{
			location.reload();
		}
		
		//****************************************************************************************************************
		// Function:  show()
		//  Show 
		//****************************************************************************************************************
		
		function show()
		{
			document.getElementById('txtMilClassification').style.display = 'block';
			document.getElementById('label').style.display = 'block';
		}
		//****************************************************************************************************************
		// Function:  cleanDisplay
		//  Clean the Display area depending of the person type selection
		//****************************************************************************************************************
		function hide()
		{
			document.getElementById('txtMilClassification').style.display = 'none';
		        document.getElementById('label').style.display = 'none';
		}
		//****************************************************************************************************************
		// Function:  cleanDisplay
		//  Clean the Display area 
		//****************************************************************************************************************
		function cleandisplay()
		{
			document.getElementById('lblentryTerm').style.display='none';document.getElementById('entryTerm').style.display='none';
			document.getElementById('edl').style.display='none';document.getElementById('edlbox').style.display='none';
			document.getElementById('progname').style.display='none';document.getElementById('prognamebox').style.display='none';
			document.getElementById('gpa').style.display='none';document.getElementById('gpabox').style.display='none';
			document.getElementById('adv').style.display='none';document.getElementById('advbox').style.display='none';
			document.getElementById('act').style.display='none';document.getElementById('active').style.display='none';
			document.getElementById('inact').style.display='none';document.getElementById('inactive').style.display='none';
			document.getElementById('grad').style.display='none';document.getElementById('graduated').style.display='none';
			document.getElementById('primcont').style.display='none';
			document.getElementById('cn1').style.display='none';document.getElementById('contname1').style.display='none';
			document.getElementById('ca1').style.display='none';document.getElementById('contaddr1').style.display='none';
			document.getElementById('cr1').style.display='none';document.getElementById('contrel1').style.display='none';
			document.getElementById('ct1').style.display='none';document.getElementById('conttel1').style.display='none';
			document.getElementById('seccont').style.display='none';
			document.getElementById('cn2').style.display='none';document.getElementById('contname2').style.display='none';
			document.getElementById('ca2').style.display='none';document.getElementById('contaddr2').style.display='none';
			document.getElementById('cr2').style.display='none';document.getElementById('contrel2').style.display='none';
			document.getElementById('ct2').style.display='none';document.getElementById('conttel2').style.display='none';
					
			document.getElementById('ohrs').style.display='none';
			document.getElementById('from').style.display='none';document.getElementById('hrbegin').style.display='none';
			document.getElementById('to').style.display='none';document.getElementById('hrend').style.display='none';
			document.getElementById('wkdays').style.display='none';
			document.getElementById('monday').style.display='none';document.getElementById('m').style.display='none';
			document.getElementById('tuesday').style.display='none';document.getElementById('t').style.display='none';
			document.getElementById('wednesday').style.display='none';document.getElementById('w').style.display='none';
			document.getElementById('thursday').style.display='none';document.getElementById('th').style.display='none';
			document.getElementById('friday').style.display='none';document.getElementById('f').style.display='none';
			document.getElementById('term').style.display='none';document.getElementById('termbox').style.display='none';
			document.getElementById('location').style.display='none';document.getElementById('depto').style.display='none';
			document.getElementById('bldg').style.display='none';document.getElementById('room').style.display='none';
		}			
		
		//****************************************************************************************************************
		// Function:  postOpt()
		//  Reset and display depending of Person Selection
		//****************************************************************************************************************
		
		function posOpt()
		{
			var lab="";	
			if(document.getElementById("posst").checked)
			{
				lab="Position of STUDENT was selected";cleandisplay();
				document.getElementById('lblentryTerm').style.display='block';document.getElementById('entryTerm').style.display='block';
				document.getElementById('edl').style.display='block';document.getElementById('edlbox').style.display='block';
				document.getElementById('progname').style.display='block';document.getElementById('prognamebox').style.display='block';
				document.getElementById('gpa').style.display='block';document.getElementById('gpabox').style.display='block';
				document.getElementById('adv').style.display='block';document.getElementById('advbox').style.display='block';
				
				document.getElementById('act').style.display='inline-block';document.getElementById('active').style.display='inline-block';
				document.getElementById('inact').style.display='inline-block';document.getElementById('inactive').style.display='inline-block';
				document.getElementById('grad').style.display='inline-block';document.getElementById('graduated').style.display='inline-block';
				
				document.getElementById('contact').style.display='block';document.getElementById('primcont').style.display='block';
				document.getElementById('cn1').style.display='block';document.getElementById('contname1').style.display='block';
				document.getElementById('ca1').style.display='block';document.getElementById('contaddr1').style.display='block';
				document.getElementById('cr1').style.display='block';document.getElementById('contrel1').style.display='block';
				document.getElementById('ct1').style.display='block';document.getElementById('conttel1').style.display='block';
				document.getElementById('seccont').style.display='block';
				document.getElementById('cn2').style.display='block';document.getElementById('contname2').style.display='block';
				document.getElementById('ca2').style.display='block';document.getElementById('contaddr2').style.display='block';
				document.getElementById('cr2').style.display='block';document.getElementById('contrel2').style.display='block';
				document.getElementById('ct2').style.display='block';document.getElementById('conttel2').style.display='block';
				
				// POPULATE LISTS
				get_PersonsUIDataFromServer(7);   //Education Level List
				get_PersonsUIDataFromServer(8);   //Program Name List
				get_PersonsUIDataFromServer(12);   //Advisors List
				get_PersonsUIDataFromServer(13);   //Term List
				
			}
			else
			{
				       if(document.getElementById("posstwk").checked){lab="Position of STUDENT WORKING ON CAMPUS was selected";cleandisplay();
					document.getElementById('lblentryTerm').style.display='block';document.getElementById('entryTerm').style.display='block';
					document.getElementById('edl').style.display='block';document.getElementById('edlbox').style.display='block';
					document.getElementById('progname').style.display='block';document.getElementById('prognamebox').style.display='block';
					document.getElementById('gpa').style.display='block';document.getElementById('gpabox').style.display='block';
					document.getElementById('adv').style.display='block';document.getElementById('advbox').style.display='block';
					document.getElementById('act').style.display='inline-block';document.getElementById('active').style.display='inline-block';
					document.getElementById('inact').style.display='inline-block';document.getElementById('inactive').style.display='inline-block';
					document.getElementById('grad').style.display='inline-block';document.getElementById('graduated').style.display='inline-block';
					document.getElementById('primcont').style.display='block';
					document.getElementById('cn1').style.display='block';document.getElementById('contname1').style.display='block';
					document.getElementById('ca1').style.display='block';document.getElementById('contaddr1').style.display='block';
					document.getElementById('cr1').style.display='block';document.getElementById('contrel1').style.display='block';
					document.getElementById('ct1').style.display='block';document.getElementById('conttel1').style.display='block';
					document.getElementById('seccont').style.display='block';
					document.getElementById('cn2').style.display='block';document.getElementById('contname2').style.display='block';
					document.getElementById('ca2').style.display='block';document.getElementById('contaddr2').style.display='block';
					document.getElementById('cr2').style.display='block';document.getElementById('contrel2').style.display='block';
					document.getElementById('ct2').style.display='block';document.getElementById('conttel2').style.display='block';
					
					document.getElementById('ohrs').style.display='block';
					document.getElementById('from').style.display='inline-block';document.getElementById('hrbegin').style.display='inline-block';
					document.getElementById('to').style.display='inline-block';document.getElementById('hrend').style.display='inline-block';
					document.getElementById('wkdays').style.display='block';
					document.getElementById('monday').style.display='inline-block';document.getElementById('m').style.display='inline-block';
					document.getElementById('tuesday').style.display='inline-block';document.getElementById('t').style.display='inline-block';
					document.getElementById('wednesday').style.display='inline-block';document.getElementById('w').style.display='inline-block';
					document.getElementById('thursday').style.display='inline-block';document.getElementById('th').style.display='inline-block';
					document.getElementById('friday').style.display='inline-block';document.getElementById('f').style.display='inline-block';
					document.getElementById('term').style.display='block';document.getElementById('termbox').style.display='block';
					document.getElementById('location').style.display='block';document.getElementById('depto').style.display='inline-block';
					document.getElementById('bldg').style.display='inline-block';document.getElementById('room').style.display='inline-block';
					
					
					document.getElementById('monday').checked = false;
					document.getElementById('tuesday').checked = false;
					document.getElementById('wednesday').checked = false;
					document.getElementById('thursday').checked = false;
					document.getElementById('friday').checked = false;
					
					// POPULATE LISTS
				        get_PersonsUIDataFromServer(7);   //Education Level List
				        get_PersonsUIDataFromServer(8);   //Program Name List
					get_PersonsUIDataFromServer(9);    //Department List
				        get_PersonsUIDataFromServer(10);   // Building List
					get_PersonsUIDataFromServer(11);   //By Default get the Computer Science building rooms
					get_PersonsUIDataFromServer(12);   //Advisors List
					get_PersonsUIDataFromServer(13);   //Entry Term List
					get_PersonsUIDataFromServer(14);   //Term for Work
				}
				else
				{
					if(document.getElementById("posadv").checked)
					{
						lab="Position of ADVISOR was selected";cleandisplay();
						document.getElementById('primcont').style.display='block';
						document.getElementById('cn1').style.display='block';document.getElementById('contname1').style.display='block';
						document.getElementById('ca1').style.display='block';document.getElementById('contaddr1').style.display='block';
						document.getElementById('cr1').style.display='block';document.getElementById('contrel1').style.display='block';
						document.getElementById('ct1').style.display='block';document.getElementById('conttel1').style.display='block';
						document.getElementById('seccont').style.display='block';
						document.getElementById('cn2').style.display='block';document.getElementById('contname2').style.display='block';
						document.getElementById('ca2').style.display='block';document.getElementById('contaddr2').style.display='block';
						document.getElementById('cr2').style.display='block';document.getElementById('contrel2').style.display='block';
						document.getElementById('ct2').style.display='block';document.getElementById('conttel2').style.display='block';
					
						document.getElementById('ohrs').style.display='block';
						document.getElementById('from').style.display='inline-block';document.getElementById('hrbegin').style.display='inline-block';
						document.getElementById('to').style.display='inline-block';document.getElementById('hrend').style.display='inline-block';
						document.getElementById('wkdays').style.display='block';
						document.getElementById('monday').style.display='inline-block';document.getElementById('m').style.display='inline-block';
						document.getElementById('tuesday').style.display='inline-block';document.getElementById('t').style.display='inline-block';
						document.getElementById('wednesday').style.display='inline-block';document.getElementById('w').style.display='inline-block';
						document.getElementById('thursday').style.display='inline-block';document.getElementById('th').style.display='inline-block';
						document.getElementById('friday').style.display='inline-block';document.getElementById('f').style.display='inline-block';
						document.getElementById('term').style.display='block';document.getElementById('termbox').style.display='block';
						document.getElementById('location').style.display='block';document.getElementById('depto').style.display='inline-block';
						document.getElementById('bldg').style.display='inline-block';document.getElementById('room').style.display='inline-block';
						
						document.getElementById('monday').checked = false;
					        document.getElementById('tuesday').checked = false;
					        document.getElementById('wednesday').checked = false;
					        document.getElementById('thursday').checked = false;
					        document.getElementById('friday').checked = false;
						
						// POPULATE LISTS
					        get_PersonsUIDataFromServer(9);    //Department List
						get_PersonsUIDataFromServer(10);   // Building List
						get_PersonsUIDataFromServer(11);   //By Default get the Computer Science building rooms
						get_PersonsUIDataFromServer(14);   //Term for Work
					}
					else
					{
						if(document.getElementById("posadm").checked)
						{
							lab="Position of ADMINISTRATIVE STAFF was selected";cleandisplay();
							document.getElementById('primcont').style.display='block';
							document.getElementById('cn1').style.display='block';document.getElementById('contname1').style.display='block';
							document.getElementById('ca1').style.display='block';document.getElementById('contaddr1').style.display='block';
							document.getElementById('cr1').style.display='block';document.getElementById('contrel1').style.display='block';
							document.getElementById('ct1').style.display='block';document.getElementById('conttel1').style.display='block';
							document.getElementById('seccont').style.display='block';
							document.getElementById('cn2').style.display='block';document.getElementById('contname2').style.display='block';
							document.getElementById('ca2').style.display='block';document.getElementById('contaddr2').style.display='block';
							document.getElementById('cr2').style.display='block';document.getElementById('contrel2').style.display='block';
							document.getElementById('ct2').style.display='block';document.getElementById('conttel2').style.display='block';
						
							document.getElementById('ohrs').style.display='block';
							document.getElementById('from').style.display='inline-block';document.getElementById('hrbegin').style.display='inline-block';
							document.getElementById('to').style.display='inline-block';document.getElementById('hrend').style.display='inline-block';
							document.getElementById('wkdays').style.display='block';
							document.getElementById('monday').style.display='inline-block';document.getElementById('m').style.display='inline-block';
							document.getElementById('tuesday').style.display='inline-block';document.getElementById('t').style.display='inline-block';
							document.getElementById('wednesday').style.display='inline-block';document.getElementById('w').style.display='inline-block';
							document.getElementById('thursday').style.display='inline-block';document.getElementById('th').style.display='inline-block';
							document.getElementById('friday').style.display='inline-block';document.getElementById('f').style.display='inline-block';
							document.getElementById('term').style.display='block';document.getElementById('termbox').style.display='block';
							document.getElementById('location').style.display='block';document.getElementById('depto').style.display='inline-block';
							document.getElementById('bldg').style.display='inline-block';document.getElementById('room').style.display='inline-block';
							
							document.getElementById('monday').checked = false;
					                document.getElementById('tuesday').checked = false;
					                document.getElementById('wednesday').checked = false;
					                document.getElementById('thursday').checked = false;
					                document.getElementById('friday').checked = false;
							
							// POPULATE LISTS
					                get_PersonsUIDataFromServer(9);    //Department List
						        get_PersonsUIDataFromServer(10);   // Building List
						        get_PersonsUIDataFromServer(11);   //By Default get the Computer Science building rooms
							get_PersonsUIDataFromServer(14);   //Term for Work
						}
					}
				}
			}
			document.getElementById("demo").innerHTML=lab;
		}
	</script>
	<script src="ajax_functions.js" type="text/javascript"></script>
        <script type="text/javascript">
            //*************************************************************************
	    //** Method: loadUserInterfaceDataFromServer
	    //*  It calls the AJAX getUIDataFromServer(i) with index flag to
            //*  Load data from server to populate in the combo box
            //*******************************************************************************
            function loadUserInterfaceDataFromServer(section)
	    {
		if (section == '1')
		{
		     for(var i = 1; i <= 6; i++)
	             {
			get_PersonsUIDataFromServer(i);    //get the First Four Persons Data from Sever
		     }
		}
	    }
	</script>  
	<script src="ajax_functions.js" type="text/javascript"></script>
        <script type="text/javascript">
	    /*** PERSON INFORMATION SCRIPTS  **/
	
            //*********************************************************************************************************		
	    //   Method:  validateForm()
	    //   Validates the Form fields to validate inconsistencies
	    //*********************************************************************************************************
	   function validateForm()
           {
		
	       var Numbers = /^[0-9]+$/;
	       var Letters = /[a-zA-Z]?/;
	       
	       var valOrganization =  document.getElementById("organization");
	       var valDomainId =  document.getElementById("domainid");
	       var valCountryrec = document.getElementById("countryrec");
	       var valWorldclass = document.getElementById("worldclass");
	       var valGeoorg =  document.getElementById("geoorg");
	       var valDiscipline = document.getElementById("discipline");
	       var valGovid  = document.getElementById("govid");
	       var valSbytes  = document.getElementById("sbytes");
	       var valDbytes =  document.getElementById("dbytes");
	       var valMinmonth  = document.getElementById("minmonth");
	       var valMaxmonth  = document.getElementById("maxmonth");
	       var valCCode  = document.getElementById("ccode")
	       var valCity = document.getElementById("city");
	       var valRegioncode = document.getElementById("regioncode");
	       var valPostalcode = document.getElementById("postalcode");
	       var valLatitude = document.getElementById("latitude");
	       var valLongitude = document.getElementById("longitude");
	       var valGeoorg = document.getElementById("geoorg");
	       var valGeocity = document.getElementById("geocity");
	       	       	       	       
	 
               // validate input control values		 
        if (!valDomainId.value.match(Numbers))
	       {
		      alert("ERROR: The DOMAIN ID contains letters or is empty.");
	              return false;
	       }
	
	       else
	       {
	             return true;
	       }
	    }	
	</script>
	<script src="ajax_functions.js" type="text/javascript"></script>
        <script type="text/javascript">
		
	     /**  Method:  sendDataToServer()
	     *   It first validate if the form has correct information
	     *   than it sends the data to AJAX to insert it into database
	     */
	    function sendDataToServer()
	    {
		if (validateForm() == false)    //Validate Form Fields
		{
		    return false;  
		}
		else                           // Form fields with valid data
		{
		         //********* GET DATA FROM FORM **********************************************************
		        /**************************** Basic data ***************************************/
		        
			/**************************** Institution Information ************************************/		        
			var valOrganization =  document.getElementById("organization").value;
			var valDomainid =  document.getElementById("domainid").value;
			var valCountryrec = document.getElementById("countryrec").value;
			
			/**************************** World Region ************************************/		        			
		    var valWorldclass = document.getElementById("worldclass").value;
			var valgeoorg =   document.getElementById("geoorg").value;
			var valDiscipline = document.getElementById("discipline").value;
			var valGovid = document.getElementById("govid").value;
			
			/**************************** Traffic ************************************/		
			var valSbytes = document.getElementById("sbytes").value;
			var valDbytes = document.getElementById("dbytes").value;
			var valMinmonth = document.getElementById("minmonth").value;
			var valMaxmonth = document.getElementById("maxmonth").value;					
			
			/**************************** Location ************************************/
			var valCcode =  document.getElementById("ccode").value;
			var valCity = document.getElementById("city").value;
			var valRegioncode  = document.getElementById("regioncode").value;
			var valPostalcode = document.getElementsByName("postalcode");
			var valLatitude = document.getElementById("latitude").value;
			var valLongitude  = document.getElementById("longitude").value;
			var valGeoorg = document.getElementsByName("geoorg");
			var valGeocity = document.getElementsByName("geocity");			
						
			//****************************************************************************
			// SETUP VALUES TO BE PASSED TO AJAX
			
			// PARAMETER ARRAYS
        	 var DomainArray = [];
			 var Organization = [];
			 var Discipline = [];
			 var GovAgencyArray = [];
			
			 
			 // Prepare Domain Data to be sent
			 var dbOrganization = 'organization=' + valOrganization;
			 var dbDomainid = 'domainid=' + valDomainid;
			 var dbCountryrec = 'countryrec=' + valCountryrec;
			 var dbWorldclass = 'worldclass=' + valWorldclass;
			 var dbGeoorg = 'geoorg=' + valgeoorg;
			 var dbDiscipline = 'discipline=' + valDiscipline;
			 var dbGovid = 'govid=' + valGovid;
			 var dbSbytes = 'sbytes=' + valSbytes;
			 var dbDbytes = 'dbytes=' + valDbytes;
			 var dbMinmonth = 'minmonth=' + valMinmonth;
			 var dbMaxmonth = 'maxmonth=' + valMaxmonth;
			 var dbCcode = 'ccode=' + valCcode;
			 var dbCity = 'city=' + valCity;
			 var dbRegioncode = 'regioncode=' + valRegioncode;
			 var dbPostalcode = 'postalcode=' + valPostalcode;			 			 
			 var dbLatitude = 'latitude=' + valLatitude;
			 var dbLongitude = 'longitude=' + valLongitude;			 
			 var dbGeoorg = 'geoorg=' + valGeoorg;
			 var dbGeocity = 'geocity=' + valGeocity;		 			 			 			 

			/**************************** Institution Information ************************************/				 
			 DomainArray.push(dbOrganization);
			 DomainArray.push(dbDomainid);
			 DomainArray.push(dbCountryrec);
			 
			 DomainArray.push(dbWorldclass);
			 DomainArray.push(dbGeoorg);
			 DomainArray.push(dbDiscipline);
			 DomainArray.push(dbGovid);
			 DomainArray.push(dbSbytes);
			 DomainArray.push(dbDbytes);
			 DomainArray.push(dbMinmonth);
			 DomainArray.push(dbMaxmonth);
			 DomainArray.push(dbCcode);
			 DomainArray.push(dbCity);
			 DomainArray.push(dbRegioncode);
			 DomainArray.push(dbPostalcode);
			 DomainArray.push(dbLatitude);
			 DomainArray.push(dbLongitude);			 
			 DomainArray.push(dbGeoorg);
			 DomainArray.push(dbGeocity);

			//****** SEND DATA ARRAYS TO SERVER  FOR INSERTION IN DATABASE ***************

			  setDomainToServer(DomainArray);
			 return true;
		}// END IF
	    } // END METHOD
	     
	</script>
	<script src="ajax_functions.js" type="text/javascript"></script>
	<script type="text/javascript">
		
	    /* Method: selectState()    
	    * Trigered when Country combo is selected
	    * it sends the Country selected and returns  with states of that country
	    */
	    function selectState(countrycombo)
	    {
			var ctlCountry;
			var countryValue;
						
			if (countrycombo == 1)
			     ctlCountry = document.getElementById("country1");
			if (countrycombo == 2) 
			     ctlCountry = document.getElementById("country2");	
			if (countrycombo == 3) 
			     ctlCountry = document.getElementById("country3");
		
			countryValue = ctlCountry.options[ctlCountry.selectedIndex].value;
			getStateByCountryUIDataFromServer(countryValue, countrycombo);    // AJAX function
	     }
	</script>
        <script src="ajax_functions.js" type="text/javascript"></script>
	<script type="text/javascript">
	     
	     /* Method: selectRoom()    
	     * Trigered when Building combo is selected
	     * it sends the Country  selected and returns  with Rooms of that Building
	     */
	 
	     function selectRoom()
	     {
		  var ctlBuilding = document.getElementById("bldg");
		  var valBuilding = ctlBuilding.options[ctlBuilding.selectedIndex].value;
		  getRoomsByBuildingIndex(valBuilding);    // AJAX function
	     }
        </script>
	
	
</head>
	<!-- Header -->
	<header class="header_bg clearfix">
		<div class="container clearfix">
 			 <!-- Logo -->
			<div class="logo"><a href="index.html"><img src="images/logo.png" alt="" /></a><br/></div>
			 <!-- /Logo -->
			
			<!-- Master Nav -->
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

					<li><a>Traffic Supp Tables</a>
						<ul>
							<li><a href="domain_month_sourceRecord.php">domain_month_source</a></li>
							<li><a href="domain_month_destRecord.php">domain_month_dest</a></li>
							<li><a href="domain_bytesRecord.php">domain_bytes<spam>*</spam></a></li>
							<li><a href="domains_dcoreRecord.php">domains_dcore<spam>*</spam></a></li>
						</ul>
					</li>
	
					<li><a href="#">IP Address Tables</a>
						<ul>
							<li><a href="ipsClassRecord.php">ips</a></li>							
							<li><a href="OrganizationsRecord.php">Organizations</a></li>
							<li><a href="asnumsRecord.php">asnums</a></li>
							<li><a href="ipassignRecord.php">ipassign<spam>*</spam></a></li>
							<li><a href="ipunassignedRecord.php">ipunassigned<spam>*</spam></a></li>
							<li><a href="ipstextRecord.php">ipstext</a></li>
							<li><a href="ipsRecord.php">ips</a></li>
						</ul>
					</li>
			       </ul>
			</nav>
		</div>
	</header>
	<!-- /Header -->
			<!-- /Master Nav -->
		</div>
	</header>
	<!-- /Header -->
<body  onload="loadUserInterfaceDataFromServer(1);">
	<!-- START CONTENT -->
	<section class="container clearfix">
		<!-- START PAGE INFO -->
		<header class="container page_info clearfix">	
			<h1 class="regular brown bottom_line">DOMAIN RECORDS</h1>
			<div class="clear"></div>
		</header>
		<!-- END PAGE INFO -->
		<div class="padding15"></div>

		<!-- START COL 1/4 -->	
		<div class="col_1_4">
			<ul class="contact-address">
				<li class="add"><span><a href="#">Add New Domain</a></span></li>
				<li class="edit"><span><a href="#">Edit Record</a></span></li>
				<li class="delete"><span><a href="#">Disable / Delete Record</a></span></li>
				<li class="archive"><span><a href="#">Archive Record</a></span></li>
			</ul>
			<p class="submit">
					<a href="javascript:void(0);" class="button navy" onclick="return sendDataToServer()">Save Information</a><br/>
					<a href="javascript:void(0);" class="button navy"  onclick="reload()" >   Clear   </a>
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
			<h4 class="bottom_line regular"><b>Institution/University Information</b></h4>
			<div class="padding10"></div>
			<p class="required_info"><span>*</span> Required</p>
			<!-- SUCCESS MESSAGE -->
			<div class="success_box none">Record Successfully Saved. Thank you!</div>
			<!-- END SUCCESS MESSAGE -->
			<!-- ERROR MESSAGE -->
			<div class="error_box none">Please complete all required fields.</div>
			<!-- END ERROR MESSAGE -->
			
			<!-- START CONTACT FORM -->	
			<form class="contact_form">
				<p>
					<label for="name"> Institution Information <span>*</span></label>
					 Name <input class="inputText" type="text" id="organization" name="organization" /><br />
					 ID Number <span>*</span><input class="inputText" type="number" id="domainid" name="domainid" required="required" />	
					 Country Record <span>*</span><input class="inputText" type="text" id="countryrec" name="countryrec" required="required" />
				</p>
				<p>
					<label for="name">World Region<span>*</span></label>
					World Region <span>*</span><select class="inputText" type="number" id="worldclass" name="worldclass"/></select>					 
					Organization Type <select class="inputText" type="text" id="geoorg" name="geoorg" /></select>
					Discipline <select class="inputText" type="text" id="discipline" name="discipline" /></select><br />					
					Gov Agency<select class="inputText" type="number" id="govid" name="govid" /></select>
				</p>
					 
				<p>
					<label for="name">Traffic</label>					
					Source Traffic<input class="inputText" type="number" id="sbytes" name="sbytes" placeholder="Source IP" />
					Destination Traffic<input class="inputText" type="number" id="dbytes" name="dbytes" placeholder ="Destination IP"/><br />
					First Month<input class="inputText" type="month" id="minmonth" name="minmonth" placeholder="YYYY-MM"/>										
					Recent Month<input class="inputText" type="month" id="maxmonth" name="maxmonth" placeholder="YYYY-MM"/>										
				</p>
				<p>	
					<label for="name">Location</label>														
					Country <br ><select class="inputText" type="text" id="ccode" name="ccode" /></select><br />
					City<br /><input class="inputText" type="text" id="city" name="city" /><br />																				
					Region Code <input class="inputText" type="text" id="regioncode" name="regioncode" />
					Postal Code <input class="inputText" type="text" id="postalcode" name="postalcode" />
					<b>Latitude,Longitude</b><br/>					
					<input class="inputText1" type="number" id="latitude" name="latitude" placeholder="Latitude"/>
					<input class="inputText1" type="number" id="longitude" name="longitude" placeholder="Longitude" /><br />

					GeoIP Organization<input class="inputText" type="text" id="geoorg" name="geoorg"/>
					GeoIP ISP<input class="inputText" type="text" id="geocity" name="geocity"/><br />
				</p>
				
			<!--</form> -->
		<!-- END CONTACT FORM -->		
		</div>
		<!-- END COL 1/3  -->
		
		<!-- START COL 1/3 LAST -->	
		<div class="col_1_3 last">
			<!--<form action="#" class="contact_form">-->
				<h4 class="bottom_line regular"><b>Dublin Core</b></h4>
				<label for="name">Info</label>
				<input type="radio" id="posst" name="position" value="student" onclick="posOpt()"/>Description
				<input type="radio" id="posstwk" name="position" value="stwork" onclick="posOpt()"/>Traffic<br/> 
				<input type="radio" id="posadv" name="position" value="advisor" onclick="posOpt()"/>Map
				<input type="radio" id="posadm" name="position" value="admin" onclick="posOpt()"/>Parent Domain<br/>
				
				<br/><span id="demo">Please Select Option</span><br/>
				

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