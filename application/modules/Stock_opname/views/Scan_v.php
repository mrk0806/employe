<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= APPS_NAME ?> | <?= ucwords(str_replace('_', ' ', $this->router->class)) ?></title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
   
    <?= $this->load->view('templates/navbar'); ?>

    <!-- Main Sidebar Container -->
    <?= $this->load->view('templates/main-sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $nama_submenu ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><?= $nama_menu ?></a></li>
                <li class="breadcrumb-item active"><?= $nama_submenu ?></li>
              </ol>
            </div><!-- /.col -->
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <div class="card">
                <div class="card-header">
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <div class="input-group mb-3">
                  <input enterkeyhint="Next" type="text" id="input_opname" class="form-control" placeholder="Scan Item Code">
                  <button class="btn btn-outline-secondary" type="button" id="scan_opname"><i
                      class="fa fa-qrcode"></i></button>
                </div>


                <form action="" method="post" id="menuForm">

                <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Item Code</label>
                <div class="col-sm-8">
                  <input type="text" name="item_code" id="item_code" class="form-control" required="required">
                  <span class="help-block"></span>
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
                <label class="col-sm-4 col-form-label">Stock Sistem</label>
                <div class="col-sm-8">
                  <input type="text" name="inventory_onhand" id="inventory_onhand" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Stock Fisik</label>
                <div class="col-sm-8">
                  <input type="text" name="stock_fisik" id="stock_fisik" class="form-control" required="required">
                  <span class="help-block"></span>
                </div>
              </div>
              <button type="button" class="btn btn-primary" id="btn_save" onclick="save()">Save changes</button>

</form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?= $this->load->view('templates/footer'); ?>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?= $this->load->view('modals/modal_scan'); ?>

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/camera/html5-qrcode.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->
    <script>

const modal = $('#modal-lg'); // Replace with your modal selector

modal.on('hidden.bs.modal', () => {
  stopScan()
});

// Fungsi untuk menghentikan pemindaian
function stopScan() {
  if (html5QrcodeScanner) {
    html5QrcodeScanner.clear();
  }
  $('#modal-lg').modal('hide');
}

    var html5QrcodeScanner; // Deklarasikan variabel scanner di luar fungsi untuk bisa diakses dari fungsi lain

function scan(scan_id) {
  html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", {
      fps: 10,
      qrbox: 250
    });

  function onScanSuccess(decodedText, decodedResult) {
    html5QrcodeScanner.clear();
    $('#modal-lg').modal('hide');
    proses(decodedText);
  }
  // Mulai pemindaian
  html5QrcodeScanner.render(onScanSuccess);
}



function proses(id) {
  // alert(id);
  $.ajax({
        url: "<?php echo base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both'); ?>edit/" +
          id,
        type: "GET",
        dataType: "JSON",
        success: function(result) {
          data = result.data;

          if (result.status == 'success') {
            resetForm();
            $('#item_code').prop('disabled', true);
            $('[name="item_code"]').val(data.item_code);
            $('[name="stock_code"]').val(data.stock_code);
            $('[name="description"]').val(data.description);
            $('[name="size"]').val(data.size);
            $('[name="inventory_onhand"]').val(data.inventory_onhand);
          } else {
            alert(result.message);
          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error get data from ajax');
        }
      });
    }


    function resetForm() {
      $('#menuForm')[0].reset();
      $('#item_code').prop('disabled', false);
      $('.help-block').empty();
    }


$("#scan_opname").click(function() {
    $('#modal-lg').modal('show');
    scan();
  });

  $("#input_opname").on('keyup', function(event) {
    if (event.key === "Enter" || event.keyCode == 9) {
      let item_code = $(this).val().trim();
      $("#input_opname").val('');
      proses(item_code)
    }
  });


  function save(){
    $('#item_code').prop('disabled', false);
    let data_save = $('#menuForm').serializeArray();
    alert('berhasil di save');
    console.log(data_save);
    resetForm()
  }


    </script>
</body>

</html>