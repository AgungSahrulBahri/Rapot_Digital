<!doctype html>
<html lang="en">

<head>
    <?php $this->load->view('partials/head.php') ?>
</head>

<body>
    <!-- navbar -->
    <?php $this->load->view('/partials/navbar.php') ?>
    <!-- End Navbar-->
    <div class="app-main">
        <!-- Sidebar -->
        <?php $this->load->view('/partials/sidebar.php') ?>

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
                            <div class="card-body">
                                <h5 class="card-title">Data Operator</h5>

                                <form method="post" action="<?php echo base_url(); ?>nilai/add">

                                    <div class="form-row">

                                        <div class="form-group col-md-3">
                                            <label for="">Rombel</label>

                                            <select class="form-control" name="rombel">
                                                <option selected disabled>-pilih-</option>
                                                <?php foreach($rombel as $r){ ?>
                                                <option value="<?php echo $r->id_rombel; ?>"><?php echo $r->rombel; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                            <?= form_error('rombel') ?>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Jenis Ujian</label>
                                            <select class="form-control" name="jenis">
                                                <option selected disabled>-pilih-</option>
                                                <?php foreach($jenis as $j){ ?>

                                                <option value="<?php echo $j->id_jenis; ?>">
                                                    <?php echo $j->nama_ujian; ?></option>
                                                <?php } ?>
                                            </select>
                                            <?= form_error('jenis') ?>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Kategori</label>
                                            <select class="form-control" name="kategori">
                                            <option selected disabled>-pilih-</option>
                                            <?php  foreach ($kategori as $k) { ?>
                                                <option value="<?php echo $k->id_kategori ?>">
                                                    <?php echo $k->nama_kategori ?></option>
                                                <?php } ?>
                                            </select>
                                            <?= form_error('kategori') ?>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Mapel</label>
                                            <select class="form-control" name="mapel">
                                            <option selected disabled>-pilih-</option>
                                                <?php  foreach ($mapel as $m) { ?>
                                                <option value="<?php echo $m->id_mapel ?>"><?php echo $m->mapel ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                            <?= form_error('mapel') ?>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-4"
                                            style="margin-left: 87.3%;  height: 40px; width: 8rem">OK</button>

                                    </div>

                            </div>

                            </form>
                            <table class="mb-0 table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama </th>
                                        <th>Nilai</th>
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