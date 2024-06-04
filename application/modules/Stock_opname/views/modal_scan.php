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
                <label class="col-sm-4 col-form-label">NIK</label>
                <div class="col-sm-8">
                  <input type="text" name="nik" id="nik" class="form-control" required="required">
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
                <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-8">
                  <input type="date" name="tgl_lhr" id="tgl_lhr" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Tanggal Masuk</label>
                <div class="col-sm-8">
                  <input type="date" name="tgl_msk" id="tgl_msk" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Tanggal Keluar</label>
                <div class="col-sm-8">
                  <input type="date" name="tgl_klr" id="tgl_klr" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>


              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Divisi</label>
                <div class="col-sm-8">
                  <select class="custom-select rounded-0" name="divisi" id="divisi">
                    <option value="" selected disabled>-- pilih --</option>
                    <option value="it">IT</option>
                    <option value="hrd">HRD</option>
                    <option value="finance">Finance</option>
                    <option value="accounting">Accounting</option>
                  </select>
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