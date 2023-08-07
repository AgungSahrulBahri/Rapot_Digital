<!doctype html>
<html lang="en">
<head>
<?php $this->load->view('partials/head.php') ?>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/login/images/icons/favicon.ico') ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/bootstrap/css/bootstrap.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/animate/animate.css') ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/css-hamburgers/hamburgers.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/animsition/css/animsition.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/select2/select2.min.css') ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/daterangepicker/daterangepicker.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/util.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/main.css') ?>">
<!--===============================================================================================-->
</head>
<body>
    <!-- navbar -->
        <?php $this->load->view('partialstu/navbar.php') ?>
    <!-- End Navbar-->
        <div class="app-main">
    <!-- Sidebar -->
        <?php $this->load->view('partialstu/sidebar.php') ?>

    <!-- End Sidebar -->
               
                <div class="app-main__outer">
                    <div class="app-main__inner">
                 
                     <div class="row">
                        <?php if($hapus = $this->session->flashdata('hapus')): ?>
                          <div id="notif" class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <?= $hapus ?>
                          </div>
                        <?php endif ?>
                        <?php if($simpan = $this->session->flashdata('simpan')): ?>
                          <div id="notif" class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <?= $simpan ?>
                          </div>
                        <?php endif ?>
                          <?php if($update = $this->session->flashdata('update')): ?>
                          <div id="notif" class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <?= $update ?>
                          </div>
                        <?php endif ?>

                            
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Change Password</h5>
                                        <?php echo validation_errors(); ?>
                                        <form method="post" action="<?php echo base_url(); ?>tu/update_password" class="login100-form validate-form">

                                            <div class="wrap-input100 validate-input m-b-26" data-validate="Password Old is required">
                                                <span class="label-input100">Password Old</span>
                                                <input class="input100"  type="password" name="old_password" placeholder="Masukkan Password Lama">
                                                <span class="focus-input100"></span>
                                            </div>

                                            <div class="wrap-input100 validate-input m-b-18" data-validate = "New Password is required">
                                                <span class="label-input100">New Password</span>
                                                <input class="input100" type="password" name="new_password" minlength="8" placeholder="Masukkan Password Baru">
                                                <span class="focus-input100"></span>
                                            </div>

                                             <div class="wrap-input100 validate-input m-b-18" data-validate = "Confirmation Password is required">
                                                <span class="label-input100">Confirmation Password</span>
                                                <input class="input100" type="password" name="confirm_password" minlength="8" placeholder="Masukkan Confirmation Password Baru">
                                                <span class="focus-input100"></span>
                                            </div>

                                            <div class="container-login100-form-btn">
                                                <button class="login100-form-btn bg-primary" style="width: 50vh">
                                                    Submit
                                                </button>
                                            </div>

                                        </form>

                                         
                                    </div>
                                </div>
                            </div>


                        </div>  
                    </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
                <script>
                    setTimeout(function() {
                    $('#notif').fadeOut('slow');}, 3000
                    );
                </script>
        </div>
    </div>
<script type="text/javascript" src="<?php echo base_url('assets/scripts/main.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/scripts/jquery.min.js') ?>"></script>
</body>
</html>
