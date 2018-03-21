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
        $results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_PROJECT,"SELECT",'i',$id);
        
        if(empty($results)) die("Invalid id selected");
        foreach($results as $project) {
            $_SESSION['project_id'] = $project["id"];
            $_SESSION['project_name'] = $project["name"];
            header("Location: index.php");
        }        
        
        print_r($_SESSION);

        $conn->close();}
        
        if(isset($_POST['create_project'])) {
            // Create connection
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA_PROJECT);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $userid = $_SESSION['user_id'];
            $name = $_POST['project_name'];
            
            $sql = "INSERT INTO projects (name,createdBy) VALUES('" . $name . "','" . $userid . "' )";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
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

                    <form id="project_selection" class="form-horizontal form-label-left" method="post" action="<?php $_PHP_SELF ?>">

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
                          <button type="button" class="btn btn-success" name="project_creation" data-toggle="modal" data-target=".bs-example-modal-lg" style="float:right">Create new</button>
                                                 
                        </div>
                      </div>
                      </form>
                      
                   <!-- Add new project -->
                          
                          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Project and site details</h4>
                        </div>
                        <div class="modal-body">
                        
                        <!-- Project details -->

                        <form id="create_project" class="form-horizontal form-label-left" method="post" action="<?php $_PHP_SELF ?>">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="project-name">Project name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="project_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <!-- Project details -->
                          
                          <!-- Buttons --> 
                                                   
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-success" name = "create_project" value= "create" style="float:right">Create</button>
                        </div>
                        
                        <!-- Buttons --> 

                      </div>
                    </div>
                  </div>
                  
                  <!-- Add new project -->                       
                 </form>             
            </div>
          </div>
        </div>

        <!-- /page content -->
<script src="http://demos.inspirationalpixels.com/popup-modal/jquery.popup.js"></script>
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/footer.html"); ?>
