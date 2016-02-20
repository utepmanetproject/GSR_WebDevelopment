 
 <?php
       //********************************************************************************
       // FILE NAME:  getFormDataFromServer.php
       // PURPOSE:    get Data from the Server, this file is used by ajax_functions
       // DATE:       01/30/2016
	   // Project:      Traffic Collection DataBase System
 	   // Software Engineer:    Esau Ruiz Gaistardo
 	   // The University of Texas at El paso
       //******************************************************************************* 
 
        //******************************************************************************
        // Method:  getHttpRequest
        // Description:  gets the XMLHttpRequest Object depending of the browser type
        // Parameters:  void
        // Return:  XMLHttpRequest Object
        //****************************************************************************** 
	    
	    // Main Program      
	    require("DataBaseOperations.php");    // INCLUDE DATABASE OPERATIONS CLASS
	     
		$queryType = $_GET['querytype'];
	    $parameter = $_GET['param'];

	    switch($queryType)
	    {

		     case 'SearchInst':
		     	 searchInstituteData($parameter);		  //Search Institute Information	     	
				break;

		     case 'SearchIP':
		     	 searchIpData($parameter);		  //Search Institute Information	     	
				break;
				
		     case 'SearchWorldClass':
		     	 searchWClassData($parameter);		  //Search Institute Information	     	
				break;
				
		     case 'SearchCcodeClass':
		     	 searchCcodeData($parameter);		  //Search Institute Information	     	
				break;
								
		     case 'GetInst':
		     	getInstDataFromServer($parameter);		  //Search Institute Information	     	
				break;
								
		     case 'GetIp':
		     	getIpDataFromServer($parameter);		  //Search Institute Information	     	
				break;
				
		     case 'GetCcodeClass':
		     	getCcodesDataFromServer($parameter);		  //Search Institute Information	     	
				break;				
				

		     case 'GetWorldClass':
		     	getWClassDataFromServer($parameter);		  //Search Institute Information	     	
				break;
													
	        case 'domains':
		    	 getDomainDataFromServer($parameter);                  // Get Domain Data
		     	break;

                // Get Domain Data
		     	break;

	        case 'institution':
		    	 getInstitutionDataFromServer($parameter);                  // Get Domain Data
		     	break;

			case 'other':
		    	 getDataFromServer($parameter);                  // Get Domain Data
		     	break;

				
// 			  case 'getInst':
// 			  	getInstDataFromServer($parameter);
// 			  	break;	
				
	    }
	    
?>
<?PHP







	//**************************************************************************************  
	/**  Method: getDomainDataFromServer  
	*   Get the Persons data froom Server
	****************************************************************************************/
	function getDomainDataFromServer($parameter)
	{
	    
	    $DBObject = new DBOperations();      // Create Data Base Operations Object
             
	    // Connect to data Base
            if($DBObject->connect_DataBase() == false)
            {
	         echo "Error: Could not connect to database. please try again later.";
	    }
	    else
	    {
		 
	        // Execute Query depending of the Parameter (paramter signals what query)		 
	    	if($parameter == '1')
		    	 $result  = $DBObject->getDomain();
		 	if($parameter == '2')
		     	$result  = $DBObject->getCcode();
		 	if($parameter == '3')
		     	$result  = $DBObject->getWorldclass();		     	
        
	        // Read the recordset		 
	        while ($row=$result->fetch_array()) 
	        {
		    	
		    	switch($parameter)
		    	{
		    	    case '1':
		    	    		$register = $row['organization'];
		    	    		echo "<option>".htmlentities($register)."</option>";
		    	    		break;
		    	    		
		    	    case '2':
		         		    $register = $row['country'];
		         		    if ($register =="United States")
		         			 echo "<option selected='selected'>".htmlentities($register)."</option>";		
						   else		    
		    				 echo "<option>".htmlentities($register)."</option>";
		    	            break;
		    	            
		    	    case '3':
		        	 	   $register = $row['wclass'];
		        	 	   echo "<option>".htmlentities($register)."</option>";
		    	    	   break;

		    	}//end switch
		    	
		    	 
            } //end while
	       
	    } // End IF
            $DBObject->disconnect_DataBase();
	}  //End Method




	//**************************************************************************************  
	/**  Method: searchInstituteData, searching for data from the server  
	*   Get the Persons data froom Server
	****************************************************************************************/
	function searchInstituteData($parameter)
	{
	    
	    $DBObject = new DBOperations();      // Create Data Base Operations Object
             
	    // Connect to data Base
        if($DBObject->connect_DataBase() == false)
            {
	         echo "Error: Could not connect to database. please try again later.";
	    	}
	    else
	    	{
		 		
		 		$result = $DBObject->searchInstName($parameter);
		 		$item = "<ul class='unorganized-list' style='width:100;height:auto;'>";
		 		while($row=$result->fetch_assoc())
		 		{
		 			$item .="<li>".$row["organization"]."</li>";
		 		}
		 		
		 		$item .="</ul>";	
			}
			
			$DBObject->disconnect_DataBase();
			echo $item;
	}

	//**************************************************************************************  
	/**  Method: searchIpData, searching for data from the server  
	*   Get the Persons data froom Server
	****************************************************************************************/
	function searchIpData($parameter)
	{
	    
	    $DBObject = new DBOperations();      // Create Data Base Operations Object
             
	    // Connect to data Base
        if($DBObject->connect_DataBase() == false)
            {
	         echo "Error: Could not connect to database. please try again later.";
	    	}
	    else
	    	{
		 		
		 		$result = $DBObject->searchIpa($parameter);
		 		$item = "<ul class='unorganized-list' style='width:100;height:auto;'>";
		 		while($row=$result->fetch_assoc())
		 		{
		 			$item .="<li>".$row["ipa"]."</li>";
		 		}
		 		
		 		$item .="</ul>";	
			}
			
			$DBObject->disconnect_DataBase();
			echo $item;
	}

	//**************************************************************************************  
	/**  Method: searchCcodeData, searching for data from the server  
	*   Get the Country's names from Server
	****************************************************************************************/
	function searchCcodeData($parameter)
	{
	    
	    $DBObject = new DBOperations();      // Create Data Base Operations Object
             
	    // Connect to data Base
        if($DBObject->connect_DataBase() == false)
            {
	         echo "Error: Could not connect to database. please try again later.";
	    	}
	    else
	    	{
		 		
		 		$result = $DBObject->searchCcode($parameter);
		 		$item = "<ul class='unorganized-list' style='width:100;height:auto;'>";
		 		while($row=$result->fetch_assoc())
		 		{
		 			$item .="<li>".$row["country"]."</li>";
		 		}
		 		
		 		$item .="</ul>";	
			}
			
			$DBObject->disconnect_DataBase();
			echo $item;
	}


	//**************************************************************************************  
	/**  Method: searchWClassData, searching for the World Class data from the server  
	*   Get the World Class data froom Server
	****************************************************************************************/
	function searchWClassData($parameter)
	{
	    
	    $DBObject = new DBOperations();      // Create Data Base Operations Object
             
	    // Connect to data Base
        if($DBObject->connect_DataBase() == false)
            {
	         echo "Error: Could not connect to database. please try again later.";
	    	}
	    else
	    	{
		 		
		 		$result = $DBObject->searchWClass($parameter);
		 		$item = "<ul class='unorganized-list' style='width:100;height:auto;'>";
		 		while($row=$result->fetch_assoc())
		 		{
		 			$item .="<li>".$row["wclass"]."</li>";
		 		}
		 		
		 		$item .="</ul>";	
			}
			
			$DBObject->disconnect_DataBase();
			echo $item;
	}

	//**************************************************************************************  
	/**  Method: getInstDataFromServer, searching for data from the server  
	*   Get the Persons data froom Server
	****************************************************************************************/
	function getInstDataFromServer($parameter)
	{
	    
	    $DBObject = new DBOperations();      // Create Data Base Operations Object
             
	    // Connect to data Base
        if($DBObject->connect_DataBase() == false)
            {
	         echo "Error: Could not connect to database. please try again later.";
	    	}
	    else
	    	{
		 		
		 		$result = $DBObject->getInstData($parameter);
		 		
		 		
			}
			
			$DBObject->disconnect_DataBase();
			echo json_encode($result);
			//echo $result;
	}

	//**************************************************************************************  
	/**  Method: getIpDataFromServer, get Ip data from the server  
	*   
	****************************************************************************************/
	function getIpDataFromServer($parameter)
	{
	    
	    $DBObject = new DBOperations();      // Create Data Base Operations Object
             
	    // Connect to data Base
        if($DBObject->connect_DataBase() == false)
            {
	         echo "Error: Could not connect to database. please try again later.";
	    	}
	    else
	    	{
		 		
		 		$result = $DBObject->getIpa($parameter);
		 	
		 		
			}
			
			$DBObject->disconnect_DataBase();
			echo json_encode($result);
			//echo $result;
	}

	//**************************************************************************************  
	/**  Method: getCcodesDataFromServer, get Country names from the server  
	*   
	****************************************************************************************/
	function getCcodesDataFromServer($parameter)
	{
	    
	    $DBObject = new DBOperations();      // Create Data Base Operations Object
             
	    // Connect to data Base
        if($DBObject->connect_DataBase() == false)
            {
	         echo "Error: Could not connect to database. please try again later.";
	    	}
	    else
	    	{
		 		
		 		$result = $DBObject->getCountrycode($parameter);
		 	
		 		
			}
			
			$DBObject->disconnect_DataBase();
			echo json_encode($result);
			//echo $result;
	}



	//**************************************************************************************  
	/**  Method: getWClassDataFromServer, get WorldClass data from the server  
	*   
	****************************************************************************************/
	function getWClassDataFromServer($parameter)
	{
	    
	    $DBObject = new DBOperations();      // Create Data Base Operations Object
             
	    // Connect to data Base
        if($DBObject->connect_DataBase() == false)
            {
	         echo "Error: Could not connect to database. please try again later.";
	    	}
	    else
	    	{
		 		
		 		$result = $DBObject->getWClass($parameter);
		 	
		 		
			}
			
			$DBObject->disconnect_DataBase();
			echo json_encode($result);
			//echo $result;
	}


	//**************************************************************************************  
	/**  Method: getPersonsDataFromServer  
	*   Get the Persons data froom Server
	****************************************************************************************/
	function getPersonsDataFromServer($parameter)
	{
	    
	    $DBObject = new DBOperations();      // Create Data Base Operations Object
             
	    // Connect to data Base
            if($DBObject->connect_DataBase() == false)
            {
	         echo "Error: Could not connect to database. please try again later.";
	    }
	    else
	    {
		 
	        // Execute Query depending of the Parameter (paramter signals what query)		 
	         if($parameter == '1')
		     $result  = $DBObject->getEthnicity();
		 if($parameter == '2')
		     $result  = $DBObject->getReligion();
                 if($parameter == '3')
		     $result  = $DBObject->getMaritalStatus();
                 if($parameter == '4')
		     $result  = $DBObject->getCitizenship(); 
		 if($parameter == '5')
		    $result  = $DBObject->getCountryList();
                 if($parameter == '6')
		    $result  = $DBObject->getStateByCountry('United States');   //Default Country is United States
		 if($parameter == '7')
		      $result  = $DBObject->getEducationLevel();
		if($parameter == '8')
		      $result  = $DBObject->getProgramNameList();
		if($parameter == '9')
		      $result  = $DBObject->getDepartmentList();
		if($parameter == '10')
		      $result = $DBObject->getBuildingList();
	        if($parameter == '11')
		      $result = $DBObject->getRoomList();          
		if($parameter == '12')
		      $result = $DBObject->getAdvisorsList();
		if($parameter == '13')
		      $result = $DBObject->getTermList();
		if($parameter == '14')
		      $result = $DBObject->getTermList();
        
	        // Read the recordset		 
	        while ($row=$result->fetch_array()) 
	        {
		    if($parameter == '1')
		         $registro = $row['ethnic_name'];
		    if($parameter == '2')
		         $registro = $row['religion_name'];
                    if($parameter == '3')
		         $registro = $row['maritalS_name'];
                    if($parameter == '4')
		      	 $registro = $row['citizenship_name'];
                    if($parameter == '5')
		     	 $registro = $row['country_name'];
		    if($parameter == '6')
		     	 $registro = $row['state_name'];
		    if($parameter == '7')
		         $registro = $row['EdL_name'];
		    if($parameter == '8')
		         $registro = $row['program_name'];
		    if($parameter == '9')
		         $registro = $row['depto_name'];
		    if($parameter == '10')
		         $registro = $row['bldg_name']; 
	            if($parameter == '11') 		 
			 $registro = $row['room_name'];
	            if($parameter == '12')
			$registro = $row['first_name'] . " " . $row['last_name'];
		    if($parameter == '13')
			$registro = $row['term'];
		    if($parameter == '14')
			$registro = $row['term'];	
		    
	            // build the HTML to send through AJAX
		    echo "<option>".$registro."</option>"; 
                }
	       
	    } // End IF
            $DBObject->disconnect_DataBase();
	}  //End Method
	
	//**************************************************************************
	/**  Method: getCountryDataFromServer
	 *   Get the list of countries from Country table
	 ***************************************************************************/
	function getCountryListFromServer()
	{
	     $DBObject = new DBOperations();      // Create Data Base Operations Object
            // Connect to data Base
            if($DBObject->connect_DataBase() == false)
            {
	         echo "Error: Could not connect to database. please try again later.";
	    }
	    else
	    {
	        $result  = $DBObject->getCountryList();
            
	        // Read the recordset and build the <options> tag		 
	        while ($row = $result->fetch_array()) 
	        {
	            $registro = $row['country_name'];
		    echo "<option>".$registro."</option>"; 
                }
	       
	    } // End IF
            $DBObject->disconnect_DataBase();
	}
	
	/**   Method:   getStateDataFromServer
	 *
	 **/
	function getStateByCountryDataFromServer($parameter)
	{
	     $DBObject = new DBOperations();      // Create Data Base Operations Object
            // Connect to data Base
            if($DBObject->connect_DataBase() == false)
            {
	         echo "Error: Could not connect to database. please try again later.";
	    }
	    else
	    {
	        $result  = $DBObject->getStateByCountry($parameter);
            
	        // Read the recordset		 
	        while ($row=$result->fetch_array()) 
	        {
	            $registro = $row['state_name'];
  	            echo "<option>".$registro."</option>"; 
                }
	        
	    } // End IF
            $DBObject->disconnect_DataBase();
	}
	
	/**   Method:   getRoomListByBuilding
	 *    Get the List of all Room by Building
	 **/
	
	 function getRoomListByBuildingIndex($parameter)
	 {
	    $DBObject = new DBOperations();      // Create Data Base Operations Object
            // Connect to data Base
            if($DBObject->connect_DataBase() == false)
            {
	         echo "Error: Could not connect to database. please try again later.";
	    }
	    else
	    {
		$getBldgIdx = $DBObject->getBuildingIndex($parameter);           // Get Building Index
		$result  = $DBObject->getRoomListByBuildingIndex($getBldgIdx);   // Get Room List by Building Index
            
	        // Read the recordset		 
	        while ($row=$result->fetch_array()) 
	        {
	            $registro = $row['room_name'];
  	            echo "<option>".$registro."</option>"; 
                }
	        
	    } 
            $DBObject->disconnect_DataBase();
	 }

	 //***********************************************************************************
	 //**   Method:   SEARCH PERSON DATA
	 //*    Get ALL ASSOCIATED INFORMATION FROM A PERSON AND SEND IT TO AJAX USING JSON ENCODE
	 ///************************************************************************************
	 
	 function  searchPersonData($utepid)
	 {
	      
	      $DBObject = new DBOperations();      // Create Data Base Operations Object
	      $arrayPersonData=array();            // Array of the Person data
	      
	      
              // Connect to data Base
              if($DBObject->connect_DataBase() == false)
              {
		 $arrayPersonData[0] = "ERROR1";
		 $arrayPersonData[1] = "Error: Could not connect to database. please try again later.";
	      }
	      else
	      {  
		    $utepIDExist = $DBObject->UtepIDExist($utepid);  // SEARCH FOR UTEP ID
		    
		    if($utepIDExist == 1)    //If Utep ID Exist
		    {
			// Get Personal Information
			$PersonBasicData = $DBObject->getPersonBasicData($utepid);
			$arrayPersonData[0] = 'BASICDATA'; //Index 0 Flag = BASICDATA
						
			$row = $PersonBasicData->fetch_array();
	                 
			$arrayPersonData[1] = $row['first_name'];
			$arrayPersonData[2]  = $row['middle_name'];
    			$arrayPersonData[3] = $row['last_name'];
			$arrayPersonData[4] = $row['suffix'];
			$arrayPersonData[5] = $row['prefix'];
			$arrayPersonData[6] = $row['DoB'];
			$arrayPersonData[7] = $row['gender'];
			$arrayPersonData[8] = $row['military_class'];
			   
			$regReligionId = $row['religion_id'];
			$arrayPersonData[9] = $DBObject->getReligionNameFromID($regReligionId);
			   
			$regEthnicId = $row['ethnic_id'];
			$arrayPersonData[10] = $DBObject->getEthnicNameFromID($regEthnicId);
			    
			$regCitizenId = $row['citizenship_id'];
			$arrayPersonData[11] = $DBObject->getCitizenshipNameFromID($regCitizenId);
			     
			$regMaritalID = $row['maritalstatus_id'];
			$arrayPersonData[12] = $DBObject->getMaritalStatusFromID($regMaritalID);
			    
			$arrayPersonData[13]  = $row['active_record'];
		
		        // Person Address
			$PersonAddress =   $DBObject->getPersonAddress($utepid);
			$rowsAddress = $PersonAddress->num_rows;
			$arrayPersonData[100] = "ADDRESS";
			
			if($rowsAddress == 1)
			{
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[101] = $row['street'];
			    $arrayPersonData[102] = $row['street_no'];
			    $arrayPersonData[103] = $row['apt_no'];
			    $arrayPersonData[104] = $row['zipcode'];
			    $arrayPersonData[105] = $row['address_type'];
			    $arrayPersonData[106] = $row['city'];
			    $countryID1 = $row['country_id'];
			    $arrayPersonData[107] = $DBObject->getCountryNameFromID($countryID1);
			    $stateID1 = $row['state_id'];
			    $arrayPersonData[108] = $DBObject->getStateNameFromID($stateID1);
			    
			    $arrayPersonData[109] = "";
			    $arrayPersonData[110] = "";
			    $arrayPersonData[111] = "";
			    $arrayPersonData[112] = "";
			    $arrayPersonData[113] = "";
			    $arrayPersonData[114] = "";
			    $arrayPersonData[115] = "";
			    $arrayPersonData[116] = "";
			  
			    $arrayPersonData[117] = "";
			    $arrayPersonData[118] = "";
			    $arrayPersonData[119] = "";
			    $arrayPersonData[120] = "";
			    $arrayPersonData[121] = "";
			    $arrayPersonData[122] = "";
		            $arrayPersonData[123] = "";
			    $arrayPersonData[124] = "";
			    
			    
			}
			if($rowsAddress == 2)
			{
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[101] = $row['street'];
			    $arrayPersonData[102] = $row['street_no'];
			    $arrayPersonData[103] = $row['apt_no'];
			    $arrayPersonData[104] = $row['zipcode'];
			    $arrayPersonData[105] = $row['address_type'];
			    $arrayPersonData[106] = $row['city'];
			    $countryID1 = $row['country_id'];
			    $arrayPersonData[107] = $DBObject->getCountryNameFromID($countryID1);
			    $stateID1 = $row['state_id'];
			    $arrayPersonData[108] = $DBObject->getStateNameFromID($stateID1);
			    
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[109] = $row['street'];
			    $arrayPersonData[110] = $row['street_no'];
			    $arrayPersonData[111] = $row['apt_no'];
			    $arrayPersonData[112] = $row['zipcode'];
			    $arrayPersonData[113] = $row['address_type'];
			    $arrayPersonData[114] = $row['city'];
			    $countryID2 = $row['country_id'];
			    $arrayPersonData[115] = $DBObject->getCountryNameFromID($countryID2);
			    $stateID2 = $row['state_id'];
			    $arrayPersonData[116] = $DBObject->getStateNameFromID($stateID2);
			    
			    $arrayPersonData[117] = "";
			    $arrayPersonData[118] = "";
			    $arrayPersonData[119] = "";
			    $arrayPersonData[120] = "";
			    $arrayPersonData[121] = "";
			    $arrayPersonData[122] = "";
		            $arrayPersonData[123] = "";
			    $arrayPersonData[124] = "";
		
			}
			if($rowsAddress == 3)
			{
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[101] = $row['street'];
			    $arrayPersonData[102] = $row['street_no'];
			    $arrayPersonData[103] = $row['apt_no'];
			    $arrayPersonData[104] = $row['zipcode'];
			    $arrayPersonData[105] = $row['address_type'];
			    $arrayPersonData[106] = $row['city'];
			    $countryID1 = $row['country_id'];
			    $arrayPersonData[107] = $DBObject->getCountryNameFromID($countryID1);
			    $stateID1 = $row['state_id'];
			    $arrayPersonData[108] = $DBObject->getStateNameFromID($stateID1);
			    
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[109] = $row['street'];
			    $arrayPersonData[110] = $row['street_no'];
			    $arrayPersonData[111] = $row['apt_no'];
			    $arrayPersonData[112] = $row['zipcode'];
			    $arrayPersonData[113] = $row['address_type'];
			    $arrayPersonData[114] = $row['city'];
			    $countryID2 = $row['country_id'];
			    $arrayPersonData[115] = $DBObject->getCountryNameFromID($countryID2);
			    $stateID2 = $row['state_id'];
			    $arrayPersonData[116] = $DBObject->getStateNameFromID($stateID2);
			    
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[117] = $row['street'];
			    $arrayPersonData[118] = $row['street_no'];
			    $arrayPersonData[119] = $row['apt_no'];
			    $arrayPersonData[120] = $row['zipcode'];
			    $arrayPersonData[121] = $row['address_type'];
			    $arrayPersonData[122] = $row['city'];
		            $countryID3 = $row['country_id'];
			    $arrayPersonData[123] = $DBObject->getCountryNameFromID($countryID3);
			    $stateID3 = $row['state_id'];
			    $arrayPersonData[124] = $DBObject->getStateNameFromID($stateID3);
			}
			
			// Get Telephones
			$PersonTelephones  = $DBObject->getPersonTelephones($utepid);
			$rowsTelephone =$PersonTelephones->num_rows;
			
			
			$arrayPersonData[200] = "TELEPHONES";
			       
			if($rowsTelephone == 1)
			{
			    $row = $PersonTelephones->fetch_array();
			    $arrayPersonData[201] = $row['country_code'];
			    $arrayPersonData[202] = $row['area_code'];
			    $arrayPersonData[203] = $row['tel_number'];
			    $arrayPersonData[204] = $row['tel_type'];
			    
			    $arrayPersonData[205] = "";
			    $arrayPersonData[206] = "";
			    $arrayPersonData[207] = "";
			    $arrayPersonData[208] = "";
		             
			    $arrayPersonData[209] = "";
			    $arrayPersonData[210] = "";
			    $arrayPersonData[211] = "";
			    $arrayPersonData[212] = "";
			}
			if($rowsTelephone == 2)
			{
			    $row = $PersonTelephones->fetch_array();
			    $arrayPersonData[201] = $row['country_code'];
			    $arrayPersonData[202] = $row['area_code'];
			    $arrayPersonData[203] = $row['tel_number'];
			    $arrayPersonData[204] = $row['tel_type'];
			    
			    $row = $PersonTelephones->fetch_array();
			    $arrayPersonData[205] = $row['country_code'];
			    $arrayPersonData[206] = $row['area_code'];
			    $arrayPersonData[207] = $row['tel_number'];
			    $arrayPersonData[208] = $row['tel_type'];
			    
			    $arrayPersonData[209] = "";
			    $arrayPersonData[210] = "";
			    $arrayPersonData[211] = "";
			    $arrayPersonData[212] = "";
			   
			}
			if($rowsTelephone == 3)
			{
			    $row = $PersonTelephones->fetch_array();
			    $arrayPersonData[201] = $row['country_code'];
			    $arrayPersonData[202] = $row['area_code'];
			    $arrayPersonData[203] = $row['tel_number'];
			    $arrayPersonData[204] = $row['tel_type'];
			    
			    $row = $PersonTelephones->fetch_array();	   
			    $arrayPersonData[205] = $row['country_code'];
			    $arrayPersonData[206] = $row['area_code'];
			    $arrayPersonData[207] = $row['tel_number'];
			    $arrayPersonData[208] = $row['tel_type'];
		             
			    $row = $PersonTelephones->fetch_array(); 		   
			    $arrayPersonData[209] = $row['country_code'];
			    $arrayPersonData[210] = $row['area_code'];
			    $arrayPersonData[211] = $row['tel_number'];
			    $arrayPersonData[212] = $row['tel_type'];   
			}
			
			
			
			//  Get Persons EMAILS
		     	$PersonEmmails = $DBObject->getPersonEmails($utepid);
		        $row = $PersonEmmails->fetch_array();
	
	                $arrayPersonData[300] = "EMAILS";
			$arrayPersonData[301] = $row['email_1'];
			if($row['email_2'] !="")
			     $arrayPersonData[302] = $row['email_2'];
			else
			     $arrayPersonData[302] = "";
			
			if($row['email_3'] !="")
			    $arrayPersonData[303] = $row['email_3'];
			else
			    $arrayPersonData[303] = "";
			
			//  Get Person Position
			$PersonPositionRec = $DBObject->getPersonPosition($utepid);
                        $PersonPositionName = $DBObject->getPositionName($utepid);
				
			$row = $PersonPositionRec->fetch_array();
			$arrayPersonData[400] = "POSITIONS";
			$arrayPersonData[401] = $row['position_name'];   
			
			if($PersonPositionName == 'student' || $PersonPositionName == 'stwork')
			{
			
			     $edlID = $row['EdL_id'];
			     $arrayPersonData[402] =  $DBObject->getEducationLevelFromID($edlID);
			    
			     $pgmID = $row['program_id'];
			     $arrayPersonData[403] = $DBObject->getProgramNameFromID($pgmID);
			     
			}     
			if($PersonPositionName == 'advisor' || $PersonPositionName == 'stwork' || $PersonPositionName == 'admin')
			{
			    $deptoID = $row['depto_id'];
			    $arrayPersonData[404] = $DBObject->getDepartmentNameFromID($deptoID);   				  
			}
						
			// GET STUDENT DATA			
			if($PersonPositionName == 'student' || $PersonPositionName == 'stwork')
			{
			    $PersonStudentData = $DBObject->getPersonStudentData($utepid);
			    $row = $PersonStudentData->fetch_array();			    
                            $arrayPersonData[500] = "STUDENTDATA";
			    $arrayPersonData[501] = $row['gpa'];
			    $arrayPersonData[502] = $row['advisor'];   // Student Advisor Name
			    //$arrayPersonData[503] = $DBObject->getAdvisorIDFromAdvisorName($arrayPersonData[502]);  //Get Advisor Record Number in Recordset
			    $arrayPersonData[503] = $row['student_status'];
			    $arrayPersonData[504] = $row['entryTerm'];  //Entry Term
			}
			if($PersonPositionName == 'advisor' || $PersonPositionName == 'stwork' || $PersonPositionName == 'admin')
			{
			    $PersonOfficeHrs = $DBObject->getPersonOfficeHrs($utepid);
			    $row = $PersonOfficeHrs->fetch_array();
			    $arrayPersonData[600] = "OFFICEHRS";
			    $arrayPersonData[601] = $row['term'];
			    $arrayPersonData[602] = $row['day'];   
			    $arrayPersonData[603] = $row['hrBegin'];
			    $arrayPersonData[604] = $row['hrEnd'];
			    
			    $deptoID =   $row['depto_id'];
			    $arrayPersonData[605] = $DBObject->getDepartmentNameFromID($deptoID);
			    
			    $bldgID = $row['bldg_id'];
			    $arrayPersonData[606] = $DBObject->getBuildingNameFromID($bldgID);
			    
			    $roomID = $row['room_id'];
			    $arrayPersonData[607] = $DBObject->getRoomNameFromID($roomID);
			}
			
			// Get Person Contacts
			$PersonContacts = $DBObject->getPersonContacts($utepid);
			$row = $PersonContacts->fetch_array();
			$arrayPersonData[700] = "CONTACTS";
			$arrayPersonData[701] = $row['contact1_name'];
			$arrayPersonData[702] = $row['contact1_relation'];
			$arrayPersonData[703] = $row['contact1_address'];
			$arrayPersonData[704] = $row['contact1_telephone'];
			$arrayPersonData[705] = $row['contact2_name'];
			$arrayPersonData[706] = $row['contact2_relation'];
			$arrayPersonData[707] = $row['contact2_address'];
			$arrayPersonData[708] = $row['contact2_telephone'];
		    }
		    else
		    {
			 $arrayPersonData[0] = "NOTFOUND";
		         $arrayPersonData[1] = "Utep ID does not exist in the system.";
		    }
		    
             } // End IF
	     // ENCODE TO JSON Array AND MOVE TO FRONT END
	     echo json_encode($arrayPersonData);
             $DBObject->disconnect_DataBase();
	 }
	
	//*****************************************************************************************
	//  Combo Box for Updates
	//*****************************************************************************************
	
	 function getAllStatesUpdate()
	 {
	     $DBObject = new DBOperations();      // Create Data Base Operations Object
             // Connect to data Base
             if($DBObject->connect_DataBase() == false)
             {
	         echo "Error: Could not connect to database. please try again later.";
	     }
	     else
	     {
	        $result  = $DBObject->getStateList();
            
	        // Read the recordset		 
	        while ($row=$result->fetch_array()) 
	        {
	            $registro = $row['state_name'];
		    echo "<option>".$registro."</option>"; 
                }
	        
	    } // End IF
            $DBObject->disconnect_DataBase();
        }
	
	function getEducationLevelForUpdate($parameter)
	{
	     $DBObject = new DBOperations();      // Create Data Base Operations Object
             // Connect to data Base
             if($DBObject->connect_DataBase() == false)
             {
	         echo "Error: Could not connect to database. please try again later.";
	     }
	     else
	     {
	        $result  = $DBObject->getEducationLevel();
            
	        // Read the recordset		 
	        while ($row=$result->fetch_array()) 
	        {
	            $registro = $row['EdL_name'];
		    if($registro == $parameter)
  	                 echo "<option selected>".$registro."</option>"; 
		    else
			 echo "<option>".$registro."</option>"; 
                }
	        
	    } // End IF
            $DBObject->disconnect_DataBase();
	}
	
	function getProgramNameForUpdate($parameter)
	{
	     $DBObject = new DBOperations();      // Create Data Base Operations Object
             // Connect to data Base
             if($DBObject->connect_DataBase() == false)
             {
	         echo "Error: Could not connect to database. please try again later.";
	     }
	     else
	     {
	        $result  = $DBObject->getProgramNameList();
            
	        // Read the recordset		 
	        while ($row=$result->fetch_array()) 
	        {
	            $registro = $row['program_name'];
		    if($registro == $parameter)
  	                 echo "<option selected>".$registro."</option>"; 
		    else
			 echo "<option>".$registro."</option>"; 
                }
	        
	    } // End IF
            $DBObject->disconnect_DataBase();
	}
	
	function getDepartmentForUpdate($parameter)
	{
	    $DBObject = new DBOperations();      // Create Data Base Operations Object
             // Connect to data Base
             if($DBObject->connect_DataBase() == false)
             {
	         echo "Error: Could not connect to database. please try again later.";
	     }
	     else
	     {
	        $result  = $DBObject->getDepartmentList();
            
	        // Read the recordset		 
	        while ($row=$result->fetch_array()) 
	        {
	            $registro = $row['depto_name'];
		    if($registro == $parameter)
  	                 echo "<option selected>".$registro."</option>"; 
		    else
			 echo "<option>".$registro."</option>"; 
                }
	        
	    } // End IF
            $DBObject->disconnect_DataBase();
	}
	
	function getBuildingForUpdate($parameter)
	{
	    $DBObject = new DBOperations();      // Create Data Base Operations Object
             // Connect to data Base
             if($DBObject->connect_DataBase() == false)
             {
	         echo "Error: Could not connect to database. please try again later.";
	     }
	     else
	     {
	        $result  = $DBObject->getBuildingList();
            
	        // Read the recordset		 
	        while ($row=$result->fetch_array()) 
	        {
	            $registro = $row['bldg_name'];
		    if($registro == $parameter)
  	                 echo "<option selected>".$registro."</option>"; 
		    else
			 echo "<option>".$registro."</option>"; 
                }
	        
	    } // End IF
            $DBObject->disconnect_DataBase();
	}
	
	function getRoomForUpdate($parameter)
	{
	     $DBObject = new DBOperations();      // Create Data Base Operations Object
             // Connect to data Base
             if($DBObject->connect_DataBase() == false)
             {
	         echo "Error: Could not connect to database. please try again later.";
	     }
	     else
	     {
	        $result  = $DBObject->getRoomList();
            
	        // Read the recordset		 
	        while ($row=$result->fetch_array()) 
	        {
	            $registro = $row['room_name'];
		    if($registro == $parameter)
  	                 echo "<option selected>".$registro."</option>"; 
		    else
			 echo "<option>".$registro."</option>"; 
                }
	        
	    } // End IF
            $DBObject->disconnect_DataBase();
	}
     //************************************************************************************
     // searchCourseData
     // search for Course Data in Data Base and returns Not Found, Error or Course Data
     //*************************************************************************************
	   
     function searchCourseData($parameter)
     { 	 
        $DBObject = new DBOperations();      // Create Data Base Operations Object
	$arrayCourseData=array();            // Array of the Person data
	    
  	// Connect to data Base
        if($DBObject->connect_DataBase() == false)
        {
	    $arrayCourseData[0] = "ERROR1";
  	    $arrayCourseData[1] = "Error: Could not connect to database. please try again later.";
	}
	else
	{  
	    $crn = $DBObject->courseExist($parameter);  // SEARCH FOR COURSE
		        
	    if($crn == 1)    //If Course CRN Exist
	    {
		
	        // Get Course Data
		$CourseBasicData = $DBObject->getCourseData($parameter);
		$row1 = $CourseBasicData->fetch_array();
	    	$arrayCourseData[0] = $row1['course_no'];
		$arrayCourseData[1] = $row1['section'];
		$arrayCourseData[2] = $row1['course_title'];
		$arrayCourseData[3] = $row1['course_capacity'];
		$arrayCourseData[4] = $row1['credit_hours'];
		$arrayCourseData[5] = $row1['active_record'];
				    
		// Get Course Schedule Data
		/***************************************************************
		$schedBasicData = $DBObject->getCourseScheduleData($parameter);
		$row2 = $schedBasicData->fetch_array();
		$arrayCourseData[100] = $row2['hrBegin'];
		$arrayCourseData[101]  = $row2['hrEnd'];
		$arrayCourseData[102] = $row2['day'];
		$arrayCourseData[103] = $row2['term'];
		$arrayCourseData[104] = $row2['department'];
		$arrayCourseData[105] = $row2['building'];
		$arrayCourseData[106] = $row2['room'];
		**********************************************************************/	   
	    }
  	    else
	    {
		$arrayCourseData[0] = "NOTFOUND";
		$arrayCourseData[1] = "Course CRN does not exist in the system.";
	    }
        } 				
	// ENCODE TO JSON Array AND MOVE TO FRONT END
	echo json_encode($arrayCourseData);
        $DBObject->disconnect_DataBase();
     }
     
     //************************************************************************************
     // searchUTEPID
     // search for UTEP ID and get only (Name, active_record, Middle Name, Last Name)
     //*************************************************************************************
     function searchUTEPID($parameter)
     {
	$DBObject = new DBOperations();      // Create Data Base Operations Object
	$arrayUTEPIDData =array();            // Array of the Person data
	
	// Connect to data Base
        if($DBObject->connect_DataBase() == false)
        {
	    $arrayUTEPIDData[0] = "ERROR1";
  	    $arrayUTEPIDData[1] = "Error: Could not connect to database. please try again later.";
	}
	else
	{  
	    $res = $DBObject->UtepIDExist($parameter); // SEARCH FOR UTEP ID
		        
	    if($res == 1)    //UTEP ID Exist
	    {
		
	        // Get Course Data
		$UTEPIDBasicData = $DBObject->getUTEPIDBasicData($parameter);
		$row1 = $UTEPIDBasicData->fetch_array();
		$arrayUTEPIDData[0] = $row1['first_name'];
		$arrayUTEPIDData[1] = $row1['middle_name'];
		$arrayUTEPIDData[2] = $row1['last_name'];
		$arrayUTEPIDData[3] = $row1['active_record'];
	    }
  	    else
	    {
		$arrayUTEPIDData[0] = "NOTFOUND";
		$arrayUTEPIDData[1] = "UTEP ID does not exist in the system.";
	    }
        } 				
	// ENCODE TO JSON Array AND MOVE TO FRONT END
	echo json_encode($arrayUTEPIDData);
        $DBObject->disconnect_DataBase();
    }
     
     //************************************************************************************
     // searchCRN
     // search for CRN and get only (course number, course title, active record)
     //*************************************************************************************
     function searchCRN($parameter)
     {
	$DBObject = new DBOperations();      // Create Data Base Operations Object
	$arrayUTEPIDData =array();            // Array of the Person data
	
	// Connect to data Base
        if($DBObject->connect_DataBase() == false)
        {
	    $arrayUTEPIDData[0] = "ERROR1";
  	    $arrayUTEPIDData[1] = "Error: Could not connect to database. please try again later.";
	}
	else
	{  
	    $res = $DBObject->courseExist($parameter); // SEARCH COURSE
		        
	    if($res == 1)    //COURSE CRN Exist
	    {
		
	        // Get Course Data
		$UTEPIDBasicData = $DBObject->getCRNBasicData($parameter);
		$row1 = $UTEPIDBasicData->fetch_array();
		$arrayUTEPIDData[0] = $row1['course_no'];
		$arrayUTEPIDData[1] = $row1['course_title'];
		$arrayUTEPIDData[2] = $row1['active_record'];
	    }
  	    else
	    {
		$arrayUTEPIDData[0] = "NOTFOUND";
		$arrayUTEPIDData[1] = "CRN does not exist in the system.";
	    }
        } 				
	// ENCODE TO JSON Array AND MOVE TO FRONT END
	echo json_encode($arrayUTEPIDData);
        $DBObject->disconnect_DataBase();
     }
     
      //************************************************************************************
     //  getCourseList
     //  getCourseList from the Server
     //*************************************************************************************
     function getCourseListFromServer()
     {
	    
	     $DBObject = new DBOperations();      // Create Data Base Operations Object
             // Connect to data Base
             if($DBObject->connect_DataBase() == false)
             {
	         echo "Error: Could not connect to database. please try again later.";
	     }
	     else
	     {
		$result  = $DBObject->getCourseList();
            
	        // Read the recordset		 
	        while ($row=$result->fetch_array()) 
	        {
	            $registro = $row['course_title'];
		    echo "<option>".$registro."</option>"; 
                }
	        
	    } // End IF
            $DBObject->disconnect_DataBase();
     }
     
      //************************************************************************************
     //  utepIDEXIST($parameter)
     // Return 1 if UTEP ID exist else o
     //*************************************************************************************
     
     function  utepIDEXIST($parameter)
     {
	 $DBObject = new DBOperations();      // Create Data Base Operations Object
             // Connect to data Base
             if($DBObject->connect_DataBase() == false)
             {
	         echo "Error: Could not connect to database. please try again later.";
	     }
	     else
	     {
		$result  = $DBObject->UtepIDExist($parameter);
                $DBObject->disconnect_DataBase(); 
	        
		if($result == 1)
		   echo "1";
		else
		   echo "0";
	        
	    } // End IF
     }
    
     //************************************************************************************
     //  getStudentNameByUTepID
     //  get the student Name giving the UTEPID
     //*************************************************************************************
     
     function getNameByUTEPID($parameter)
     {
	    $DBObject = new DBOperations();      // Create Data Base Operations Object    
             // Connect to data Base
             if($DBObject->connect_DataBase() == false)
             {
	         echo "Error: Could not connect to database. please try again later.";
	     }
	     else
	     {
		$result  = $DBObject->getNameByUTEPID($parameter);
                echo  $result;  // Return Student Name
	     } // End IF
            $DBObject->disconnect_DataBase();
     }
     
     //************************************************************************************
     //  getStudentNameByUTepID
     //  get the student Name giving the UTEPID
     //*************************************************************************************
     function isUTEPID_A_Student($parameter)
     {
	    $DBObject = new DBOperations();      // Create Data Base Operations Object    
             // Connect to data Base
             if($DBObject->connect_DataBase() == false)
             {
	         echo "Error: Could not connect to database. please try again later.";
	     }
	     else
	     {
		$result  = $DBObject->isStudent($parameter);
                echo  $result;  // Return Student Name
	     } // End IF
            $DBObject->disconnect_DataBase();
     }
     
     //************************************************************************************
     //  getCourseSchedule
     //  get the Course Schedule from Server
     //*************************************************************************************
     function getCourseSchedule($parameter)
     {
	     $DBObject = new DBOperations();      // Create Data Base Operations Object    
             // Connect to data Base
             if($DBObject->connect_DataBase() == false)
             {
	         echo "Error: Could not connect to database. please try again later.";
	     }
	     else
	     {
		$result  = $DBObject->getCourseSchedule($parameter);
                echo  $result;  // Return Student Name
	     } // End IF
            $DBObject->disconnect_DataBase();
     }
     
     //**********************************************************************************
     // getTermList();
     //  Get the Term List from The server
     //**********************************************************************************
     function getTermList()
     {
	     $DBObject = new DBOperations();      // Create Data Base Operations Object    
             // Connect to data Base
             if($DBObject->connect_DataBase() == false)
             {
	         echo "Error: Could not connect to database. please try again later.";
	     }
	     else
	     {
		$result  = $DBObject->getTermList();
                
	        // Read the recordset		 
	        while ($row=$result->fetch_array()) 
	        {
	            $registro = $row['term'];
		    echo "<option>".$registro."</option>"; 
                }
	     } // End IF
            $DBObject->disconnect_DataBase();
     }
     
      //**********************************************************************************
     // getCourseSchedule($parameter)
     //  Get the Term List from The server
     //**********************************************************************************
     function  getCourseScheduleBy_CRN_Term($parameter)
     {
	$arrSched = explode(",",$parameter);
	$strCourse = $arrSched[0];
	$strTerm = $arrSched[1];
	
	$DBObject = new DBOperations();      // Create Data Base Operations Object
	$arrayCourseSched =array();            // Array of the Person data
	
	// Connect to data Base
        if($DBObject->connect_DataBase() == false)
        {
	    $arrayCourseSched[0] = "ERROR1";
  	    $arrayCourseSched[1] = "Error: Could not connect to database. please try again later.";
	}
	else
	{  
	    $crn = $DBObject->getCourseCRN($strCourse);
	    
	    $hasSched = $DBObject->courseHasScheduleInTerm($crn,$strTerm);	
	  	      
	    if($hasSched > 0)
	    {
	        $coursesch = $DBObject->getCourseScheduleBy_CRN_TERM($crn,$strTerm);  // GET COURSE SCHEDULE BY COURSE NAME AND TERM
	    
	        if($coursesch)
	        {
		    $row1 = $coursesch->fetch_array();
	            $arrayCourseSched[0] = $row1['term'];
	            $arrayCourseSched[1] = $row1['day'];
	            $arrayCourseSched[2] = $row1['hrBegin'];
		    $arrayCourseSched[3] = $row1['hrEnd'];
		    $arrayCourseSched[4] = $row1['crn'];
		    $arrayCourseSched[5] = $row1['department'];
		    $arrayCourseSched[6] = $row1['building'];
		    $arrayCourseSched[7] = $row1['room'];
		 
	        }
	    }
	    else
	    {
		$arrayCourseSched[0] = "NOTFOUND";
		$arrayCourseSched[1] = "Course Schedule Not Found";
	    }
	 } 				
	// ENCODE TO JSON Array AND MOVE TO FRONT END
	echo json_encode($arrayCourseSched);
        $DBObject->disconnect_DataBase();

     }
     
         //***********************************************************************************
	 //**   Method:   getPersonDataForReport
	 //*    Get ALL ASSOCIATED INFORMATION FROM A PERSON AND SEND IT TO AJAX USING JSON ENCODE
	 ///************************************************************************************
	 
	 function  getPersonDataForReport($utepid)
	 {
	      
	      $DBObject = new DBOperations();      // Create Data Base Operations Object
	      $arrayPersonData=array();            // Array of the Person data
	      	      
              // Connect to data Base
              if($DBObject->connect_DataBase() == false)
              {
		 $arrayPersonData[0] = "ERROR1";
		 $arrayPersonData[1] = "Error: Could not connect to database. please try again later.";
	      }
	      else
	      {  
		    $utepIDExist = $DBObject->UtepIDExist($utepid);  // SEARCH FOR UTEP ID
		    
		    if($utepIDExist == 1)    //If Utep ID Exist
		    {
			// Get Personal Information
			$PersonBasicData = $DBObject->getPersonBasicData($utepid);
			$arrayPersonData[0] = $utepid;
						
			$row = $PersonBasicData->fetch_array();
	                 
			$arrayPersonData[1] = $row['first_name'];
			$arrayPersonData[2]  = $row['middle_name'];
    			$arrayPersonData[3] = $row['last_name'];
			$arrayPersonData[4] = $row['suffix'];
			$arrayPersonData[5] = $row['prefix'];
			$arrayPersonData[6] = $row['DoB'];
			$arrayPersonData[7] = $row['gender'];
			$arrayPersonData[8] = $row['military_class'];
			   
			$regReligionId = $row['religion_id'];
			$arrayPersonData[9] = $DBObject->getReligionNameFromID($regReligionId);
			   
			$regEthnicId = $row['ethnic_id'];
			$arrayPersonData[10] = $DBObject->getEthnicNameFromID($regEthnicId);
			    
			$regCitizenId = $row['citizenship_id'];
			$arrayPersonData[11] = $DBObject->getCitizenshipNameFromID($regCitizenId);
			     
			$regMaritalID = $row['maritalstatus_id'];
			$arrayPersonData[12] = $DBObject->getMaritalStatusFromID($regMaritalID);
			    
			$arrayPersonData[13]  = $row['active_record'];
		
		        // Person Address
			$PersonAddress =   $DBObject->getPersonAddress($utepid);
			$rowsAddress = $PersonAddress->num_rows;
			$arrayPersonData[100] = "ADDRESS";
			
			if($rowsAddress == 1)
			{
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[101] = $row['street'];
			    $arrayPersonData[102] = $row['street_no'];
			    $arrayPersonData[103] = $row['apt_no'];
			    $arrayPersonData[104] = $row['zipcode'];
			    $arrayPersonData[105] = $row['address_type'];
			    $arrayPersonData[106] = $row['city'];
			    $countryID1 = $row['country_id'];
			    $arrayPersonData[107] = $DBObject->getCountryNameFromID($countryID1);
			    $stateID1 = $row['state_id'];
			    $arrayPersonData[108] = $DBObject->getStateNameFromID($stateID1);
			    
			    $arrayPersonData[109] = "";
			    $arrayPersonData[110] = "";
			    $arrayPersonData[111] = "";
			    $arrayPersonData[112] = "";
			    $arrayPersonData[113] = "";
			    $arrayPersonData[114] = "";
			    $arrayPersonData[115] = "";
			    $arrayPersonData[116] = "";
			  
			    $arrayPersonData[117] = "";
			    $arrayPersonData[118] = "";
			    $arrayPersonData[119] = "";
			    $arrayPersonData[120] = "";
			    $arrayPersonData[121] = "";
			    $arrayPersonData[122] = "";
		            $arrayPersonData[123] = "";
			    $arrayPersonData[124] = "";
			    
			    
			}
			if($rowsAddress == 2)
			{
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[101] = $row['street'];
			    $arrayPersonData[102] = $row['street_no'];
			    $arrayPersonData[103] = $row['apt_no'];
			    $arrayPersonData[104] = $row['zipcode'];
			    $arrayPersonData[105] = $row['address_type'];
			    $arrayPersonData[106] = $row['city'];
			    $countryID1 = $row['country_id'];
			    $arrayPersonData[107] = $DBObject->getCountryNameFromID($countryID1);
			    $stateID1 = $row['state_id'];
			    $arrayPersonData[108] = $DBObject->getStateNameFromID($stateID1);
			    
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[109] = $row['street'];
			    $arrayPersonData[110] = $row['street_no'];
			    $arrayPersonData[111] = $row['apt_no'];
			    $arrayPersonData[112] = $row['zipcode'];
			    $arrayPersonData[113] = $row['address_type'];
			    $arrayPersonData[114] = $row['city'];
			    $countryID2 = $row['country_id'];
			    $arrayPersonData[115] = $DBObject->getCountryNameFromID($countryID2);
			    $stateID2 = $row['state_id'];
			    $arrayPersonData[116] = $DBObject->getStateNameFromID($stateID2);
			    
			    $arrayPersonData[117] = "";
			    $arrayPersonData[118] = "";
			    $arrayPersonData[119] = "";
			    $arrayPersonData[120] = "";
			    $arrayPersonData[121] = "";
			    $arrayPersonData[122] = "";
		            $arrayPersonData[123] = "";
			    $arrayPersonData[124] = "";
		
			}
			if($rowsAddress == 3)
			{
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[101] = $row['street'];
			    $arrayPersonData[102] = $row['street_no'];
			    $arrayPersonData[103] = $row['apt_no'];
			    $arrayPersonData[104] = $row['zipcode'];
			    $arrayPersonData[105] = $row['address_type'];
			    $arrayPersonData[106] = $row['city'];
			    $countryID1 = $row['country_id'];
			    $arrayPersonData[107] = $DBObject->getCountryNameFromID($countryID1);
			    $stateID1 = $row['state_id'];
			    $arrayPersonData[108] = $DBObject->getStateNameFromID($stateID1);
			    
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[109] = $row['street'];
			    $arrayPersonData[110] = $row['street_no'];
			    $arrayPersonData[111] = $row['apt_no'];
			    $arrayPersonData[112] = $row['zipcode'];
			    $arrayPersonData[113] = $row['address_type'];
			    $arrayPersonData[114] = $row['city'];
			    $countryID2 = $row['country_id'];
			    $arrayPersonData[115] = $DBObject->getCountryNameFromID($countryID2);
			    $stateID2 = $row['state_id'];
			    $arrayPersonData[116] = $DBObject->getStateNameFromID($stateID2);
			    
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[117] = $row['street'];
			    $arrayPersonData[118] = $row['street_no'];
			    $arrayPersonData[119] = $row['apt_no'];
			    $arrayPersonData[120] = $row['zipcode'];
			    $arrayPersonData[121] = $row['address_type'];
			    $arrayPersonData[122] = $row['city'];
		            $countryID3 = $row['country_id'];
			    $arrayPersonData[123] = $DBObject->getCountryNameFromID($countryID3);
			    $stateID3 = $row['state_id'];
			    $arrayPersonData[124] = $DBObject->getStateNameFromID($stateID3);
			}
			
			// Get Telephones
			$PersonTelephones  = $DBObject->getPersonTelephones($utepid);
			$rowsTelephone =$PersonTelephones->num_rows;
			
			
			$arrayPersonData[200] = "TELEPHONES";
			       
			if($rowsTelephone == 1)
			{
			    $row = $PersonTelephones->fetch_array();
			    $arrayPersonData[201] = $row['country_code'];
			    $arrayPersonData[202] = $row['area_code'];
			    $arrayPersonData[203] = $row['tel_number'];
			    $arrayPersonData[204] = $row['tel_type'];
			    
			    $arrayPersonData[205] = "";
			    $arrayPersonData[206] = "";
			    $arrayPersonData[207] = "";
			    $arrayPersonData[208] = "";
		             
			    $arrayPersonData[209] = "";
			    $arrayPersonData[210] = "";
			    $arrayPersonData[211] = "";
			    $arrayPersonData[212] = "";
			}
			if($rowsTelephone == 2)
			{
			    $row = $PersonTelephones->fetch_array();
			    $arrayPersonData[201] = $row['country_code'];
			    $arrayPersonData[202] = $row['area_code'];
			    $arrayPersonData[203] = $row['tel_number'];
			    $arrayPersonData[204] = $row['tel_type'];
			    
			    $row = $PersonTelephones->fetch_array();
			    $arrayPersonData[205] = $row['country_code'];
			    $arrayPersonData[206] = $row['area_code'];
			    $arrayPersonData[207] = $row['tel_number'];
			    $arrayPersonData[208] = $row['tel_type'];
			    
			    $arrayPersonData[209] = "";
			    $arrayPersonData[210] = "";
			    $arrayPersonData[211] = "";
			    $arrayPersonData[212] = "";
			   
			}
			if($rowsTelephone == 3)
			{
			    $row = $PersonTelephones->fetch_array();
			    $arrayPersonData[201] = $row['country_code'];
			    $arrayPersonData[202] = $row['area_code'];
			    $arrayPersonData[203] = $row['tel_number'];
			    $arrayPersonData[204] = $row['tel_type'];
			    
			    $row = $PersonTelephones->fetch_array();	   
			    $arrayPersonData[205] = $row['country_code'];
			    $arrayPersonData[206] = $row['area_code'];
			    $arrayPersonData[207] = $row['tel_number'];
			    $arrayPersonData[208] = $row['tel_type'];
		             
			    $row = $PersonTelephones->fetch_array(); 		   
			    $arrayPersonData[209] = $row['country_code'];
			    $arrayPersonData[210] = $row['area_code'];
			    $arrayPersonData[211] = $row['tel_number'];
			    $arrayPersonData[212] = $row['tel_type'];   
			}
			
			
			
			//  Get Persons EMAILS
		     	$PersonEmmails = $DBObject->getPersonEmails($utepid);
		        $row = $PersonEmmails->fetch_array();
	
	                $arrayPersonData[300] = "EMAILS";
			$arrayPersonData[301] = $row['email_1'];
			if($row['email_2'] !="")
			     $arrayPersonData[302] = $row['email_2'];
			else
			     $arrayPersonData[302] = "";
			
			if($row['email_3'] !="")
			    $arrayPersonData[303] = $row['email_3'];
			else
			    $arrayPersonData[303] = "";
			
			//  Get Person Position
			$PersonPositionRec = $DBObject->getPersonPosition($utepid);
                        $PersonPositionName = $DBObject->getPositionName($utepid);
				
			$row = $PersonPositionRec->fetch_array();
			$arrayPersonData[400] = "POSITIONS";
			$arrayPersonData[401] = $row['position_name'];   
			
			if($PersonPositionName == 'student' || $PersonPositionName == 'stwork')
			{
			
			     $edlID = $row['EdL_id'];
			     $arrayPersonData[402] =  $DBObject->getEducationLevelFromID($edlID);
			    
			     $pgmID = $row['program_id'];
			     $arrayPersonData[403] = $DBObject->getProgramNameFromID($pgmID);
			     
			}     
			if($PersonPositionName == 'advisor' || $PersonPositionName == 'stwork' || $PersonPositionName == 'admin')
			{
			    $deptoID = $row['depto_id'];
			    $arrayPersonData[404] = $DBObject->getDepartmentNameFromID($deptoID);   				  
			}
						
			// GET STUDENT DATA			
			if($PersonPositionName == 'student' || $PersonPositionName == 'stwork')
			{
			    $PersonStudentData = $DBObject->getPersonStudentData($utepid);
			    $row = $PersonStudentData->fetch_array();			    
                            $arrayPersonData[500] = "STUDENTDATA";
			    $arrayPersonData[501] = $row['gpa'];
			    $arrayPersonData[502] = $row['advisor'];   // Student Advisor Name
			    //$arrayPersonData[503] = $DBObject->getAdvisorIDFromAdvisorName($arrayPersonData[502]);  //Get Advisor Record Number in Recordset
			    $arrayPersonData[503] = $row['student_status'];
			    $arrayPersonData[504] = $row['entryTerm'];  //Entry Term
			}
			if($PersonPositionName == 'advisor' || $PersonPositionName == 'stwork' || $PersonPositionName == 'admin')
			{
			    $PersonOfficeHrs = $DBObject->getPersonOfficeHrs($utepid);
			    $row = $PersonOfficeHrs->fetch_array();
			    $arrayPersonData[600] = "OFFICEHRS";
			    $arrayPersonData[601] = $row['term'];
			    $arrayPersonData[602] = $row['day'];   
			    $arrayPersonData[603] = $row['hrBegin'];
			    $arrayPersonData[604] = $row['hrEnd'];
			    
			    $deptoID =   $row['depto_id'];
			    $arrayPersonData[605] = $DBObject->getDepartmentNameFromID($deptoID);
			    
			    $bldgID = $row['bldg_id'];
			    $arrayPersonData[606] = $DBObject->getBuildingNameFromID($bldgID);
			    
			    $roomID = $row['room_id'];
			    $arrayPersonData[607] = $DBObject->getRoomNameFromID($roomID);
			}
			
			// Get Person Contacts
			$PersonContacts = $DBObject->getPersonContacts($utepid);
			$row = $PersonContacts->fetch_array();
			$arrayPersonData[700] = "CONTACTS";
			$arrayPersonData[701] = $row['contact1_name'];
			$arrayPersonData[702] = $row['contact1_relation'];
			$arrayPersonData[703] = $row['contact1_address'];
			$arrayPersonData[704] = $row['contact1_telephone'];
			$arrayPersonData[705] = $row['contact2_name'];
			$arrayPersonData[706] = $row['contact2_relation'];
			$arrayPersonData[707] = $row['contact2_address'];
			$arrayPersonData[708] = $row['contact2_telephone'];
		    }
		    else
		    {
			 $arrayPersonData[0] = "NOTFOUND";
		         $arrayPersonData[1] = "Utep ID does not exist in the system.";
		    }
		    
             } // End IF
	     // ENCODE TO JSON Array AND MOVE TO FRONT END
	     echo json_encode($arrayPersonData);
             $DBObject->disconnect_DataBase();
	 }
	 
         //***********************************************************************************
	 //**   Method:   getAllCourses()
	 //*    Get ALL ASSOCIATED INFORMATION FROM A COURSE AND SEND IT TO AJAX USING JSON ENCODE
	 ///************************************************************************************
	 function getAllCourses()
	 {
	      $DBObject = new DBOperations();      // Create Data Base Operations Object
	      $arrayCourses=array();            // Array of the Person data
	      $intIndex = 0;
	      
              // Connect to data Base
              if($DBObject->connect_DataBase() == false)
              {
		 $arrayCourses[0] = "ERROR1";
		 $arrayCourses[1] = "Error: Could not connect to database. please try again later.";
	      }
	      else
	      {
		   $result = $DBObject->getAllCoursesAndSchedule();
		   
		   // Read the recordset		 
	           while ($row=$result->fetch_array()) 
	           {
	               $crn            = $row['crn'];
		       $course_no      = $row['course_no'];
		       $day            = $row['day'];
		       $hrBegin        = $row['hrBegin'];
		       $hrEnd          = $row['hrEnd'];
		       $course_title   = $row['course_title'];
		       $term           = $row['term']; 
  	                
		    	
		       $daysDecompose = explode(",",$day);
		       $newDayFormat = $daysDecompose[0] . " " . $daysDecompose[1]; 
		       $sched = $newDayFormat . " (" . $hrBegin . "-" . $hrEnd . ")" ;      
			
		       $record =  $crn  . "," .  $course_no . "," .  $sched  . "," .  $course_title . "," . $term;
		       		       
		       $arrayCourses[$intIndex] = $record;
		       $intIndex++; 
                   }
	      } // End IF
	      // ENCODE TO JSON Array AND MOVE TO FRONT END
	      echo json_encode($arrayCourses);
              $DBObject->disconnect_DataBase();
	 }
	 
	  //***********************************************************************************
	 //**   Method:   getAllCoursesByTerms($parameter)
	 //*    Get ALL Courses by Terms
	 ///************************************************************************************
	 function getAllCoursesByTerms($parameter)
	 {
	    
	      $DBObject = new DBOperations();      // Create Data Base Operations Object
	      $arrayCourses=array();            // Array of the Person data
	      $intIndex = 0;
	      
	      $terms = explode(",",$parameter);
	      $termStart = $terms[0];
	      $termEnd   = $terms[1];
	      
              // Connect to data Base
              if($DBObject->connect_DataBase() == false)
              {
		 $arrayCourses[0] = "ERROR1";
		 $arrayCourses[1] = "Error: Could not connect to database. please try again later.";
	      }
	      else
	      {
		   if($termStart == "No Term" && $termEnd != "No Term")
		   {
		        $arrayTERM = $DBObject->getAllCoursesByTerm($termEnd);
			echo json_encode($arrayTERM);
		   }
		   if($termStart != "No Term" && $termEnd == "No Term")
		   {
		        $arrayTERM = $DBObject->getAllCoursesByTerm($termStart);
			echo json_encode($arrayTERM);
		   }
                   if($termStart != "No Term" && $termEnd != "No Term")
		   {
		        $arrayTERMRANGE = $DBObject->getAllCoursesByTermRange($termStart, $termEnd);  //Get Term Range
			echo json_encode($arrayTERMRANGE);
		   }
	      } // End IF
	      $DBObject->disconnect_DataBase();
	      
	 }
	 
	  //***********************************************************************************
	 //**   Method:   getCourse_Term($parameter)
	 //*    Get Course Information by term
	 ///************************************************************************************
	 function getCourse_Term($parameter)
	 {
	    
	      $DBObject = new DBOperations();      // Create Data Base Operations Object
	      $arrayTERM =array();                 // Array of the Person data
	      	      
	      $arr = explode(",",$parameter);
	      $course = $arr[0];
	      $term   = $arr[1];
	      
              // Connect to data Base
              if($DBObject->connect_DataBase() == false)
              {
		 $arrayTERM[0] = "ERROR1";
		 $arrayTERM[1] = "Error: Could not connect to database. please try again later.";
	      }
	      else
	      {
		 
		   if($term == "No Term")
		   {
		        $crn_course =  $DBObject->getCourseCRN($course);
		        $arrayTERM = $DBObject->getAllCourseRecord($crn_course);      // Get All information current and historic of the course
			echo json_encode($arrayTERM);
		   }
		   else if($term != "No Term")
		   {
		        $crn_course =  $DBObject->getCourseCRN($course);
			$bolHasSchedule = $DBObject->courseHasScheduleInTerm($crn_course,$term);
			if($bolHasSchedule == 1)
			{
		            $arrayTERM = $DBObject->getCourseTermSchedule($crn_course,$term);  // Get iinformation associated with a course in one term
			    echo json_encode($arrayTERM);
			}
			else
			{
			    $arrayTERM[0] = "NOTFOUND";
			    echo json_encode($arrayTERM);
			}
		   }
                   
	      } // End IF
	      $DBObject->disconnect_DataBase();
	      
	 }
       //*************************************************************************************
       //   getStudentRecordByID($parameter)
       //   Get the Student Record Information by UTEP ID
       //****************************************************************************************
       function  getStudentRecordByID($utepid)
       {
	      $DBObject = new DBOperations();      // Create Data Base Operations Object
	      $arrayPersonData=array();            // Array of the Person data
	      	      
              // Connect to data Base
              if($DBObject->connect_DataBase() == false)
              {
		 $arrayPersonData[0] = "ERROR1";
		 $arrayPersonData[1] = "Error: Could not connect to database. please try again later.";
	      }
	      else
	      {  
		    $utepIDExist = $DBObject->UtepIDExist($utepid);  // SEARCH FOR UTEP ID
		    
		    if($utepIDExist == 1)    //If Utep ID Exist
		    {
			// Get Personal Information
			$PersonBasicData = $DBObject->getPersonBasicData($utepid);
			$arrayPersonData[0] = $utepid;
						
			$row = $PersonBasicData->fetch_array();
	                 
			$arrayPersonData[1] = $row['first_name'];
			$arrayPersonData[2]  = $row['middle_name'];
    			$arrayPersonData[3] = $row['last_name'];
			$arrayPersonData[4] = $row['suffix'];
			$arrayPersonData[5] = $row['prefix'];
			$arrayPersonData[6] = $row['DoB'];
			$arrayPersonData[7] = $row['gender'];
			$arrayPersonData[8] = $row['military_class'];
			   
			$regReligionId = $row['religion_id'];
			$arrayPersonData[9] = $DBObject->getReligionNameFromID($regReligionId);
			   
			$regEthnicId = $row['ethnic_id'];
			$arrayPersonData[10] = $DBObject->getEthnicNameFromID($regEthnicId);
			    
			$regCitizenId = $row['citizenship_id'];
			$arrayPersonData[11] = $DBObject->getCitizenshipNameFromID($regCitizenId);
			     
			$regMaritalID = $row['maritalstatus_id'];
			$arrayPersonData[12] = $DBObject->getMaritalStatusFromID($regMaritalID);
			    
			$arrayPersonData[13]  = $row['active_record'];
		
		        // Person Address
			$PersonAddress =   $DBObject->getPersonAddress($utepid);
			$rowsAddress = $PersonAddress->num_rows;
			$arrayPersonData[100] = "ADDRESS";
			
			if($rowsAddress == 1)
			{
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[101] = $row['street'];
			    $arrayPersonData[102] = $row['street_no'];
			    $arrayPersonData[103] = $row['apt_no'];
			    $arrayPersonData[104] = $row['zipcode'];
			    $arrayPersonData[105] = $row['address_type'];
			    $arrayPersonData[106] = $row['city'];
			    $countryID1 = $row['country_id'];
			    $arrayPersonData[107] = $DBObject->getCountryNameFromID($countryID1);
			    $stateID1 = $row['state_id'];
			    $arrayPersonData[108] = $DBObject->getStateNameFromID($stateID1);
			    
			    $arrayPersonData[109] = "";
			    $arrayPersonData[110] = "";
			    $arrayPersonData[111] = "";
			    $arrayPersonData[112] = "";
			    $arrayPersonData[113] = "";
			    $arrayPersonData[114] = "";
			    $arrayPersonData[115] = "";
			    $arrayPersonData[116] = "";
			  
			    $arrayPersonData[117] = "";
			    $arrayPersonData[118] = "";
			    $arrayPersonData[119] = "";
			    $arrayPersonData[120] = "";
			    $arrayPersonData[121] = "";
			    $arrayPersonData[122] = "";
		            $arrayPersonData[123] = "";
			    $arrayPersonData[124] = "";
			    
			    
			}
			if($rowsAddress == 2)
			{
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[101] = $row['street'];
			    $arrayPersonData[102] = $row['street_no'];
			    $arrayPersonData[103] = $row['apt_no'];
			    $arrayPersonData[104] = $row['zipcode'];
			    $arrayPersonData[105] = $row['address_type'];
			    $arrayPersonData[106] = $row['city'];
			    $countryID1 = $row['country_id'];
			    $arrayPersonData[107] = $DBObject->getCountryNameFromID($countryID1);
			    $stateID1 = $row['state_id'];
			    $arrayPersonData[108] = $DBObject->getStateNameFromID($stateID1);
			    
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[109] = $row['street'];
			    $arrayPersonData[110] = $row['street_no'];
			    $arrayPersonData[111] = $row['apt_no'];
			    $arrayPersonData[112] = $row['zipcode'];
			    $arrayPersonData[113] = $row['address_type'];
			    $arrayPersonData[114] = $row['city'];
			    $countryID2 = $row['country_id'];
			    $arrayPersonData[115] = $DBObject->getCountryNameFromID($countryID2);
			    $stateID2 = $row['state_id'];
			    $arrayPersonData[116] = $DBObject->getStateNameFromID($stateID2);
			    
			    $arrayPersonData[117] = "";
			    $arrayPersonData[118] = "";
			    $arrayPersonData[119] = "";
			    $arrayPersonData[120] = "";
			    $arrayPersonData[121] = "";
			    $arrayPersonData[122] = "";
		            $arrayPersonData[123] = "";
			    $arrayPersonData[124] = "";
		
			}
			if($rowsAddress == 3)
			{
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[101] = $row['street'];
			    $arrayPersonData[102] = $row['street_no'];
			    $arrayPersonData[103] = $row['apt_no'];
			    $arrayPersonData[104] = $row['zipcode'];
			    $arrayPersonData[105] = $row['address_type'];
			    $arrayPersonData[106] = $row['city'];
			    $countryID1 = $row['country_id'];
			    $arrayPersonData[107] = $DBObject->getCountryNameFromID($countryID1);
			    $stateID1 = $row['state_id'];
			    $arrayPersonData[108] = $DBObject->getStateNameFromID($stateID1);
			    
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[109] = $row['street'];
			    $arrayPersonData[110] = $row['street_no'];
			    $arrayPersonData[111] = $row['apt_no'];
			    $arrayPersonData[112] = $row['zipcode'];
			    $arrayPersonData[113] = $row['address_type'];
			    $arrayPersonData[114] = $row['city'];
			    $countryID2 = $row['country_id'];
			    $arrayPersonData[115] = $DBObject->getCountryNameFromID($countryID2);
			    $stateID2 = $row['state_id'];
			    $arrayPersonData[116] = $DBObject->getStateNameFromID($stateID2);
			    
			    $row = $PersonAddress->fetch_array();
			    $arrayPersonData[117] = $row['street'];
			    $arrayPersonData[118] = $row['street_no'];
			    $arrayPersonData[119] = $row['apt_no'];
			    $arrayPersonData[120] = $row['zipcode'];
			    $arrayPersonData[121] = $row['address_type'];
			    $arrayPersonData[122] = $row['city'];
		            $countryID3 = $row['country_id'];
			    $arrayPersonData[123] = $DBObject->getCountryNameFromID($countryID3);
			    $stateID3 = $row['state_id'];
			    $arrayPersonData[124] = $DBObject->getStateNameFromID($stateID3);
			}
			
			// Get Telephones
			$PersonTelephones  = $DBObject->getPersonTelephones($utepid);
			$rowsTelephone =$PersonTelephones->num_rows;
			
			
			$arrayPersonData[200] = "TELEPHONES";
			       
			if($rowsTelephone == 1)
			{
			    $row = $PersonTelephones->fetch_array();
			    $arrayPersonData[201] = $row['country_code'];
			    $arrayPersonData[202] = $row['area_code'];
			    $arrayPersonData[203] = $row['tel_number'];
			    $arrayPersonData[204] = $row['tel_type'];
			    
			    $arrayPersonData[205] = "";
			    $arrayPersonData[206] = "";
			    $arrayPersonData[207] = "";
			    $arrayPersonData[208] = "";
		             
			    $arrayPersonData[209] = "";
			    $arrayPersonData[210] = "";
			    $arrayPersonData[211] = "";
			    $arrayPersonData[212] = "";
			}
			if($rowsTelephone == 2)
			{
			    $row = $PersonTelephones->fetch_array();
			    $arrayPersonData[201] = $row['country_code'];
			    $arrayPersonData[202] = $row['area_code'];
			    $arrayPersonData[203] = $row['tel_number'];
			    $arrayPersonData[204] = $row['tel_type'];
			    
			    $row = $PersonTelephones->fetch_array();
			    $arrayPersonData[205] = $row['country_code'];
			    $arrayPersonData[206] = $row['area_code'];
			    $arrayPersonData[207] = $row['tel_number'];
			    $arrayPersonData[208] = $row['tel_type'];
			    
			    $arrayPersonData[209] = "";
			    $arrayPersonData[210] = "";
			    $arrayPersonData[211] = "";
			    $arrayPersonData[212] = "";
			   
			}
			if($rowsTelephone == 3)
			{
			    $row = $PersonTelephones->fetch_array();
			    $arrayPersonData[201] = $row['country_code'];
			    $arrayPersonData[202] = $row['area_code'];
			    $arrayPersonData[203] = $row['tel_number'];
			    $arrayPersonData[204] = $row['tel_type'];
			    
			    $row = $PersonTelephones->fetch_array();	   
			    $arrayPersonData[205] = $row['country_code'];
			    $arrayPersonData[206] = $row['area_code'];
			    $arrayPersonData[207] = $row['tel_number'];
			    $arrayPersonData[208] = $row['tel_type'];
		             
			    $row = $PersonTelephones->fetch_array(); 		   
			    $arrayPersonData[209] = $row['country_code'];
			    $arrayPersonData[210] = $row['area_code'];
			    $arrayPersonData[211] = $row['tel_number'];
			    $arrayPersonData[212] = $row['tel_type'];   
			}
			
			
			
			//  Get Persons EMAILS
		     	$PersonEmmails = $DBObject->getPersonEmails($utepid);
		        $row = $PersonEmmails->fetch_array();
	
	                $arrayPersonData[300] = "EMAILS";
			$arrayPersonData[301] = $row['email_1'];
			if($row['email_2'] !="")
			     $arrayPersonData[302] = $row['email_2'];
			else
			     $arrayPersonData[302] = "";
			
			if($row['email_3'] !="")
			    $arrayPersonData[303] = $row['email_3'];
			else
			    $arrayPersonData[303] = "";
			
			//  Get Person Position
			$PersonPositionRec = $DBObject->getPersonPosition($utepid);
                        $PersonPositionName = $DBObject->getPositionName($utepid);
				
			$row = $PersonPositionRec->fetch_array();
			$arrayPersonData[400] = "POSITIONS";
			$arrayPersonData[401] = $row['position_name'];   
			
			if($PersonPositionName == 'student' || $PersonPositionName == 'stwork')
			{
			
			     $edlID = $row['EdL_id'];
			     $arrayPersonData[402] =  $DBObject->getEducationLevelFromID($edlID);
			    
			     $pgmID = $row['program_id'];
			     $arrayPersonData[403] = $DBObject->getProgramNameFromID($pgmID);
			     
			}     
			if($PersonPositionName == 'advisor' || $PersonPositionName == 'stwork' || $PersonPositionName == 'admin')
			{
			    $deptoID = $row['depto_id'];
			    $arrayPersonData[404] = $DBObject->getDepartmentNameFromID($deptoID);   				  
			}
						
			// GET STUDENT DATA			
			if($PersonPositionName == 'student' || $PersonPositionName == 'stwork')
			{
			    $PersonStudentData = $DBObject->getPersonStudentData($utepid);
			    $row = $PersonStudentData->fetch_array();			    
                            $arrayPersonData[500] = "STUDENTDATA";
			    $arrayPersonData[501] = $row['gpa'];
			    $arrayPersonData[502] = $row['advisor'];   // Student Advisor Name
			    //$arrayPersonData[503] = $DBObject->getAdvisorIDFromAdvisorName($arrayPersonData[502]);  //Get Advisor Record Number in Recordset
			    $arrayPersonData[503] = $row['student_status'];
			    $arrayPersonData[504] = $row['entryTerm'];  //Entry Term
			}
			if($PersonPositionName == 'advisor' || $PersonPositionName == 'stwork' || $PersonPositionName == 'admin')
			{
			    $PersonOfficeHrs = $DBObject->getPersonOfficeHrs($utepid);
			    $row = $PersonOfficeHrs->fetch_array();
			    $arrayPersonData[600] = "OFFICEHRS";
			    $arrayPersonData[601] = $row['term'];
			    $arrayPersonData[602] = $row['day'];   
			    $arrayPersonData[603] = $row['hrBegin'];
			    $arrayPersonData[604] = $row['hrEnd'];
			    
			    $deptoID =   $row['depto_id'];
			    $arrayPersonData[605] = $DBObject->getDepartmentNameFromID($deptoID);
			    
			    $bldgID = $row['bldg_id'];
			    $arrayPersonData[606] = $DBObject->getBuildingNameFromID($bldgID);
			    
			    $roomID = $row['room_id'];
			    $arrayPersonData[607] = $DBObject->getRoomNameFromID($roomID);
			}
			
			// Get Person Contacts
			$PersonContacts = $DBObject->getPersonContacts($utepid);
			$row = $PersonContacts->fetch_array();
			$arrayPersonData[700] = "CONTACTS";
			$arrayPersonData[701] = $row['contact1_name'];
			$arrayPersonData[702] = $row['contact1_relation'];
			$arrayPersonData[703] = $row['contact1_address'];
			$arrayPersonData[704] = $row['contact1_telephone'];
			$arrayPersonData[705] = $row['contact2_name'];
			$arrayPersonData[706] = $row['contact2_relation'];
			$arrayPersonData[707] = $row['contact2_address'];
			$arrayPersonData[708] = $row['contact2_telephone'];
			
		    }
		    else
		    {
			 $arrayPersonData[0] = "NOTFOUND";
		         $arrayPersonData[1] = "Utep ID does not exist in the system.";
		    }
		    
             } // End IF
	     // ENCODE TO JSON Array AND MOVE TO FRONT END
	     echo json_encode($arrayPersonData);
             $DBObject->disconnect_DataBase();
      }
      
      //******************************************************************************
      // Method: getUnderGradRecords()
      //  Get UnderGrad records
      //*****************************************************************************
      function getUnderGradRecords()
      {
	  $DBObject = new DBOperations();      // Create Data Base Operations Object
	  $arrayUndergrad=array();            // Array of the Person data
	  $intIndex = 0;
	  
          // Connect to data Base
          if($DBObject->connect_DataBase() == false)
          {
		 $arrayUndergrad[0] = "ERROR1";
		 $arrayUndergrad[1] = "Error: Could not connect to database. please try again later.";
	  }
	  else
	  {
	        $result = $DBObject->getAllUnderGradStudents();
		
		 // Read the recordset		 
	           while ($row=$result->fetch_array()) 
	           {
	               $utepid            = $row['person_utepid'];
		       $lastname          = $row['last_name'];
		       $firstname         = $row['first_name'];
		       $middlename        = $row['middle_name'];
		       $program           = $row['program_name'];
		       $advisor           = $row['advisor'];
		       $educationLevel    = $row['EdL_name'];
		       $term              = $row['entryTerm']; 
		       $gpa               = $row['gpa'];
		    	
		       
		       $record =  $utepid  . "," .  $lastname . "," .  $firstname . "," .  $middlename . "," . $program  . "," . $advisor . "," . $educationLevel . "," . $term . "," . $gpa;
		       		       
		       $arrayUndergrad[$intIndex] = $record;
		       $intIndex++; 
                   }
	  }
	  // ENCODE TO JSON Array AND MOVE TO FRONT END
	  echo json_encode($arrayUndergrad);
          $DBObject->disconnect_DataBase();
      }
      
      //******************************************************************************
      // Method: getGradRecords()
      //  Get UnderGrad records
      //*****************************************************************************
      function getGradRecords()
      {
	  $DBObject = new DBOperations();      // Create Data Base Operations Object
	  $arrayUndergrad=array();            // Array of the Person data
	  $intIndex = 0;
	  
          // Connect to data Base
          if($DBObject->connect_DataBase() == false)
          {
		 $arrayUndergrad[0] = "ERROR1";
		 $arrayUndergrad[1] = "Error: Could not connect to database. please try again later.";
	  }
	  else
	  {
	        $result = $DBObject->getAllGradStudents();
		
		 // Read the recordset		 
	           while ($row=$result->fetch_array()) 
	           {
	               $utepid            = $row['person_utepid'];
		       $lastname          = $row['last_name'];
		       $firstname         = $row['first_name'];
		       $middlename        = $row['middle_name'];
		       $program           = $row['program_name'];
		       $advisor           = $row['advisor'];
		       $educationLevel    = $row['EdL_name'];
		       $term              = $row['entryTerm']; 
		       $gpa               = $row['gpa'];
		    	
		       
		       $record =  $utepid  . "," .  $lastname . "," .  $firstname . "," .  $middlename . "," . $program  . "," . $advisor . "," . $educationLevel . "," . $term . "," . $gpa;
		       		       
		       $arrayUndergrad[$intIndex] = $record;
		       $intIndex++; 
                   }
	  }
	  // ENCODE TO JSON Array AND MOVE TO FRONT END
	  echo json_encode($arrayUndergrad);
          $DBObject->disconnect_DataBase();
    }
      
    //******************************************************************************
    // Method: getPHDRecords()
    //  Get PHD records
    //*****************************************************************************
    function getPHDRecords()
    {
	  $DBObject = new DBOperations();      // Create Data Base Operations Object
	  $arrayUndergrad=array();            // Array of the Person data
	  $intIndex = 0;
	  
          // Connect to data Base
          if($DBObject->connect_DataBase() == false)
          {
		 $arrayUndergrad[0] = "ERROR1";
		 $arrayUndergrad[1] = "Error: Could not connect to database. please try again later.";
	  }
	  else
	  {
	        $result = $DBObject->getAllGradDoctorals();        // GET ALL PHD COMPUTER SCIENCE STUDENTS
		
		 // Read the recordset		 
	           while ($row=$result->fetch_array()) 
	           {
	               $utepid            = $row['person_utepid'];
		       $lastname          = $row['last_name'];
		       $firstname         = $row['first_name'];
		       $middlename        = $row['middle_name'];
		       $program           = $row['program_name'];
		       $advisor           = $row['advisor'];
		       $educationLevel    = $row['EdL_name'];
		       $term              = $row['entryTerm']; 
		       $gpa               = $row['gpa'];
		    	
		       
		       $record =  $utepid  . "," .  $lastname . "," .  $firstname . "," .  $middlename . "," . $program  . "," . $advisor . "," . $educationLevel . "," . $term . "," . $gpa;
		       		       
		       $arrayUndergrad[$intIndex] = $record;
		       $intIndex++; 
                   }
	  }
	  // ENCODE TO JSON Array AND MOVE TO FRONT END
	  echo json_encode($arrayUndergrad);
          $DBObject->disconnect_DataBase();
    }
    
    //******************************************************************************
    // Method: getMSITRecords()
    //  Get ALL Master of Information Technology records
    //*****************************************************************************
    
    function getMSITRecords()
    {
	  $DBObject = new DBOperations();      // Create Data Base Operations Object
	  $arrayUndergrad=array();            // Array of the Person data
	  $intIndex = 0;
	  
          // Connect to data Base
          if($DBObject->connect_DataBase() == false)
          {
		 $arrayUndergrad[0] = "ERROR1";
		 $arrayUndergrad[1] = "Error: Could not connect to database. please try again later.";
	  }
	  else
	  {
	        $result = $DBObject-> getAlLMSIT();     // GET ALL MASTER INFORMATION TECH STUDENTS
		
		 // Read the recordset		 
	           while ($row=$result->fetch_array()) 
	           {
	               $utepid            = $row['person_utepid'];
		       $lastname          = $row['last_name'];
		       $firstname         = $row['first_name'];
		       $middlename        = $row['middle_name'];
		       $program           = $row['program_name'];
		       $advisor           = $row['advisor'];
		       $educationLevel    = $row['EdL_name'];
		       $term              = $row['entryTerm']; 
		       $gpa               = $row['gpa'];
		    	
		       
		       $record =  $utepid  . "," .  $lastname . "," .  $firstname . "," .  $middlename . "," . $program  . "," . $advisor . "," . $educationLevel . "," . $term . "," . $gpa;
		       		       
		       $arrayUndergrad[$intIndex] = $record;
		       $intIndex++; 
                   }
	  }
	  // ENCODE TO JSON Array AND MOVE TO FRONT END
	  echo json_encode($arrayUndergrad);
          $DBObject->disconnect_DataBase();
    }
    
    //******************************************************************************
    // Method: getMSSCRecords()
    //  Get ALL Master of Science in Computer Science records
    //*****************************************************************************
    function getMSSCRecords()
    {
	  $DBObject = new DBOperations();      // Create Data Base Operations Object
	  $arrayUndergrad=array();            // Array of the Person data
	  $intIndex = 0;
	  
          // Connect to data Base
          if($DBObject->connect_DataBase() == false)
          {
		 $arrayUndergrad[0] = "ERROR1";
		 $arrayUndergrad[1] = "Error: Could not connect to database. please try again later.";
	  }
	  else
	  {
	        $result = $DBObject->getAlLMSCS();   // GET ALL MASTER COMPUTER SCIENCE STUDENTS
		
		 // Read the recordset		 
	           while ($row=$result->fetch_array()) 
	           {
	               $utepid            = $row['person_utepid'];
		       $lastname          = $row['last_name'];
		       $firstname         = $row['first_name'];
		       $middlename        = $row['middle_name'];
		       $program           = $row['program_name'];
		       $advisor           = $row['advisor'];
		       $educationLevel    = $row['EdL_name'];
		       $term              = $row['entryTerm']; 
		       $gpa               = $row['gpa'];
		    	
		       
		       $record =  $utepid  . "," .  $lastname . "," .  $firstname . "," .  $middlename . "," . $program  . "," . $advisor . "," . $educationLevel . "," . $term . "," . $gpa;
		       		       
		       $arrayUndergrad[$intIndex] = $record;
		       $intIndex++; 
                   }
	  }
	  // ENCODE TO JSON Array AND MOVE TO FRONT END
	  echo json_encode($arrayUndergrad);
          $DBObject->disconnect_DataBase();
    }
    
     //******************************************************************************
    // Method:  getMSSEWRecords()
    //  Get ALL Master of Science in Computer Science records
    //*****************************************************************************
    function getMSSEWRecords()
    {
	  $DBObject = new DBOperations();      // Create Data Base Operations Object
	  $arrayUndergrad=array();            // Array of the Person data
	  $intIndex = 0;
	  
          // Connect to data Base
          if($DBObject->connect_DataBase() == false)
          {
		 $arrayUndergrad[0] = "ERROR1";
		 $arrayUndergrad[1] = "Error: Could not connect to database. please try again later.";
	  }
	  else
	  {
	        $result = $DBObject->getAlLMSSWE();   // GET ALL MASTER SOFTWARE ENGINEERING STUDENTS
		
		 // Read the recordset		 
	           while ($row=$result->fetch_array()) 
	           {
	               $utepid            = $row['person_utepid'];
		       $lastname          = $row['last_name'];
		       $firstname         = $row['first_name'];
		       $middlename        = $row['middle_name'];
		       $program           = $row['program_name'];
		       $advisor           = $row['advisor'];
		       $educationLevel    = $row['EdL_name'];
		       $term              = $row['entryTerm']; 
		       $gpa               = $row['gpa'];
		    	
		       
		       $record =  $utepid  . "," .  $lastname . "," .  $firstname . "," .  $middlename . "," . $program  . "," . $advisor . "," . $educationLevel . "," . $term . "," . $gpa;
		       		       
		       $arrayUndergrad[$intIndex] = $record;
		       $intIndex++; 
                   }
	  }
	  // ENCODE TO JSON Array AND MOVE TO FRONT END
	  echo json_encode($arrayUndergrad);
          $DBObject->disconnect_DataBase();
    }
    
    //******************************************************************************
    // Method:  getMASTERSRecords()
    //  Get ALL Master of Science in Computer Science records
    //*****************************************************************************
    
    function getMASTERSRecords()
    {
	  $DBObject = new DBOperations();      // Create Data Base Operations Object
	  $arrayUndergrad=array();            // Array of the Person data
	  $intIndex = 0;
	  
          // Connect to data Base
          if($DBObject->connect_DataBase() == false)
          {
		 $arrayUndergrad[0] = "ERROR1";
		 $arrayUndergrad[1] = "Error: Could not connect to database. please try again later.";
	  }
	  else
	  {
	        $result = $DBObject->getAllGradMasters();   // GET ALL MASTER STUDENTS
		
		 // Read the recordset		 
	           while ($row=$result->fetch_array()) 
	           {
	               $utepid            = $row['person_utepid'];
		       $lastname          = $row['last_name'];
		       $firstname         = $row['first_name'];
		       $middlename        = $row['middle_name'];
		       $program           = $row['program_name'];
		       $advisor           = $row['advisor'];
		       $educationLevel    = $row['EdL_name'];
		       $term              = $row['entryTerm']; 
		       $gpa               = $row['gpa'];
		    	
		       
		       $record =  $utepid  . "," .  $lastname . "," .  $firstname . "," .  $middlename . "," . $program  . "," . $advisor . "," . $educationLevel . "," . $term . "," . $gpa;
		       		       
		       $arrayUndergrad[$intIndex] = $record;
		       $intIndex++; 
                   }
	  }
	  // ENCODE TO JSON Array AND MOVE TO FRONT END
	  echo json_encode($arrayUndergrad);
          $DBObject->disconnect_DataBase();
    }
    
    //******************************************************************************
    // Method:  getCYBERSECRecords()
    //  Get ALL CYBER SECURITY STUDENTS records
    //*****************************************************************************
    
    function getCYBERSECRecords()
    { 
	  $DBObject = new DBOperations();      // Create Data Base Operations Object
	  $arrayUndergrad=array();            // Array of the Person data
	  $intIndex = 0;
	  
          // Connect to data Base
          if($DBObject->connect_DataBase() == false)
          {
		 $arrayUndergrad[0] = "ERROR1";
		 $arrayUndergrad[1] = "Error: Could not connect to database. please try again later.";
	  }
	  else
	  {
	        $result = $DBObject->getAllCyberSec();   // GET ALL CYBER SECURITY STUDENTS
		
		 // Read the recordset		 
	           while ($row=$result->fetch_array()) 
	           {
	               $utepid            = $row['person_utepid'];
		       $lastname          = $row['last_name'];
		       $firstname         = $row['first_name'];
		       $middlename        = $row['middle_name'];
		       $program           = $row['program_name'];
		       $advisor           = $row['advisor'];
		       $educationLevel    = $row['EdL_name'];
		       $term              = $row['entryTerm']; 
		       $gpa               = $row['gpa'];
		    	
		       
		       $record =  $utepid  . "," .  $lastname . "," .  $firstname . "," .  $middlename . "," . $program  . "," . $advisor . "," . $educationLevel . "," . $term . "," . $gpa;
		       		       
		       $arrayUndergrad[$intIndex] = $record;
		       $intIndex++; 
                   }
	  }
	  // ENCODE TO JSON Array AND MOVE TO FRONT END
	  echo json_encode($arrayUndergrad);
          $DBObject->disconnect_DataBase();
    } 	
    
    //******************************************************************************
    // Method:  getAllStudentsAllEntryTerms()
    //  Get ALL STUDENTS IN ALL ENTRY TERMS
    //*****************************************************************************
    function getAllStudentsAllEntryTerms()
    {
	 $DBObject = new DBOperations();      // Create Data Base Operations Object
	  $arrayUndergrad=array();            // Array of the Person data
	  $intIndex = 0;
	  
          // Connect to data Base
          if($DBObject->connect_DataBase() == false)
          {
		 $arrayUndergrad[0] = "ERROR1";
		 $arrayUndergrad[1] = "Error: Could not connect to database. please try again later.";
	  }
	  else
	  {
	           $result = $DBObject->getAllStudentsAllEntryTerms();   // GET ALL STUDENTS IN ALL ENTRY TERMS
		
		   // Read the recordset		 
	           while ($row=$result->fetch_array()) 
	           {
	               $utepid            = $row['person_utepid'];
		       $lastname          = $row['last_name'];
		       $firstname         = $row['first_name'];
		       $middlename        = $row['middle_name'];
		       $program           = $row['program_name'];
		       $advisor           = $row['advisor'];
		       $educationLevel    = $row['EdL_name'];
		       $term              = $row['entryTerm']; 
		       $gpa               = $row['gpa'];
		    	
		       
		       $record =  $utepid  . "," .  $lastname . "," .  $firstname . "," .  $middlename . "," . $program  . "," . $advisor . "," . $educationLevel . "," . $term . "," . $gpa;
		       		       
		       $arrayUndergrad[$intIndex] = $record;
		       $intIndex++; 
                   }
	  }
	  // ENCODE TO JSON Array AND MOVE TO FRONT END
	  echo json_encode($arrayUndergrad);
          $DBObject->disconnect_DataBase();

    }
  
    //******************************************************************************
    // Method:  getStudentsByEntryTerm()
    //  Get ALL STUDENTS BY ENTRY TERM
    //*****************************************************************************
    function getStudentsByEntryTerm($param)
    {
	      $DBObject = new DBOperations();      // Create Data Base Operations Object
	      $arrayCourses=array();            // Array of the Person data
	      $intIndex = 0;
	      
	      $terms = explode(",",$param);
	      $termStart = $terms[0];
	      $termEnd   = $terms[1];
	      
              // Connect to data Base
              if($DBObject->connect_DataBase() == false)
              {
		 $arrayCourses[0] = "ERROR1";
		 $arrayCourses[1] = "Error: Could not connect to database. please try again later.";
	      }
	      else
	      {
		   if($termStart == "No Term" && $termEnd != "No Term")
		   {
		        $arrayTERM = $DBObject->getAllStudentsByEntryTerm($termEnd);        // Get All Students by Entry Term
			echo json_encode($arrayTERM);
		   }
		   if($termStart != "No Term" && $termEnd == "No Term")
		   {
		        $arrayTERM = $DBObject->getAllStudentsByEntryTerm($termStart);     // Get All Students by Entry Term
			echo json_encode($arrayTERM);
		   }
                   if($termStart != "No Term" && $termEnd != "No Term")
		   {
		        $arrayTERMRANGE = $DBObject->getAllStudentsBetweenEntryTermRange($termStart, $termEnd);  //Get All Students Between Entry Term
			echo json_encode($arrayTERMRANGE);
		   }
	      } // End IF
	      $DBObject->disconnect_DataBase();
    }
    
    //===========================================================================================================
    // GET Student Courses By Term
    //************************************************************************************************************
    function getStudentCoursesByTerm($parameter)
    {
	      $DBObject = new DBOperations();      // Create Data Base Operations Object
	      $arrayTERM=array();            // Array of the Person data
	      $intIndex = 0;
	      
	      $terms = explode(",",$parameter);
	      $utepid = $terms[0];
	      $termEnd   = $terms[1];
	      
              // Connect to data Base
              if($DBObject->connect_DataBase() == false)
              {
		 $arrayTERM[0] = "ERROR1";
		 $arrayTERM[1] = "Error: Could not connect to database. please try again later.";
		 echo json_encode($arrayTERM);
	      }
	      else
	      {
		  if($DBObject->UtepIDExist($utepid) == 0)
		  {
		      $arrayTERM[0] = "NOTFOUND";
		      echo json_encode($arrayTERM);
		  }
		  else
		  {
		      if($termEnd != "No Term")
		      {
		          $arrayTERM = $DBObject->getStudentCoursesByTerm($utepid,$termEnd);        // Get All Students by Entry Term
			  echo json_encode($arrayTERM);
		      }
		      if($termEnd == "No Term")
		      {
		          $arrayTERM = $DBObject->getStudentCourses($utepid);     // Get All Students by Entry Term
			  echo json_encode($arrayTERM);
		      }
		  }
	      } // End IF
	      $DBObject->disconnect_DataBase();
    }
    
    //**********************************************************************************************************
    // Method: getAuxiliaryTableList()
    // Get the Auxiliary Table List from Data Base.
    //************************************************************************************************************
    function getAuxiliaryTableList()
    {
	 $DBObject = new DBOperations();      // Create Data Base Operations Object    
         // Connect to data Base
         if($DBObject->connect_DataBase() == false)
         {
	       echo "Error: Could not connect to database. please try again later.";
	 }
	 else
	 {
		$result  = $DBObject->getAuxiliaryTablesList();   //Get Auxiliary Table List
                
	        // Read the recordset		 
	        while ($row=$result->fetch_array()) 
	        {
	            $registro = $row['AuxTable_name'];
		    echo "<option>".$registro."</option>"; 
                }
	 } // End IF
         $DBObject->disconnect_DataBase();
    }
    
    //**********************************************************************************************************
    // Method: getAuxiliaryTableRep($parameter)
    // Get the Specific Auxiliary Table List Report from Data Base.
    //************************************************************************************************************
    
    function getAuxiliaryTableRep($auxTable)
    {
	 $arrayAux=array();            // Array of valus of Aux Table
         $intIndex = 0;
	 
	 $DBObject = new DBOperations();      // Create Data Base Operations Object    
         // Connect to data Base
         if($DBObject->connect_DataBase() == false)
         {
	       echo "Error: Could not connect to database. please try again later.";
	 }
	 else
	 {
	    switch($auxTable)
	    {
		case 'Marital Status':
		       $result  = $DBObject->getMaritalStatus();
		       break;
		case 'Religion':
		       $result  = $DBObject->getReligion();   
		       break;
		case 'Ethnicity':    
		       $result  = $DBObject->getEthnicity();   
		       break;
		case 'Education Level':    
		       $result  = $DBObject->getEducationLevel();
		       break;
		case 'Citizenship':    
		       $result  = $DBObject->getCitizenship(); 
		       break;
		case 'Country':
		       $result  = $DBObject->getCountryList();  
		       break;
		case 'State':
		       $result  = $DBObject->getStateList();   
		       break;
		case 'Program':
		       $result  = $DBObject->getProgramNameList();  
		       break;
		case 'Building':
		       $result  = $DBObject->getBuildingList();   
		       break;
		case 'Room':
		       $result  = $DBObject->getRoomList();   
		       break;
		case 'Term':
		       $result  = $DBObject->getTermList();   
		       break;
	    }   
	    // Read the recordset		 
	    while ($row=$result->fetch_array()) 
	    {
	           switch($auxTable)
	           {
		       case 'Marital Status':
		          $registro = $row['maritalS_name'];
		          break;
		       case 'Religion':
		           $registro = $row['religion_name'];
		           break;
		       case 'Ethnicity':    
		           $registro = $row['ethnic_name'];
		           break;
		       case 'Education Level':    
		           $registro = $row['EdL_name'];
		           break;
		       case 'Citizenship':    
		           $registro = $row['citizenship_name'];
		           break;
		       case 'Country':
		           $registro = $row['country_name'];
		           break;
		       case 'State':
		           $registro = $row['state_name'];
		           break; 
		       case 'Program':
		           $registro = $row['program_name'];
		           break;
		       case 'Building':
		           $registro = $row['bldg_name'];
		           break;
		       case 'Room':
		           $registro = $row['room_name']; 
		           break;
		       case 'Term':
		           $registro = $row['term'];
		           break;
		   } // End Switch
		   $arrayAux[$intIndex] =  $registro;
	           $intIndex++;
	    } // End WHile   
        } // End IF
	 
	 // ENCODE TO JSON Array AND MOVE TO FRONT END
	 echo json_encode($arrayAux);
         $DBObject->disconnect_DataBase();
    } // End Method
    
    //****************************************************************************************************
    // Method: getAllSystemUsers()
    // Get All System Users from the Auth System
    //***************************************************************************************************
    function getAllSystemUsers()
    {
	      $DBObject = new DBOperations();      // Create Data Base Operations Object
	      $arrayTERM=array();            // Array of the Person data
	      $intIndex = 0;
	      
	      // Connect to data Base
              if($DBObject->connect_SysUSers_DataBase() == false)
              {
		 $arrayTERM[0] = "ERROR1";
		 $arrayTERM[1] = "Error: Could not connect to database. please try again later.";
		 echo json_encode($arrayTERM);
	      }
	      else
	      {
		    $arrayTERM = $DBObject->getSystemsUsers();       // Get All System Users
		    echo json_encode($arrayTERM);
		  
	      }
	      
	      $DBObject->disconnect_DataBase();
    }?>