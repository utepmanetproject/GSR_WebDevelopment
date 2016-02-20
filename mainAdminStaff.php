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
		// Function:  postOpt()
		//  Reset and display depending of the Option 
		//****************************************************************************************************************
		
		function posOpt()
		{
			var lab="";	
			if(document.getElementById("posst").checked)
			{
				lab="Menu of Discipline was selected";cleandisplay();
				document.getElementById('discid').style.display='block';
				document.getElementById('discipline').style.display='block';
				document.getElementById('master').style.display='block';
				document.getElementById('mapto').style.display='block';
				
				
				// POPULATE mapto list 
// 				get_PersonsUIDataFromServer(7);   //Education Level List
				get_PersonsUIDataFromServer(7);   //Education Level List
			

			}
			document.getElementById("demo").innerHTML=lab;
		}
	</script>
		
	
</head>
	<!-- Header -->
	<header class="header_bg clearfix">
		<div class="container clearfix">
 			 <!-- Logo -->
 			 
            <div class="logo"><a href="index.html"><img src="images/Utep_logo_svg.png" height="100" width="100" alt="" /></a><br/></div>
			
			 <!-- /Logo -->
			
			<!-- Master Nav -->
			<!-- Master Nav -->
			<nav class="main-menu">
				<ul>
					<li><a href="logout.php">Log out</a></li>
					<li><a href="mainAdminStaff.php">Home</a></li>
					
					<li><a>Domains Related</a>
						<ul>
							<li><a href="InstitutionClassRecord.php">Science Registry</a></li>
							<li><a href="domainsRecord.php">domains</a></li>							
							<li><a href="domains_dcoreRecord.php">domains_dcore</a></li>
						</ul>
					</li>
					
					<li><a href="#">Suplemental</a>
						<ul>
							<li><a href="ccodesRecord.php">ccodes</a></li>
							<li><a href="worldclassRecord.php">worldclass</a></li>
							<li><a href="OrgClassRecord.php">orgclass</a></li>
							<li><a href="DisciplinesRecord.php">disciplines</a></li>
							<li><a href="govagenciesRecord.php">govagencies</a></li>
							<li><a href="languageRecord.php">language<spam>*</spam></a></li>
						</ul>
					</li>

					<li><a>Traffic-Related Supp</a>
						<ul>
							<li><a href="domain_month_sourceRecord.php">domain_month_source</a></li>
							<li><a href="domain_month_destRecord.php">domain_month_dest</a></li>
							<li><a href="domain_bytesRecord.php">domain_bytes<spam>*</spam></a></li>
							<li><a href="domains_dcoreRecord.php">domains_dcore<spam>*</spam></a></li>
						</ul>
					</li>
	
					<li><a href="#">IP Address-Related</a>
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
		
		<!-- END PAGE INFO -->
		<div class="padding15"></div>

		<!-- START COL 1/4 -->	
		<div class="col_1_4">
			
			<p>
			</p> 
		            <br/>
			    <br/>
			    <br/>
			    <br/>
			    <br/>
			    <br/>
			    <br/>
			    <br/>
			    <br/>
			    <br/>
			    <br/>
			    <br/>
			    <br/>
			    <br/>
			<p>
			</p>
			<div class="clear"></div>
		</div>
		<!-- END COL 1/4 -->	
		
		<!-- START COL 1/3 -->	
		<div class="col_1_3">
			
			
			
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
						<li><a href="#">Add New Records</a></li>
						<li><a href="#">Update Information</a></li>
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