<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Sistem Pengelolaan Data Penduduk</title>
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>/assets/images/logo_barsel.png" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/login_/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="<?php echo base_url(); ?>/assets/images/logo_barsel.png" width="130" alt="">
                </a>
                <p class="text-center">SISTEM PENGELOLAAN DATA PENDUDUK <BR>DESA PENARUKAN</p>
                  <?php
                  if ($this->session->flashdata('gagal')) {
                    ?>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <?php echo $this->session->flashdata('gagal'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                          <?php
                  }
                  ?>
                <form action="<?php echo base_url('login/auth'); ?>" method="post" class="" role="form">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 fs-4 mb-4 rounded-2">Sign In</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>assets/login_/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/login_/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>