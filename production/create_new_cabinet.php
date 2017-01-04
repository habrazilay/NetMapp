<!--<?php include("./loginVerify.php"); ?>-->
<?php include("./header.html"); ?>
<?php include("./sidebar_menu.html"); ?>
<?php include("./menu_footer.html"); ?>
<?php include("./top_navigation.html"); ?>

<!-- /page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Create a new cabinet</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <form class="form-horizontal form-label-left" method = "post" action = "<?php $_PHP_SELF ?>">

                      
                      <span class="section">Cabinet details</span>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room-site">Select a site <span class="required">*</span>
                            </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                          <select class="form-control" name="site_name">
                            <?php 
                            require_once("config/set_mysql_server.php");
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
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room-name">Select the room <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="room_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>         
                          <div class="form-group">
                            <label for="cabinet-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cabinet name <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="cab_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="cab-height" class="control-label col-md-3 col-sm-3 col-xs-12">Cabinet U height </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input name="cab_height" class="date-picker form-control col-md-7 col-xs-12" type="number" style="width: 70px;" value="42">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Length </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input name="cab_length" class="date-picker form-control col-md-7 col-xs-12" type="number" style="width: 70px;" min="1" value="1">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Width </span>
                                </label>
                                <input name="cab_width" class="date-picker form-control col-md-7 col-xs-12" type="number" style="width: 70px;" min="1" value="1">
                            </div>
                          </div>
                          <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Cabinet description </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="cab_description" required="required" name="room-description" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="x_title"></div>
                          <button type="submit" class="btn btn-primary" name = "add_site" style="float:right">Submit</button>
                          <button type="button" class="btn btn-danger" name = "cancel" style="float:right">Cancel</button>                         
                        </div>
                      </div>
                    </form>             
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php include("./footer.html"); ?>
