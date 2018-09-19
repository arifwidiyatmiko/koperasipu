

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Data Pengajuan Peminjaman</h2>
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
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                                <th>Nominal Peminjaman</th>
                                                <th>Jenis Peminjaman</th>
                                                <th>Lama Peminjaman</th>
                                                <th>Alamat</th>
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        // print_r($peminjaman);die();
                                                foreach($pengajuan as $p){
                                            ?>

                                        
                                            
                                            <tr>
                                                <td>
                                                <?= $p->idUsulanPeminjaman ?>
                                                </td>
                                                <td><?= $p->namaLengkap ?></td>
                                                <td><?= $p->tanggal ?></td>
                                                <td><?php 
                                                // function rupiah($angka){
                                                //     $result = "Rp ".number_format($angka,2,',','.');
                                                //     return $result;
                                                // }
                                                #echo rupiah($p->nominal) 
                                                echo $p->nominal?></td>
                                                <td><?= $p->tipePeminjaman ?></td>
                                                <td><?= $p->jumlahBulan ?></td>
                                                <td><?= $p->alamat ?></td>
                                                <td>
                                                    <?php if($p->status == 0){
                                                        ?>
                                                        <a class="btn btn-success" href="<?php echo base_url()?>Peminjaman/approvePengajuan/<?=$p->idUsulanPeminjaman?>/1">
                                                                Setujui
                                                        </a>
                                                        <a class="btn btn-danger" href="<?php echo base_url()?>Peminjaman/approvePengajuan/<?=$p->idUsulanPeminjaman?>/2">
                                                                Tolak
                                                        </a>
                                                        <?php
                                                    }else{
                                                        if ($p->status == 1) {
                                                            echo "Pengajuan di terima";
                                                        }else{
                                                            echo "Pengajuan di tolak";
                                                        }
                                                    }?>
                                                </td>
                                            </tr>
                                                    <?php
                                                }?>
                                                
                                            
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
       