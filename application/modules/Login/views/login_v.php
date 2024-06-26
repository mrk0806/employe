<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= APPS_NAME ?> | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url() ?>"><b><?= APPS_NAME?></b>Trial</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="login/auth" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="NIK" name="nik" value="<?= $nik; ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span id="togglePasswordIcon" class="fas fa-lock" onclick="togglePassword()" style="cursor: pointer;"></span>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" <?= $remember; ?>>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

<!-- script tambahan -->
<script>
  var showPassword = false;
  function togglePassword() {
    var passwordInput = document.querySelector('[name="password"]');
    showPassword = !showPassword;
    
    if (showPassword) {
      passwordInput.type = 'text';
      document.getElementById('togglePasswordIcon').className = 'fas fa-lock-open';
    } else {
      passwordInput.type = 'password';
      document.getElementById('togglePasswordIcon').className = 'fas fa-lock';
    }
  }
</script>

<script>
$(document).ready(function(){
    $('form').submit(function(e){
        e.preventDefault();
        
        var nikValue = $('[name="nik"]').val();
        var passwordValue = $('[name="password"]').val();
        var formData = $(this).serializeArray();
       
        if(nikValue.trim() === '' || passwordValue.trim() === '') {
            alert('NIK dan Password harus diisi');
        } else {
            $.ajax({
                type: 'POST',
                url: 'login/auth',
                dataType:'json',
                data: formData,
                success: function(response){
                    if(response.success) {
                        alert(response.message);
                        window.location.href = '<?= base_url('dashboard'); ?>';
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error){
                    alert('error');
                }
            });
        }
    });
});
</script>
</body>
</html>