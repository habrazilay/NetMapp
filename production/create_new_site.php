<?php include("./header.html"); ?>
<?php include("./sidebar_menu.html"); ?>
<?php include("./menu_footer.html"); ?>
<?php include("./top_navigation.html"); ?>
 
 
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

                    <form class="form-horizontal form-label-left">

                      
                      <span class="section">Site Details</span>

                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="site-name">Site name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="   " class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="site-location">Site location (city) <span></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="room-location" name="room-location" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="room-floor" class="control-label col-md-3 col-sm-3 col-xs-12">Site address</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="site-address" name="site-address" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                      <div class="x_title"></div>
                          <button type="button" class="btn btn-primary" id = "submit" style="float:right">Submit</button>
                          <button type="button" class="btn btn-danger" style="float:right">Cancel</button>                         
                        </div>
                      </div>
                    </form>             
            </div>
          </div>
        </div>
        <!-- /page content -->
      
        
<?php include("./footer.html"); ?>
  </body>
</html>