<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/loginVerify.php"); ?>
<?php 
include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/header.html");
include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/sidebar_menu.html");
include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/menu_footer.html");
include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/top_navigation.html");
?>



        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Rooms</h3>
              </div>
				</div>
                          
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                
                <!-- /page content -->
                
                	<?php                 	
                	require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/dbcontroller.php");
                	require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
                	$db_handle = new DBController(DB_SCHEMA_PROJECT);
                	$query = "SELECT sites.name as sname, rooms.name FROM project.rooms as rooms LEFT JOIN project.sites as sites ON rooms.sid = sites.id WHERE sites.pid = ?";
                	$res = $db_handle->prepareAndRunQuery($query,DB_MULTI_SCHEMA,"SELECT",'i',$_SESSION['project_id']);
                	if(!empty($res)){
                	    foreach($res as $room) {
                	        echo "\n\t\t\t\t\t\t\t";
                	        echo "<form class=\"form-horizontal form-label-left\">";
                	        echo "<div class=\"animated flipInY col-lg-4 col-md-4 col-sm-8 col-xs-14\">";
                	        echo "<div class=\"tile-stats\">";
                	        echo "<div class=\"icon\"><i class=\"glyphicon glyphicon-th-large\"></i></div>";
                	        echo "<div class=\"count\">" . $room['name'] . "</div>";
                	        echo "<h3>" . $room['sname'] . "</h3>";
                	        echo "</div>";
                	        echo "</div>";
                	    }}
                	    echo "\n";
                  ?>
                  
                  <a href="create_new_room.php">
                  <form class="form-horizontal form-label-left">
                    <div class="animated flipInY col-lg-4 col-md-4 col-sm-8 col-xs-14">
                <div class="tile-stats">
                  <div class="icon" ><i class="glyphicon glyphicon-plus"></i></div>
                  <div class="count">Add new room</div>
                  <h3><?php echo $_SESSION["project_name"]; ?></h3>
                </div>
              </div>
              </a>
                
                
                <!-- /page content -->
                                         
                      
                        </div>
                      </div>
                    </form>             
            </div>
          </div>
        </div>

<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/footer.html"); ?>
