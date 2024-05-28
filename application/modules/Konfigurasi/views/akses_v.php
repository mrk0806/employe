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
                <!-- <div class="card-header">

                </div> -->
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="tableMenu" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      <th>No</th>
                      <th>Level User</th>
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
    <div class="modal fade" id="modal-lg-2">
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
                <label class="col-sm-4 col-form-label">Level User</label>
                <div class="col-sm-8">
                  <select class="custom-select rounded-0" name="level" id="level">
                    <option value="" selected disabled>-- pilih --</option>
                    <option value="admin">Admin</option>
                    <option value="karyawan">Karyawan</option>
                  </select>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Akses</label>
                <div class="col-sm-8">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="akses">
                    <label class="custom-control-label" for="akses"></label>
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Tambah</label>
                <div class="col-sm-8">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="tambah">
                    <label class="custom-control-label" for="tambah"></label>
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Edit</label>
                <div class="col-sm-8">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="edit">
                    <label class="custom-control-label" for="edit"></label>
                  </div>
                  <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Hapus</label>
                <div class="col-sm-8">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="hapus">
                    <label class="custom-control-label" for="hapus"></label>
                  </div>
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
            <a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="add_akses()">
              <i class="fas fa-plus"></i>
              Add Akses
            </a>
            </br>
            <table id="tableMenu2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Menu</th>
                  <th>Level User</th>
                  <th>Akses</th>
                  <th>Tambah</th>
                  <th>Edit</th>
                  <th>Hapus</th>
                </tr>
              </thead>
              <tbody>

              </tbody>

            </table>
            <div class="modal-footer justify-content-between">
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

    function add_akses() {
      $('#modal-lg').modal('hide');
      $('#modal-lg-2').modal('show');
      $('.modal-title').text('Add <?= $nama_submenu ?>');
    }

    function save() {
      $("#btn_save").html(
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...');
      $("#btn_save").attr('disabled', true);
      $('#kode').prop('disabled', false);
      let data_save = $('#menuForm').serializeArray();

      let statusValue = $('#status').is(':checked') ? 1 : 0;
      data_save.push({
        name: 'status',
        value: statusValue
      });

      $.ajax({
        url: "<?php echo base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both'); ?>add",
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

   
    function edit(id) {
      $('#modal-lg').modal('show');
      $('.modal-title').text('Edit <?= $nama_submenu ?>');
      $('#tableMenu2').DataTable().ajax.url("<?php echo base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both'); ?>edit_akses/" + id).load();
    }

    function removeErrorOnChange(selector) {
      $(selector).change(function() {
        $(this).parent().removeClass('has-error');
        $(this).next().empty();
      });
    }

    function updateAkses(id, isChecked){
      let data = id.split('|');

      let kode = data[0];
      let inisial = data[1];
      let status = isChecked ? 1:0;

      $.ajax({
        url: "<?php echo base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both'); ?>updateAkses",
        type: "POST",
        data: {
          id : kode,
          inisial : inisial,
          status : status
        },
        dataType: "JSON",
        success: function(result) {
          console.log(result);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error get data from ajax');
        }
      });
    }
    


    $(function() {
      
        $('#tableMenu2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true
        });

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
            "level": "level",
            "sClass": "text-left"
          },
          {
            "#": "#",
            "sClass": "text-center"
          }
        ],

      });

      const selectors = ["#kode", "#nama", "#url", "#level", "#nourut"];

      selectors.forEach(function(selector) {
        removeErrorOnChange(selector);
      });

    });
    </script>
</body>

</html>