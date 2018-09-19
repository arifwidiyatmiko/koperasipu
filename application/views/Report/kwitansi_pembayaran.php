
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
                                                            <td>aaa</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Banyaknya uang</td>
                                                            <td>:</td>
                                                            <td>aaa</td>
                                                        </tr>
                                                        <tr rowspan="4" style=" vertical-align: top;">
                                                            <td style="">Untuk pembayaran</td>
                                                            <td>:</td>
                                                            <td >
                                                                <table style=" width: 100%">
                                                                    <tr>
                                                                        <td>Simpanan Wajib</td>
                                                                        <td>Rp.10000000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Iuran Kematian</td>
                                                                        <td>Rp.10000000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Angsuran Pinjaman ke - </td>
                                                                        <td>Rp.10000000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jasa Pinjaman</td>
                                                                        <td>Rp.10000000</td>
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
                                                                        <td>09 Agustus 2018</td>
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
                                                                    <td align="center" style=""><br><br><br>Nama Ketua</td>
                                                                    <td align="center" style=""><br><br><br>Nama Bendahara</td>
                                                                    <td align="center" style=""><br><br><br>Nama Penerima</td>
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
                                                                                                vertical-align: center;">Rp. 50.000.000</td>
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