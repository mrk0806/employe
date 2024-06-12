 <!-- /.modal -->
 <div class="modal fade" id="modal-add">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Large Modal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="post" id="menuForm">
            <div style="width: 100%; display: none;" id="reader"></div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Item Code</label>
                <div class="col-sm-8">
                  <div class="input-group">
                  <input type="text" name="item_code" id="item_code" class="form-control" required="required">
                  <button class="btn btn-outline-secondary" type="button" id="scan_opname"><i
                      class="fa fa-qrcode"></i></button>
                  <span class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Stock Code</label>
                <div class="col-sm-8">
                  <input type="text" name="stock_code" id="stock_code" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Description</label>
                <div class="col-sm-8">
                  <input type="text" name="description" id="description" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Size</label>
                <div class="col-sm-8">
                  <input type="text" name="size" id="size" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Brand</label>
                <div class="col-sm-8">
                  <input type="text" name="brand" id="brand" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Group</label>
                <div class="col-sm-8">
                  <input type="text" name="group" id="group" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Base Unit</label>
                <div class="col-sm-8">
                  <input type="text" name="base_unit" id="base_unit" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Inventory On Hand</label>
                <div class="col-sm-8">
                  <input type="text" name="inventory_onhand" id="inventory_onhand" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Retail Price</label>
                <div class="col-sm-8">
                  <input type="text" name="retail_price" id="retail_price" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Retail Tag</label>
                <div class="col-sm-8">
                  <input type="text" name="retail_tag" id="retail_tag" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>

            </form>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btn_save" onclick="save()">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->