<head>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/bootstrap-4.1/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/DataTables-1.10.18/css/dataTables.bootstrap4.css">
</head>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Data Anggota</h2>
                                    <!-- <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Ajukan Peminjaman Baru</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                           <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40" >
                                    <table class="table table-striped table-data3" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th style="white-space: pre-line;">Nama Lengkap</th>
                                                <th>Kelamin</th>
                                                <th style="white-space: pre-line;">Nomor Telepon</th>
                                                <th>Alamat</th>
                                                <th style="white-space: pre-line;">Pekerjaan</th>
                                                <th>Ahli Waris</th>
                                                <th style="white-space: pre-line;">Tanggal Masuk</th>
                                                <th>Pasangan</th>
                                                <th>Alat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                                foreach($anggota as $p){
                                            ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td style="white-space: pre-line"><?= $p->namaLengkap ?></td>
                                                <td><?= $p->kelamin ?></td>
                                                <td><?= $p->no_hp ?></td>
                                                <td style="white-space: pre"><?= $p->alamat ?></td>
                                                <td style="white-space: pre-line"><?= $p->idPekerjaan ?></td>
                                                <td><?= $p->ahliWaris ?></td>
                                                <td><?= $p->masuk ?></td>
                                                <td style="white-space: pre"><?= $p->idPasangan ?></td>
                                                <td>
                                                    <a href="<?php echo base_url()?>Anggota/editAnggota/<?=$p->idUser?>" class="btn btn-sm btn-info">Ubah</a>
                                                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                             <?php $i++;}?>
                                        </tbody>

                                       
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="<?php echo base_url();?>assets/https://colorlib.com">Riffan Alfarizie</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

             <!-- <script type="text/javascript" src="<?php echo base_url();?>assets/vendor/jquery-3.2.1.min.js"></script> 
             <script type="text/javascript" src="<?php echo base_url();?>assets/vendor/datatables.min.css"></script> 
            <script type="text/javascript" src="<?php echo base_url();?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url();?>assets/vendor/datatables.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url();?>assets/vendor/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url();?>assets/vendor/DataTables-1.10.18/css/dataTables.bootstrap4.css"></script> -->
            <script type="text/javascript">
              $(document).ready( function () {
                  $('#datatable').DataTable();
              } );
            </script>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
       