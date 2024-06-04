
    <!-- /.modal -->
    <div class="modal fade" id="modal-lg">
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

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Kode</label>
                <div class="col-sm-8">
                  <input type="text" name="kode" id="kode" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Nama</label>
                <div class="col-sm-8">
                  <input type="text" name="nama" id="nama" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Class/method</label>
                <div class="col-sm-8">
                  <input type="text" name="url" id="url" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Icon</label>
                <div class="col-sm-8">
                  <input type="text" name="icon" id="icon" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Level</label>
                <div class="col-sm-8">
                  <select class="custom-select rounded-0" name="level" id="level">
                    <option value="" selected disabled>-- pilih --</option>
                    <option value="main_menu">Main Menu</option>
                    <option value="sub_menu">Sub Menu</option>
                  </select>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Main Menu</label>
                <div class="col-sm-8">
                  <input type="text" name="mainmenu" id="mainmenu" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="status">
                    <label class="custom-control-label" for="status"></label>
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Nomor Urut</label>
                <div class="col-sm-8">
                  <input type="text" name="nourut" id="nourut" class="form-control" required="required">
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