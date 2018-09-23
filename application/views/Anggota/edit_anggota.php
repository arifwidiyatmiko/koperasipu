 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Ubah Anggota</h2>
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
                       <form class="form-horizontal" method="post" action="<?php echo base_url();?>Anggota/update">
                        <input type="text" name="idUser" value="<?= $anggota->idUser?>" class="form-control" hidden>
    									     <div class="form-group">
    									       <label class="control-label col-sm-4">Nama</label>
    									       <div class="col-sm-10">
                                <input type="text" name="namaLengkap" value="<?= $anggota->namaLengkap?>"  class="form-control">
    									      </div>
    									     
                              <div class="form-group">
                              <label class="control-label col-sm-4">Jenis Kelamin</label>
                              <div class="col-sm-10">
                               <div class="radio">
                                  <label><input type="radio" value="Laki-Laki" name="kelamin" <?= ($anggota->kelamin == 'Laki-Laki') ? 'checked' : ''?>>Laki-Laki</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="kelamin" value="Perempuan" <?= ($anggota->kelamin == 'Perempuan') ? 'checked' : ''?>>Perempuan</label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4">Tanggal Lahir</label>
                              <div class="col-sm-10">
                                <input type="text" id="tanggal_lahir" name="tanggal_lahir" onclick="getDate($(this))" value="<?= $anggota->tanggal_lahir?>" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4">Pekerjaan</label>
                              <div class="col-sm-10">
                                <input type="text" name="idPekerjaan" value="<?= $anggota->idPekerjaan?>"  class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4">Ahli Waris</label>
                              <div class="col-sm-10">
                                <input type="text" name="ahliWaris" value="<?= $anggota->ahliWaris?>" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4">Tanggal Masuk</label>
                              <div class="col-sm-10">
                                <input type="text" name="masuk" value="<?= $anggota->masuk?>" onclick="getDate($(this))" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4">Tanggal Keluar</label>
                              <div class="col-sm-10">
                                <input type="text" name="keluar" value="<?= $anggota->keluar?>"onclick="getDate($(this))"  class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4">Keterangan Keluar</label>
                              <div class="col-sm-10">
                                <input type="text" name="keteranganKeluar" value="<?= $anggota->keteranganKeluar?>"  class="form-control">
                              </div>
                            </div>
                            </div>
			    <div class="form-group">        
			      <div class="col-sm-offset-2 col-sm-10">
			        <button type="submit" class="au-btn au-btn--block au-btn--green m-b-20">
			        Ubah</button>
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
  $(document).ready(function(){
    
  })

  function getDate(id){
    var date_input=id; //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    var options={
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    };
    date_input.datepicker(options);
  }
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
