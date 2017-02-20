<!--<?php include("./loginVerify.php"); ?>-->

<!-- post to db -->
      <?php
      
        // include the configs / constants for the database connection and schema
        require_once("config/set_mysql_server.php");
        
        require_once("config/dbcontroller.php");
        $db_handle = new DBController(DB_SCHEMA_PROJECT);
        $query ="SELECT * FROM rooms";
        $results = $db_handle->runQuery($query, DB_SCHEMA_PROJECT);
        
        require_once("config/dbcontroller.php");
        $db_handle = new DBController(DB_SCHEMA_MAP);
        $query ="SELECT * FROM cabinets";
        $results = $db_handle->runQuery($query, DB_SCHEMA_MAP);    
        
		require_once("config/dbcontroller.php");
        $db_handle = new DBController(DB_SCHEMA_PROJECT);
        $query ="SELECT * FROM sites";
        $results = $db_handle->runQuery($query, DB_SCHEMA_PROJECT);
		
        if(isset($_POST['add_new_device'])) {
        // Create connection
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA_MAP);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $userid = $_SESSION['user_id'];
        $cabid= $_POST['cab_name'];
        $masterid = $_POST['dev_name'];
        $name = $_POST['dev_client_name'];
        $uHeight = $_POST['dev_uheight'];        
        $uLength = $_POST['dev_length'];
        $width = $_POST['dev_width'];
        $height = $_POST['dev_height'];
        $description = $_POST['dev_description']; 
        
        $sql = "INSERT INTO cabinets (rid,name,clientName,uHeight,length,width,height,description) 
        VALUES('" . $cabid . "','" . $name . "','" . $clientName . "','" . $uHeight . "','" . $uLength . "','" . $width . "','" . $height . "','" . $description . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully"; //Must to make a popup!
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error . "site id:" . $siteid;
        }
        
        $conn->close();}
        ?>
<!-- /post to db -->

<?php include("./header.html"); ?>
<?php include("./sidebar_menu.html"); ?>
<?php include("./menu_footer.html"); ?>
<?php include("./top_navigation.html"); ?>


<!-- /page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add a new device</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <form class="form-horizontal form-label-left" method = "post" action = "<?php $_PHP_SELF ?> ">

                      
                      <span class="section">Device details</span>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room_site">Select a site <span class="required">*</span>
                            </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">  
                          <select name="site" id="site-list" class="form-control" onChange="getroom(this.value);">
                            <?php
                            foreach($results as $site) {
                            ?>
                            <option value="<?php echo $site["id"]; ?>"><?php echo $site["name"]; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room_name">Select the room <span class="required">*</span>
                            </label>

                      <div class="col-md-6 col-sm-6 col-xs-12">
                                <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>           
                            <script>
                            function getroom(val) {
                                $.ajax({
                                type: "POST",
                                url: "config/get_room.php",
                                data:'sid='+val,
                                success: function(data){
                                    $("#room_name").html(data);
                                }
                                });
                            }
                            </script>
                          <select name="room_name" id="room_name" class="form-control"onChange="getcabinet(this.value);">
                          </select>
                            </div>
                            </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dev_name">Select the cabinet <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
                            <script>
                            function getcabinet(val) {
                                $.ajax({
                                type: "POST",
                                url: "config/get_cabinet.php",
                                data:'sid='+val,
                                success: function(data){
                                    $("#cab_name").html(data);
                                }
                                });
                            }
                            </script>
                          <select name="cab_name" id="cab_name" class="form-control">
                          </select>
                            </div>
                          </div>         
                          <div class="form-group">
                            <label for="cabinet-name" class="control-label col-md-3 col-sm-3 col-xs-12">Device ID <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="dev_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="cabinet-client-name" class="control-label col-md-3 col-sm-3 col-xs-12">Device's client name </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="dev_client_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="cab-u-height" class="control-label col-md-3 col-sm-3 col-xs-12">Device's U height </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input name="dev_uheight" class="date-picker form-control col-md-7 col-xs-12" type="number" style="width: 70px;" value="1">
                              <label for="cab-height" class="control-label col-md-3 col-sm-3 col-xs-12">U lenght </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input name="dev_height" class="date-picker form-control col-md-7 col-xs-12" type="number" style="width: 70px;" value="1">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Power feed amount </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input name="dev_length" class="date-picker form-control col-md-7 col-xs-12" type="number" style="width: 70px;" min="1" value="2">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Active ports </span>
                                </label>
                                <input name="dev_width" class="date-picker form-control col-md-7 col-xs-12" type="number" style="width: 70px;" min="1" value="24">
                            </div>
                          </div>
                          <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Cabinet description </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="dev_description" required="required" name="room-description" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="x_title"></div>
                          <button type="submit" class="btn btn-primary" name = "add_new_device" style="float:right">Submit</button>
                          <button type="button" class="btn btn-danger" name = "cancel" style="float:right">Cancel</button>                         
                        </div>
                      </div>
                    </form>             
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php include("./footer.html"); ?>
