<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/loginVerify.php"); ?>
<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/NetMapp/production/header.html");
include ($_SERVER['DOCUMENT_ROOT'] . "/NetMapp/production/sidebar_menu.html");
include ($_SERVER['DOCUMENT_ROOT'] . "/NetMapp/production/menu_footer.html");
include ($_SERVER['DOCUMENT_ROOT'] . "/NetMapp/production/top_navigation.html");
?>



<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Cabinets</h3>
			</div>
		</div>


		<div class="clearfix"></div>


		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">


					<!-- /page content -->

					<div class="col-md-3 col-sm-4 col-xs-8">
						<div class="x_panel">
							<div class="x_title">
							
				    <?php                 	
                	/* require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/dbcontroller.php");
                	require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
                	$db_handle = new DBController(DB_SCHEMA_PROJECT);
                	$query = "SELECT devCab.name as cabName, devMap.masterid, devBase.model, devMap.name, devBase.type, devMap.uLoc, devMap.uHeight, devMap.description FROM mapping.devices as devMap LEFT JOIN base.devices as devBase ON devMap.typeid = devBase.id LEFT JOIN mapping.cabinets as devCab ON devMap.cabid = devCab.id LEFT JOIN project.rooms as cabRoom ON devCab.rid = cabRoom.id LEFT JOIN project.sites as siteRoom ON cabRoom.sid = siteRoom.id WHERE siteRoom.pid =?";
                	$results = $db_handle->prepareAndRunQuery($query,DB_MULTI_SCHEMA,"SELECT",'i',$_SESSION["project_id"]);
                	
                	if(!empty($results)){
                	    foreach($results as $cab) {
                	        echo "\n\t\t\t\t\t\t\t";
                	        echo "<h2>" . $cab['cabName'] . "</h2>";
                	        echo "<div class=\"clearfix\"></div>";
                	        echo "</div>";
                	        echo "<div class=\"x_content\">";
                	        echo "<table id=\"cabstable\" class=\"table table-bordered\">";
                	        echo "<thead>";
                	        echo "<tr>";
                	        echo "<th>U</th>";
                	        echo "<th>HP ID</th>";
                	        echo "<th>Name</th>";
                	        echo "<th>Type</th>";
                	        echo "</tr>";
                	        echo "</thead>";
                	        echo "<tbody>";
                	        for ($i = 42; $i >= 1; $i --) {
                	            echo "<tr>";
                	            echo "<th>" . $i . "</th>";
                	            if($i=$cab['uLoc']){
                	               // $i--;
                	               echo "<th>" . $cab['masterid'] . "</th>";
                	               echo "<th>" . $cab['name'] . "</th>";
                	               echo "<th>" . $cab['type'] . "</th>";                	            
                	            } elseif($i!=$cab['uLoc']){$i--;}
                	        }
                	        echo "</tr>";
                	    }}
                	    echo "\n"; */
                  ?>


									</tbody>
								</table>
								
								

							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-4 col-xs-8">
						<div class="x_panel">
							<div class="x_title">
								<h2>CAB A2</h2>

								<div class="clearfix"></div>
							</div>
							<div class="x_content">

								<table class="table table-bordered">
									<thead>
										<tr>
											<th>U</th>
											<th>HP ID</th>
											<th>Name</th>
											<th>Type</th>
										</tr>
									</thead>
									<tbody>
                     <?php
                    for ($i = 42; $i >= 1; $i --) {
                        echo "<tr>";
                        echo "<th>" . $i . "</th>";
                        echo "<th></th>";
                        echo "<th></th>";
                        echo "<th></th>";
                    }
                    echo "</tr>";
                    echo "\n";?>

									</tbody>
								</table>
								
								

							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-4 col-xs-8">
						<div class="x_panel">
							<div class="x_title">
								<h2>CAB A3</h2>

								<div class="clearfix"></div>
							</div>
							<div class="x_content">

								<table class="table table-bordered">
									<thead>
										<tr>
											<th>U</th>
											<th>HP ID</th>
											<th>Name</th>
											<th>Type</th>
										</tr>
									</thead>
									<tbody>
                     <?php
                    for ($i = 42; $i >= 1; $i --) {
                        echo "<tr>";
                        echo "<th>" . $i . "</th>";
                        echo "<th></th>";
                        echo "<th></th>";
                        echo "<th></th>";
                    }
                    echo "</tr>";
                    echo "\n";?>

									</tbody>
								</table>
								
								

							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-4 col-xs-8">
						<div class="x_panel">
							<div class="x_title">
								<h2>CAB A4</h2>

								<div class="clearfix"></div>
							</div>
							<div class="x_content">

								<table class="table table-bordered">
									<thead>
										<tr>
											<th>U</th>
											<th>HP ID</th>
											<th>Name</th>
											<th>Type</th>
										</tr>
									</thead>
									<tbody>
                     <?php
                    for ($i = 42; $i >= 1; $i --) {
                        echo "<tr>";
                        echo "<th>" . $i . "</th>";
                        echo "<th></th>";
                        echo "<th></th>";
                        echo "<th></th>";
                    }
                    echo "</tr>";
                    echo "\n";?>

									</tbody>
								</table>
								
								

							</div>
						</div>
					</div>

					<!-- /page content -->


				</div>
			</div>
			</form>
		</div>
	</div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/footer.html"); ?>
