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
								<h2>CAB A1</h2>

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
                    $sum = 0;
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
                    $sum = 0;
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
