

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Tabel Jaminan</h2>
                                    <button class="au-btn au-btn-icon au-btn--blue" id="btn_tambahJaminan">
                                        <i class="zmdi zmdi-plus" ></i>Tambah Data Jaminan </button>
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
                                                <th>Umur</th>
                                                <th>Bulan</th>
                                                <th>Persentase</th>
                                                <th colspan="3">Action</th>
                                            </tr>
                                        </thead>

                                        <?php
                                                foreach($jaminan as $p){
                                            ?>

                                        <tbody>
                                            
                                            <tr>
                                                <td>
                                                    <a href="<?php echo base_url()?>Peminjaman/pembayaran/<?=$p->idJaminan?>">
                                                        <?= $p->umur ?>
                                                    </a>
                                                </td>
                                                <td><?= $p->Nama ?></td>
                                                <td><?= $p->Persentase ?>%</td>
                                                
                                                <td>
                                                    <a class="btn btn-info" href="<?php echo base_url()?>Peminjaman/pembayaran/<?=$p->idJaminan?>">
                                                        Edit
                                                    </a>
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
                      <script type="text/javascript">
                          $( document ).ready(function() {
                            $('#btn_tambahJaminan').on('click',function() {
                                $('#tambahJaminan').modal('show');
                            });
                            // $('#umur').on('input',function(){
                            //         var value = $(this).val();
                            //         if ((value !== '') && (value.indexOf('.') === -1)) {
                            //             $(this).val(Math.max(Math.min(value,jenisPeminjaman), -Math.abs(jenisPeminjaman)));
                            //         }
                            //     });
                          });
                      </script>
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
       