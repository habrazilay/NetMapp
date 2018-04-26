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
                <h3>Sites</h3>
              </div>
				</div>
                          
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">               
                
                <!-- /page content -->
                
                
                
				<?php 
                            require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/dbcontroller.php");
                            require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
                            $db_handle = new DBController(DB_SCHEMA_PROJECT);
                            $query = "SELECT name,city FROM sites WHERE pid=?";
                            $res = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_PROJECT,"SELECT",'i',$_SESSION['project_id']);
                            if(!empty($res)){
                            foreach($res as $site) {
                                echo "\n\t\t\t\t\t\t\t";
                                echo "<form class=\"form-horizontal form-label-left\">";
								echo "<div class=\"animated flipInY col-lg-4 col-md-4 col-sm-8 col-xs-14\">";
								echo "<div class=\"tile-stats\">";
								echo "<div class=\"icon\"><i class=\"glyphicon glyphicon-home\"></i></div>";
								echo "<div class=\"count\">" . $site['name'] . "</div>";
								echo "<h3>" . $site['city'] . "</h3>";
								echo "</div>";
								echo "</div>";
                            }}
                            echo "\n";
                  ?>
                  
                  
                  <a href="create_new_site.php">
                  <form class="form-horizontal form-label-left">
                    <div class="animated flipInY col-lg-4 col-md-4 col-sm-8 col-xs-14">
                <div class="tile-stats">
                  <div class="icon" ><i class="glyphicon glyphicon-plus"></i></div>
                  <div class="count">Add new site</div>
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
