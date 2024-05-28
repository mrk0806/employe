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
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url() ?>assets/index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= base_url() ?>assets/dist/img/user1-128x128.jpg" alt="User Avatar"
                  class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= base_url() ?>assets/dist/img/user8-128x128.jpg" alt="User Avatar"
                  class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= base_url() ?>assets/dist/img/user3-128x128.jpg" alt="User Avatar"
                  class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

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
                  <a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="add()">
                    <i class="fas fa-plus"></i>
                    Add
                  </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="tableMenu" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Divisi</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>

                  </table>
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
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-<?= date('Y'); ?> <a href="#"><?= COMPANY_NAME ?></a>.</strong>
    </footer>

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

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

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
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->
    <script>
    let save_method;
    let save_url;


    function resetForm() {
      $('#menuForm')[0].reset();
      $("#btn_save").attr('disabled', false);
      $('.help-block').empty();
    }

    function reload() {
      table.ajax.reload(null, false);
    }

    function save() {
      $("#btn_save").html(
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...');
      $("#btn_save").attr('disabled', true);
      $('#nik').prop('disabled', false);
      let data_save = $('#menuForm').serializeArray();

      save_url = (save_method == "add") ? 'add' : 'update';

      $.ajax({
        url: "<?php echo base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both'); ?>" +
          save_url,
        type: "POST",
        data: data_save,
        dataType: "JSON",
        success: function(result) {
          console.log(result);
          let data = result;
          if (result.status) {
            alert(result.message);
            $('#modal-lg').modal('hide');
            reload();
          } else {
            if (result.inputerror) {
              for (var i = 0; i < data.inputerror.length; i++) {
                $('[name="' + data.inputerror[i] + '"]').parent().addClass('text-danger');
                $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
              }
            } else {
              alert(result.message);
            }
            $('#btn_save').text('Save');
            $('#btn_save').attr('disabled', false);
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error get data from ajax');
        }
      });
    }

    function add() {
      resetForm();
      save_method = "add";
      $('#modal-lg').modal('show');
      $('#nik').prop('disabled', false);
      $('#btn_save').text('Add');
      $('.modal-title').text('Add <?= $nama_submenu ?>');
    }

    function hapus(id) {
      if (confirm(`Are you sure you want to delete ${id}?`)) {
        $.ajax({
          url: "<?php echo base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both'); ?>delete/" +
            id,
          type: 'POST',
          dataType: 'json',
          success: function(result) {
            if (result.status == true) {
              alert(result.message);
            } else {
              alert(result.message);
            }
            reload();
          },
          error: function() {
            alert('Error deleting item.');
          }
        });
      }
    }

    function edit(id) {
      save_method = "update";
      $.ajax({
        url: "<?php echo base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both'); ?>edit/" +
          id,
        type: "GET",
        dataType: "JSON",
        success: function(result) {
          data = result.data;

          if (result.status == 'success') {
            resetForm();
            $('#nik').prop('disabled', true);
            $('[name="nik"]').val(data.nik);
            $('[name="nama"]').val(data.nama_lengkap);
            $('[name="tgl_lhr"]').val(data.tgl_lahir);
            $('[name="tgl_msk"]').val(data.tgl_masuk);
            $('[name="tgl_klr"]').val(data.tgl_keluar);
            $('[name="divisi"]').val(data.divisi);
            $('#modal-lg').modal('show');
            $('#btn_save').text('Edit');
            $('.modal-title').text('Edit <?= $nama_submenu ?>');
          } else {
            alert('Error get data from ajax');
          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error get data from ajax');
        }
      });
    }


    function removeErrorOnChange(selector) {
      $(selector).change(function() {
        $(this).parent().removeClass('has-error');
        $(this).next().empty();
      });
    }

    $(function() {
      table = $('#tableMenu').DataTable({
        "buttons": ["copy", "excel", "pdf"],
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "ajax": {
          "url": "<?php echo base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both'); ?>get_list",
          "type": "POST",
        },
        "aoColumns": [{
            "No": "No",
            "sClass": "text-center"
          },
          {
            "nik": "nik",
            "sClass": "text-left"
          },
          {
            "nama": "nama",
            "sClass": "text-left"
          },
          {
            "tgl_lhr": "tgl_lhr",
            "sClass": "text-left"
          },
          {
            "tgl_msk": "tgl_msk",
            "sClass": "text-center"
          },
          {
            "tgl_klr": "tgl_klr",
            "sClass": "text-center"
          },
          {
            "divisi": "divisi",
            "sClass": "text-center"
          },
          {
            "#": "#",
            "sClass": "text-center"
          }
        ],

      });

      const selectors = ["#nik", "#nama", "#tgl_lhr", "#tgl_msk", "#tgl_klr", "#divisi"];

      selectors.forEach(function(selector) {
        removeErrorOnChange(selector);
      });
    });
    </script>
</body>

</html>