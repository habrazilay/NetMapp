<?php
// load the login class
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/classes/Login.php");

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() != true) {
    // the user is not logged in.
    header("Location: index.php");
    die();
} 