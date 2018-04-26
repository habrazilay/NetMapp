<!--<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/loginVerify.php"); ?>-->
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/header.html"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/sidebar_menu.html"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/menu_footer.html"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/top_navigation.html"); ?>

<!-- /page content -->

<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Devices</h3>
              </div>

            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Devices list</h2>
                    
                    <ul class="nav navbar-right panel_toolbox">
                    
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>CAB</th>
                          <th>HP ID</th>
                          <th>Type</th>
                          <th>Model</th>
                          <th>Name</th>
                          <th>U Position</th>
                          <th>U Height</th>
                          <th>Description</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php 
                            require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/dbcontroller.php");
                            require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
                            $db_handle = new DBController(DB_MULTI_SCHEMA);
                            $query = "SELECT devCab.name as cabName, devMap.masterid, devBase.model, devMap.name, devBase.type, devMap.uLoc, devMap.uHeight, devMap.description FROM mapping.devices as devMap LEFT JOIN base.devices as devBase ON devMap.typeid = devBase.id LEFT JOIN mapping.cabinets as devCab ON devMap.cabid = devCab.id";                                                      
                            $results = $db_handle->runQuery($query,DB_MULTI_SCHEMA,"SELECT");
                                foreach($results as $row) {
                                    echo "\n\t\t\t\t\t\t\t";
                                    echo "<tr>";
                                    echo "<td>" . $row['cabName'] . "</td>";
                                    echo "<td>" . $row['masterid'] . "</td>";
                                    echo "<td>" . $row['type'] . "</td>";
                                    echo "<td>" . $row['model'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['uLoc'] . "</td>";
                                    echo "<td>" . $row['uHeight'] . "</td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "</tr>";
                                    }
                                    echo "\n";
                         ?>
                         
                      </tbody>
                    </table>

                  </div>
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>

<!-- /page content -->

<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/footer.html"); ?>
    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdf",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
              
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
