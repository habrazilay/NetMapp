<?php
// load the registration class
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/classes/Registration.php");
    
// create the registration object. when this object is created, it will do all registration stuff automatically
// so this single line handles the entire registration process.
 $registration = new Registration();
    

include($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/login.html");
?>