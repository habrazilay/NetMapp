<html>
   
   <head>
      <title>Add New Record in MySQL Database</title>
   </head>
   
   <body>
      <?php
      
        // include the configs / constants for the database connection and schema
        require_once("config/set_mysql_server.php");
        
        
         if(isset($_POST['add'])) {
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, "project");
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            /*
            if(! get_magic_quotes_gpc() ) {
               $room_name = addslashes ($_POST['room_name']);
               $room_floor = addslashes ($_POST['room_floor']);
            }else {\*/
               $name = $_POST['room_name'];
               $floor = $_POST['room_floor'];
               $site = $_POST['room_site'];
           
            
           // $room_location = $_POST['room_location'];
            
            $sql = "INSERT INTO rooms (name,floor,location) VALUES('" . $name . "','" . $floor . "','" . $site . "' )";
            
            echo $sql;
              
            $retval = $conn->query($sql);
            
            if(! $retval ) {
               die('Could not enter data: ' . $conn->error);
            }
            
            echo "Entered data successfully\n";
            
            mysql_close($conn);
         }else {
            ?>
            
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                     
                     <tr>
                        <td width = "100">Room site</td>
                        <td><input name = "room_site" type = "text" 
                           id = "room_site"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Room Name</td>
                        <td><input name = "room_name" type = "text" 
                           id = "room_name"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Room Floor</td>
                        <td><input name = "room_floor" type = "text" 
                           id = "room_floor"></td>
                     </tr> 
                  
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "add" type = "submit" id = "add" 
                              value = "Add new room">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            
            <?php
         }
      ?>
   
   </body>
</html>