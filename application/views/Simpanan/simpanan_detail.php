

            <!-- MAIN CONTENT-->
            <div class="main-content" >
                <div class="section__content section__content--p30" >
                    <div class="container-fluid" style="background: white">
                        <div class="row">
                            <div class="col-md-12">
                                
                            </div>
                        </div>
                        <div class="row m-t-25" style="background: white">
                           <div class="col-md-12" style="background: white">
                                <!-- DATA TABLE-->
                                <div style="background: white">
                                    <h3 class="title-3 m-b-30">Rincian Simpanan</h3>
                                    <div class="table-responsive">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nominal Simpanan</th>
                                                    <th>Iuran Kematian</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php $no = 1; $nom = 0; $tikem = 0; $ikem = 5000; foreach($simpanan as $s) {?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?= $s->nominalBayar?></td>
                                                    <td><?= $ikem?></td>
                                                    <td><?= $s->tanggal?></td>
                                                    <?php $nom = $nom + $s->nominalBayar; ?>
                                                    <?php $tikem = $tikem + $ikem; ?>
                                                </tr>
                                                <?php }?>
                                                <tr >
                                                    <th>Total</th>
                                                    <th><?php echo $nom; ?></th>
                                                    <th><?php echo $tikem; ?></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
       