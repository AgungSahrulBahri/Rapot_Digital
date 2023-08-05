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
                                    <div class="card-body"><h5 class="card-title">Data Operator</h5>

                                        <form method="post" action="<?php echo base_url(); ?>tu/datasiswa">
                                    
                                                <div class="form-row">
    
                                                        <div class="form-group col-md-3">
                                                            <label for="">Rombel</label>
                                                            <select class="form-control" name="rombel" >
                                                            <option value="" disabled selected>-pilih-</option>
                                                            <?php foreach($rombel as $r){ ?>
                                                            <option value="<?php echo $r->id_rombel; ?>"> <?php echo $r->rombel; ?></option>
                                                            <?php } ?>
                                                            </select>
                                                            <?= form_error('rombel') ?>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="">Semester</label>
                                                            <select class="form-control" name="semester" >
                                                            <option value="" disabled selected>-pilih-</option>
                                                            <?php foreach($semester as $j){ ?>
                                                            <option value="<?php echo $j->id_semester; ?>"><?php echo $j->semester; ?></option>
                                                            <?php } ?>
                                                            </select>
                                                            <?= form_error('semester') ?>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                        
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
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="<?php echo base_url('assets/scripts/main.js') ?>"></script></body>
</html>
