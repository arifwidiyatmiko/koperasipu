
<head>
  
</head>
<?php 
 
    // FUNGSI TERBILANG OLEH : MALASNGODING.COM
    // WEBSITE : WWW.MALASNGODING.COM
    // AUTHOR : https://www.malasngoding.com/author/admin
    function rupiah($angka){
        $result = "Rp ".number_format($angka,0,',','.');
        return $result;
    }
 
    function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " Belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " Seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " Seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
 
    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }           
        return $hasil;
    }

    //Fungsi ambil tanggal aja
     function tgl_aja($tgl_a){
       $tanggal = substr($tgl_a,8,2);
       return $tanggal;  
     }

     //Fungsi Ambil bulan aja
     function bln_aja($bulan_a){
       $bulan = getBulan(substr($bulan_a,5,2));
       return $bulan;  
     } 

     //Fungsi Ambil tahun aja
     function thn_aja($thn){
       $tahun = substr($thn,0,4);
       return $tahun;  
     }

     //Fungsi konversi tanggal bulan dan tahun ke dalam bahasa indonesia
 function tanggal($tgl){
   $tanggal = substr($tgl,0,2);
   $bulan = getBulan(substr($tgl,3,2));
   $tahun = substr($tgl,6,4);
   return $tanggal.' '.$bulan.' '.$tahun;  
 } 
 //Fungsi konversi nama bulan ke dalam bahasa indonesia
 function getBulan($bln){
    switch ($bln){
     case 1:
      return "Januari";
      break;
     case 2:
      return "Februari";
      break;
     case 3:
      return "Maret";
      break;
     case 4:
      return "April";
      break;
     case 5:
      return "Mei";
      break;
     case 6:
      return "Juni";
      break;
     case 7:
      return "Juli";
      break;
     case 8:
      return "Agustus";
      break;
     case 9:
      return "September";
      break;
     case 10:
      return "Oktober";
      break;
     case 11:
      return "November";
      break;
     case 12:
      return "Desember";
      break;
    }
   }

?>
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
                                <div style="height: auto;  " class="table-responsive m-b-40" >
                                    <button class="btn btn-success">Print</button>
                                    <table id="printTable">
                                        <tr>
                                            <td>
                                                <div class="col-3" style="" align="right">
                                                    <table style="
                                                                width:400px;
                                                                height:60px;
                                                                border: 1px solid black;
                                                                padding: 10px;
                                                                border-radius: 15px;
                                                                border-collapse: separate; 
                                                                text-align: center;
                                                                -ms-transform:rotate(270deg); /* IE 9 */
                                                                -moz-transform:rotate(270deg); /* Firefox */
                                                                -webkit-transform:rotate(270deg); /* Safari and Chrome */
                                                                -o-transform:rotate(270deg); /* Opera */
                                                                margin-top: 0px;
                                                                margin-left: -150px;">
                                                        <tbody>
                                                            <tr><th style="font-size: 28px">KPRI P3U TASIKMALAYA</th></tr>
                                                            <tr><td>Jln. R.A.A. Wiratanuningrat 24 Telp. 336301</td></tr>
                                                            <tr><td>TASIKMALAYA</td></tr>
                                                                    </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="col-9" style="">
                                                    <?php $tot=0;?>
                                                    <table style="margin-left: -140px;
                                                                width:800px;
                                                                height:400px;
                                                                border: 1px solid black;
                                                                padding: 10px;
                                                                border-radius: 15px;
                                                                border-collapse: separate;">
                                                        <tr>
                                                            <td>Sudah diterima dari</td>
                                                            <td>:</td>
                                                            <td><?= $kwitansi->namaLengkap?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Banyaknya uang</td>
                                                            <td>:</td>
                                                            <td><?= terbilang($tot);?></td>
                                                        </tr>
                                                        <tr rowspan="4" style=" vertical-align: top;">
                                                            <td style="">Untuk pembayaran</td>
                                                            <td>:</td>
                                                            <td >
                                                                <table style=" width: 100%">
                                                                    <tr>
                                                                        <td>Simpanan Wajib</td>
                                                                        <td><?php $noms=$kwitansi->nominalSimpanan; echo rupiah($noms);?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Iuran Kematian</td>
                                                                        <td><?php $kem= 5000; echo rupiah($kem);?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Angsuran Pinjaman ke - <?php echo $ket=$kwitansi->ke+1; ?> </td>
                                                                        <td><?php $noma=$kwitansi->nominalAngsuran; echo rupiah($noma);?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Sisa Pinjaman</td>
                                                                        <td><?php $sisa=$kwitansi->sisaPeminjaman-$noma; echo rupiah($sisa);?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jasa Pinjaman</td>
                                                                        <td></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mengetahui</td>
                                                            <td>:</td>
                                                            <td style="margin-left: 100px" align="right">
                                                                <table>
                                                                    <tr>
                                                                        <td style="font-weight: bold;">Tasikmalaya,</td>
                                                                        <td>&nbsp; &nbsp;</td>
                                                                        <td><?= tanggal(date("d-m-Y"))?></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr align="center">
                                                            <td colspan="3">
                                                                <table style="width: 100%; table-layout: fixed; "> 
                                                                    <tr>
                                                                        <td align="center">Ketua,</td>
                                                                        <td align="center">Bendahara,</td>
                                                                        <td align="center">Yang menerima</td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td align="center" style=""><br><br><br>Misbahudin, S.Sos.</td>
                                                                    <td align="center" style=""><br><br><br>Tatang Suryana</td>
                                                                    <td align="center" style=""><br><br><br><?= $this->session->userdata('users_koperasi')->namaLengkap; ?></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table>
                                                                    <tr>
                                                                        <td>Jumlah &nbsp;</td>
                                                                        <td>&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                                                        <td align="center" style=" text-align: center;
                                                                                                border: 1px black solid;
                                                                                                padding: 10px 30px 15px 30px;
                                                                                                vertical-align: center;">
                                                                                                <?php $tot = $noms + $noma + $kem; echo rupiah($tot); ?>
                                                                                            </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
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