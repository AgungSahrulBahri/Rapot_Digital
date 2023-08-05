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

                    
                        <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Data Guru</h5>

                                    <a href="<?= base_url('Tu/addguru') ?>" class="btn btn-primary mt-2 mb-4">Tambah Baru</a>
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
                                        <table class="mb-0 table table-striped">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Nama Guru</th>
                                                <th>Username </th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php
                                                $no = 1; 
                                                foreach ($dtguru as $key) {
                                                    ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $key->nip ?></td>
                                                <td><?php echo $key->nama_guru ?></td>
                                                <td><?php echo $key->username ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('Tu/gurumapel')?>/<?php echo $key->nip?>" style="margin-right: 30px;">Mapel Yang Diampu</a>
                                                    <a href="<?php echo base_url('Tu/editguru')?>/<?php echo $key->nip?>" style="margin-right: 30px;">Ubah Data</a>
                                                    <a href="<?php echo base_url('Tu/hapusguru')?>/<?php echo $key->nip?>">Hapus Data</a>
                                                </td>
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
