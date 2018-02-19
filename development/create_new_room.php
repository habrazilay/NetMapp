<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/loginVerify.php"); ?>
<!-- post to db -->
      <?php
      
        // include the configs / constants for the database connection and schema
        require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/config/set_mysql_server.php");
        
        if(isset($_POST['add_room'])) {
        // Create connection
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, "project");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $userid = $_SESSION['user_id'];
        $siteid= $_POST['site_name'];
        $name = $_POST['room_name'];
        $location = $_POST['room_location'];
        $floor = $_POST['room_floor'];
        $length = $_POST['room_length'];
        $width = $_POST['room_width'];
        $description = $_POST['room_description']; 
        
        $sql = "INSERT INTO rooms (sid,name,location,floor,length,width,description,createdBy) 
        VALUES('" . $siteid . "','" . $name . "','" . $location . "','" . $floor . "','" . $length . "','" . $width . "','" . $description . "','" . $userid . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error . "site id:" . $siteid;
        }
        
        $conn->close();}
        ?>
<!-- /post to db -->
<?php 
include($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/header.html");
include($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/sidebar_menu.html");
include($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/menu_footer.html");
include($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/top_navigation.html");
?>
 
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Create a new room</h3>
              </div>

            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <form class="form-horizontal form-label-left" method = "post" action = "<?php $_PHP_SELF ?>">

                      
                      <span class="section">Room Details</span>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room-site">Select a site <span class="required">*</span>
                            </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="site_name">
                            <?php 
                            require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/config/dbcontroller.php");
                            require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/config/set_mysql_server.php");
                            $db_handle = new DBController(DB_SCHEMA_PROJECT);
                            $query = "SELECT id,name FROM sites WHERE pid=?";
                            $res = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_PROJECT,'i',$_SESSION['project_id']);
                            foreach($res as $site) {
                                echo "\n\t\t\t\t\t\t\t";
                                echo "<option value=\"" . $site['id'] . "\">" . $site['name'] . "</option>";
                            }
                            echo "\n";
                            ?>
                          </select>
                        </div>
                        </div>
                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room-name">Room name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="room_name" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room-location">Room location <span></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="room_location" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="room-floor" class="control-label col-md-3 col-sm-3 col-xs-12">Room floor</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input name="room_floor" class="date-picker form-control col-md-7 col-xs-12" required="required" type="number" style="width: 70px;" value="0">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Measure units <span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="radio">
                            <label>
                              <input type="radio" class="flat" checked name="iCheck"> Tiles
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" class="flat" name="iCheck"> Meters
                            </label>
                          </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Length <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input name="room_length" class="date-picker form-control col-md-7 col-xs-12" required="required" type="number" style="width: 70px;" min="1" value="10">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Width <span class="required">*</span>
                                </label>
                                <input name="room_width" class="date-picker form-control col-md-7 col-xs-12" required="required" type="number" style="width: 70px;" min="1" value="10">
                            </div>
                          </div>
                            <div class="form-group">
                            <label for="cabinets-quantity" class="control-label col-md-3 col-sm-3 col-xs-12">Cabinets quantity</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input name="cabinets_quantity" class="date-picker form-control col-md-7 col-xs-12" required="required" type="number" style="width: 70px;" value="1">
                            </div>
                          </div>
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Room Description </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="room_description" required="required" name="room-description" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="x_title"></div>
                          <button type="submit" class="btn btn-primary" name = "add_room" style="float:right">Submit</button>
                          <button type="button" class="btn btn-danger" name = "cancel" style="float:right">Cancel</button>                         
                        </div>
                      </div>
                    </form>             
            </div>
          </div>
        </div>
        <!-- /page content -->
      
        
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/footer.html"); ?>
