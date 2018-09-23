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
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">Unit Kerja</option>
                                                <option value="">Departemen A</option>
                                                <option value="">Departemen B</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">1 Bulan</option>
                                                <option value="">6 Bulan</option>
                                                <option value="">1 Tahun</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Tambah pinjaman</button>
                                        <button type="button" class="btn btn-secondary">
                                            <i class="fa fa-magic"></i>&nbsp; Export</button>
                                    </div>
                                </div>
                                <div class="table-responsive m-b-40" >
                                    <table class="table table-striped table-data3" id="datatable">
                                        <thead>
                                             <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Saldo</th>
                                                <th>Tagihan Bulanan</th>
                                                <th>Saldo Iuran Kematian</th>
                                                <th>Tanggal Bayar Terakhir</th>
                                                <th>Action</th>
                                                <!-- <th>Print</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        // print_r($peminjaman);die();

                                                function rupiah($angka){
                                                    $result = "Rp ".number_format($angka,0,',','.');
                                                    return $result;
                                                }
                                            $i = 1;
                                                foreach($simpanan as $s){
                                            ?>

                                            <tr>
                                                <td>
                                                    <?= $i ?>
                                                </td>
                                                <td><?= $s->namaLengkap ?></td>
                                                <td><?php 
                                                echo rupiah($s->saldo) ?></td>
                                                <td><?= rupiah($s->nominal) ?></td>
                                                <td><?= rupiah($s->saldo_iuran_kematian) ?></td>
                                                <td><?= $s->tanggal ?></td>
                                                <td>
                                                    
                                                        <a class="btn btn-outline-primary" href="<?php echo base_url()?>Simpanan/detailSimpanan/<?=$s->idSimpanan?>">Detail</a>
                                                <?php if($this->session->userdata('users_koperasi')->role == 'PENGURUS'){
                                                    ?>
                                                            <a class="btn btn-outline-success" href="<?php echo base_url()?>Simpanan/bayarSimpanan/<?=$s->idSimpanan?>">
                                                            Bayar
                                                        </a>
                                                    
                                                        <button type="button" class="btn btn-outline-danger">Hapus</button>
                                                    <?php
                                                }?>
                                                </td>
                                                <!-- <td>
                                                    <div class="dropdown show">
                                                      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Print
                                                      </a>

                                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="<?php echo base_url()?>Peminjaman/kwitansiJaminan/<?=$p->idPeminjaman?>">Kwitansi Jaminan</a>
                                                        <a class="dropdown-item" href="<?php echo base_url()?>Peminjaman/kwitansiPenerimaan/<?=$s->idSimpanan?>">Kwitansi Penerimaan</a>
                                                        <a class="dropdown-item" href="<?php echo base_url()?>Peminjaman/kwitansiPelunasan/<?=$s->idSimpanan?>">Kwitansi Pelunasan</a>
                                                        <a class="dropdown-item" href="<?php echo base_url()?>Peminjaman/kwitansiTotal/<?=$s->idSimpanan?>">Kwitansi Total</a>
                                                      </div>
                                                    </div>
                                                </td> -->
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
       