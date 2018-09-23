<head>
  
</head>

<body>
    <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Data Anggota</h2>
                                    <!-- <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Ajukan Peminjaman Baru</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                           <div class="col-md-12"> 
                            <button class="btn btn-success">Print</button>
                                <div style="height: auto; " align="center" class="table-responsive m-b-40" >
                                   
                                    <table id="printTable" style="width: 600px">
                                        <tr  align="center">
                                            <td>
                                                <div>
                                                    <table style="font-size: 20px">
                                                        <tr><td style="text-align: center;">KPRI P3U TASIKMALAYA</td></tr>
                                                        <tr><td style="text-align: center;">Jln. R.A.A. Wiratanuningrat 24 </td></tr>
                                                        <tr><td style="text-align: center;">Telp. 336301 TASIKMALAYA</td></tr>
                                                    </table>
                                                </div>
                                                <br>
                                                <div>
                                                    <table style="font-size: 20px; text-align: left; table-layout: fixed; width: 600px; margin-left: 200px ">
                                                        <tr style="">
                                                            <td style="width: 45%;">Nama</td>
                                                            <td style="width: 5%;">:</td>
                                                            <td style="width: 50%;"><?= $kwitansi->namaLengkap ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 45%;">Anggota KPRI No.</td>
                                                            <td style="width: 5%;">:</td>
                                                            <td style="width: 50%;"><?= $kwitansi->idUser ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 45%;">Besar Pinjaman</td>
                                                            <td style="width: 5%;">:</td>
                                                            <td style="width: 50%;"><?= $kwitansi->nominal ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 45%;">Potongan - potongan</th>
                                                            <td style="width: 5%;">:</td>
                                                            <td style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 45%;">Jaminan Pinjaman</td>
                                                            <td style="width: 5%;">:</td>
                                                            <td style="width: 50%;">Rp. </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 45%;">Provisi</td>
                                                            <td style="width: 5%;">:</td>
                                                            <td style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 45%;">Pelunasan Kredit</td>
                                                            <td style="width: 5%;">:</td>
                                                            <td style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 45%;">Kekurangan Jasa</td>
                                                            <td style="width: 5%;">:</td>
                                                            <td style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 45%;">Pelunasan Jk. 6 Bulan</td>
                                                            <td style="width: 5%;">:</td>
                                                            <td style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 45%;">Pelunasan Jk. 1 Bulan</td>
                                                            <td style="width: 5%;">:</td>
                                                            <td style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 45%;">Simpanan</td>
                                                            <td style="width: 5%;">:</td>
                                                            <td style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 45%;">Iuran Kematian</td>
                                                            <td style="width: 5%;">:</td>
                                                            <td style="width: 50%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 45%;">Total</th>
                                                            <td style="width: 5%;">:</td>
                                                            <td style="width: 50%;"></td>
                                                        </tr>
                                                    </table>
                                                    <br>
                                                    <br>
                                                    <table style="width: 250px; margin-left: 200px">
                                                        <tr>
                                                            <td>Tasikmalaya</td>
                                                            <td style="text-align: right;">09 Agustus 2018</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td style="text-align: center;">Kasir<br><br><br><br><br><br>Riffan</td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    
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
</body>
<script type="text/javascript">
        function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})
    </script>