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
                        <th>Item Code</th>
                        <th>Stock Code</th>
                        <th>Description</th>
                        <th>Size</th>
                        <th>Brand</th>
                        <th>Group</th>
                        <th>Base Unit</th>
                        <th>Inventory</th>
                        <th>Retail Price</th>
                        <th>Retail Tag</th>
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
    <!-- ./wrapper -->

    <?= $this->load->view('modal_item_master'); ?>

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
      $('#item_code').prop('disabled', false);
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
      $('#item_code').prop('disabled', false);
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
            $('#item_code').prop('disabled', true);
            $('[name="item_code"]').val(data.item_code);
            $('[name="stock_code"]').val(data.stock_code);
            $('[name="description"]').val(data.description);
            $('[name="size"]').val(data.size);
            $('[name="brand"]').val(data.brand);
            $('[name="group"]').val(data.group);
            $('[name="base_unit"]').val(data.base_unit);
            $('[name="inventory_onhand"]').val(data.inventory_onhand);
            $('[name="retail_price"]').val(data.retail_price);
            $('[name="retail_tag"]').val(data.retail_tag);
            $('#modal-lg').modal('show');
            $('#btn_save').text('Edit');
            $('.modal-title').text('Edit <?= $nama_submenu ?>');
          } else {
            alert(result.message);
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
            "item_code": "item_code",
            "sClass": "text-left"
          },
          {
            "stock_code": "stock_code",
            "sClass": "text-left"
          },
          {
            "description": "description",
            "sClass": "text-left"
          },
          {
            "size": "size",
            "sClass": "text-left"
          },
          {
            "brand": "brand",
            "sClass": "text-left"
          },
          {
            "group": "group",
            "sClass": "text-left"
          },
          {
            "base_unit": "base_unit",
            "sClass": "text-left"
          },
          {
            "inventory_onhand": "inventory_onhand",
            "sClass": "text-right"
          },
          {
            "retail_price": "retail_price",
            "sClass": "text-right"
          },
          {
            "retail_tag": "retail_tag",
            "sClass": "text-left"
          },
          {
            "#": "#",
            "sClass": "text-center"
          }
        ],

      });

      const selectors = ["#item_code", "#stock_code", "#description", "#size", "#brand", "#group","#base_unit", "#inventory_onhand", "#retail_price", "#retail_tag"];

      selectors.forEach(function(selector) {
        removeErrorOnChange(selector);
      });
    });
    </script>
</body>

</html>