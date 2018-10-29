

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Form Peminjaman</h2>
                                    <!-- <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Ajukan Peminjaman Baru</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                           <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <?php 
                                $tagihanJasa = (($peminjaman[0]->nominal * $peminjaman[0]->persentasePeminjaman/100) + ($peminjaman[0]->nominalAngsuran * $peminjaman[0]->persentasePeminjaman/100))/2;
                                // echo "tagihan anda ".$tagihanJasa."<br/>";

                                // print_r($peminjaman);die();

                                ?>
                                <div class="table-responsive m-b-40">
                                   <form class="form-horizontal" method="post" action="<?php echo base_url();?>Peminjaman/submitPembayaran/<?php echo $this->uri->segment(3);?>">
									    <div class="form-group">
									      <label class="control-label col-sm-4">Sisa Peminjaman</label>
									      <div class="col-sm-10">
									        <!-- <input  type="text" name="sisa_nominal" value="<?php

                                                function rupiah($angka){
                                                    $result = "Rp ".number_format($angka,2,',','.');
                                                    return $result;
                                                }
                                             echo rupiah($bayar->sisaPeminjaman) ?>" disabled class="form-control"> -->
                                             <input type="text" name="sisa_nominal"  value="<?php echo($bayar->sisaPeminjaman) ?>" class="form-control" disabled="true">
                                             <input type="text" name="sisa_nominal"  value="<?php echo($bayar->sisaPeminjaman) ?>" class="form-control" hidden>
									      </div>
									    </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-5" >Jumlah pembayaran Angsuran</label>
                                          <div class="col-sm-10">
                                            <input  type="text" value="<?= $bayar->tagihanBayar?>" class="form-control" placeholder="Masukkan nominal" name="bayar_angsuran" onkeypress="return isNumber(event)">
                                            <input type="hidden" name="tagihanBayar" value="<?= $bayar->tagihanBayar?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-4">Jumlah Pembayaran Jasa</label>
                                          <div class="col-sm-10">
                                            <input  type="text" value="<?= $tagihanJasa?>" class="form-control" placeholder="Masukkan nominal" name="bayar_jasa" onkeypress="return isNumber(event)">
                                            <input type="hidden" name="tagihanJasa" value="<?= $tagihanJasa?>" >
                                            <input type="hidden" name="idAngsuran" value="<?= $bayar->idAngsuran?>" >
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
