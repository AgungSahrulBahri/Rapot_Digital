<!doctype html>
<html lang="en">
<head>
<?php $this->load->view('partials/head.php') ?>
</head>
<body>
    <!-- navbar -->
        <?php $this->load->view('partialsguru/navbar.php') ?>
    <!-- End Navbar-->
        <div class="app-main">
    <!-- Sidebar -->
        <?php $this->load->view('partialsguru/sidebar.php') ?>

    <!-- End Sidebar -->
               
                <div class="app-main__outer">
                    <div class="app-main__inner">
                 
                     <div class="row">
                        <?php if($hapus = $this->session->flashdata('hapus')): ?>
                          <div id="notif" class="alert alert-success alert-block">
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
                                    <div class="card-body"><h5 class="card-title">Input Prestasi Siswa</h5>
                                      <form method="post" action="<?php echo base_url(); ?>ps/add_prestasi">
                                      
                                                  <div class="form-row">
        
                                                            <div class="form-group col-md-3">
                                                              <label for="">Pilih Semester</label>
                                                              <select class="form-control" name="semester" >
                                                              <option value="" disabled selected>-pilih-</option>
                                                             <?php foreach($semester as $s){ ?>
                                                                <option value="<?php echo $s->id_semester; ?>"><?php echo $s->semester; ?></option>
                                                                <?php } ?>
                                                              </select>
                                                              <?= form_error('semester')?>
                                                            </div>
                                                          
                                                           <div class="form-group col-md-3">
                                                              <input type="hidden" name="rombel" value="<?php echo $this->session->userdata('id_rombel') ?>">
                                                            
                                                             <button type="submit" class="btn btn-primary mt-4" style="height: 40px; width: 5rem">OK</button>
                                                           
                                                            </div>                                                            

                                                          </div>

                                        </form>

                                         <table class="mb-0 table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nis</th>
                                                <th>Nama </th>
                                                <th>Rombel</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                               
                                            </tr>
                                            
                                            </tbody>

                                        </table>
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
