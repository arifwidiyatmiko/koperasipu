

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
                                <div class="table-responsive">
                                    <table class="table table-borderless table-data3" id="tabel-jaminan">
                                        <thead>
                                            <tr>
                                                <th>Umur</th>
                                                <th>Bulan</th>
                                                <th>Persentase</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                foreach($jaminan as $p){
                                            ?>
                                            <tr>
                                                <td><?= $p->umur ?></td>
                                                <td><?= $p->Nama ?></td>
                                                <td><?= $p->Persentase ?>%</td>
                                                <td>
                                                    <a class="btn btn-info" href="#" data-umur="<?php echo $p->umur;?>"  data-href="<?php echo base_url();?>jaminan/update/<?php echo $p->ID;?>" data-nama="<?php echo $p->Nama;?>" data-persen="<?php echo $p->Persentase;?>" data- data-toggle="modal" data-target="#modal-edit">
                                                        Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                      <script type="text/javascript">
                          $( document ).ready(function() {
                            $('#tabel-jaminan').DataTable();
                            $('#btn_tambahJaminan').on('click',function() {
                                $('#tambahJaminan').modal('show');
                            });
                            $('#modal-edit').on('show.bs.modal', function(e) {
                                // $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                                $('#edit-title').html("Ubah Persentase : Umur "+$(e.relatedTarget).data('umur')+" -"+$(e.relatedTarget).data('nama')+"");
                                $('#edit-form-peminjaman').attr('action',$(e.relatedTarget).data('href'));
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
       