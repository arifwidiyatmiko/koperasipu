<?php
	header('Content-Type: application-vnd.ms-excel');
	header('Content-Disposition: attachment;filename="report_peminjaman.xls"');
?>

<table border="1">
    <thead>
        <tr>
            <th rowspan="3">No</th>
            <th rowspan="3">No Anggota</th>
            <th rowspan="3">Nama</th>
            <th rowspan="3">Pada Akhir Tahun YL</th>
            <th colspan="4">Januari</th>
            <th colspan="4">Februari</th>
            <th colspan="4">Maret</th>
            <th colspan="4">April</th>
            <th colspan="4">Mei</th>
            <th colspan="4">Juni</th>
            <th colspan="4">Juli</th>
            <th colspan="4">Agustus</th>
            <th colspan="4">September</th>
            <th colspan="4">Oktober</th>
            <th colspan="4">November</th>
            <th colspan="4">Desember</th>
        </tr>
            <tr>
                <?php 
                    for ($i=1; $i <= 12 ; $i++) { 
                ?>
                    <td colspan="2" align="center">Angsuran</td>    
                    <td colspan="2" align="center">Jasa</td> 
                <?php } ?>   
            </tr>
            <tr>
                <?php 
                    for ($i=1; $i <= 12 ; $i++) { 
                ?>
                <td align="center">Bayar</td>
                <td align="center">Sisa</td>
                <td align="center">Bayar</td>
                <td align="center">Jumlah</td>
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
                <td><?= $key->idUser?></td>
                <td><?= $key->namaLengkap?></td>
                <td><?= $key->sisaTotalPeminjaman?></td>
                <td><?= $key->angsuran1 ?></td>
                <td><?= $key->sisaPeminjaman1 ?></td>
                <td><?= $key->jasa1 ?></td>
                <td><?= $key->sisaJasa1 ?></td>
                <td><?= $key->angsuran2 ?></td>
                <td><?= $key->sisaPeminjaman2 ?></td>
                <td><?= $key->jasa2 ?></td>
                <td><?= $key->sisaJasa2 ?></td>
                <td><?= $key->angsuran3 ?></td>
                <td><?= $key->sisaPeminjaman3 ?></td>
                <td><?= $key->jasa3 ?></td>
                <td><?= $key->sisaJasa3 ?></td>
                <td><?= $key->angsuran4 ?></td>
                <td><?= $key->sisaPeminjaman4 ?></td>
                <td><?= $key->jasa4 ?></td>
                <td><?= $key->sisaJasa4 ?></td>
                <td><?= $key->angsuran5 ?></td>
                <td><?= $key->sisaPeminjaman5 ?></td>
                <td><?= $key->jasa5 ?></td>
                <td><?= $key->sisaJasa5 ?></td>
                <td><?= $key->angsuran6 ?></td>
                <td><?= $key->sisaPeminjaman6 ?></td>
                <td><?= $key->jasa6 ?></td>
                <td><?= $key->sisaJasa6 ?></td>
                <td><?= $key->angsuran7 ?></td>
                <td><?= $key->sisaPeminjaman7 ?></td>
                <td><?= $key->jasa7 ?></td>
                <td><?= $key->sisaJasa7 ?></td>
                <td><?= $key->angsuran8 ?></td>
                <td><?= $key->sisaPeminjaman8 ?></td>
                <td><?= $key->jasa8 ?></td>
                <td><?= $key->sisaJasa8 ?></td>
                <td><?= $key->angsuran9 ?></td>
                <td><?= $key->sisaPeminjaman9 ?></td>
                <td><?= $key->jasa9 ?></td>
                <td><?= $key->sisaJasa9 ?></td>
                <td><?= $key->angsuran10 ?></td>
                <td><?= $key->sisaPeminjaman10 ?></td>
                <td><?= $key->jasa10 ?></td>
                <td><?= $key->sisaJasa10 ?></td>
                <td><?= $key->angsuran11 ?></td>
                <td><?= $key->sisaPeminjaman11 ?></td>
                <td><?= $key->jasa11 ?></td>
                <td><?= $key->sisaJasa11 ?></td>
                <td><?= $key->angsuran12 ?></td>
                <td><?= $key->sisaPeminjaman12 ?></td>
                <td><?= $key->jasa12 ?></td>
                <td><?= $key->sisaJasa12 ?></td>
            </tr>
        <?php
        $i++;
            }
        ?>
    </tbody>
</table>
<?php $tanggal_print=$this->db->query("SELECT NOW();")->row_array()['NOW()'];
echo 'Diunduh pada tanggal '.date('d-m-Y, H:i:s', strtotime($tanggal_print));?>

