<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/loginVerify.php"); ?>
<!-- post to db -->
      <?php
      
        // include the configs / constants for the database connection and schema
        require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/dbcontroller.php");
        require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
        
        if(isset($_POST['project_selection'])) {
        // Create connection
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, "project");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        print_r($_SESSION);
        $id = $_POST['project_id'];
        
        $db_handle = new DBController(DB_SCHEMA_PROJECT);
        $db_connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_SCHEMA_PROJECT);
        $query = "SELECT id,name FROM projects WHERE id=?";
        $results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_PROJECT,'i',$id);
        
        if(empty($results)) die("Invalid id selected");
        foreach($results as $project) {
            $_SESSION['project_id'] = $project["id"];
            $_SESSION['project_name'] = $project["name"];
            header("Location: index.php");
        }
        
        
        print_r($_SESSION);

        $conn->close();}
        ?>
<!-- /post to db -->



<?php


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

                    <form class="form-horizontal form-label-left" method="post" action="<?php $_PHP_SELF ?>">

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-name">Select the project<span class="required">*</span>
                            </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="project_id">
                            <?php 
                            require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
                            $db_connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_SCHEMA_PROJECT);
                            $res = $db_connection->query("SELECT id,name FROM projects");
                            while ($row = $res->fetch_assoc()){
                            echo "\n\t\t\t\t\t\t\t";
                            echo "<option value=\"" . $row['id'] . "\" name=\"" . $row['name'] . "\">" . $row['name'] . "</option>";
                            }
                            echo "\n";
                            ?>
                          </select>
                        </div>
                        </div>
                          <button type="submit" class="btn btn-primary" name="project_selection" style="float:right">Submit</button>                         
                        </div>
                      </div>
                    </form>             
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/footer.html"); ?>
