<?php
     //***************************************************************************************************************
     //  File :  auth.php
     //  Implements an Authentication and redirection
     //  Developed by:  Esau Ruiz
     //  Project:  Database Traffic Reporter
     //  The University of Texas at El Paso
     //  Date: 12/11/2015
     //****************************************************************************************************************


     session_start();
     
     $userid = $_POST['userid'];
     $passwd = $_POST['password'];
     
//     $userid = 'Admin1';
//     $role = 'adminstaff';
$user = 'root';
$pass = '';
$db = 'pflows';   
     
$db_conn = new mysqli('localhost',$user,$pass,$db);
   
     if(mysqli_connect_errno())
     {
          echo "Error: Connection to the Gloriad DB failed.";
           exit();
     }
echo "Conection stablished with Gloriad DB";
     $query = "SELECT Role FROM authorized_users WHERE Name = '".$userid."' and Passwd = '".$passwd."'";

     $result = $db_conn->query($query);

   
      // Get Number of Rows 
     if($result->num_rows > 0)   // If User exist in the System
      {
        $row=$result->fetch_assoc();
        $role = $row['Role'];
        
        $db_conn->close();                           // Close Data Base
        
        if($role == 'adminstaff')
        {
             $_SESSION['valid_user'] = $userid;     // START SESSION
            header("Location:mainAdminStaff.php");   // Redirect to mainAdminStaff
        }
        if($role == 'sysadmin')
        {
            $_SESSION['valid_user'] = $userid;     // START SESSION
            header("Location:mainSysAdmin.php");      // Redirect to mainAdvisor
        }
     }
     else
     {
        $db_conn->close();                           // Close Data Base
        echo "Invalid User...";
	echo $userid;
	echo $passwd;	  
     }

?>
<html>
    <body>
        <br>
        <br>
        <form action="index.html">    
              <button id="cmdReturn" type="submit"> Return  </button>
        </form>
    </body>
</html>