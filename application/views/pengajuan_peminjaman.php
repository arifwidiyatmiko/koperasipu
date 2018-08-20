

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
                                   <form class="form-horizontal" >
                                        <div class="form-group">
                                          <label class="control-label col-sm-4" for="email">Nominal Peminjaman</label>
                                          <div class="input-group col-sm-10">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                              </div>
                                              <input type="text" class="form-control" placeholder="nominal" id="nominal" name="nominal">
                                            </div>
                                        </div>

									    <div class="form-group">
									      <label class="control-label col-sm-4" for="email">Jenis Peminjaman Jangka</label>
									      <div class="col-sm-10">
									        <select name="jenisPeminjaman" id="jenisPeminjaman" class="form-control">
                                                <option value="NULL"> -- Pilih Jenis Peminjaman -- </option>
                                                <?php 
                                                foreach ($ref_peminjaman->result() as $key) {
                                                    ?><option value="<?php echo $key->idJenisPeminjaman;?>"><?php echo $key->Nama." - Maksimal ".$key->jumlahBulan." Bulan";?></option> <?php
                                                }
                                                ?>                         
                                            </select>
									      </div>
									    </div>
                                        <div class="form-group">
                                          <label class="control-label col-sm-4" for="email">Jumlah Bulan</label>
                                          <div class="input-group col-sm-10">
                                              <input type="number" class="form-control" placeholder="JUmlah Bulan" name="jumlahBulan" id="jumlahBulan">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Bulan</span>
                                              </div>
                                            </div>
                                        </div>
									    <div class="form-group">        
									      <div class="col-sm-offset-2 col-sm-10">
									        <button id="btn_konfirmasiPengajuan" type="button" class="au-btn au-btn--block au-btn--green m-b-20" data-toggle="modal" data-target="#konfirmasiPengajuan">
									        Submit</button>
									      </div>
									    </div>
									  </form>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        <script type="text/javascript">
                            $( document ).ready(function() {
                                var data_jenisPeminjaman = <?php echo json_encode($ref_peminjaman->result());?>;
                                var jenisPeminjaman = 0;
                                var obj_jenisPeminjaman = {};
                                $('#jenisPeminjaman').on('change',function() {
                                   data_jenisPeminjaman.forEach((num, index) => {
                                        if(num.idJenisPeminjaman == $('#jenisPeminjaman').val()){
                                            jenisPeminjaman = parseInt(num.jumlahBulan);
                                            data_jenisPeminjaman = num;
                                            $('#jumlahBulan').val(0);
                                        }
                                    });
                                });
                                $('#jumlahBulan').on('input',function(){
                                    var value = $(this).val();
                                    if ((value !== '') && (value.indexOf('.') === -1)) {
                                        $(this).val(Math.max(Math.min(value,jenisPeminjaman), -Math.abs(jenisPeminjaman)));
                                    }
                                });
                                $('#btn_konfirmasiPengajuan').on('click',function() {
                                    $('#modal_jumlahPeminjaman').append($('#nominal').val());
                                    $('#modal_jenisPeminjaman').append("JANGKA "+obj_jenisPeminjaman.Nama+" "+$('#jumlahBulan').val()+" Bulan");
                                    if (obj_jenisPeminjaman.idJenisPeminjaman != 1) {$('#modal_jaminanPeminjaman').append("-");}
                                    else{$('#modal_jaminanPeminjaman').append("-");}
                                })
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
