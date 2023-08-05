<!doctype html>
<html lang="en">

<head>
    <?php $this->load->view('partials/head.php') ?>
</head>

<body>
    <!-- navbar -->
    <?php $this->load->view('partials/navbar.php') ?>
    <!-- End Navbar-->
    <div class="app-main">
        <!-- Sidebar -->
        <?php $this->load->view('partials/sidebar.php') ?>

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
                                                <?php foreach($rombel as $r){ ?>
                                                <option <?php if($_POST['rombel'] == $r->id_rombel){ echo 'selected="selected"'; } ?> value="<?php echo $r->id_rombel ?>"><?php echo $r->rombel?> 
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Jenis Ujian</label>
                                            <select class="form-control" name="jenis">
                                                <?php foreach($jenis as $j){ ?>
                                                <option <?php if($_POST['jenis'] == $j->id_jenis){ echo 'selected="selected"'; } ?> value="<?php echo $j->id_jenis; ?>">
                                                    <?php echo $j->nama_ujian; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Kategori</label>
                                            <select class="form-control" name="kategori">
                                                <?php  foreach ($kategori as $k) { ?>
                                                <option <?php if($_POST['kategori'] == $k->id_kategori){ echo 'selected="selected"'; } ?> value="<?php echo $k->id_kategori ?>">
                                                    <?php echo $k->nama_kategori ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Mapel</label>
                                            <select class="form-control" name="mapel">
                                                <?php  foreach ($mapel as $m) { ?>
                                                <option <?php if($_POST['mapel'] == $m->id_mapel){ echo 'selected="selected"'; } ?> value="<?php echo $m->id_mapel ?>"><?php echo $m->mapel ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-4"
                                            style="margin-left: 87.3%;  height: 40px; width: 8rem">OK</button>

                                    </div>

                            </div>

                            </form>
                            <form method="post" action="<?php echo base_url(); ?>nilai/save">
                                <table class="mb-0 table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nis</th>
                                            <!-- <th>Jenis</th>
                                                <th>Kategori</th> -->
                                            <th>Mapel</th>
                                            <th>Nama </th>
                                            <th>Nilai</th>

                                        </tr>
                                    </thead>
                                    <?php 
											$no = 1;
											foreach($nilai as $key){ 
												?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $no++ ?></th>
                                            <td><?php echo $key->nis ?>
                                                <input type="hidden" name="nis[]" value="<?php echo $key->nis ?>">
                                            </td>
                                            <input type="hidden" name="id[]" value="<?php echo $key->id ?>"></td>

                                            <input type="hidden" name="jenis[]"
                                                value="<?php echo $this->input->post('jenis') ?>">
                                            <input type="hidden" name="kategori[]"
                                                value="<?php echo $this->input->post('kategori') ?>">

                                            <td><input type="text" name="mapel[]"
                                                    value="<?php echo $this->input->post('mapel') ?>"></td>
                                            </td>
                                            <td><?php echo $key->nama ?></td>
                                            <td>
                                                <input type="text " class="" name="nilai[]"
                                                    value="<?php echo $key->nilai ?>">
                                            </td>



                                        </tr>

                                    </tbody>
                                    <?php 
												}
												?>
                                </table>
                                <br>
                                <div class="row">
                                    <div class="col-md-10">

                                    </div>





                                    <button type="submit" name="simpan" class="btn btn-primary"><i
                                            class="fa fa-save"></i> Simpan</button>
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