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
 
    <?= $this->load->view('templates/footer'); ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>

    <?= $this->load->view('modal_akses'); ?>

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
  function reload() {
    table.ajax.reload(null, false);
  }

  $(window).resize(function() {
  if ($(window).width() <= 768) { // Adjust breakpoint as needed
      $('#tableMenuModal').DataTable().ajax.reload(null, false);
    }
  });

  function edit(id) {
    $('#modal-lg').modal('show');
    $('.modal-title').text('Edit <?= $nama_submenu ?>');
    $('#tableMenuModal').DataTable().ajax.url(
      "<?php echo base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both'); ?>edit_akses/" + id
    ).load();
  }


  function update(id, isChecked) {
    const initialChecked = !isChecked;
    console.log(initialChecked)
    let data = id.split('|');

    let kode = data[0];
    let inisial = data[1];
    let status = isChecked ? 1 : 0;

    $.ajax({
      url: "<?php echo base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both'); ?>edit",
      type: "POST",
      data: {
        id: kode,
        inisial: inisial,
        status: status
      },
      dataType: "JSON",
      success: function(result) {
        if(!result.status){
          alert(result.message);
          $(`[data-id="${id}"]`).prop('checked', initialChecked);
          $('#tableMenuModal').DataTable().ajax.reload(null, false);
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error get data from ajax');
      }
    });
  }



  document.addEventListener("DOMContentLoaded", function(event) {

    $('#tableMenuModal').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
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
        },
        {
          "No": "No",
          "sClass": "text-center"
        },
        {
          "Nama": "Nama",
          "sClass": "text-left"
        },
        {
          "level": "level",
          "sClass": "text-left"
        },
        {
          "#": "#",
          "sClass": "text-center"
        },
        {
          "#": "#",
          "sClass": "text-center"
        },
        
      ],
    });

    table = $('#tableMenu').DataTable({
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

  });
  </script>
</body>

</html>