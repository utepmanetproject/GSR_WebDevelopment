<!--
 Script name:  insertions.php
 Script type:  PHP
 Purpose:      This file has the Methods that read HTML data and insert it in the Data Base using the DataBaseOperations Object
 Project:      Traffic Collection DataBase System
 Software Engineer:    Esau Ruiz Gaistardo
 The University of Texas at El paso
-->

<?PHP
    require("DataBaseOperations.php");    // INCLUDE DATABASE OPERATIONS CLASS
	  
	  $key = $_POST['key'];    

	  switch($key)
	  {


		  	case 'Domain':             // Register a New Institution in DataBase
                    PersonInfoToDB();
                    break;

	        case 'Disciplines':
			      	disciplinesInfoToDB();       // Insert New Disciplines Information in DataBase
		      		break;
            case 'InstClass':
                    InstitutionalInfoToDB();   // Insert regions Information in Data Base
                    break;		      		
            case 'IpClass':
                    IpClassInfoToDB();   // Insert regions Information in Data Base
                    break;		      		

	        case 'Ccodes':
                	ccodesInfoToDB();      // Insert ccodes information in Data Base 
		      		break;
            case 'WorldClass':
                    WorldClassInfoToDB();     // Insert WorldClass Information in DataBase
                    break;
            case 'OrgClass':
                    OrgClassInfoToDB();   // Insert Country Information in Data Base
                    break;

 
		      		
          }

?>	 
<?PHP         
 
 
 /*****************************************************************************************
*
*		Method: disciplinesInfoToDB
*				Insert Disciplines Info to DataBase
*
******************************************************************************************/
function disciplinesInfoToDB()
{
//Create Variable and assign the country value from  HTML interface
	$discid = isset($_POST['discid']) ? $_POST['discid'] : '';
    $discipline = isset($_POST['discipline']) ? trim($_POST['discipline']) : '';
    $master = isset($_POST['master']) ? trim($_POST['master']) : '';
    $mapto = isset($_POST['mapto']) ? trim($_POST['mapto']) : '';

    // Create the UTC time and include the UTC time in the input

// 	$defaultTimeZone='UTC';	
// 	if(date_default_timezone_get()!=$defaultTimeZone) date_default_timezone_set($defaultTimeZone);
// 	$modifytime = date("Y-m-d H:i:s");
		
	// Validate what is in the HTML
	if(!$discipline)
		{
		    echo "You have not entered all the required details. <br /> Please go back and try again. <br />";
		    exit;	 
		}
	
	if (!get_magic_quotes_gpc())
     	{
        	$discid = addslashes($discid);
            $discipline = addslashes($discipline);
            $master = addslashes($master);
            $mapto = addslashes($mapto);
                  
	    }
                
        $DBObject = new DBOperations();      // Create Data Base Operations Object
	
	if($DBObject->connect_DataBase() == false)     // Connect to data Base
	    {
	             echo "Error: Could not connect to database. please try again later.";
		}
    else
        {
            // Insert register in the data base
        	$res = $DBObject->insert_Discipline($discid,$discipline,$master,$mapto);
	        if($res == 0)
	                echo  $discipline. " registered succesfully!!!";
            else if($res == -1)
	                echo "An error occured!!!. the item was not added, contact the system administrator";
	        else if($res == -2)
	                echo $discipline." record already exist in the database";
       }
    
    $DBObject->disconnect_DataBase();    //  Disconnect to data base
            
} //end DisciplinesInfoToDB() 
 

 /*****************************************************************************************
*
*		Method: disciplinesInfoToDB
*				Insert Disciplines Info to DataBase
*
******************************************************************************************/
function IpClassInfoToDB()
{

//Create Variable and assign the country value from  HTML interface
    $keyid = isset($_POST['keyid']) ? trim($_POST['keyid']) : '';
    $ipa = isset($_POST['ipa']) ? trim($_POST['ipa']) : '';
    $organization = isset($_POST['organization']) ? trim($_POST['organization']) : '';
    $country = isset($_POST['country']) ? trim($_POST['country']) : ''; 

    // Create the UTC time and include the UTC time in the input

// 	$defaultTimeZone='UTC';	
// 	if(date_default_timezone_get()!=$defaultTimeZone) date_default_timezone_set($defaultTimeZone);
// 	$modifytime = date("Y-m-d H:i:s");
		
	// Validate what is in the HTML
		if(!$ipa)
			{  
			    echo "You have not entered all the required fields. <br /> Please go back and try again. <br />";
		    	exit;	 
			}
	
		if (!get_magic_quotes_gpc())
    	 	{
        		$keyid = addslashes($keyid);
            	$ipa = addslashes($ipa);
            	$organization = addslashes($organization);
            	$country = addslashes($country);
	    	}
                
        $DBObject = new DBOperations();      // Create Data Base Operations Object
	
		if($DBObject->connect_DataBase() == false)     // Connect to data Base
	   	 	{
	             echo "Error: Could not connect to database. please try again later.";
			}
   		 else
        	{
            // Insert register in the data base
        		$res = $DBObject->Insert_Ips($keyid,$ipa,$organization,$country);
	        if($res == 0)
	       
	        if($res == 0)
	                echo  "IP registered succesfully!!!";
            else if($res == -1)
	                echo  "An error occured!!!. the item was not added, contact the system administrator";
	        else if($res == -2)
	                echo  "IP already exist in the database";
	        
       	}
    
    $DBObject->disconnect_DataBase();    //  Disconnect to data base
            
} //end IpClassInfoToDB()  
 
  /*****************************************************************************************
*
*		Method: ccodesInfoToDB
*				Insert ccodes Info to DataBase
*
******************************************************************************************/
function ccodesInfoToDB()
{
//Create Variable and assign the country value from  HTML interface
	$code = isset($_POST['code']) ? $_POST['code'] : '';
    $country = isset($_POST['country']) ? trim($_POST['country']) : '';
    $worldclass = isset($_POST['worldclass']) ? trim($_POST['worldclass']) : '';
    $color = isset($_POST['color']) ? trim($_POST['color']) : '';


		
	// Validate what is in the HTML
	if(!$code && !$country && !$worldclass)
		{
		    echo "You have not entered all the required details. <br /> Please go back and try again. <br />";
		    exit;	 
		}
	
	if (!get_magic_quotes_gpc())
     	{
        	$code = addslashes($code);
            $country = addslashes($country);
            $worldclass = addslashes($worldclass);
            $color = addslashes($color);
                  
	    }
                
        $DBObject = new DBOperations();      // Create Data Base Operations Object
	
	if($DBObject->connect_DataBase() == false)     // Connect to data Base
	    {
	             echo "Error: Could not connect to database. please try again later.";
		}
    else
        {
            // Insert register in the data base
        	$res = $DBObject->insert_Ccodes($code,$country,$worldclass,$color);
	        if($res == 0)
	                echo  $code. " registered succesfully!!!";
            else if($res == -1)
	                echo "An error occured!!!. the item was not added, contact the system administrator";
	        else if($res == -2)
	                echo $code." record already exist in the database";
       }
    
    $DBObject->disconnect_DataBase();    //  Disconnect to data base
            
} //end DisciplinesInfoToDB() 

 
/*****************************************************************************************
*
*		Method: WorldClassInfoToDB
*				Insert WorldClass Info to DataBase
*
******************************************************************************************/
function WorldClassInfoToDB()
{
//Create Variable and assign the country value from  HTML interface
	$worldid = isset($_POST['worldid']) ? $_POST['worldid'] : '';
    $wclass = isset($_POST['wclass']) ? trim($_POST['wclass']) : '';
    $mapto = isset($_POST['mapto']) ? trim($_POST['mapto']) : '';


		
	// Validate what is in the HTML
	if(!$worldid)
		{
		    echo "You have not entered all the required information for WorldClass. <br /> Please go back and try again. <br />";
		    exit;	 
		}
	
	if (!get_magic_quotes_gpc())
     	{
        	$worldid = addslashes($worldid);
            $wclass = addslashes($wclass);
            $mapto = addslashes($mapto);
                              
	    }
                
        $DBObject = new DBOperations();      // Create Data Base Operations Object
	
	if($DBObject->connect_DataBase() == false)     // Connect to data Base
	    {
	             echo "Error: Could not connect to database. please try again later.";
		}
    else
        {
            // Insert register in the data base
        	$res = $DBObject->insert_WorldClass($worldid,$wclass,$mapto);
	        if($res == 0)
	                echo  "WorldId :".$worldid. " registered succesfully!!!";
            else if($res == -1)
	                echo "An error occured!!!. the item was not added, contact the system administrator";
	        else if($res == -2)
	                echo "Worldid ".$worldid ." already exist in the database";
       }
    
    $DBObject->disconnect_DataBase();    //  Disconnect to data base
            
} //end WorldClassInfoToDB() 

/*****************************************************************************************
*
*		Method: InstitutionalInfoToDB
*				Insert Institutional Data Info to DataBase
*
******************************************************************************************/
function InstitutionalInfoToDB()
{
//Create Variable and assign the country value from  HTML interface
    $organization = isset($_POST['organization']) ? trim($_POST['organization']) : '';
    $city = isset($_POST['city']) ? trim($_POST['city']) : '';
    $regioncode = isset($_POST['regioncode']) ? trim($_POST['regioncode']) : '';
    $postalcode = isset($_POST['postalcode']) ? trim($_POST['postalcode']) : '';    
    $ccode = isset($_POST['ccode']) ? trim($_POST['ccode']) : '';
    $latitude = isset($_POST['latitude']) ? trim($_POST['latitude']) : '';
    $longitude = isset($_POST['longitude']) ? trim($_POST['longitude']) : '';
    $createdby = isset($_POST['createdby']) ? trim($_POST['createdby']) : '';
			    
		
	// Validate what is in the HTML
	if(!$organization)
		{
		    echo "You have not entered all the required information for Domain <br /> Please go back and try again. <br />";
		    exit;	 
		}
	
	if (!get_magic_quotes_gpc())
     	{
            $organization = addslashes($organization);
            $city = addslashes($city);
            $regioncode = addslashes($regioncode);
            $postalcode = addslashes($postalcode);
            $ccode = addslashes($ccode);
            $latitude = addslashes($latitude);
            $longitude = addslashes($longitude);
            $createdby = addslashes($createdby);

                              
	    }
                
        $DBObject = new DBOperations();      // Create Data Base Operations Object
	
	if($DBObject->connect_DataBase() == false)     // Connect to data Base
	    {
	             echo "Error: Could not connect to database. please try again later.";
		}
    else
        {
            // Insert register in the data base
        	$res = $DBObject->insert_InstitutionalClass($organization,$city,$regioncode,$postalcode,$ccode,$latitude,$longitude,$createdby);
	        if($res == 0)
	                echo  $organization. " registered succesfully!!!";
            else if($res == -1)
	                echo  "An error occured!!!. the item was not added, contact the system administrator";
	        else if($res == -2)
	                echo  "Organization ".$organization ." already exist in the database";
       }  
       
    $DBObject->disconnect_DataBase();    //  Disconnect to data base
            
} //end InstitutionalInfoToDB() 

/*****************************************************************************************
*
*		Method: OrgClassInfoToDB
*				Insert Organization Info to DataBase
*
******************************************************************************************/
function OrgClassInfoToDB()
{
//Create Variable and assign the country value from  HTML interface
	$orgid = isset($_POST['orgid']) ? $_POST['orgid'] : '';
    $organization = isset($_POST['organization']) ? trim($_POST['organization']) : '';
    $mapto = isset($_POST['mapto']) ? trim($_POST['mapto']) : '';


		
	// Validate what is in the HTML
	if(!$orgid)
		{
		    echo "You have not entered all the required information for Organization ID. <br /> Please go back and try again. <br />";
		    exit;	 
		}
	
	if (!get_magic_quotes_gpc())
     	{
        	$orgid = addslashes($orgid);
            $organization = addslashes($organization);
            $mapto = addslashes($mapto);
                              
	    }
                
        $DBObject = new DBOperations();      // Create Data Base Operations Object
	
	if($DBObject->connect_DataBase() == false)     // Connect to data Base
	    {
	             echo "Error: Could not connect to database. please try again later.";
		}
    else
        {
            // Insert register in the data base
        	$res = $DBObject->insert_OrgClass($orgid,$organization,$mapto);
	        if($res == 0)
	                echo  "Organization :".$organization. " registered succesfully!!!";
            else if($res == -1)
	                echo "An error occured!!!. the item was not added, contact the system administrator";
	        else if($res == -2)
	                echo "Organization ".$organization ." already exist in the database";
       }
    
    $DBObject->disconnect_DataBase();    //  Disconnect to data base
            
} //end WorldClassInfoToDB() 




 
//*******************************************************************************************************
//** Method: DomainInfoToDB()
//** Prepare the Domain Information to be inserted in the DataBase
//******************************************************************************************************* 
function DomainInfoToDB()
    {
      // Set Date Time Zone 
        	date_default_timezone_set('America/New_York');
		 
	//**** SET FLAGS ***************************************************************************
	// Get type of Person
	        $strTypeFlag = $_POST['Iam'];
		
		// Set Flag to Person Type  
		if($strTypeFlag == "domain")              // A New Domain will be inserted
		{
		          $flag = "domain";
		}
		
		elseif ($strTypeFlag=='')
           {
               echo 'Incomplete information received';
               exit(400);      // This will exit and ignore the request
			}
			 			 			 



	    $errorFlag = false;                            // error flag = false (No error)
		$activeRecord = 'enable';                     // When insertions the Record in Persons Table is Enable (Active)
		 
                //******* GET  DATA FROM HTML   FORM ********************************************************
                $organization = trim(isset($_POST['organization'])) ? trim($_POST['organization']) : '';
                $domainid = trim(isset($_POST['domainid'])) ? trim($_POST['domainid']) : '';
                $countryrec = trim(isset($_POST['countryrec'])) ? trim($_POST['countryrec']) : '';
                $worldclass = trim(isset($_POST['worldclass'])) ? trim($_POST['worldclass']) : '';
                $geoorg = trim(isset($_POST['geoorg'])) ? trim($_POST['geoorg']) : '';
                $discipline  = trim(isset($_POST['discipline'])) ? trim($_POST['discipline'])  : '';
                $govid = trim(isset($_POST['govid'])) ? trim($_POST['govid']) : '';
                $sbytes = trim(isset($_POST['sbytes'])) ? trim($_POST['sbytes']) : '';
                $dbytes = trim(isset($_POST['dbytes'])) ? trim($_POST['dbytes']) : '';
                $minmonth = trim(isset($_POST['minmonth'])) ? trim($_POST['minmonth']) : '';
                $maxmonth = trim(isset($_POST['maxmonth'])) ? trim($_POST['maxmonth']) : '';
                $ccode = trim(isset($_POST['ccode'])) ? trim($_POST['ccode']) : '';
                $city = trim(isset($_POST['city'])) ? trim($_POST['city']) : '';
                $regioncode = trim(isset($_POST['regioncode'])) ? trim($_POST['regioncode']) : '';
                $postalcode = trim(isset($_POST['postalcode'])) ? trim($_POST['postalcode']) : '';
                $latitude = trim(isset($_POST['latitude'])) ? trim($_POST['latitude']) : '';
                $longitude = trim(isset($_POST['longitude'])) ? trim($_POST['longitude']) : '';
                $geoorg = trim(isset($_POST['geoorg'])) ? trim($_POST['geoorg']) : '';
                $geocity = trim(isset($_POST['geocity'])) ? trim($_POST['geocity']) : '';                		
	
                //******************VALIDATE  GET MAGIC QUOTES *********************************************
                if(!get_magic_quotes_gpc())
                {
                    $organization = addslashes($organization);
                    $domainid  = addslashes($domainid);
                    $countryrec = addslashes($countryrec);
                    $worldclass = addslashes($worldclass);
                    $geoorg = addslashes($geoorg);
                    $discipline = addslashes($discipline);
                    $govid = addslashes($govid);
                    $sbytes = addslashes($sbytes);
                    $dbytes = addslashes($dbytes);
                    $minmonth = addslashes($minmonth);
                    $maxmonth = addslashes($maxmonth);
                    $ccode = addslashes($ccode);
                    $city = addslashes($city);
                    $regioncode = addslashes($regioncode);
                    $postalcode = addslashes($postalcode);
                    $latitude = addslashes($latitude);
                    $longitude = addslashes($longitude);
                    $geoorg = addslashes($geoorg);
                    $geocity = addslashes($geocity);


		    

	        
			} // End if Addslashes()
               
	       
		//  ********* INSERT INTO DATABASE  ***************************************************************
		$DBObject = new DBOperations();      // Create Data Base Operations Object
	        // Connect to data Base
	        if($DBObject->connect_DataBase() == false)     // Connect to data Base
	        {
	             echo "Error: Could not connect to database. please try again later.";
	        }
                else   
                {
		    // Insert Person Basic Data
		    $res = $DBObject->insertDomainBasicData($organization,$domainid, $countryrec,$worldclass,$geoorg,$discipline,$govid,$sbytes,$dbytes,$minmonth,$maxmonth,$ccode,$city,$regioncode,$postalcode,$latitude,$longitude,$geoorg,$geocity);
	            if($res == 0)
		    {
	                 $errorFlag = false;
			 
			 // INSERT ADDRESSES SECTION
			 // there is 1 address
			 if($addressFlag == '8')
			 {
			      if($errorFlag == false)
			      {
			          
				   $res = $DBObject->insertPersonAddress($utepid,$street1, $streetNo1,$apartment1,$ZipCode1,$addressType1,$city1,$Country1,$State1);
			           if($res == 0)
			                $errorFlag = false;
			           else
			           {
			                $errorFlag = true;
				        echo "An error occured!!!. the Person's  Address Information Data was not added, contact the system administrator";
			           }
			      }
			 }
			 // There are 2  Addresses
			 if($addressFlag == '16')
			 {
			      
			      if($errorFlag == false)
			      {
			           $res = $DBObject->insertPersonAddress($utepid,$street1, $streetNo1,$apartment1,$ZipCode1,$addressType1,$city1,$Country1,$State1);
			           if($res == 0)
			               $errorFlag = false;
			           else
			           {
			               $errorFlag = true;
				       echo "An error occured!!!. the Person's First Address Information Data was not added, contact the system administrator";
			           }
			      }
			      
			      if($errorFlag == false)
			      {
			           $res = $DBObject->insertPersonAddress($utepid,$street2, $streetNo2,$apartment2,$ZipCode2,$addressType2,$city2,$Country2,$State2);
			           if($res == 0)
			               $errorFlag = false;
			           else
			           {
			               $errorFlag = true;
				       echo "An error occured!!!. the Person's Second Address Information Data was not added, contact the system administrator";
			           }
			      }	   
			 }
			 // There are 3  Addresses
		         if($addressFlag == '24')
		         {
			      if($errorFlag == false)
			      {
			           $res = $DBObject->insertPersonAddress($utepid,$street1, $streetNo1,$apartment1,$ZipCode1,$addressType1,$city1,$Country1,$State1);
			           if($res == 0)
			              $errorFlag = false;
			           else
			           {
			              $errorFlag = true;
				      echo "An error occured!!!. the Person's First Address Information Data was not added, contact the system administrator";
			           }
			      }
			      
			      if($errorFlag == false)
			      {
			           $res = $DBObject->insertPersonAddress($utepid,$street2, $streetNo2,$apartment2,$ZipCode2,$addressType2,$city2,$Country2,$State2);
			           if($res == 0)
			              $errorFlag = false;
			           else
			           {
			              $errorFlag = true;
				      echo "An error occured!!!. the Person's Second Address Information Data was not added, contact the system administrator";
			           }
			      }
			      
			      if($errorFlag == false)
			      {
			          $res = $DBObject->insertPersonAddress($utepid,$street3, $streetNo3,$apartment3,$ZipCode3,$addressType3,$city3,$Country3,$State3);
			          if($res == 0)
			              $errorFlag = false;
			          else
			          {
			              $errorFlag = true;
				      echo "An error occured!!!. the Person's Third Address Information Data was not added, contact the system administrator";
			          }
			      }
		         }
			 
			 // INSERT TELEPHONES
			 if($telephoneFlag == '4')
		         {
			      
			      if($errorFlag == false)
			      {
			          $res = $DBObject->insertPersonTelephone($utepid,$countrycode1,$areacode1,$tel1,$teltype1);
			          if($res == 0)
			              $errorFlag = false;
			          else
			          {
			              $errorFlag = true;
				      echo "An error occured!!!. the Person's Primary Telephone data was not added, contact the system administrator";
			          }
			      }
			 }
			 
			 if($telephoneFlag == '8')
		         {
			      
			      if($errorFlag == false)
			      {
			         $res = $DBObject->insertPersonTelephone($utepid,$countrycode1,$areacode1,$tel1,$teltype1);
			         if($res == 0)
			             $errorFlag = false;
			         else
			         {
			            $errorFlag = true;
				     echo "An error occured!!!. the Person's Primary Telephone data was not added, contact the system administrator";
			         }
			      }
			      
			      if($errorFlag == false)
			      {
			         $res = $DBObject->insertPersonTelephone($utepid,$countrycode2,$areacode2,$tel2,$teltype2);
			         if($res == 0)
			              $errorFlag = false;
			         else
			         {
			             $errorFlag = true;
				     echo "An error occured!!!. the Person's Secondary Telephone data was not added, contact the system administrator";
			         }
			      }
			 }
			 if($telephoneFlag == '12')
		         {
			      if($errorFlag == false)
			      {
			          $res = $DBObject->insertPersonTelephone($utepid,$countrycode1,$areacode1,$tel1,$teltype1);
			          if($res == 0)
			              $errorFlag = false;
			          else
			          {
			              $errorFlag = true;
				      echo "An error occured!!!. the Person's Primary Telephone data was not added, contact the system administrator";
			          }
			      }
			      
			      if($errorFlag == false)
			      {
			          $res = $DBObject->insertPersonTelephone($utepid,$countrycode2,$areacode2,$tel2,$teltype2);
			          if($res == 0)
			               $errorFlag = false;
			          else
			          {
			               $errorFlag = true;
				       echo "An error occured!!!. the Person's Secondary Telephone data was not added, contact the system administrator";
			          }
			      }
			      
			      if($errorFlag == false)
			      {
			          $res = $DBObject->insertPersonTelephone($utepid,$countrycode3,$areacode3,$tel3,$teltype3);
			          if($res == 0)
			              $errorFlag = false;
			          else
			          {
			             $errorFlag = true;
				     echo "An error occured!!!. the Person's Tiertiary Telephone data was not added, contact the system administrator";
			          }
			      }
			 }
			 
			 // INSERT EMAILS
			 if($errorFlag == false)
			 {
			      $res = $DBObject->insertPersonEmails($utepid,$email1,$email2,$email3);
			      if($res == 0)
			         $errorFlag = false;
			      else
			      {
			         $errorFlag = true;
				 echo "An error occured!!!. the Person Emails Information Data was not added, contact the system administrator";
			      }
			 }
			 
			 //INSERT POSITION
			 if($errorFlag == false)
			 {
 	 	              $res = $DBObject->insertPersonPosition($utepid,$position,$educationLevel,$programName,$depto,$flag);
		              if($res == 0)
			             $errorFlag = false;
			      else
			      {
			             $errorFlag = true;
				     echo "An error occured!!!. the Person Position Information Data was not added, contact the system administrator";
			      }
			     
		  	 }
			 
			 // INSERT CONTACTS
		         if($errorFlag == false)
			 {
		 	    $res = $DBObject->insertPersonContacts($utepid,$contactname1,$contactRelation1,$contactAddress1,$contactTelephone1,$contactname2,$contactRelation2,$contactAddress2,$contactTelephone2); 
		            if($res == 0)
			         $errorFlag = false;
			    else
			    {
			         $errorFlag = true;
				 echo "An error occured!!!. the Person Contacts Information Data was not added, contact the system administrator";
			    }
		  	 }
			 
			 // INSERT STUDENT INFORMATION
			 if($flag == 'student' || $flag == 'workingstudent')
			 {
			      
		             if($errorFlag == false)
			     {
		 	         $res = $DBObject->insertPersonStudentData($utepid,$GPA,$advisor,$studentStatus,$startTerm);
		                 if($res == 0)
			               $errorFlag = false;
			         else
			         {
			              $errorFlag = true;
				      echo "An error occured!!!. the Person Student Information Data was not added, contact the system administrator";
			         }
			     }
		  	 }
			 
			 // INSERT OFFICE HOURS (ONLY WORKING STUDENTS,  ADVISORS, ADMIN STAFF)
			  if($flag == "workingstudent" || $flag == "advisoradmin")
			  {
			     if($errorFlag == false)
			     {
			         $res = $DBObject->insertPersonOfficeHours($utepid,$strHourStart,$strHourEnd,$strDays,$strTerm,$strBuilding,$strDepto,$strRoom);
		                 if($res == 0)
			               $errorFlag = false;
			         else
			         {
			              $errorFlag = true;
				      echo "An error occured!!!. the Person Office Hours Information Data was not added, contact the system administrator";
			         }
			     }
			  }
			 
			 // *********INSERTIONS SUCCESFULLY - SEND SUCCESS MESSAGE*******************************
			 if($errorFlag == false)
			          echo  $firstname . " ". $lastname. " with UTEP ID " .$utepid. " and all associated information registered succesfully!!!";   
		    }    
                    else if($res == -1)   // AN ERROR OCCUR
	                    echo "An error occured!!!. the Person Basic Data was not added, contact the system administrator";
	            else if($res == -2)   //  PERSON EXIST ALREADY IN DATA BASE
	                    echo " UTEP ID " .$utepid. " record exist in the database.";
                }
                $DBObject->disconnect_DataBase();    //  Disconnect to data base
          } // END METHOD
 
 

 
 
           // Methods Definition Area:   These methods perform the task to get the HTML data and call the 
           /**   Method: maritalStatusInfotoDB
	    *
            */
	  function maritalInfoToDB()
	  {
                 $marital = isset($_POST['marital']) ? $_POST['marital'] : '';   // Validates if marital status was set in user interface
	  
	         // Validate variable
	         if(!$marital)
	         {
	            echo "You have not entered all the required details. <br /> Please goo back and try again. <br />";
	            exit;
	         }
	         if(!get_magic_quotes_gpc())
	         {
	             $marital = addslashes($marital);
	         }
	  
	         $DBObject = new DBOperations();      // Create Data Base Operations Object
	         // Connect to data Base
	         if($DBObject->connect_DataBase() == false)
	         {
	             echo "Error: Could not connect to database. please try again later.";
	         }
	         else
	         {
                     // Insert register in the data base
	             $res = $DBObject->insert_maritalStatus($marital);
	             if($res == 0)
	                    echo  $marital. " registered succesfully!!!";
                     else if($res == -1)
	                    echo "An error occured!!!. the item was not added, contact the system administrator";
	             else if($res == -2)
	                    echo $marital . " record exist in the data base";
	         }
	       $DBObject->disconnect_DataBase();
	  } // End Function
          
          
          /** Method:   citizenInfoToDB
           *  It Inserts the citizenship information in citizenship table in database 
           **/
          function citizenInfoToDB()
          {
                $citizen = isset($_POST['citizen']) ? $_POST['citizen'] : '';
	
	        if(!$citizen)
	        {
	              echo "You have not entered all the required details. Please go back and try again.";
		      exit;
	        }
	
	        if(!get_magic_quotes_gpc())
	        {
	             $citizen = addslashes($citizen);
	        }
	
	         $DBObject = new DBOperations();      // Create Data Base Operations Object
	         // Connect to data Base
	         if($DBObject->connect_DataBase() == false)     // Connect to data Base
	         {
	             echo "<b>ERROR: Could not connect to database. please try again later.</b>";
	         }
                 else
                 {
                     // Insert register in the data base
                     $res = $DBObject->insert_citizenship($citizen);
	             if($res == 0)
	                    echo $citizen. " registered succesfully!!!";
                     else if($res == -1)
	                    echo "An error occured!!!. the item was not added, contact the system administrator. ";
	             else if($res == -2)
	                    echo  "<b>NOTE: " .$citizen . " record exist in the data base.</B>";
	         }
	        $DBObject->disconnect_DataBase();    //  Disconnect to data base
          }
          
          /**   Method : countryIinfoToDB
           *
           **/
          function countryInfoToDB()
          {
                //Create Variable and assign the country value from  HTML interface
		$country = isset($_POST['country']) ? $_POST['country'] : '';
		
		// Validate what is in the HTML
		if(!$country)
		{
		    echo "You have not entered all the required details. <br /> Please goo back and try again. <br />";
		    exit;	 
		}
		
		if (!get_magic_quotes_gpc())
     	        {
		   $country = addslashes($country);
	        }
            
                $DBObject = new DBOperations();      // Create Data Base Operations Object
	        // Connect to data Base
	        if($DBObject->connect_DataBase() == false)     // Connect to data Base
	        {
	             echo "Error: Could not connect to database. please try again later.";
	        }
                else
                {
                    // Insert register in the data base
                    $res = $DBObject->insert_country($country);
	            if($res == 0)
	                    echo  $country. " registered succesfully!!!";
                    else if($res == -1)
	                    echo "An error occured!!!. the item was not added, contact the system administrator";
	            else if($res == -2)
	                    echo $country . " record exist in the data base";
                }
                $DBObject->disconnect_DataBase();    //  Disconnect to data base
          }
          
          /**   Method:  educationInfoDB()
           *
           **/
          function educationInfoToDB()
          {
                $education = isset($_POST['education']) ? $_POST['education'] : '';
	
	        if(!$education)
	        {
	           echo "You have not entered all the required details. <br /> Please goo back and try again. <br />";
	           exit;
	        }
	
	        if(!get_magic_quotes_gpc())
	        {
                    $education = addslashes($education);
                }
                
                $DBObject = new DBOperations();      // Create Data Base Operations Object
	        // Connect to data Base
	        if($DBObject->connect_DataBase() == false)     // Connect to data Base
	        {
	             echo "Error: Could not connect to database. please try again later.";
	        }
                else
                {
                    // Insert register in the data base 
                    $res = $DBObject->insert_educationLevel($education);
	            if($res == 0)
	                    echo  $education. " registered succesfully!!!";
                    else if($res == -1)
	                    echo "An error occured!!!. the item was not added, contact the system administrator";
	            else if($res == -2)
	                    echo $education . " record exist in the data base";
                }
                $DBObject->disconnect_DataBase();    //  Disconnect to data base
          }
          
          /**    Method:  ethnicityInfoToDB
           *
           ***/
          function ethnicityInfoToDB()
          {
               $ethnicity = isset($_POST['ethnicity']) ? $_POST['ethnicity'] : '';
	       $ethnicity = trim($ethnicity);
	
	       if(!$ethnicity)
	       {
	             echo "You have not entered all the required details. <br /> Please goo back and try again. <br />";
		     exit;
	       }
	
	       if(!get_magic_quotes_gpc())
               {
                   $ethnicity = addslashes($ethnicity);
               }
               
               $DBObject = new DBOperations();      // Create Data Base Operations Object
	       // Connect to data Base
	       if($DBObject->connect_DataBase() == false)     // Connect to data Base
	       {
	             echo "Error: Could not connect to database. please try again later.";
	       }
               else
               {
                    // Insert register in the data base
                    $res = $DBObject->insert_ethnicity($ethnicity);
	            if($res == 0)
	                    echo  $ethnicity. " registered succesfully!!!";
                    else if($res == -1)
	                    echo "An error occured!!!. the item was not added, contact the system administrator";
	            else if($res == -2)
	                    echo $ethnicity . " record exist in the data base";
               }
               $DBObject->disconnect_DataBase();    //  Disconnect to data base
          }
	   //**************************************************************************************************
	   //**    Method:  programToDB()
           //*
           //***/
	  function programToDB()
	  {
	       $program = isset($_POST['programname']) ? $_POST['programname'] : '';
	       $program = trim($program);
	
	       if(!$program )
	       {
	             echo "You have not entered all the required details. <br /> Please goo back and try again. <br />";
		     exit;
	       }
	
	       if(!get_magic_quotes_gpc())
               {
                    $program  = addslashes($program);
               }
               
               $DBObject = new DBOperations();      // Create Data Base Operations Object
	       // Connect to data Base
	       if($DBObject->connect_DataBase() == false)     // Connect to data Base
	       {
	             echo "Error: Could not connect to database. please try again later.";
	       }
               else
               {
                    // Insert register in the data base
                    $res = $DBObject->insert_program($program);
	            if($res == 0)
	                    echo  $program. " registered succesfully!!!";
                    else if($res == -1)
	                    echo "An error occured!!!. the item was not added, contact the system administrator";
	            else if($res == -2)
	                    echo $program . " record exist in the data base";
               }
               $DBObject->disconnect_DataBase();    //  Disconnect to data base     
	  }
          //**************************************************************************************************
	  //**    Method:  buildingToDB()
           //*
           //***/
	  function buildingToDB()
	  {
	       $building = isset($_POST['buildingname']) ? $_POST['buildingname'] : '';
	       $building = trim($building);
	
	       if(!$building)
	       {
	             echo "You have not entered all the required details. <br /> Please goo back and try again. <br />";
		     exit;
	       }
	
	       if(!get_magic_quotes_gpc())
               {
                    $building  = addslashes($building);
               }
               
               $DBObject = new DBOperations();      // Create Data Base Operations Object
	       // Connect to data Base
	       if($DBObject->connect_DataBase() == false)     // Connect to data Base
	       {
	             echo "Error: Could not connect to database. please try again later.";
	       }
               else
               {
                    // Insert register in the data base
                    $res = $DBObject->insert_building($building);
	            if($res == 0)
	                    echo  $building . " registered succesfully!!!";
                    else if($res == -1)
	                    echo "An error occured!!!. the item was not added, contact the system administrator";
	            else if($res == -2)
	                    echo $building . " record exist in the data base";
               }
               $DBObject->disconnect_DataBase();    //  Disconnect to data base     	    
	  }
	  
	  
	  
	  //********************************************************************************************
          /**   Method: religionInfoToDB()
           *    Record a new Religion in DB
           */
           function religionInfoToDB()
           {
                $religion = isset($_POST['religion']) ? $_POST['religion'] : '';
	
		if(!$religion)
		{
		    echo "You have not entered all the required details. <br /> Please goo back and try again. <br />";
		    exit;
		}
		
		if(!get_magic_quotes_gpc())
		{
		   $religion = addslashes($religion);
		}
                
                $DBObject = new DBOperations();      // Create Data Base Operations Object
	        // Connect to data Base
	        if($DBObject->connect_DataBase() == false)     // Connect to data Base
	        {
	             echo "Error: Could not connect to database. please try again later.";
	        }
                else
                {
                    // Insert register in the data base
                    $res = $DBObject->insert_Religion($religion);
	            if($res == 0)
	                    echo  $religion. " registered succesfully!!!";
                    else if($res == -1)
	                    echo "An error occured!!!. the item was not added, contact the system administrator";
	            else if($res == -2)
	                    echo $religion . " record exist in the data base";
                }
                $DBObject->disconnect_DataBase();    //  Disconnect to data base
           }
           
           
           /**   Method: stateInfoToDB
            *
            */
           function stateInfoToDB()
           {
                //Create Variable and assign the country value from  HTML interface
		$country = isset($_POST['country']) ? $_POST['country'] : '';
                $state = isset($_POST['state']) ? trim($_POST['state']) : '';
		
		// Validate what is in the HTML
		if(!$state)
		{
		    echo "You have not entered all the required details. <br /> Please goo back and try again. <br />";
		    exit;	 
		}
		
		if (!get_magic_quotes_gpc())
     	        {
		   //$country = addslashes($country);
                   $state = addslashes($state);
	        }
                
                $DBObject = new DBOperations();      // Create Data Base Operations Object
	        // Connect to data Base
	        if($DBObject->connect_DataBase() == false)     // Connect to data Base
	        {
	             echo "Error: Could not connect to database. please try again later.";
	        }
                else
                {
                    // Insert register in the data base
                    $res = $DBObject->insert_State($country,$state);
	            if($res == 0)
	                    echo  $state. " registered succesfully!!!";
                    else if($res == -1)
	                    echo "An error occured!!!. the item was not added, contact the system administrator";
	            else if($res == -2)
	                    echo $state . " record exist in the data base";
                }
                $DBObject->disconnect_DataBase();    //  Disconnect to data base
           }
	   
	    /**   Method: roomInfoToDB
            *
            */
           function roomInfoToDB()
           {
                //Create Variable and assign the country value from  HTML interface
		$bldg = isset($_POST['bldg']) ? $_POST['bldg'] : '';
                $room = isset($_POST['room']) ? trim($_POST['room']) : '';
		
		// Validate what is in the HTML
		if(!$room)
		{
		    echo "You have not entered all the required details. <br /> Please goo back and try again. <br />";
		    exit;	 
		}
		
		if (!get_magic_quotes_gpc())
     	        {
		   //$country = addslashes($country);
                   $room = addslashes($room);
	        }
                
                $DBObject = new DBOperations();      // Create Data Base Operations Object
	        // Connect to data Base
	        if($DBObject->connect_DataBase() == false)     // Connect to data Base
	        {
	             echo "Error: Could not connect to database. please try again later.";
	        }
                else
                {
                    // Insert register in the data base
                    $res = $DBObject->insert_room($bldg,$room);
	            if($res == 0)
	                    echo  $room. " registered succesfully!!!";
                    else if($res == -1)
	                    echo "An error occured!!!. the item was not added, contact the system administrator";
	            else if($res == -2)
	                    echo $room . " record exist in the data base";
                }
                $DBObject->disconnect_DataBase();    //  Disconnect to data base
           }
	   
	    /**   Method: deptoInfoToDB
            *
            */
           function deptoInfoToDB()
           {
                //Create Variable and assign the country value from  HTML interface
		$bldg = isset($_POST['bldg']) ? $_POST['bldg'] : '';
                $depto = isset($_POST['depto']) ? trim($_POST['depto']) : '';
		
		// Validate what is in the HTML
		if(!$depto)
		{
		    echo "You have not entered all the required details. <br /> Please goo back and try again. <br />";
		    exit;	 
		}
		
		if (!get_magic_quotes_gpc())
     	        {
		   //$country = addslashes($country);
                   $depto = addslashes($depto);
	        }
                
                $DBObject = new DBOperations();      // Create Data Base Operations Object
	        // Connect to data Base
	        if($DBObject->connect_DataBase() == false)     // Connect to data Base
	        {
	             echo "Error: Could not connect to database. please try again later.";
	        }
                else
                {
                    // Insert register in the data base
                    $res = $DBObject->insert_depto($bldg,$depto);    // INSERT DEPARTMENT
	            if($res == 0)
	                    echo  $depto. " registered succesfully!!!";
                    else if($res == -1)
	                    echo "An error occured!!!. the item was not added, contact the system administrator";
	            else if($res == -2)
	                    echo $depto . " record exist in the data base";
                }
                $DBObject->disconnect_DataBase();    //  Disconnect to data base
           }
          

	  
	  //*****************************************************************************
	  // CourseInfoToDB
	  // Insert the Course information and the Course Schedule into server
	  function CoursesInfoToDB()
	  {
	
	       //******* GET  COURSE AND SCHEDULE ********************************************************
                $crn = trim(isset($_POST['crn'])) ? trim($_POST['crn']) : '';
                $coursenumber = trim(isset($_POST['coursenumber'])) ? trim($_POST['coursenumber']) : '';
                $coursesection = trim(isset($_POST['coursesection'])) ? trim($_POST['coursesection']) : '';
                $coursetitle = trim(isset($_POST['coursetitle'])) ? trim($_POST['coursetitle']) : '';
                $coursecap = trim(isset($_POST['coursecapacity'])) ? trim($_POST['coursecapacity']) : '';
                $credithrs  = trim(isset($_POST['credithrs'])) ? trim($_POST['credithrs'])  : '';
                $activeRecord = trim(isset($_POST['active'])) ? trim($_POST['active']) : '';
		    
		//******************VALIDATE  GET MAGIC QUOTES *********************************************
                if(!get_magic_quotes_gpc())
                {    
		      $crn = addslashes($crn);
		      $coursenumber =   addslashes($coursenumber);
                      $coursesection =  addslashes($coursesection);
                      $coursetitle =  addslashes($coursetitle);
                      $coursecap =  addslashes($coursecap);
                      $credithrs  =  addslashes($credithrs);
     	              $activeRecord =   addslashes($activeRecord);
		}
		
		//  ********* INSERT INTO DATABASE  ***************************************************************
		$DBObject = new DBOperations();      // Create Data Base Operations Object
	        // Connect to data Base
	        if($DBObject->connect_DataBase() == false)     // Connect to data Base
	        {
	             echo "Error: Could not connect to database. please try again later.";
	        }
                else   
                {
		    $res = $DBObject->courseExist($crn);  // Verify if Course Exist in the System
		    
		    if($res == 0)  // Course Does Not Exist
		    {
		    
		          // Insert Person Basic Data
		          $res = $DBObject->insertCourse($crn,$coursenumber,$coursesection,$coursetitle,$coursecap,$credithrs,$activeRecord);
	                  if($res == 0) // No Error
		          {
	                      echo "Course information recorded succesfully!!!";  
			  } 
			  else // Error Inserting the course
			  {
			       echo "An error occured!!!. the Course Data was not added, contact the system administrator";
			  }
		    } // End If
		    else // Course Exist
		    {
			 echo "The Course Exist in the System."; 
		    }
		
		} // End IF Connection Success
	  } // End Method
	  
	   //*****************************************************************************
	  // termInfoToDB
	  // Insert the Term information and the Course Schedule into server
	  //*******************************************************************************
	  function termInfoToDB()
	  {
	          $term = isset($_POST['termReg']) ? $_POST['termReg'] : '';
	
		  if(!$term)
		  {
		      echo "You have not entered all the required details. <br /> Please goo back and try again. <br />";
		      exit;
		  }
		
		  if(!get_magic_quotes_gpc())
		  {
		      $term = addslashes($term);
		  }
                
                $DBObject = new DBOperations();      // Create Data Base Operations Object
	        // Connect to data Base
	        if($DBObject->connect_DataBase() == false)     // Connect to data Base
	        {
	             echo "Error: Could not connect to database. please try again later.";
	        }
                else
                {
                    // Insert register in the data base
                    $res = $DBObject->insertTerm($term);
	            if($res == 0)
	                    echo  $term. " registered succesfully!!!";
                    else if($res == -1)
	                    echo "An error occured!!!. the item was not added, contact the system administrator";
	            else if($res == -2)
	                    echo $term . " record exist in the data base";
                }
                $DBObject->disconnect_DataBase();    //  Disconnect to data base
	  }
	  
	  //*****************************************************************************
	  //  studentCoursesToDB()
	  //  Insert studentCourses relation in DB
	  //*******************************************************************************
	  
	  function studentCoursesToDB()
	  {
	      $utepid = isset($_POST['utepid']) ? $_POST['utepid'] : '';
	      $course = isset($_POST['course']) ? $_POST['course'] : '';
	      $term   = isset($_POST['term']) ? $_POST['term'] : '';
	
		
	      if(!get_magic_quotes_gpc())
	      {
	            $utepid   = addslashes($utepid);
		    $course = addslashes($course);
	   	    $term   = addslashes($term);
	     }
                
             $DBObject = new DBOperations();      // Create Data Base Operations Object
	     // Connect to data Base
	     if($DBObject->connect_DataBase() == false)     // Connect to data Base
	     {
	             echo "Error: Could not connect to database. please try again later.";
	     }
             else
             {
		    // Get Course CRN
                    $CRN = $DBObject->getCourseCRN($course);				
			        
		    if($DBObject->studentCourseTerm_Exist($utepid,$CRN,$term) == 0)  //If student-course-term relation does not exist in DB, insert relation
		    {
                        // Insert register in the data base
                        $res = $DBObject->insertStudentCourseRelation($utepid,$CRN,$term);
	                if($res == 0)
	                         echo  " Student courses registered succesfully!!!";
                        else if($res == -1)
	                         echo "An error occured!!!. the item was not added, contact the system administrator ";
	                  
		    }
            }
            $DBObject->disconnect_DataBase();    //  Disconnect to data base
	  }
	  
	   //*****************************************************************************
	  //  courseScheduleToDB()
	  //  Record a Course Schedule
	  //*******************************************************************************
	  
	  function  courseScheduleToDB()
	  {
	       //******* GET  COURSE AND SCHEDULE ********************************************************
                $course =  trim(isset($_POST['course'])) ? trim($_POST['course']) : '';
                $hrstart = trim(isset($_POST['hrstart'])) ? trim($_POST['hrstart']) : '';
                $hrend = trim(isset($_POST['hrend'])) ? trim($_POST['hrend']) : '';
                $days = trim(isset($_POST['days'])) ? trim($_POST['days']) : '';
                $term = trim(isset($_POST['term'])) ? trim($_POST['term']) : '';
                $depto = trim(isset($_POST['depto'])) ? trim($_POST['depto']) : '';
                $bldg = trim(isset($_POST['bldg'])) ? trim($_POST['bldg']) : '';
                $room =  trim(isset($_POST['room'])) ? trim($_POST['room']) : '';
		    
		//******************VALIDATE  GET MAGIC QUOTES *********************************************
                if(!get_magic_quotes_gpc())
                {    
		      
		      $course =   addslashes($course);
                      $hrstart =  addslashes($hrstart );
                      $hrend =  addslashes($hrend);
                      $days =  addslashes($days);
                      $term =  addslashes($term);
                      $depto =  addslashes($depto);
                      $bldg =  addslashes($bldg);
                      $room =   addslashes($room);
		}
		
		//  ********* INSERT INTO DATABASE  ***************************************************************
		$DBObject = new DBOperations();      // Create Data Base Operations Object
	        // Connect to data Base
	        if($DBObject->connect_DataBase() == false)     // Connect to data Base
	        {
	             echo "Error: Could not connect to database. please try again later.";
	        }
                else
	        {
		    $crn = $DBObject->getCourseCRN($course);
		    $res = $DBObject->insertCourseSchedule($term,$days,$hrstart,$hrend,$crn,$depto,$bldg,$room);
			     
		    if($res == 0)
		    {
		         echo "Course Schedule recorded Succesfully!!!";
		    }
		    else  // Error Occur
		    {
		         echo "An error occured!!!. the Course Schedule Data was not added, contact the system administrator";
		    }
		
	       }	    
	  }   // End Method
	  
	  
	  //*****************************************************************************
	  //  systemUserToDB()
	  //  Record a System User in the System
	  //*******************************************************************************
	  function systemUserToDB()
	  {
                  
		  $name = isset($_POST['name']) ? $_POST['name'] : '';
		  $username = isset($_POST['username']) ? $_POST['username'] : '';
		  $pswd = isset($_POST['passwd']) ? $_POST['passwd'] : '';
		  $role = isset($_POST['role']) ? $_POST['role'] : '';
	
		  if(!get_magic_quotes_gpc())
		  {
		      $name = addslashes($name);
		      $username = addslashes($username);
		      $pswd = addslashes($pswd);
		      $role = addslashes($role);
		  }
                
                  $DBObject = new DBOperations();      // Create Data Base Operations Object
	          // Connect to data Base
	          if($DBObject->connect_SysUSers_DataBase() == false)     // Connect to data Base
	          {
	             echo "Error: Could not connect to database. please try again later.";
	          }
                  else
                  {
                      // Insert register in the data base
                      $res = $DBObject->insertSystemUser($name,$username,$pswd,$role);
	              if($res == 0)
	                    echo  $name. " registered succesfully!!!";
                      else if($res == -1)
	                    echo "An error occured!!!. the item was not added, contact the system administrator";
	              else if($res == -2)
	                    echo $username . " user name exist, select other  user name";
                  }
                  $DBObject->disconnect_DataBase();    //  Disconnect to data base		     
	  }

?>

<!----------------------------------------------------------------------------------------------------------------------
--------------------- C H A N G E    L O G  ----------------------------------------------------------------------------
01/02/2016 - Esau Ruiz  - INITIAL RELEASE
------------------------------------------------------------------------------------------------------------------------>