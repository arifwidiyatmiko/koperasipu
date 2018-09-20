<?php
	header('Content-Type: application-vnd.ms-excel');
	header('Content-Disposition: attachment;filename="jadwal_filter.xls"');
?>
<?php
	$ket = str_replace('%20',' ',$this->uri->segment(3));
	$isi = str_replace('%20',' ',$this->uri->segment(4));
	 $hari=array("","","SENIN","SELASA","RABU","KAMIS","JUMAT","SABTU");
?>
<table class="table table-borderless table-data3">
    <thead>
        <tr>
            <th>No</th>
            <th>No Anggota</th>
            <th>Nama</th>
            <th>Nomor Telepon</th>
            <th>Pinjaman</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
            foreach($peminjaman as $p)
        {
        ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $p->idUser ?><td>
            <td><?= $p->namaLengkap?></td>
            <td><?= $p->no_hp?></td>
            <td><?= $p->nominal?></td>
        </tr>
         <?php $i++;}?>
    </tbody>
</table>
<?php $tanggal_print=$this->db->query("SELECT NOW();")->row_array()['NOW()'];
echo 'Diunduh pada tanggal '.date('d-m-Y, H:i:s', strtotime($tanggal_print));?>

