

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
                                              <input type="text" class="form-control" placeholder="nominal" onkeypress="return isNumber(event)" id="nominal" name="nominal">
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
									        <button id="btn_konfirmasiPengajuan" type="button" class="au-btn au-btn--block au-btn--green m-b-20" >
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
                                var umur = <?php echo date_diff(date_create($anggota->result()[0]->tanggal_lahir), date_create('today'))->y;?>;
                                var submitData = {};var provisi = 0;var jaminan = 0;var sisaPelunasan=0; var sisaJasa = 0; var kekuranganJasa=0;
                                var min = <?php echo $minmax->kecil;?>;
                                var max = <?php echo $minmax->besar;?>;
                                var data_jenisPeminjaman = <?php echo json_encode($ref_peminjaman->result());?>;
                                var jenisPeminjaman = 0;
                                var obj_jenisPeminjaman = {};
                                $('#jenisPeminjaman').on('change',function() {
                                   data_jenisPeminjaman.forEach((num, index) => {
                                        if(num.idJenisPeminjaman == $('#jenisPeminjaman').val()){
                                            jenisPeminjaman = parseInt(num.jumlahBulan);
                                            obj_jenisPeminjaman = num;
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
                                    
                                    if ($('#nominal').val() == '') {
                                        $('#nominal').focus();
                                    }else if($('#jenisPeminjaman').val() == 'NULL'){
                                        $('#jenisPeminjaman').focus();
                                    }else if($('#jumlahBulan').val() == '' || parseInt($('#jumlahBulan').val()) == 0){
                                        $('#jumlahBulan').focus();
                                    }
                                    else{
                                        if (umur >= min && umur <= max) {
                                            var x_umur = umur;
                                        }else{
                                            if (umur < min) {var x_umur = min;}
                                            else{var x_umur = max;}
                                        }
                                        $.ajax({
                                                type: 'GET',
                                                url: '<?php echo base_url();?>Peminjaman/cekPeminjaman/'+<?php echo $anggota->result()[0]->idUser;?>
                                            })
                                            .done(function(content){
                                               // console.log(content);
                                              $('#konfirmasiPengajuan').modal('show');
                                                $('#modal_jumlahPeminjaman').text($('#nominal').val());
                                                $('#modal_jenisPeminjaman').text(obj_jenisPeminjaman.Nama+"-"+$('#jumlahBulan').val()+" Bulan");
                                                console.log(content);
                                                if (obj_jenisPeminjaman.idJenisPeminjaman == 1) {$('#modal_jaminanPeminjaman').text("-");}
                                                else{
                                                    $.ajax({
                                                        type: 'GET',
                                                        url: '<?php echo base_url();?>Peminjaman/cek_jaminan/'+x_umur+'/'+$('#jumlahBulan').val()
                                                    })
                                                    .done(function(data){
                                                        submitData.persentaseJaminan = data[0].persentase;
                                                        jaminan = parseInt( parseInt($('#nominal').val()) * parseFloat(data[0].persentase/100));
                                                       $('#modal_jaminanPeminjaman').text(jaminan);
                                                       if (content.jumlah == 0 ) {
                                                            $('#modal_pelunasanKredit').text(content.jumlah);
                                                       }else{
                                                            sisaPelunasan = parseInt($('#nominal').val()) - parseInt(content.jumlah);
                                                            if (sisaPelunasan > 0) {
                                                                $('#modal_pelunasanKredit').text(parseInt(content.jumlah));
                                                            }else{
                                                                $('#modal_pelunasanKredit').text(parseInt(content.jumlah));
                                                                $('#modal_pelunasanKredit').css('color','red');
                                                                $('#btn_pengajuanPeminjaman_konfirmasi').attr("disabled", "disabled");
                                                            }
                                                       }
                                                       $('#modal_kekuranganJasa').text(sisaJasa);
                                                       kekuranganJasa =  parseInt($('#nominal').val()) - jaminan - content.jumlah - sisaJasa-provisi;
                                                       $('#modal_uangDiterima').text(kekuranganJasa);
                                                    })

                                                    .fail(function() {
                                                        alert( "Silahkan coba beberapa saat lagi." );
                                                         
                                                    });
                                             
                                                }
                                                 provisi = parseInt($('#nominal').val()) * parseFloat(1/100);
                                                $('#modal_provisiPeminjaman').text(provisi);
                                            })
                                            .fail(function() {
                                                alert( "Silahkan coba beberapa saat lagi." );
                                                 
                                            });
                                    }
                                    
                                })
                                $('#btn_pengajuanPeminjaman_konfirmasi').on('click',function() {
                                    if ($('#nominalAngsuran').val() == null || $('#nominalAngsuran').val() == '') {
                                        $('#nominalAngsuran').focus();
                                    }
                                    submitData.idUser = '<?php echo $anggota->result()[0]->idUser;?>';
                                    submitData.tanggal = '<?php echo date('Y-m-d H:i:s');?>';
                                    submitData.nominal = parseInt($('#nominal').val());
                                    submitData.jumlahBulan = $('#jumlahBulan').val();
                                    submitData.tipePeminjaman = obj_jenisPeminjaman.Nama;
                                    submitData.sisaPeminjaman = submitData.nominal;
                                    submitData.status = 0;
                                    submitData.jaminan = jaminan;
                                    submitData.provisi = provisi;
                                    submitData.total_diterima = kekuranganJasa;
                                    submitData.nominalAngsuran = $('#nominalAngsuran').val();
                                    submitData.persentasePeminjaman = obj_jenisPeminjaman.Persentase;
                                    console.log('data : ',submitData);
                                    $.ajax({
                                        type: 'POST',
                                        url: '<?php echo base_url();?>Peminjaman/submit/',
                                        data : submitData
                                    })
                                    .done(function(success){
                                        console.log(success);
                                        alert(success)
                                    })
                                   .fail(function() {
                                        alert( "Silahkan coba beberapa saat lagi." );
                                    });
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
