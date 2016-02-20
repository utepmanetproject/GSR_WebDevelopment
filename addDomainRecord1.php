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
		//  Show militaryStatus if military Status is selected
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
		//  Clean the Display area depending of the person type selection
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
	    //   Validates the Form fields to verify inconsistencies
	    //*********************************************************************************************************
	   function validateForm()
           {
		
	       var Numbers = /^[0-9]+$/;
	       var Letters = /[a-zA-Z]?/;
	       
	       var valUtepId =  document.getElementById("utepid");
	       var valName =  document.getElementById("fname");
	       var valLastName = document.getElementById("lname");
	       var valEmailPrimary = document.getElementById("email_1");
	       var valCountrycode1 =  document.getElementById("countrycode1");
	       var valAreacode1 = document.getElementById("areacode1");
	       var valTel1  = document.getElementById("telephone1");
	       var valStreet1  = document.getElementById("street1");
	       var valStreetNo1 =  document.getElementById("streetno1");
	       var valApartment1  = document.getElementById("aptno1");
	       var valZipcode1  = document.getElementById("zc1");
	       var valCity1  = document.getElementById("city1")
	       var PositionChecked = false;
	       var StudentStatusChecked = false;
	       var valContactName1 = document.getElementById("contname1");
	       var valContactAddress1 = document.getElementById("contaddr1");
	       var valContactRelation1 = document.getElementById("contrel1");
	       var valContactTelephone1 = document.getElementById("conttel1");
	       
               var ctlPositionName = document.getElementsByName("position");
	       for (var i = 0; i < ctlPositionName.length; i++)
	       {
		      if (ctlPositionName[i].checked == true)
		      {
			 var valPosition = ctlPositionName[i].value; 
			 PositionChecked  = true;
		      }
               }
	       
	       var ctlStudentStatus = document.getElementsByName("sstatus");
	       for (var i = 0; i < ctlStudentStatus.length; i++)
	       { 
		  if (ctlStudentStatus[i].checked == true)
		  {
		     StudentStatusChecked = true; 
		  }
	       }
		 
               // validate input control values		 
               if (!valUtepId.value.match(Numbers) || (valUtepId.value.length < 8 ||  valUtepId.value.length > 9 ))
	       {
		      alert("ERROR: The UTEP ID contains letters or is empty or contain less than 8 characters or more than 9 characters.");
	              return false;
	       }
	       
	       if(!valName.value.match(Letters) || valName.value.length == 0)
	       {
		     alert("ERROR: The First Name contains invalid characters or is empty");
                     return false;
	       }
	       if(!valLastName.value.match(Letters) || valLastName.value.length == 0)
	       {
		     alert("ERROR: The Last Name contains invalid characters or is empty");
                     return false;
	       }
	       if(valEmailPrimary.value.length == 0)
	       {
		     alert("ERROR: The primary Email contains invalid characters or is empty");
                     return false;
	       }
	       if (!valCountrycode1.value.match(Numbers) || valCountrycode1.value.length == 0)
	       {
		    alert("ERROR: The Country Code for the primary telephone contains letters or is empty");
	            return false;
	       }
	       if (valCountrycode1.value.length == 0 || valCountrycode1.value.length == 0)
	       {
		   alert("ERROR: The Country Code for primary telephone is empty.");
	           return false;
	       }
	       if (!valAreacode1.value.match(Numbers) || valAreacode1.value.length == 0)
	       {
		    alert("ERROR: The Area Code in the primary telephone contains letters or is empty");
	            return false;
	       }
	       
	       if (!valTel1.value.match(Numbers) || valTel1.value.length == 0)
	       {
		    alert("ERROR: The primary telephone  contains letters or is empty");
	            return false;
	       }
	       	   
	       if (!valStreet1.value.match(Letters) || valStreet1.value.length == 0)
	       {
		    alert("ERROR: The street field in the primary address contains numbers or is empty");
	            return false;
	       }
	       if (!valStreetNo1.value.match(Numbers) || valStreetNo1.value.length == 0)
	       {
		    alert("ERROR: The street number in primary address contains letters or is empty");
	            return false;
	       }
	       if (!valZipcode1.value.match(Numbers) || valZipcode1.value.length == 0)
	       {
		    alert("ERROR: The Zip Code in primary address contains letters or is empty");
	            return false;
	       }
	       if (!valCity1.value.match(Letters) || valCity1.value.length == 0)
	       {
		    alert("ERROR: The city in primary address contains numbers or is empty");
	            return false;
	       }
	       if (PositionChecked == false)
	       {
		   alert("ERROR: The Position is not selected...");
	           return false;
	       }
	       if (PositionChecked == true && (valPosition == "student" || valPosition == "stwork") && StudentStatusChecked == false)
	       {
  	           alert("ERROR: The Student Status is not selected...");
	           return false;
	       }
	       if (valContactName1.value.length == 0)
	       {
		   alert("ERROR: The primary contact name is empty.");
	           return false;
	       }
	       if (valContactAddress1.value.length == 0)
	       {
		   alert("ERROR: The primary contact address is empty.");
	           return false;
	       }
	       if (valContactTelephone1.value.length == 0)
	       {
		   alert("ERROR: The primary contact telephone is empty.");
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
			var valUtepId =  document.getElementById("utepid").value;
			var valName =  document.getElementById("fname").value;
			var valMiddleName = document.getElementById("mname").value;
		        var valLastName = document.getElementById("lname").value;
			var valSuffix =   document.getElementById("suffix").value;
			var valPrefix = document.getElementById("prefix").value;
			var valDOB = document.getElementById("dob").value;
			var ctlGender = document.getElementsByName("gender");
			
					
			
		        for (var i = 0; i < ctlGender.length; i++)
		        {
		           if (ctlGender[i].checked == true)
		           {
		               var valGender = ctlGender[i].value;   
		           }
                        }
		        var valMilClass =  document.getElementById("txtMilClassification").value;
		  
		  
			/************************ characteristics **************************************/
			var ctlReligion =  document.getElementById("religion");
			var valReligion = ctlReligion.options[ctlReligion.selectedIndex].value;
			
			var ctlEthnic =  document.getElementById("ethnic");
			var valEthnic = ctlEthnic.options[ctlEthnic.selectedIndex].value;
			
			var ctlCitizenship = document.getElementById("citizen");
			var valCitizen =  ctlCitizenship.options[ ctlCitizenship.selectedIndex].value;
			
			var ctlMaritalStatus = document.getElementById("maritalstatus");
			var valMaritalstatus = ctlMaritalStatus.options[ctlMaritalStatus.selectedIndex].value;
			
			/************************* emails ********************************************/
			var valEmailPrimary = document.getElementById("email_1").value;
			var valEmailSecondary = document.getElementById("email_2").value;
			var valEmailTertiary = document.getElementById("email_3").value;
			
			/**************************** Telephones ************************************/
			/* Telephone 1 */
			var valCountrycode1 =  document.getElementById("countrycode1").value;
			var valAreacode1 = document.getElementById("areacode1").value;
			var valTel1  = document.getElementById("telephone1").value;
			var ctlTeltype1 = document.getElementsByName("teltype1");
		  
			for (var i = 0; i < ctlTeltype1.length; i++)
			{
			    if (ctlTeltype1[i].checked == true)
			    {
			       var valTelType1 = ctlTeltype1[i].value;   
			    }
			}
		  
			/* Telephone 2 */
			var valCountrycode2 =  document.getElementById("countrycode2").value;
			var valAreacode2 = document.getElementById("areacode2").value;
			var valTel2  = document.getElementById("telephone2").value;
			var ctlTeltype2 = document.getElementsByName("teltype2");
			
			for (var i = 0; i < ctlTeltype2.length; i++)
			{
			    if (ctlTeltype2[i].checked == true)
			    {
			       var valTelType2 = ctlTeltype2[i].value;   
			    }
			}
		  
			/* Telephone 3 */
			var valCountrycode3 =  document.getElementById("countrycode3").value;
			var valAreacode3 = document.getElementById("areacode3").value;
			var valTel3  = document.getElementById("telephone3").value;
			var ctlTeltype3 = document.getElementsByName("teltype3");
			
			for (var i = 0; i < ctlTeltype3.length; i++)
			{
			    if (ctlTeltype3[i].checked == true)
			    {
			       var valTelType3 = ctlTeltype3[i].value;   
			    }
			}
		  
			/***************** Addresses **************************/
			/* Address 1 */
			var valStreet1  = document.getElementById("street1").value;
			var valStreetNo1 =  document.getElementById("streetno1").value;
			var valApartment1  = document.getElementById("aptno1").value;
			var valZipcode1  = document.getElementById("zc1").value;
			
			var ctlTypeAddres1  = document.getElementsByName("addrtype1");
			for (var i = 0; i < ctlTypeAddres1.length; i++)
			{
			    if (ctlTypeAddres1[i].checked == true)
			    {
			       var valTypeAddress1  = ctlTypeAddres1[i].value;   
			    }
			}
		  
			var ctlCountry1   = document.getElementById("country1");
			var valCountry1 = ctlCountry1.options[ctlCountry1.selectedIndex].value;
			var ctlState1  = document.getElementById("state1");
			var valState1 = ctlState1.options[ctlState1.selectedIndex].value;
			var valCity1  = document.getElementById("city1").value;
			
			
			/* address 2*/
			var valStreet2  = document.getElementById("street2").value;
			var valStreetNo2 =  document.getElementById("streetno2").value;
			var valApartment2  = document.getElementById("aptno2").value;
			var valZipcode2  = document.getElementById("zc2").value;
		  
			var ctlTypeAddres2  = document.getElementsByName("addrtype2");
			for (var i = 0; i < ctlTypeAddres2.length; i++)
			{
			    if (ctlTypeAddres2[i].checked == true)
			    {
			       var valTypeAddress2  = ctlTypeAddres2[i].value;   
			    }
			}
		  
			var ctlCountry2   = document.getElementById("country2");
			var valCountry2 = ctlCountry2.options[ctlCountry2.selectedIndex].value;
			var ctlState2  = document.getElementById("state2");
			var valState2 = ctlState2.options[ctlState2.selectedIndex].value;
			var valCity2  = document.getElementById("city2").value;
		  		  
			/* Address 3 */		  
			var valStreet3  = document.getElementById("street3").value;
			var valStreetNo3 =  document.getElementById("streetno3").value;
			var valApartment3  = document.getElementById("aptno3").value;
			var valZipcode3 = document.getElementById("zc3").value;
			
			var ctlTypeAddres3  = document.getElementsByName("addrtype3");
			for (var i = 0; i < ctlTypeAddres3.length; i++)
			{
			    if (ctlTypeAddres3[i].checked == true)
			    {
			       var valTypeAddress3  = ctlTypeAddres3[i].value;   
			    }
			}
	
			var ctlCountry3   = document.getElementById("country3");
			var valCountry3 = ctlCountry3.options[ctlCountry3.selectedIndex].value;
			var ctlState3  = document.getElementById("state3");
			var valState3 = ctlState3.options[ctlState3.selectedIndex].value;
			var valCity3  = document.getElementById("city3").value;
		
		    
			/************************ POSITION *************************/
			var ctlPositionName = document.getElementsByName("position");
			for (var i = 0; i < ctlPositionName.length; i++)
			{
			    if (ctlPositionName[i].checked == true)
			    {
			       var valPosition = ctlPositionName[i].value;   
			    }
			}
		    
			// Get Variables depending of (Student, Student working, Advisor, Admin)	  
		  
			if(valPosition == "student" || valPosition == "stwork")
			{
			     var ctlTerm = document.getElementById("entryTerm");
			     var valTerm = ctlTerm.options[ctlTerm.selectedIndex].value;
			     
			     var ctlEducationLevel   = document.getElementById("edlbox");
			     var valEducationLevel = ctlEducationLevel.options[ctlEducationLevel.selectedIndex].value;
			
			     var ctlProgramName = document.getElementById("prognamebox");
			     var valProgramName = ctlProgramName.options[ctlProgramName.selectedIndex].value;
			     
			     var valGPA = document.getElementById("gpabox").value;
			     var ctlAdvisor = document.getElementById("advbox");
			     var valAdvisor = ctlAdvisor.options[ctlAdvisor.selectedIndex].value;
			     
			     var ctlStudentStatus = document.getElementsByName("sstatus");
			     for (var i = 0; i < ctlStudentStatus.length; i++)
			     {
				 if (ctlStudentStatus[i].checked == true)
				 {
				     var valStudentStatus = ctlStudentStatus[i].value;   
				 }
			     }
			     
			}
		
			if(valPosition == "student" || valPosition == "stwork" || valPosition == "advisor" || valPosition == "admin")   
			{
			       
			      var valContactName1 = document.getElementById("contname1").value;
			      var valContactAddress1 = document.getElementById("contaddr1").value;
			      var valContactRelation1 = document.getElementById("contrel1").value;
			      var valContactTelephone1 = document.getElementById("conttel1").value;
			      
			      var valContactName2 = document.getElementById("contname2").value;
			      var valContactAddress2 = document.getElementById("contaddr2").value;
			      var valContactRelation2 = document.getElementById("contrel2").value;
			      var valContactTelephone2 = document.getElementById("conttel2").value;
			}
			if(valPosition != "student" && (valPosition == "stwork" || valPosition == "advisor" || valPosition == "admin"))
			{
			       
			      var valHourStart =  document.getElementById("hrbegin").value;
			      var valHourEnd =  document.getElementById("hrend").value;
					
			      var ctlMonday =  document.getElementById("monday");
			      var ctlTuesday =  document.getElementById("tuesday");
			      var ctlWednesday =  document.getElementById("wednesday");
			      var ctlThursday =  document.getElementById("thursday");
			      var ctlFriday =  document.getElementById("friday");
				   
			      var valDays = "";
			      var daysFlag = false;
			      
			      if (ctlMonday.checked == true)
			      {
				    valDays += "Mo,";
				    daysFlag = true;
			      }
			      if (ctlTuesday.checked == true)
			      {
				    valDays += "Tu,";
				    daysFlag = true;
			      }
			      if (ctlWednesday.checked == true)
			      {
				    valDays += "We,";
				    daysFlag = true;
			      }
			      if (ctlThursday.checked == true)
			      {
				   valDays += "Th,";
				   daysFlag = true;
			      }
			      if (ctlFriday.checked == true)
			      {
				   valDays += "Fr,";
				   daysFlag = true;
			      }
			      
			      if (daysFlag == true)
			      {
				   valDays =  valDays.substring(0, valDays.length-1);
			      }
			      else
			      {
				   valDays = "";
			      }
			      daysFlag = false;
			      
			      var valTerm = document.getElementById("termbox").value;
			  
			      var ctlDepto = document.getElementById("depto");
			      var valDepto = ctlDepto.options[ctlDepto.selectedIndex].value;
			      
			      var ctlBldg = document.getElementById("bldg");
			      var valBldg = ctlBldg.options[ctlBldg.selectedIndex].value;
			      
			      var ctlRoom = document.getElementById("room");
			      var valRoom = ctlRoom.options[ctlRoom.selectedIndex].value;
			       
			 } //***** End If*****
			
			//****************************************************************************
			// SETUP VALUES TO BE PASSED TO AJAX
			
			// PARAMETER ARRAYS
        		 var PersonArray = [];
			 var AddressArray = [];
			 var EmailArray = [];
			 var TelephoneArray = [];
			 var PositionsArray = [];
			 var contactsArray = [];
			 var OfficeHrArray = [];
			 var StudentArray = [];
			
			 
			 // Prepare Person Data to be sent
			 var dbUtepId = 'utepid=' + valUtepId;
			 var dbName = 'firstname=' + valName;
			 var dbMiddle = 'middlename=' + valMiddleName;
			 var dbLastName = 'lastname=' + valLastName;
			 var dbSuffix = 'sufix=' + valSuffix;
			 var dbPrefix = 'prefix=' + valPrefix;
			 var dbDOB = 'dob=' + valDOB;
			 var dbGender = 'gender=' + valGender;
			 var dbMilClass = 'militaryclass=' + valMilClass;
			 var dbReligion = 'selReligion=' + valReligion;
			 var dbEthnic = 'selEthnicity=' + valEthnic;
			 var dbCitizen = 'selCitizen=' + valCitizen;
			 var dbMarital = 'selMarital=' + valMaritalstatus;
			 
			 PersonArray.push(dbUtepId);
			 PersonArray.push(dbName);
			 PersonArray.push(dbMiddle);
			 PersonArray.push(dbLastName);
			 PersonArray.push(dbSuffix);			 
                         PersonArray.push(dbPrefix);
			 PersonArray.push(dbDOB); 
			 PersonArray.push(dbGender);
			 PersonArray.push(dbMilClass);
			 PersonArray.push(dbReligion);
			 PersonArray.push(dbEthnic);
			 PersonArray.push(dbCitizen);
 			 PersonArray.push(dbMarital);

			 // Prepare Address Information to be sent
			 var dbStreet1 = 'street1=' + valStreet1;
			 var dbStreetNo1 = 'streetno1=' + valStreetNo1;
			 var dbApartment1 = 'apartment1=' + valApartment1;
			 var dbZipCode1 = 'ZipCode1=' + valZipcode1;
			 var dbCountry1 = 'Country1=' + valCountry1;
			 var dbState1 = 'State1=' + valState1;
			 var dbCity1 = 'city1=' + valCity1;
			 var dbAddressType1 = "addressType1=" + valTypeAddress1;
			
			 AddressArray.push(dbStreet1);
			 AddressArray.push(dbStreetNo1);
			 AddressArray.push(dbApartment1);
			 AddressArray.push(dbZipCode1);
			 AddressArray.push(dbCountry1);
			 AddressArray.push(dbState1);
			 AddressArray.push(dbCity1);
			 AddressArray.push(dbAddressType1);
			
			// If we have a second Address
			if (valStreet2.length != 0 &&  valStreetNo2.length != 0 && valZipcode2.length != 0  && valCity2.length != 0)
			{
			     var dbStreet2 = 'street2=' + valStreet2;
			     var dbStreetNo2 = 'streetno2=' + valStreetNo2;
			     var dbApartment2 = 'apartment2=' + valApartment2;
			     var dbZipCode2 = 'ZipCode2=' + valZipcode2;
			     var dbCountry2 = 'Country2=' + valCountry2;
			     var dbState2 = 'State2=' + valState2;
			     var dbCity2 = 'city2=' + valCity2;
			     var dbAddressType2 = "addressType2=" + valTypeAddress2;
			
			      AddressArray.push(dbStreet2);
			      AddressArray.push(dbStreetNo2);
			      AddressArray.push(dbApartment2);
			      AddressArray.push(dbZipCode2);
			      AddressArray.push(dbCountry2);
			      AddressArray.push(dbState2);
			      AddressArray.push(dbCity2);
			      AddressArray.push(dbAddressType2);
			}
			// If we have a third address
			if (valStreet3.length != 0 &&  valStreetNo3.length != 0 && valZipcode3.length != 0 && valCity3.length != 0)
			{
			      var dbStreet3 = 'street3=' + valStreet3;
			      var dbStreetNo3 = 'streetno3=' + valStreetNo3;
			      var dbApartment3 = 'apartment3=' + valApartment3;
			      var dbZipCode3 = 'ZipCode3=' + valZipcode3;
			      var dbCountry3 = 'Country3=' + valCountry3;
			      var dbState3 = 'State3=' + valState3;
			      var dbCity3 = 'city3=' + valCity3;
			      var dbAddressType3 = 'addressType3=' + valTypeAddress3;
			      
			      AddressArray.push(dbStreet3);
			      AddressArray.push(dbStreetNo3);
			      AddressArray.push(dbApartment3);
			      AddressArray.push(dbZipCode3);
			      AddressArray.push(dbCountry3);
			      AddressArray.push(dbState3);
			      AddressArray.push(dbCity3);
			      AddressArray.push(dbAddressType3);
			}
			
			// Setup Telephones values
			/* Telephone 1 */
	                var dbCountrycode1 = "countrycode1=" + valCountrycode1;
			var dbAreacode1 = "areacode1=" + valAreacode1;
			var dbTel1 = "tel1=" + valTel1;
			var dbTelType1 = "teltype1=" + valTelType1;
			
			TelephoneArray.push(dbCountrycode1);
			TelephoneArray.push(dbAreacode1);
			TelephoneArray.push(dbTel1);
			TelephoneArray.push(dbTelType1);
			
			
			
			/* Telephone 2 */
			if (valCountrycode2.length != 0 && valAreacode2.length != 0 && valTel2.length != 0)
			{
			    var dbCountrycode2 = "countrycode2=" + valCountrycode2;
			    var dbAreacode2 = "areacode2=" + valAreacode2;
			    var dbTel2  = "tel2=" + valTel2;
			    var dbTelType2 = "teltype2=" + valTelType2;
			    
			    TelephoneArray.push(dbCountrycode2);
			    TelephoneArray.push(dbAreacode2);
			    TelephoneArray.push(dbTel2);
			    TelephoneArray.push(dbTelType2);
			}
			
			/* Telephone 3 */
			if (valCountrycode3.length != 0 && valAreacode3.length != 0 && valTel3.length != 0)
			{
			    var dbCountrycode3 = "countrycode3=" + valCountrycode3;
			    var dbAreacode3 = "areacode3=" + valAreacode3;
			    var dbTel3  = "tel3=" + valTel3;
			    var dbTelType3 = "teltype3=" + valTelType3;
			    
			    TelephoneArray.push(dbCountrycode3);
			    TelephoneArray.push(dbAreacode3);
			    TelephoneArray.push(dbTel3);
			    TelephoneArray.push(dbTelType3);
			}
			
			// Setup Email Values
			var dbEmail1 =  'email1=' + valEmailPrimary;
			var dbEmail2 =  'email2=' + valEmailSecondary;
			var dbEmail3 =  'email3=' + valEmailTertiary;
			
			EmailArray.push(dbEmail1);
			EmailArray.push(dbEmail2);
			EmailArray.push(dbEmail3);
						
			//***** Setup Position values *********
			var dbPositionName = "position=" + valPosition;
			var dbEducationLevel = "educationLevel=" + valEducationLevel;
			var dbProgram = "programName=" + valProgramName;
			var dbDepto  = "depto=" + valDepto;
			
			PositionsArray.push(dbPositionName);
			if (valPosition == "student" || valPosition == "stwork")
			{
			   PositionsArray.push(dbEducationLevel);
			   PositionsArray.push(dbProgram );    
			}
			PositionsArray.push(dbDepto);
			
			// ***** Setup Contact information ************
			 var dbContactName1 =   "contactname1=" + valContactName1;
			 var dbContactAddress1 = "contactaddress1=" + valContactAddress1;
			 var dbContactRelation1 = "contactrelation1=" + valContactRelation1;
			 var dbContactTelephone1 = "contacttelephone1=" + valContactTelephone1;
			      
			 var dbContactName2 =     "contactname2=" + valContactName2;
			 var dbContactAddress2 =  "contactaddress2=" + valContactAddress2;
			 var dbContactRelation2 = "contactrelation2=" + valContactRelation2;
			 var dbContactTelephone2 = "contacttelephone2=" + valContactTelephone2;
			 
			 contactsArray.push(dbContactName1);
			 contactsArray.push(dbContactAddress1);
			 contactsArray.push(dbContactRelation1);
			 contactsArray.push(dbContactTelephone1);
			 contactsArray.push(dbContactName2);
			 contactsArray.push(dbContactAddress2);
			 contactsArray.push(dbContactRelation2);
			 contactsArray.push(dbContactTelephone2);
			
			// ******* Setup Office Hours Information*******************************
			if(valPosition == "stwork" || valPosition == "advisor" || valPosition == "admin")
			{
			     var dbHourStart =  "hourStart=" + valHourStart;
			     var dbHourEnd =    "hourEnd=" + valHourEnd;
			     var dbDays =       "days=" + valDays;
			     var dbTerm =       "term=" + valTerm;
			     var dbDepto =      "depto=" + valDepto;
		             var dbBldg =       "building=" + valBldg;
	 	             var dbRoom =       "room="     + valRoom;
			     
			     OfficeHrArray.push(dbHourStart);
			     OfficeHrArray.push(dbHourEnd);
			     OfficeHrArray.push(dbDays);
			     OfficeHrArray.push(dbTerm);
			     OfficeHrArray.push(dbDepto);
			     OfficeHrArray.push(dbBldg);
			     OfficeHrArray.push(dbRoom);
			     
			}
			// Setup students data information
			if(valPosition == "student" || valPosition == "stwork")
			{
			    var dbTerm = 'term=' + valTerm;	
			    var dbGPA = 'GPA=' + valGPA ;
			    var dbAdvisor = 'advisor=' + valAdvisor;
		            var dbStudentStatus = 'studentstatus=' + valStudentStatus;
			    
			    StudentArray.push(dbGPA);
			    StudentArray.push(dbAdvisor);
			    StudentArray.push(dbStudentStatus);
			    StudentArray.push(dbTerm);
    		        }
			//****** SEND DATA ARRAYS TO SERVER  FOR INSERTION IN DATABASE ***************
			 if(valPosition == "student")
			 {
			      setStudentToServer(PersonArray,AddressArray,TelephoneArray,EmailArray,PositionsArray, contactsArray, StudentArray);
			 }
			 if (valPosition == "stwork")
			 {
			      setWorkingStudentToServer(PersonArray,AddressArray,TelephoneArray,EmailArray,PositionsArray, contactsArray,OfficeHrArray, StudentArray);
			 }
			 if (valPosition == "advisor" || valPosition == "admin")
			 {
		              setAdvisorAdminToServer(PersonArray,AddressArray,TelephoneArray,EmailArray,PositionsArray, contactsArray,OfficeHrArray);	
			 }
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
			<nav class="main-menu">
				<ul>
					<li><a href="logout.php">Log out</a></li>
					<li><a href="mainAdminStaff.php">Home</a></li>
					
					<li><a>Domains Info</a>
						<ul>
							<li><a href="addDomainRecord.php"">Add Domains</a></li>
							<li><a href="UpdateDomainRecord.php">Update Domains</a></li>
						</ul>
					</li>
					
					<li><a href="#">Support Information</a>
						<ul>
							<li><a href="DisciplinesRecord.php">Disciplines</a></li>
							<li><a href="OrganizationsRecord.php">Organizations</a></li>
							<li><a href="GovernmentRecord.php">Government Agencies</a></li>
							<li><a href="GovernmentRecord.php">Countries</a></li>
							<li><a href="RegionRecord.php">Regions</a></li>
						</ul>
					</li>

					<li><a href="#">Reports</a>
						<ul>
							<li><a href="reportDailyInfo.php">Daily Report</a></li>
							<li><a href="reportMonthlyInfo.php">Monthly Report</a></li>

						</ul>
					</li>

					<li><a href="#">Maintenance</a>
						<ul>
							<li><a href="reportPersonalInfo.php">Users</a></li>
							<li><a href="BackUpInfo.php">Database Backup</a></li>
						</ul>
					</li>
			       </ul>
			</nav>
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
					World Region <span>*</span><input class="inputText" type="number" id="worldclass" name="worldclass" required="required" />					 
					Organization Type <input class="inputText" type="text" id="geoorg" name="geoorg" />
					Discipline <input class="inputText" type="text" id="discipline" name="discipline" /><br />					
					Gov Agency<input class="inputText" type="number" id="govid" name="govid" />
				</p>
					 
				<p>
					<label for="name">Traffic</label>					
					Source Traffic<input class="inputText" type="number" id="sbytes" name="sbytes" />
					Destination Traffic<input class="inputText" type="number" id="dbytes" name="dbytes" /><br />
					First Month<input class="inputText" type="month" id="minmonth" name="minmonth" placeholder="YYYY-MM"/>										
					Recent Month<input class="inputText" type="month" id="maxmonth" name="maxmonth" placeholder="YYYY-MM"/>										
				</p>
				<p>	
					<label for="name">Location</label>														
					Country <input class="inputText" type="text" id="ccode" name="ccode" /><br />
					City<br /><input class="inputText" type="text" id="city" name="city" /><br />																				
					Region Code <input class="inputText" type="text" id="regioncode" name="regioncode" />
					Postal Code <input class="inputText" type="text" id="postalcode" name="postalcode" />
					<b>Latitude,Longitude</b><br/>					
					<input class="inputText1" type="number" id="latitude" name="latitude" placeholder="latitude"/>
					<input class="inputText1" type="number" id="longitude" name="longitude" placeholder="longitude" /><br />

					GeoIP Organization<input class="inputText" type="text" id="geoorg" name="geoorg" />
					GeoIP ISP<input class="inputText" type="text" id="geocity" name="geocity" /><br />
				</p>
				
			<!--</form> -->
		<!-- END CONTACT FORM -->		
		</div>
		<!-- END COL 1/3  -->
		
		<!-- START COL 1/3 LAST -->	
		<div class="col_1_3 last">
			<!--<form action="#" class="contact_form">-->
				<h4 class="bottom_line regular"><b>Dublin Core</b></h4>
				<label for="name">Please Select Option</label>
				<input type="radio" id="posst" name="position" value="student" onclick="posOpt()"/>Description
				<input type="radio" id="posstwk" name="position" value="stwork" onclick="posOpt()"/>Traffic<br/> 
				<input type="radio" id="posadv" name="position" value="advisor" onclick="posOpt()"/>Map
				<input type="radio" id="posadm" name="position" value="admin" onclick="posOpt()"/>Parent Domain<br/>
				
				<br/><span id="demo">Please Select Option</span><br/>
				
				<label style="display: none" id="lblentryTerm" for="name">Entry Term<span>*</span></label>
				<select  style="display: none" type="text" id="entryTerm" name="entryTerm" />
				
				</select>

				<label style="display: none" id="edl" for="name">Education Level<span>*</span></label>
				<select  style="display: none" type="text" id="edlbox" name="edlbox" />
				
				</select>
				
				<label style="display: none" id="progname" for="name">Program Name<span>*</span></label>
				<select style="display: none" type="text" id="prognamebox" name="prognamebox" />
				
				</select>
				
				<label style="display: none" id="gpa" for="name">GPA<span>*</span></label>
				<input style="display: none" class="inputText1" type="text" id="gpabox" name="gpabox" />
				<label style="display: none" id="adv" for="name">Advisor ID</label>
				<select style="display: none"  type="text" id="advbox" name="advbox" />
				
				</select>
				
				<input style="display: none" type="radio" name="sstatus" id="act" value="active" /><span id="active" style="display: none">Active</span>
				<input style="display: none" type="radio" name="sstatus" id="inact" value="inactive" /><span id="inactive" style="display: none">Inactive</span>
				<input style="display: none" type="radio" name="sstatus" id="grad" value="graduated" /><span id="graduated" style="display: none">Graduated</span><br/>

				<h4 style="display: none" class="bottom_line regular" id="contact"><b>Contacts</b></h4>
				<label style="display: none" for="name" id="primcont">Primary Contact</label>
				<span style="display: none" id="cn1">Contact Name</span><input style="display: none" class="inputText" type="text" id="contname1" name="contname1" />
				<span style="display: none" id="ca1">Contact Address</span><input style="display: none" class="inputText" type="text" id="contaddr1" name="contaddr1" />
				<span style="display: none" id="cr1">Contact Relation</span><input style="display: none" class="inputText" type="text" id="contrel1" name="contrel1" />
				<span style="display: none" id="ct1">Contact Telephone</span><input style="display: none" class="inputText" type="text" id="conttel1" name="conttel1" /><br/>
				<label style="display: none" for="name" id="seccont">Secondary Contact</label>
				<span style="display: none" id="cn2">Contact  Name</span><input style="display: none" class="inputText" type="text" id="contname2" name="contname2" />
				<span style="display: none" id="ca2">Contact Address</span><input style="display: none" class="inputText" type="text" id="contaddr2" name="contaddr2" />
				<span style="display: none" id="cr2">Contact Relation</span><input style="display: none" class="inputText" type="text" id="contrel2" name="contrel2" />
				<span style="display: none" id="ct2">Contact Telephone</span><input style="display: none" class="inputText" type="text" id="conttel2" name="conttel2" />
				<br/>
				
				<h4 style="display: none" class="bottom_line regular" id="ohrs"><b>Office Hours and Location</b></h4>
				<span style="display: none" id="from">From </span><input style="display: none" class="inputText1" type="time" id="hrbegin" name="hrbegin" />
				<span style="display: none" id="to">To </span><input style="display: none" class="inputText1" type="time" id="hrend" name="hrend" /><br/><br/>
				<span style="display: none" id="wkdays">Days of the week </span><br/>
				<input style="display: none" type="checkbox" id="monday" name="monday" value="monday"><span style="display: none" id="m">Monday</span>
				<input style="display: none" type="checkbox" id="tuesday" name="tuesday" value="tuesday"><span style="display: none" id="t">Tuesday</span>
				<input style="display: none" type="checkbox" id="wednesday" name="wednesday" value="wednesday"><span style="display: none" id="w">Wednesday</span>
				<input style="display: none" type="checkbox" id="thursday" name="thursday" value="thursday"><span style="display: none" id="th">Thursday</span>
				<input style="display: none" type="checkbox" id="friday" name="friday" value="friday"><span style="display: none" id="f">Friday</span> <br/><br/>
				<span style="display: none" id="term">Term </span> <!--<input style="display: none" type="text" class="inputText1" id="termbox" name="termbox" /><br/>-->
				<select  style="display: none" type="text" id="termbox" name="termbox" />
				
				</select>                                                  
				<br/>						   
				
				<span style="display: none" id="location">Insert the Location: Department * + Building + Room</span><br/>
				<Select style="display: none" type="text" id="depto" name="depto" placeholder="Department"/>
				
				</select>
				<select onChange="selectRoom()" style="display: none" type="text"  id="bldg" name="bldg" placeholder="Building"/>
				
				</select>
				<select style="display: none" type="text"  id="room" name="room" placeholder="Room"/>
				</select>
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
				<p>The University of Texas at El Paso | 500 West University Avenue | El Paso, Texas 79968 | (915) 747-5000</p>
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