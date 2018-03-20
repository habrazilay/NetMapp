<!--<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/loginVerify.php"); ?>-->

<!-- post to db -->
      <?php
   
        // include the configs / constants for the database connection and schema
        require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/config/set_mysql_server.php");
        
        // include the database controller
        require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/config/dbcontroller.php");
        $db_handle = new DBController(DB_SCHEMA_PROJECT);
        $query ="SELECT * FROM sites";
        //TODO: Edit dropbox to sync from ajax/php json instead of php echo.
        $results_sites = $db_handle->runQuery($query, DB_SCHEMA_PROJECT);    
        
        
        if(isset($_POST['add_cabinet'])) {
	       
	        $userid = $_SESSION['user_id'];
	        $roomid= $_POST['room_name'];
	        $name = $_POST['cab_name'];
	        $clientName = $_POST['cab_client_name'];
	        $uHeight = $_POST['cab_uheight'];        
	        $depth = $_POST['cab_depth'];
	        $width = $_POST['cab_width'];
	        $height = $_POST['cab_height'];
	        $description = $_POST['cab_description']; 
	 		
	        //TODO: Data Verification required before any sql execution!
	        
	        $sql = "INSERT INTO cabinets (rid,name,clientName,uHeight,depth,width,height,description) "
	        ."VALUES('" . $roomid . "','" . $name . "','" . $clientName . "','" . $uHeight . "','" . $depth . "','" . $width . "','" . $height . "','" . $description . "')";
	        
	        if($db_handle->runQuery($sql, DB_SCHEMA_MAP,"INSERT")){
	            echo "New record created successfully to cabinets"; //TODO: Use pnotify!
	            echo "query executed: " . $sql;
	            $newCabId = $db_handle->insert_id();
	        } else {
	        	$db_handle->write_log_sql("Error executing query: " . $sql . "<br>" . $db_handle->getLastError() . "site id:" . $siteid);
	        	echo "Error executing query: " . $sql . "<br>" . $db_handle->getLastError() . "site id:" . $siteid;
	            die();
	        }
	        
	        //TODO: Data Verification required before any sql execution!
	        
	        if (isset($_POST["power_feeds"]) && isset($_POST["sockets"]) && isset($_POST["socketsAmount"])) {
	        	
	        	foreach ($_POST["power_feeds"] as $feedId => $feedTypeId) {
	        		if (isset($_POST["sockets"][$feedId]) && isset($_POST["socketsAmount"][$feedId])) {
	        			$newFeedId = -1;
	        			foreach ($_POST["sockets"][$feedId] as $socketId => $socketTypeId) {
	        				if (isset($_POST["socketsAmount"][$feedId][$socketId])) {
	        					$amount = $_POST["socketsAmount"][$feedId][$socketId];
	        					
	        					//check if sockect amount is a valid integer
	        					if (!is_numeric($_POST["socketsAmount"][$feedId][$socketId]) ||  $_POST["socketsAmount"][$feedId][$socketId] <= 0) {
	        						error_log("SQL Invalid input: socket amount ".$amount." posted for feedId:".$feedId.", socketId:".[$socketId]);
	        						continue;
	        					}
	        					//$query ="SELECT * FROM devices WHERE model LIKE CONCAT('%',?,'%')";
	        					
	        					//check if socket type exists in db
	        					$query ="SELECT * FROM powerSocketAndPlugTypes WHERE id=?";
	        					$results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_BASE,"SELECT",'i',$socketTypeId);
	        					if ($db_handle->affectedRows() !== 1) {
	        						error_log("SQL Invalid input: Unable to find socket type ID:".$socketTypeIdId."for feedId:".$feedId.", socketId:".[$socketId]);
	        						continue;
	        					}
	        					
	        					//check if feed type exists in db
	        					$query ="SELECT * FROM powerIndustrialPlugTypes WHERE id=?";
	        					$results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_BASE,"SELECT",'i',$feedTypeId);
	        					if ($db_handle->affectedRows() !== 1) {
	        						error_log("SQL Invalid input: Unable to find feedId:".$feedTypeId."for feedId:".$feedId.", socketId:".[$socketId]);
	        						continue;
	        					}
	        					
	        					//Data is valid, start insertion
	        					
	        					//Add a new feed to the database.
	        					if ($newFeedId === -1) {
	        						$sql = 	"INSERT INTO cabinetPowerPlugs (cabid,typeid,description) "
		       								."VALUES('" . $newCabId. "','" . $feedTypeId. "','')";
		        					
		        					if($db_handle->runQuery($sql, DB_SCHEMA_MAP, "INSERT")){
		        						echo "New record created successfully to powerFeeds"; //TODO: Use pnotify!
		        						echo "query executed: " . $sql;
		        						$newFeedId = $db_handle->insert_id();
		        					} else {
		        						$db_handle->write_log_sql("Error executing query: " . $sql . PHP_EOL . "\t SQL Error: " . $db_handle->getLastError());
		        						echo "Error executing query: " . $sql . "<br>" . $db_handle->getLastError();
		        						die();
		        					}
	        					}
		        					
	        					//add sockets to the database, and link them to the new feed
	        					$sql = 	"INSERT INTO cabinetPowerOutlets (cabid,outTypeid,amount,plugid,description) "
	       								."VALUES('" . $newCabId. "','" . $socketTypeId. "','" . $amount. "','" . $newFeedId. "','')";
	        					
	        					if($db_handle->runQuery($sql, DB_SCHEMA_MAP,"INSERT")){
	        						echo "New record created successfully to cabinetPowerOutlets"; //TODO: Use pnotify!
	        						echo "query executed: " . $sql;
	        					} else {
	        						$db_handle->write_log_sql("Error executing query: " . $sql . PHP_EOL . "\t SQL Error: " . $db_handle->getLastError());
	        						echo "Error executing query: " . $sql . "<br>" . $db_handle->getLastError();
	        						die();
	        					}
	        				}
	        			}
	        		}
	        		
	        	}
	        	
	        }
	        
        }
        ?>
<!-- /post to db -->

<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/header.html"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/sidebar_menu.html"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/menu_footer.html"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/top_navigation.html"); ?>


<!-- /page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add a new cabinet</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <form class="form-horizontal form-label-left" method = "post" action = "<?php $_PHP_SELF ?> ">

                      
                      <span class="section">Cabinet details</span>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room_site">Select the site <span class="required">*</span>
                            </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">  
                          <select name="site" id="site-list" class="form-control" onChange="getroom(this.value);">
                              <option disabled selected>Please Select...</option>
                            <?php
                            foreach($results_sites as $site) {
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
                                <!--script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script-->           
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
                          <select name="room_name" id="room_name" class="form-control">
                          </select>
                            </div>
                          </div>         
                          <div class="form-group">
                            <label for="cabinet-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cabinet name <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="cab_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="cabinet-client-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cabinet's client name </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="cab_client_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="cab-u-height" class="control-label col-md-3 col-sm-3 col-xs-12">Cabinet U height </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input name="cab_uheight" class="date-picker form-control col-md-7 col-xs-12" type="number" style="width: 70px;" value="42">
                              <label for="cab-height" class="control-label col-md-3 col-sm-3 col-xs-12">Height </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input name="cab_height" class="date-picker form-control col-md-7 col-xs-12" type="number" style="width: 70px;" value="80">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Depth </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input name="cab_depth" class="date-picker form-control col-md-7 col-xs-12" type="number" style="width: 70px;" min="1" value="60">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Width </span>
                                </label>
                                <input name="cab_width" class="date-picker form-control col-md-7 col-xs-12" type="number" style="width: 70px;" min="1" value="200">
                            </div>
                          </div>
                          <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Cabinet description </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="cab_description" required="required" name="room-description" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      
                      <span class="section">Power feeds and sockets</span>

                      <div class="form-group" id="power_feeds_group">
                        <!--label class="control-label col-md-3 col-sm-3 col-xs-12"></label-->
                        <div id="powerFeeds">
					         
					    </div>
					  </div>
					  <input class="btn btn-primary col-md-8 col-sm-8 col-xs-12" type="button" value="Add a new power feed" onClick="addPowerFeed('powerFeeds');">
					    
					    
                        <!-- div class="col-md-6 col-sm-6 col-xs-12">  
                          <select name="feeds" id="power_feeds_add" class="form-control">
                              <option disabled selected>Please select feed type...</option>
                            <?php
                            foreach($results_sites as $site) {
                            ?>
                            <option value="<?php echo $site["id"]; ?>"><?php echo $site["name"]; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>  -->
                      </div>
                      
                      <div class="x_title"></div>
                          <button type="submit" class="btn btn-primary" name = "add_cabinet" style="float:right">Submit</button>
                          <button type="button" class="btn btn-danger" name = "cancel" style="float:right">Cancel</button>                         
                        </div>
                      </div>
                    </form>             
            </div>
          </div>
        </div>
        <!-- /page content -->

<script src="../vendors/jquery/dist/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../vendors/ms-Dropdown/css/msdropdown/dd.css" />
<script src="../vendors/ms-Dropdown/js/msdropdown/jquery.dd.min.js"></script>
<script src="./js/get_data/get_industrial_plug_types.js"></script>
<script src="./js/get_data/get_power_plug_types.js"></script>




<script>
	powerFeedCounter=0;	
	socketsCounter=[];
	function addPowerFeed(divName){
        var newdiv = document.createElement('div');
		newdiv.className = "form-group col-md-8 col-sm-8 col-xs-12";
		feedId='feed'+powerFeedCounter;
		socketsCounter[feedId]=0;
		newdiv.innerHTML = "Power Feed Type: <select name='power_feeds["+feedId+"]' id='"+feedId+"' class='form-control form-group' onChange='editedFeed(this);'></select>" + 
							"<div id='"+feedId+"sockets'></div>" + 
							"<div class='form-group'></div><input type='button' style='float:center' class='btn btn-primary' value='Add sockets' onClick=\"addSocket('"+feedId+"');\">"
							+ "<div class='x_title'></div>";  
		document.getElementById(divName).appendChild(newdiv);

		getIndustrialPlugTypes($("#"+feedId), "less");
		
		powerFeedCounter+=1;
	}
	
	function addSocket(feedId){
		divName = feedId + 'sockets';
		socketsCounter[feedId]+=1;
		socketId = 'socket' + socketsCounter[feedId];
		var newdiv = document.createElement('div');
		newdiv.className = "col-md-8 col-sm-8 col-xs-14";
		newdiv.innerHTML = "<div class='form-group'></div>Socket Type: <select name='sockets["+feedId+"][]' id='"+feedId+socketId+"' class='form-control col-md-8 col-sm-8 col-xs-12' onChange='editedSocket(this);'></select> " + 
							"<input name='socketsAmount["+feedId+"][]' class='date-picker form-control col-md-7 col-xs-12' type='number' style='width: 70px;' value='16'>";
							//"<input type='text' name='socketsAmount["+feedId+" required="required" class="form-control col-md-7 col-xs-12">"
							//<input name="cab_uheight" class="date-picker form-control col-md-7 col-xs-12" type="number" style="width: 70px;" value="42">
							
					//<option value="amex" data-image="../vendors/ms-Dropdown/images/msdropdown/icons/Amex-56.png" data-description="My life. My card...">Amex</option>
		document.getElementById(divName).appendChild(newdiv);
		getPowerPlugTypes($("#"+feedId+socketId), "less");
		
	}
</script>

<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/footer.html"); ?>
