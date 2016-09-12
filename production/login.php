<?php
// show potential errors / feedback (from registration object)
if (isset($registration) or isset($login)) {
	$action = (isset($login)) ? $login : $registration;
    if ($action->errors) {
        foreach ($action->errors as $error) {
            echo $error;
        }
    }
    if ($action->messages) {
        foreach ($action->messages as $message) {
            echo $message;
        }
    }
}

// load the registration class
require_once("classes/Registration.php");
    
// create the registration object. when this object is created, it will do all registration stuff automatically
// so this single line handles the entire registration process.
 $registration = new Registration();
    

include("login.html");
?>