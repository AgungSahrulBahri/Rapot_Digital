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
                                    <div class="card-body"><h5 class="card-title">Data Siswa</h5>
                                        <form method="post" action="<?php base_url('ps/datarapot') ?>">
                                        <input type="hidden" name="rombel" value="<?php echo $this->session->userdata('id_rombel') ?>">
                                        
                                      
                                                  <div class="form-row">
        
                                                            <div class="form-group col-md-3">
                                                              <label for="">Semester</label>
                                                              <select class="form-control" name="semester" >
                                                                <option value="" disabled selected>-pilih-</option>
                                                             <?php foreach($semester as $r){ ?>
                                                                <option <?php if($_POST['semester'] == $r->id_semester){ echo 'selected="selected"'; } ?> value="<?php echo $r->id_semester; ?>"><?php echo $r->semester; ?></option>
                                                                <?php } ?>
                                                              </select>
                                                            </div>
                                                          
                                                           <div class="form-group col-md-3">
                                                              <input type="hidden" name="mapel" value="<?php echo $this->session->userdata('id_mapel') ?>">
                                                            
                                                             <button type="submit" class="btn btn-primary mt-4" style="height: 40px; width: 5rem">OK</button>
                                                           
                                                            </div>                                                            

                                                          </div>

                                        </form>
                                        <table class="mb-0 table table-striped">

                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nis</th>
                                                <th>Nama </th>
                                                <th>Rombel</th>
                                                <th colspan="2" class="text-center">Aksi</th>
                                            </tr>
                                            </thead>
                                             
                                            <tbody>
                                                <?php 
                                                $no = 1;

                                                foreach ($siswa as $key) {
                                                  ?>
                                                
                                                <tr>
                                                  <td><?php echo $no++ ?></td>
                                                  <td><?php echo $key->nis ?></td>
                                                  <td><?php echo $key->nama ?></td>
                                                  <td><?php echo $key->rombel ?></td>
                                                  <td class="text-center"><a href="<?php echo base_url()?>ps/datarapotdetail/<?= $this->input->post('semester')?>/<?= $key->nis; ?>">Cetak Nilai</a></td>
                                                
                                                </tr>
                                              <?php 
                                                  }
                                                 ?>


                                            
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="<?php echo base_url('assets/scripts/main.js') ?>"></script></body>
</html>
