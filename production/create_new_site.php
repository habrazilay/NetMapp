<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/loginVerify.php"); ?>
<!-- post to db -->
      <?php
      
        // include the configs / constants for the database connection and schema
        require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
        
        if(isset($_POST['add_site'])) {
        // Create connection
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, "project");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $pid = $_SESSION['project_id'];
        $userid = $_SESSION['user_id'];
        $name = $_POST['site_name'];
        $city = $_POST['site_location'];
        $address = $_POST['site_address']; 
        
        $sql = "INSERT INTO sites (pid,name,city,address,createdBy) VALUES('" . $pid . "','" . $name . "','" . $city . "','" . $address . "','" . $userid . "' )";
        
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">',
            'var queryFlag="yes"',
            '</script>';
        } else {
            echo    '<script type="text/javascript">',
            'var queryFlag="no"',
            '</script>';
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();}
        ?>
<!-- /post to db -->
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/header.html"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/sidebar_menu.html"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/menu_footer.html"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/top_navigation.html"); ?>
 
  
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Create new site</h3>
              </div>

            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <form class="form-horizontal form-label-left" method = "post" action = "<?php $_PHP_SELF ?>">

                      
                      <span class="section">Site Details</span>

                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="site-name">Site name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="site_name" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="site-location">Site location (city) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="site_location" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="room-floor" class="control-label col-md-3 col-sm-3 col-xs-12">Site address</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="site_address" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                      <div class="x_title"></div>
                          <button type="submit" class="btn btn-primary" name = "add_site" style="float:right">Submit</button>
                          <button type="button" class="btn btn-danger" name = "cancel" style="float:right">Cancel</button>                         
                        </div>
                      </div>            
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
    <script type="text/javascript">
    function notifyUser(title,message,type) {
            new PNotify({
            	title: title,
				text: message,
				type: type,
				styling: 'bootstrap3'
            });
    }
	</script>
<script type="text/javascript">
if (queryFlag==="yes")
	 notifyUser("New site added" , "A new site was created successfuly" , "success");
else notifyUser("Error" , "The new site was NOT added!" , "error");
</script>        
      
        
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/footer.html"); ?>