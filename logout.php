<?php
     session_start();
     
     $olduser = $_SESSION['valid_user'];
     unset($_SESSION['valid_user']);
     session_destroy();
     header("Location:index.html");
?>
<html>
     <body>
          <h1>Log Out</h1>
          
     </body>
</html>