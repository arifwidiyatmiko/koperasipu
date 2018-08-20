

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
                                    <h3 class="title-3 m-b-30">Rincian Angsuran</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Angsuran</th>
                                                    <th>Jasa</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php $no = 1; foreach($detail as $d) {?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?= $d->nominalBayar?></td>
                                                    <td><?= $d->jasa?></td>
                                                    <td><?= $d->tanggalAngsuran?></td>
                                                </tr>
                                                <?php }?>
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
       