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
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                                <th>Nominal Peminjaman</th>
                                                <th>Sisa Angsuran</th>
                                                <th>Jumlah Jasa</th>
                                                <th>Sisa Jasa</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        // print_r($peminjaman);die();
                                            $i = 1;
                                                foreach($peminjaman as $p){
                                            ?>

                                            <tr>
                                                <td>
                                                    <?= $i ?>
                                                </td>
                                                <td><?= $p->namaLengkap ?></td>
                                                <td><?= $p->tanggalPeminjaman ?></td>
                                                <td><?php 
                                                function rupiah($angka){
                                                    $result = "Rp ".number_format($angka,2,',','.');
                                                    return $result;
                                                }
                                                echo rupiah($p->nominal) ?></td>
                                                <td><?= rupiah($p->sisaPeminjaman) ?></td>
                                                <td></td>
                                                <td></td>
                                                <td><?= $p->alamat ?></td>
                                                <td class="denied">Belum Lunas</td>
                                                <td>
                                                    
                                                        <a class="btn btn-primary" href="<?php echo base_url()?>peminjaman/detail_peminjaman/<?=$p->idPeminjaman?>">Detail</a>
                                                <?php if($this->session->userdata('users_koperasi')->role == 'PENGURUS'){
                                                    ?>
                                                            <a class="btn btn-success" href="<?php echo base_url()?>Peminjaman/pembayaran/<?=$p->idPeminjaman?>">
                                                            Bayar
                                                        </a>
                                                    
                                                        <button type="button" class="btn btn-danger">Hapus</button>
                                                    <?php
                                                }?>
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
       