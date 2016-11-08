<?php include("./loginVerify.php"); ?>
<?php include("./header.html"); ?>
<?php include("./sidebar_menu.html"); ?>
<?php include("./menu_footer.html"); ?>
<?php include("./top_navigation.html"); ?>

<!-- post to db -->
      <?php
      
        // include the configs / constants for the database connection and schema
        require_once("config/set_mysql_server.php");
        
        if(isset($_POST['add_room'])) {
        // Create connection
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, "project");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $name = $_POST['room_name'];
        $location = $_POST['room_location'];
        $floor = $_POST['room_floor'];
        $length = $_POST['room_length'];
        $width = $_POST['room_width'];
        $description = $_POST['room_description']; 
        
        $sql = "INSERT INTO rooms (name,location,floor,length,width,description) 
        VALUES('" . $name . "','" . $location . "','" . $floor . "','" . $length . "','" . $width . "','" . $description . "' )";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();}
        ?>
<!-- /post to db -->
 
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
                            require_once("config/set_mysql_server.php");
                            $db_connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_SCHEMA_PROJECT);
                            $res = $db_connection->query("SELECT id,name FROM sites");
                            while ($row = $res->fetch_assoc()){
                            echo "\n\t\t\t\t\t\t\t";
                            echo "<option id=\"" . $row['id'] . "\" value=\"site\">" . $row['name'] . "</option>";
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
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div name="measure_units" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="measure" value="meters"> &nbsp; Meters &nbsp;
                                </label>
                                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="measure" value="tiles"> Tiles
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
      
        
<?php include("./footer.html"); ?>
