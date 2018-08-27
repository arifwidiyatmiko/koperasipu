

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Data Peminjaman</h2>
                                    <!-- <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Ajukan Peminjaman Baru</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                           <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                     <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Nominal</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php function rupiah($angka){
                                                    $result = "Rp ".number_format($angka,0,',','.');
                                                    return $result;
                                             }?>
                                        <?php
                                        // print_r($peminjaman);die();
                                            $i = 1;
                                                foreach($usulan as $p){
                                            ?>

                                        <tbody>
                                            
                                            <tr>
                                                <td>
                                                    <a href="<?php echo base_url()?>Peminjaman/pembayaran/<?=$p->idUsulanPeminjaman?>">
                                                        <?= $i ?>
                                                    </a>
                                                </td>
                                                <td><?= $p->tanggal ?></td>
                                                <td><?= rupiah($p->nominal) ?></td>
                                                <td>
                                                    <?php 
                                                    if ($p->status == 0) {
                                                        echo "<p class='text text-default'>Pending</p>";
                                                    }else if($p->status == 1){
                                                        echo "<p class='text text-success'>Disetujui</p>";
                                                    }else{
                                                        echo "<p class='text text-danger'>Ditolak</p>";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url();?>Pengajuan/status/<?php echo $p->idUsulanPeminjaman?>/1" class="btn btn-success">Terima</a>
                                                    <a href="<?php echo base_url();?>Pengajuan/status/<?php echo $p->idUsulanPeminjaman?>/2" class="btn btn-warning">Tolak</a>

                                                </td>
                                            </tr>

                                        
                                        </tbody>
                                        <?php }?>
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
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
       