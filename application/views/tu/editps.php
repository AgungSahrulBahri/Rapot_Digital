<!doctype html>
<html lang="en">
<head>
<?php $this->load->view('partials/head.php') ?>
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
                          <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <?= $hapus ?>
                          </div>
                        <?php endif ?>
                        <?php if($simpan = $this->session->flashdata('simpan')): ?>
                          <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <?= $simpan ?>
                          </div>
                        <?php endif ?>
                          <?php if($update = $this->session->flashdata('update')): ?>
                          <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <?= $update ?>
                          </div>
                        <?php endif ?>

                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Edit Data Pembimbing Siswa</h5>

                                      <form method="post" action="<?php echo base_url('Tu/fungsieditps')?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="<?php echo $queryPsDetail->id_ps; ?>" name="id_ps" hidden> 
                                        </div>
                                        <div class="form-group">
                                            <label>Rombel</label>
                                            <select class="form-control" name="rombel">
                                              <option value="" disabled selected>-pilih-</option>
                                            <?php foreach($rombel as $r){ ?>
                                              <option  value="<?php echo $r->id_rombel; ?>" <?=$r->id_rombel == $queryPsDetail->id_rombel ? "selected" : null ?>><?php echo $r->rombel; ?></option>
                                            <?php } ?>
                                            </select>
                                            <?= form_error('rombel')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" value="<?php echo $queryPsDetail->nama_ps; ?>" name="nama"> 
                                            <?= form_error('nama')?>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" value="<?php echo $queryPsDetail->username; ?>" name="username"> 
                                            <?= form_error('username')?>
                                        </div>               
                                          <div class="row">
                                          <div class="col-md-10">
                                          </div>
                                          <button type="submit" class="btn btn-primary mt-4" style="height: 40px; width: 11rem; margin-left: 4%;">Simpan</button>
                                          <button type="button" class="btn btn-secondary mt-4" id="back" style="height: 40px; width: 11rem; margin-left: 4%;">Kembali</button>
                                          </div>
                                      </form>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
                <script>
                    document.getElementById('back').onclick = function(){
                        location.href = "<?php echo base_url('Tu/ps')?>";
                    }
                </script>
        </div>
    </div>
<script type="text/javascript" src="<?php echo base_url('assets/scripts/main.js') ?>"></script></body>
</html>
