<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/loginVerify.php"); ?>
<!-- post to db -->
      <?php
      
        // include the configs / constants for the database connection and schema
        require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
        
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
        
        $sql = 	"INSERT INTO rooms (sid,name,location,floor,length,width,description,createdBy) " 
        		."VALUES('" . $siteid . "','" . $name . "','" . $location . "','" . $floor . "','" . $length . "','" . $width . "','" . $description . "','" . $userid . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">',
            'var queryFlag="yes"',
            '</script>';
        } else {
            echo    '<script type="text/javascript">',
            'var queryFlag="no"',
            '</script>';
            echo "Error: " . $sql . "<br>" . $conn->error . "site id:" . $siteid;
        }
        
        $conn->close();}
        ?>
<!-- /post to db -->
<?php 
include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/header.html");
include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/sidebar_menu.html");
include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/menu_footer.html");
include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/top_navigation.html");
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
                          <select class="form-control" name="site_name" id="site_name">
                          </select>
                        </div>
                        </div>
                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room-name">Room name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="room_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room-location">Room location <span></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="room_location" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="room-floor" class="control-label col-md-3 col-sm-3 col-xs-12">Room floor</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input name="room_floor" class="date-picker form-control col-md-7 col-xs-12" type="number" style="width: 70px;" value="0">
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
                              <input name="cabinets_quantity" class="date-picker form-control col-md-7 col-xs-12" type="number" style="width: 70px;" value="1">
                            </div>
                          </div>
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Room Description </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="room_description" name="room-description" class="form-control col-md-7 col-xs-12"></textarea>
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
        
	<!--script src="http://demos.inspirationalpixels.com/popup-modal/jquery.popup.js"></script-->
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- validator -->
	<script src="../vendors/validator/validator.js"></script>
	<!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.custom.js"></script>
    
    <script src="./js/get_data/get_sites.js"></script>
    <script type="text/javascript">
	    window.onload = function (){
			getSitesToSelect("site_name","");
		}
	</script>
<script type="text/javascript">
if (typeof queryFlag !== 'undefined') {
	if (queryFlag==="yes")
		 popNotify("New room added" , "A new room was created successfuly" , "success");
	else 
		popNotify("Error" , "The new room was NOT added!" , "error");
}

</script>      
      
        
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/footer.html"); ?>
