<?php include("./header.html"); ?>
<?php include("./sidebar_menu.html"); ?>
<?php include("./menu_footer.html"); ?>
<?php include("./top_navigation.html"); ?>
 
 
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

                    <form class="form-horizontal form-label-left">

                      
                      <span class="section">Room Details</span>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room-site">Select a site <span class="required">*</span>
                            </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control">
                            <option>Site 1</option>
                            <option>Site 2</option>
                            <option>Site 3</option>
                          </select>
                        </div>
                        </div>
                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room-name">Room name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="room-name" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room-location">Room location <span></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="room-location" name="room-location" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="room-floor" class="control-label col-md-3 col-sm-3 col-xs-12">Room floor</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="room-floor" class="date-picker form-control col-md-7 col-xs-12" required="required" type="number" style="width: 70px;" value="0">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Measure units <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default" data-toggle-class="btn-secondary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="measure" value="meters"> &nbsp; Meters &nbsp;
                                </label>
                                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="measure" value="tiles"> Tiles
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Length <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="room-lenght" class="date-picker form-control col-md-7 col-xs-12" required="required" type="number" style="width: 70px;" min="1" value="10">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Width <span class="required">*</span>
                                </label>
                                <input id="room-width" class="date-picker form-control col-md-7 col-xs-12" required="required" type="number" style="width: 70px;" min="1" value="10">
                            </div>
                          </div>
                            <div class="form-group">
                            <label for="cabinets-quantity" class="control-label col-md-3 col-sm-3 col-xs-12">Cabinets quantity</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="cabinets-quantity" class="date-picker form-control col-md-7 col-xs-12" required="required" type="number" style="width: 70px;" value="1">
                            </div>
                          </div>
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Room Description </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="room-description" required="required" name="room-description" class="form-control col-md-7 col-xs-12"></textarea>
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