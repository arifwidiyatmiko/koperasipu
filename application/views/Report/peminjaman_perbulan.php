<?php //print_r($tahun);die(); ?>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/bootstrap-4.1/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/DataTables-1.10.18/css/dataTables.bootstrap4.css">
</head>

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Data Peminjaman Perbulan</h2>
                        <!-- <button class="au-btn au-btn-icon au-btn--blue">
                            <i class="zmdi zmdi-plus"></i>Ajukan Peminjaman Baru</button> -->
                    </div>
                </div>
            </div>
            <div class="row m-t-25">
               <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <form action="<?php echo site_url();?>report/peminjamanperbulan" method="POST">
                        <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" name="unit_kerja">
                                    <option>Unit Kerja</option>
                                    <option value="0" <?= ($unit_kerja == 0) ? 'selected' : ''?>>Departemen A</option>
                                    <option value="1" <?= ($unit_kerja == 1) ? 'selected' : ''?>>Departemen B</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--light rs-select2--sm">
                                <select class="js-select2" name="bulan">
                                    <option value="1" <?= ($bulan == 1) ? 'selected' : ''?>>Januari</option>
                                    <option value="2" <?= ($bulan == 2) ? 'selected' : ''?>>Februari</option>
                                    <option value="3" <?= ($bulan == 3) ? 'selected' : ''?>>Maret</option>
                                    <option value="4" <?= ($bulan == 4) ? 'selected' : ''?>>April</option>
                                    <option value="5" <?= ($bulan == 5) ? 'selected' : ''?>>Mei</option>
                                    <option value="6" <?= ($bulan == 6) ? 'selected' : ''?>>Juni</option>
                                    <option value="7" <?= ($bulan == 7) ? 'selected' : ''?>>Juli</option>
                                    <option value="8" <?= ($bulan == 8) ? 'selected' : ''?>>Agustus</option>
                                    <option value="9" <?= ($bulan == 9) ? 'selected' : ''?>>September</option>
                                    <option value="10" <?= ($bulan == 10) ? 'selected' : ''?>>Oktober</option>
                                    <option value="11" <?= ($bulan == 11) ? 'selected' : ''?>>November</option>
                                    <option value="12" <?= ($bulan == 12) ? 'selected' : ''?>>Desember</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--light rs-select2--sm">
                                <select class="js-select2" name="tahun">
                                    <option value="2021" <?= ($tahun == 2021) ? 'selected' : ''?>>2021</option>
                                    <option value="2020" <?= ($tahun == 2020) ? 'selected' : ''?>>2020</option>
                                    <option value="2019" <?= ($tahun == 2019) ? 'selected' : ''?>>2019</option>
                                    <option value="2018" <?= ($tahun == 2018) ? 'selected' : ''?>>2018</option>
                                    <option value="2017" <?= ($tahun == 2017) ? 'selected' : ''?>>2017</option>
                                    <option value="2016" <?= ($tahun == 2016) ? 'selected' : ''?>>2016</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <button class="au-btn-filter">
                                <i class="zmdi zmdi-filter-list"></i>filters
                            </button>
                        </div>
                            <div class="table-data__tool-right">
                                <button type="button" class="btn btn-secondary" id="excel">
                                    <i class="fa fa-magic"></i>&nbsp; Export</button>
                            </div>
                    </div>
                    </form>
                    <div class="table-responsive m-b-40" >
                        <table class="table table-striped table-data3" id="datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Anggota</th>
                                    <th>Nama</th>
                                    <th>No Telepon</th>
                                    <th>Besar Pinjaman</th>
                                </tr>
                            </thead>
                            <?php $i = 1; foreach($peminjaman as $p){?>
                            <tbody>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $p->noAnggota?></td>
                                    <td><?= $p->namaLengkap?></td>
                                    <td><?= $p->no_hp?></td>
                                    <td><?= $p->nominal?></td>
                                </tr>
                            </tbody>
                            <?php $i++; }?>
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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

 <!-- <script type="text/javascript" src="<?php echo base_url();?>assets/vendor/jquery-3.2.1.min.js"></script> 
 <script type="text/javascript" src="<?php echo base_url();?>assets/vendor/datatables.min.css"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/DataTables-1.10.18/css/dataTables.bootstrap4.css"></script> -->
<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
      $('#excel').click(function() {
            window.location = '<?php echo site_url();?>Report/downloadExcelPerbulan/<?= $bulan ?>/<?= $tahun?>/<?= $unit_kerja?>';
        });;
  } );
</script>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
       