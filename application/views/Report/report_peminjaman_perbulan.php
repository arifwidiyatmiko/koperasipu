<?php
	header('Content-Type: application-vnd.ms-excel');
	header('Content-Disposition: attachment;filename="report_peminjaman_perbulan.xls"');
?>

<table border="1">
    <thead>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">No Anggota</th>
            <th rowspan="2">Nama</th>
            <th rowspan="2">Simpanan Wajib</th>
            <th rowspan="2">Iuran Kematian</th>
            <th colspan="4">Pinjaman Jangka Panjang</th>
            <th colspan="4">Pinjaman 6 Bulan</th>
            <th colspan="4">Pinjaman 1 Bulan</th>
            <th colspan="4">Pinjaman Pendidikan</th>
            <th rowspan="2">Jumlah</th>
        </tr>
            <tr>
                <?php 
                    for ($i=1; $i <= 4 ; $i++) { 
                ?>
                    <td colspan="2" align="center">Pokok</td>    
                    <td colspan="2" align="center">Jasa</td> 
                <?php } ?>   
            </tr>
    </thead>
    <tbody>
        <?php
            $i = 1;
            foreach ($angsuran as $key) {
        ?>
            <tr>
                <td><?= $i?></td>
                <td><?= $key->noAnggota?></td>
                <td><?= $key->namaLengkap?></td>
                <td><?= $key->simpanan?></td>
                <td><?= 5000 ?></td>
                <td colspan="2"><?= $key->pokokPanjang ?></td>
                <td colspan="2"><?= $key->jasaPanjang ?></td>
                <td colspan="2"><?= $key->pokokMenengah ?></td>
                <td colspan="2"><?= $key->jasaMenengah ?></td>
                <td colspan="2"><?= $key->pokokPendek ?></td>
                <td colspan="2"><?= $key->jasaPendek ?></td>
                <td colspan="2"><?= $key->pokokPendidikan ?></td>
                <td colspan="2"><?= $key->jasaPendidikan ?></td>
                <td><?= $key->simpanan + 5000 + $key->pokokPanjang + $key->jasaPanjang + $key->pokokMenengah + $key->jasaMenengah + $key->pokokPendek + $key->jasaPendek ?></td>
            </tr>
        <?php
        $i++;
            }
        ?>
    </tbody>
</table>
<?php $tanggal_print=$this->db->query("SELECT NOW();")->row_array()['NOW()'];
echo 'Diunduh pada tanggal '.date('d-m-Y, H:i:s', strtotime($tanggal_print));?>

