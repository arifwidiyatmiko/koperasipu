<?php
	header('Content-Type: application-vnd.ms-excel');
	header('Content-Disposition: attachment;filename="jadwal_filter.xls"');
?>
<?php
	$ket = str_replace('%20',' ',$this->uri->segment(3));
	$isi = str_replace('%20',' ',$this->uri->segment(4));
	 $hari=array("","","SENIN","SELASA","RABU","KAMIS","JUMAT","SABTU");
?>
<div align="center">
<table width="100%" align="center">
	<tr>
		<th align="right" colspan="6"><b>FRM/DPD/KRP/007</b></th>
	</tr>
	<tr>
		<th width="15%"><img src="<?PHP echo base_url(); ?>assets/img/logoipb2.png" align="left" height="80px" width="80px"></th>
		<th width="70%"><h4 align="center">KEMENTERIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI <br>
			INSTITUT PERTANIAN BOGOR <br>PROGRAM DIPLOMA </h4>
			<h5 align="center"><br>Kampus IPB Cilibende, Jl. Kumbang No. 14 Bogor 16151 <br>Telp. (0251) 8329101, 832905, Fax (0251) 8329101</h5>
		</th>
	</tr><HR>
	<tr>
		<th width="15%"></th>
		<th width="70%"><h4 align="center">JADWAL KULIAH PRAKTIKUM DAN RESPONSI <br>
			SEMESTER GENAP TAHUN AKADEMIK 2015/2016</h4><br>
		</th>
	</tr>
</table>
<table>
			<table border="1">
				<tr>
					<th align="center">KELAS</th>
					<th align="center">MATA KULIAH</th>
					<th align="center" >HARI</th>
					<th align="center">JAM</th>
					<th align="center">RUANGAN</th>
					<th align="center">KETERANGAN</th>
				</tr>
				
</table>

</table>
<?php $tanggal_print=$this->db->query("SELECT NOW();")->row_array()['NOW()'];
echo 'Diunduh pada tanggal '.date('d-m-Y, H:i:s', strtotime($tanggal_print));?>

