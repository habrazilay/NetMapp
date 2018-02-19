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
//confirm if the user already selected a project.
}

include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/header.html");
include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/menu_footer.html");
?>

<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Project selection</h3>
              </div>

            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <form class="form-horizontal form-label-left" method = "post" action = "<?php $_PHP_SELF ?>">

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room-site">Select the project<span class="required">*</span>
                            </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="site_name">
                            <?php 
                            require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
                            $db_connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_SCHEMA_PROJECT);
                            $res = $db_connection->query("SELECT id,name FROM sites");
                            while ($row = $res->fetch_assoc()){
                            echo "\n\t\t\t\t\t\t\t";
                            echo "<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
                            }
                            echo "\n";
                            ?>
                          </select>
                        </div>
                        </div>
                          <button type="submit" class="btn btn-primary" name = "add_room" style="float:right">Submit</button>                         
                        </div>
                      </div>
                    </form>             
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/footer.html"); ?>
