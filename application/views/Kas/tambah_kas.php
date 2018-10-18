

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Form Kas</h2>
                                    <!-- <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Ajukan Peminjaman Baru</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                           <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <?php //print_r($bayar);die();?>
                                <div class="table-responsive m-b-40">
                                   <form class="form-horizontal" method="post" action="<?php echo base_url();?>Kas/submitKas/<?php echo $this->uri->segment(3);?>">
									    <div class="form-group">
									      <label class="control-label col-sm-4">No Perkiraan</label>
									      <div class="col-sm-10">
                                             <select class="form-control" name="noPerkiraan">
                                                 <option value="0" disabled="disabled" selected="selected">-- Pilih No Perkiraan --</option>
                                                 <?php foreach ($kas as $k) { ?>
                                                    <option value="<?= $k->noPerkiraan?>"> <?= $k->namaPerkiraan ?></option>
                                                 <?php } ?>
                                             </select>
									      </div>
									    </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-4">Nominal</label>
                                          <div class="col-sm-10">
                                            <input  type="text" class="form-control" placeholder="Masukkan nominal" name="nominal" onkeypress="return isNumber(event)">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-4">Jenis Kas</label>
                                          <div class="col-sm-10">
                                            <select class="form-control" name="jenisKas">
                                                <option selected="selected" disabled="disabled">-- Pilih Jenis Kas --</option>
                                                <option value="0">Masuk</option>
                                                <option value="1">Keluar</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-4">Keterangan</label>
                                          <div class="col-sm-10">
                                            <input  type="text" class="form-control" placeholder="Masukkan Keterangan" name="keterangan">
                                          </div>
                                        </div>
									    <div class="form-group">        
									      <div class="col-sm-offset-2 col-sm-10">
									        <button type="submit" class="au-btn au-btn--block au-btn--green m-b-20">
									        Submit</button>
									      </div>
									    </div>
									  </form>
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

            <script type="text/javascript">
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
