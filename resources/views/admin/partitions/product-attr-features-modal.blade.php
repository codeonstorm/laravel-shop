<div class="modal fade" id="features" style="background: #343a4057;">
    <div class="modal-dialog" style="min-width: 94%;">
      <div class="modal-content" id="descc" >
        <form id="attrFeaturesFrm" method="post" action="{{url('admin/product/features')}}">
          @csrf
          <!-- Profile Image -->
          <div class="card">
            <div style="float:right; width:100%; margin-right:6px;height:100%; ">
              <aside class="side-nav" id="show-side-navigation1">
              <h1 align="center" style="color:cadetblue; margin-top:8px; font-weight:bold;">Features</h1>
              <button type="button" class="btn btn-tool" id="new_heading" data-card-widget="collapse" style="
              border: 1px solid #c33b15;"><i class="fas fa-plus"></i>Create New Heading</button>
                <div class="col-sm-12 p-4">
                  <!--media-->
                  <div class="form-group col-md-12">
                    <label>Heading: </label>
                    <input type="text" class="form-control" name="heading[]" value="" onchange="change_field(this)" placeholder="Enter heading">
                  </div>
                      <div id="featured_box">
                        <div class="box row">
                          <div class="form-group col-md-5">
                            <input type="text" class="form-control key" name="key" value="" placeholder="Enter Key">
                          </div>
                          <div class="form-group col-md-5">
                            <input type="text" class="form-control value" name="value" value="" placeholder="Enter Value">
                          </div>
                        </div>
                      </div>

                    <button type="button" class="btn btn-tool more_field" onclick="more_field(this)" data-card-widget="collapse" style="
                    float: right; border: 1px solid #c33b15; border-radius: 50%;"><i class="fas fa-plus"></i></button>

                  <!--//media-->
                </div>


            </aside>

              <!-- /.card-body -->
          </div>
          <!-- /.col -->
          <div class="modal-footer">
              <button type="submit" class="filter btn btn-info">Apply</button><button type="button" class="btn  btn-danger btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          </div>
      </form>
  </div>
</div>
</div>
</div>
