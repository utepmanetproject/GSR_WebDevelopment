
<?php
     //***********************************************************************************
     //  File :  DataBaseOperations.php
     //  Implements DBOperations class and methods to connect to the MySQL Database
     //  Developed by:  Esau Ruiz
     //  Project:  Database Traffic Reporter (GSR Project)
     //  The University of Texas at El Paso
     //  Date: 01/03/2016
     //***********************************************************************************



    //************************************************************************************
    /*   Class:  DBOperations
    /*           Implements the DataBase Operations                                        
    **************************************************************************************/
     class DBOperations
     {
        private $db;        // database connection Object
        
        /*********************************************************************************
         *
         * Method:  Connect to pflows Data Base
         *
         *********************************************************************************/
        public function connect_DataBase()
        {
	     $hostname = 'localhost';
	     $useriden = 'root';
	     $Passw = '';
	     $dbname = 'pflows';
	     
            if (is_resource($this->db) == false)   // Verify if it is connected
            {
                $this->db = new MySqli($hostname,$useriden,$Passw,$dbname); //Connect to the db
                                
                if(mysqli_connect_errno())    // Error connecting to data base
	        		{
	            		return false;      // Connection Fails
	        		}
            	else
                	{
                    	return true;      // Connection Succeed
                	}
            }
            else
            {
                return true;
            }
         } // end of connect_DataBase
	
		/*********************************************************************************
		*
		* Method:  Connect to Auth Data Base
		*
		**********************************************************************************/
		public function connect_SysUSers_DataBase()
		{
	     $hostname = 'localhost';        //hostname
	     $useriden = 'root';        	 //User Name
	     $Passw = '';          			 //Password
	     $dbname = 'pflows';             //DATABASE
	     
     		if (is_resource($this->db) == false)   // Verify if it is connected
        	{
            	$this->db = new MySqli($hostname,$useriden,$Passw,$dbname); //Connect to the db
            	if(mysqli_connect_errno())    // Error connecting to data base
	    		{
	            	return false;      // Connection Fails
	        	}
            	else
            	{
                	return true;      // Connection Succeed
            	}
        	}
    		else
        	{
            	return true;
        	}
		} //end method connect_SysUSers_DataBase

		/*********************************************************************************
		*
		*    Method:  get Institution Data
		*    Searching Institution information on line
		*
		**********************************************************************************/
		public function getInstData($parameter)
		{
			
			$query = "SELECT organization, city, regioncode, postalcode, ccode,	latitude,
				      longitude FROM domains WHERE organization = '".$parameter."'";
			
			$result = $this->db->query($query);
			$row = $result->fetch_array();
			$ccode = $row['ccode'];

			
			$sql = "SELECT country FROM ccodes WHERE code = '".$ccode."'";
			
			$result1 = $this->db->query($sql);
			$rowX = $result1->fetch_assoc();
			$country = $rowX['country'];

			
		    $result2 = array_merge($row,$rowX);
		    
			if($result2)
			{
				return $result2;			
			
			}
			else
			{
				return -1;
			
			}
			
		}	//end 	getInstData
		
		/*********************************************************************************
		*
		*    Method:  get Ip Data
		*    Searching Institution information on line
		*
		**********************************************************************************/
		public function getIpa($parameter)
		{
			
			$query = "SELECT keyid, domainid, ccode	 FROM ips WHERE ipa = '".$parameter."'";
			
			$result = $this->db->query($query);
			$row = $result->fetch_array();
			$domainid = $row['domainid'];
			$ccode = $row['ccode'];
			$query1 = "SELECT organization FROM domains WHERE domainid = '".$domainid."'";
			
			$result1 = $this->db->query($query1);
			$row1 = $result1->fetch_array();
			$organization = $row1['organization'];
			
			$query2 = "SELECT country FROM ccodes WHERE code = '".$ccode."'";
			$result2 = $this->db->query($query2);
			$row2 = $result2->fetch_array();
			$ccode =  $row2['country'];
			
			
			$result = array_merge($row,$row1,$row2);
						
			if($result)
			{
				return $result;			
			
			}
			else
			{
				return -1;
			
			}
			
		}	//end 	getInstData

		/*********************************************************************************
		*
		*    Method:  Ccodes Data
		*    Get Country record information on line
		*
		**********************************************************************************/
		public function getCountrycode($parameter)
		{
			
			$query = "SELECT code, worldclass, color FROM ccodes WHERE country = '".$parameter."'";
			
			$result = $this->db->query($query);
			$row = $result->fetch_array();
			$worldclass = $row['worldclass'];

			$query1 = "SELECT wclass FROM worldclass WHERE worldid = '".$worldclass."'";
			
			$result1 = $this->db->query($query1);
			$row1 = $result1->fetch_array();

			$result = array_merge($row,$row1);
						
			if($result)
			{
				return $result;			
			
			}
			else
			{
				return -1;
			
			}
			
		}	//end 	getInstData


		/*********************************************************************************
		*
		*    Method:  getWClass
		*    Gets the Complete Record from the Database
		*
		**********************************************************************************/
		public function getWClass($parameter)
		{
			
			$query = "SELECT worldid, mapto	FROM worldclass WHERE wclass = '".$parameter."'";
			
			$result = $this->db->query($query);
			$row = $result->fetch_array();
						
			if($row)
			{
				return $row;			
			
			}
			else
			{
				return -1;
			
			}
			
		}	//end 	getInstData		
		/*********************************************************************************
		*
		*    Method:  searchInstituteData
		*    Searching Institution information on line
		*
		**********************************************************************************/
		public function searchInstName($parameter)
		{
			
			$query = "SELECT organization FROM domains WHERE organization LIKE '%".$parameter."%'";
			$result = $this->db->query($query) or trigger_error($this->db->error."[$query]");
			
			return $result;			
			
		} // end searchInstituteData

		/*********************************************************************************
		*
		*    Method:  searchInstituteData
		*    Searching Institution information on line
		*
		**********************************************************************************/
		public function searchIpa($parameter)
		{
			
			$query = "SELECT ipa FROM ips WHERE ipa LIKE '".$parameter."%'";
			$result = $this->db->query($query) or trigger_error($this->db->error."[$query]");
			
			return $result;
			
		} // end searchIpData

		/*********************************************************************************
		*
		*    Method:  searchCcode
		*    Searching Country Names on line
		*
		**********************************************************************************/
		public function searchCcode($parameter)
		{
			
			$query = "SELECT country FROM ccodes WHERE country LIKE '%".$parameter."%'";
			$result = $this->db->query($query) or trigger_error($this->db->error."[$query]");
			
			return $result;
			
		} // end searchIpData



		/*********************************************************************************
		*
		*    Method:  searchInstituteData
		*    Searching Institution information on line
		*
		**********************************************************************************/
		public function searchWClass($parameter)
		{
			
			$query = "SELECT wclass FROM worldclass WHERE wclass LIKE '%".$parameter."%'";
			$result = $this->db->query($query) or trigger_error($this->db->error."[$query]");
			
			return $result;
			
		} // end searchIpData

		/*********************************************************************************
		*
		*    Method:  insert_Discipline
		*
		**********************************************************************************/
		public function insert_Discipline($discid,$discipline,$master,$mapto)
		{
			// Check if the Discipline has been already updated
			$query = "SELECT discid FROM disciplines WHERE discipline = '" .$discipline. "'";
    		$result = $this->db->query($query);
			$cnt_rows = $result->num_rows;
		
			// If the discipline does not exist in the data base
			// Register in the database
		if($cnt_rows == 0)
		{

			$query = "INSERT INTO disciplines(discid, discipline, master, mapto) VALUES ('".$discid."','".$discipline."','".$master."','".$mapto."')";
			$result = $this->db->query($query);
		
			if($result)
			{
		    	return 0;     //success
			}
			else
			{
		    	return -1;    //error
			}
		}
		else         
		{
			return -2;       //record already exist in database
		}
	 } //end insert_Discipline
      
      
		/*********************************************************************************
		*
		*    Method:  insert_Ccodes
		*
		**********************************************************************************/
		public function insert_Ccodes($code,$country,$worldclass,$color)
		{
			// Check if the Discipline has been already updated
			$query = "SELECT code FROM ccodes WHERE code = '" .$code. "'";
    		$result = $this->db->query($query);
			$cnt_rows = $result->num_rows;
		
			// If the discipline does not exist in the data base
			// Register in the database
			if($cnt_rows == 0)
				{

				
				$sql = "SELECT worldid FROM worldclass WHERE wclass = '".$worldclass."'";
    		    $result = $this->db->query($sql);
				$row = $result->fetch_array();
				$worldclass1 = $row['worldid'];
								
				$query = "INSERT INTO ccodes(code, country, worldclass, color) VALUES ('".$code."','".$country."','".$worldclass1."','".$color."')";
				$result = $this->db->query($query);
		
				if($result)
				{
		    		return 0;     //success
				}
				else
				{
		    		return -1;    //error
				}
			}
			else         
			{
				return -2;       //record already exist in database
			}
	 	} // end insert_Ccodes     
                

		/*********************************************************************************
		*
		*    Method:  insert_WorldClass
		*
		**********************************************************************************/
		public function insert_WorldClass($worldid,$wclass,$mapto)
		{
			// Check if the Discipline has been already updated
			$query = "SELECT worldid FROM worldclass WHERE worldid = '" .$worldid. "'";
    		$result = $this->db->query($query);
			$cnt_rows = $result->num_rows;
		
			// If the discipline does not exist in the data base
			// Register in the database
		if($cnt_rows == 0)
			{
// 		     $result = $db_conn->query("SELECT Role FROM authorized_users WHERE Name = '".$userid."' and Passwd = '".$passwd."'");

				$query = "INSERT INTO worldclass(worldid, wclass, mapto) VALUES ('".$worldid."','".$wclass."','".$mapto."')";
				$result = $this->db->query($query);
		
			if($result)
				{
		    		return 0;     //success
				}
			else
				{
		    		return -1;    //error
				}
			}
		else         
			{
			return -2;       //record already exist in database
			}
	 }// end insert_WorldClass      
                
		/*********************************************************************************
		*
		*    Method:  insert_InstitutionalClass
		* insert_InstitutionalClass($organization,$city,$regioncode,$postalcode,$ccode,$latitude,$longitude,$createdby,$modifiedby);
		**********************************************************************************/
		public function insert_InstitutionalClass($organization,$city,$regioncode,$postalcode,$ccode,$latitude,$longitude,$createdby)
		{
			// Check if the Domainid has been already updated
			$query = "SELECT organization FROM domains WHERE organization = '" .$organization. "'";
    		$result = $this->db->query($query);
			$cnt_rows = $result->num_rows;
		
		//Added values

		
			// If the discipline does not exist in the data base
			// Register in the database
		if($cnt_rows == 0)
		{
		
		    $orgclass = 0;
		    $worldclass = 0;
		    $discipline = 0;
		    $countryrec = 'No';
		    $modifiedby = $createdby;

			$query = "INSERT INTO domains(organization, city, regioncode, postalcode, ccode,
			 latitude, longitude, createdby, modifiedby, orgclass, worldclass, discipline,
			 countryrec) VALUES ('".$organization."','".$city."','".$regioncode."',
			 '".$postalcode."','".$ccode."','".$latitude."','".$longitude."','".$createdby."',
			 '".$modifiedby."','".$orgclass."','".$worldclass."','".$discipline."','".$countryrec."')";
			 
			$result = $this->db->query($query);
		
			if($result)
				{
		    		return 0;     //success
				}
			else
				{
		    		return -1;    //error
				}
			}
		else         
			{
				return -2;       //record already exist in database
			}
	 	}

		/*********************************************************************************
		*
		*    Method:  insert_IpsClass
		* Insert_Ips($keyid,$ipa,$domainid,$ccode)
		**********************************************************************************/
                
		public function Insert_Ips($keyid,$ipa,$organization,$country)
			{
				// Convert the ipa into HEX(INET6_ATON('192.1.1.1'))
				//This value can be recovered using INET6_NTOA(UNHEX('C0010101')) 
				
 				$ip = ip2long($ipa);
//				$ip = $ipa;				

				$query = "SELECT ipa FROM ips WHERE ipa = '".$ipa."'";
    			$result = $this->db->query($query);
				$cnt_rows = $result->num_rows;
				
		//Added values

		
			// If the discipline does not exist in the database update it
			// Register in the database insertions.php?rand=72450668085366?keyid=1&ipa=127.1.1.1&domainid=University&ccode=US&key=IpClass
				if($cnt_rows == 0)
					{
				
						// Search for the domain id of the organization
		    	 		$sql = "SELECT domainid FROM domains WHERE organization = '".$organization."'";
		     			$result1 = $this->db->query($sql);
		     		    $row = $result1->fetch_array();
		     		    $domainid = $row['domainid'];

					// Search for the domain id of the organization		     
		     		    $sql = "SELECT code FROM ccodes WHERE country='".$country."'";
			 		    $result1 = $this->db->query($sql);
				 		$row = $result1->fetch_array();
				 		$ccode = $row['code'];
			 		
					//Update the asnum information	
		    			$asnum = 0;

						$query = "INSERT INTO ips(keyid, ip, ipa, domainid, asnum,
				 			ccode) VALUES ('".$keyid."','".$ip."','".$ipa."','"
				 			.$domainid."','".$asnum."','".$ccode."')";
			 
						$result = $this->db->query($query);
		
						if($result)
						{
		    				return 0;     //success
						}
						else
						{
		    				return -1;    //error
						}
					}
				else         
					{
						return -2;       //record already exist in database
					}
				}// end Insert_Ips

	//************************************************************************************************************************
    /**  Method:  getDomainData()
     *   Get the Domain ID Data from Data Base and return recordset
     */
	//************************************************************************************************************************
         
    public function getDomain()
        {
            $query  = 'SELECT domainid,organization FROM domains';
            $result = $this->db->query($query);
            return $result; 
        }
      
        /**  Method:  getCcode()
         *   
         */
    public function getCcode()
        {
            $query  = 'SELECT code,country FROM ccodes';
            $result = $this->db->query($query);
            return $result; 
        }
        
        /**  Method:  getWclass()
         *   
         */
    public function getWorldclass()
        {
            $query  = 'SELECT worldid,wclass FROM worldclass';
            $result = $this->db->query($query);
            return $result; 
        }


	/** Method: insert_program()
	 *
    **/
    public function insert_program($program)
        {
             // Validate if the record already exist in the database
	    $query = "select program_name from program where program_name='" . $program . "'";
	    $result = $this->db->query($query);
	    $cnt_rows = $result->num_rows;
	
  	 	if($cnt_rows == 0)   // The record does not exist in the database
	     {
	        $query = "insert into program(program_name) values('" . $program . "')";
            $result = $this->db->query($query);
        
                if($result)
                {
                    return 0;      // Success
                }
			else
                {
		    return -1;     // Error;
                } 
	    	}
	    else   // The record already exist in the database
	    	{
                return -2;         // Record already exist 
	    	}
    } //end insert_program 
	
	
	
 	//**********************************************************************************************
        //** Method: disconnect_DataBase()
        // **  Close connection to data base
       //************************************************************************************************
     public function disconnect_DataBase()
        {
            $this->db->close();
        }
          
        
     } // *******************************************END CLASS**********************************************************************
     
     /*----------------------------------------------------------------------------------------------------------------------------
       --------------------------------------------- C H A N G E    L O G  --------------------------------------------------------

        ---------------------------------------------------------------------------------------------------------------------------
       --------------------------------------------------------------------------------------------------------------------------
     */
     
     
?>