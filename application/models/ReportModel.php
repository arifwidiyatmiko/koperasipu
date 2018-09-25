<?php 

/**
 * 
 */
class ReportModel extends CI_Model
{
	public function getPeminjam($tahun, $unit_kerja)
	{
		$this->db->select('user.*');
		$this->db->select('peminjaman.nominal');
		$this->db->select('peminjaman.tanggal');
		$this->db->from('user');
		$this->db->where('YEAR(tanggal)',$tahun);
		$this->db->where('idPekerjaan',$unit_kerja);
		$this->db->join('peminjaman', 'user.idUser = peminjaman.idUser');
		$query = $this->db->get();
        return $query->result();
	}

	public function getDetailAngsuran($tahun, $unit_kerja)
	{

		$sql = "SELECT `user`.*, `peminjaman`.`nominal`, `peminjaman`.`tanggal`, `peminjaman`.sisaPeminjaman as sisaTotalPeminjaman,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 1 THEN `nominalBayar` ELSE NULL END)) AS angsuran1,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 2 THEN `nominalBayar` ELSE NULL END)) AS angsuran2,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 3 THEN `nominalBayar` ELSE NULL END)) AS angsuran3,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 4 THEN `nominalBayar` ELSE NULL END)) AS angsuran4,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 5 THEN `nominalBayar` ELSE NULL END)) AS angsuran5,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 6 THEN `nominalBayar` ELSE NULL END)) AS angsuran6,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 7 THEN `nominalBayar` ELSE NULL END)) AS angsuran7,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 8 THEN `nominalBayar` ELSE NULL END)) AS angsuran8,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 9 THEN `nominalBayar` ELSE NULL END)) AS angsuran9,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 10 THEN `nominalBayar` ELSE NULL END)) AS angsuran10,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 11 THEN `nominalBayar` ELSE NULL END)) AS angsuran11,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 12 THEN `nominalBayar` ELSE NULL END)) AS angsuran12,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 1 THEN angsuran.`sisaPeminjaman` ELSE NULL END)) AS sisaPeminjaman1,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 2 THEN angsuran.`sisaPeminjaman` ELSE NULL END)) AS sisaPeminjaman2,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 3 THEN angsuran.`sisaPeminjaman` ELSE NULL END)) AS sisaPeminjaman3,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 4 THEN angsuran.`sisaPeminjaman` ELSE NULL END)) AS sisaPeminjaman4,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 5 THEN angsuran.`sisaPeminjaman` ELSE NULL END)) AS sisaPeminjaman5,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 6 THEN angsuran.`sisaPeminjaman` ELSE NULL END)) AS sisaPeminjaman6,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 7 THEN angsuran.`sisaPeminjaman` ELSE NULL END)) AS sisaPeminjaman7,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 8 THEN angsuran.`sisaPeminjaman` ELSE NULL END)) AS sisaPeminjaman8,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 9 THEN angsuran.`sisaPeminjaman` ELSE NULL END)) AS sisaPeminjaman9,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 10 THEN angsuran.`sisaPeminjaman` ELSE NULL END)) AS sisaPeminjaman10,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 11 THEN angsuran.`sisaPeminjaman` ELSE NULL END)) AS sisaPeminjaman11,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 12 THEN angsuran.`sisaPeminjaman` ELSE NULL END)) AS sisaPeminjaman12,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 1 THEN angsuran.`jasa` ELSE NULL END)) AS jasa1,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 2 THEN angsuran.`jasa` ELSE NULL END)) AS jasa2,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 3 THEN angsuran.`jasa` ELSE NULL END)) AS jasa3,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 4 THEN angsuran.`jasa` ELSE NULL END)) AS jasa4,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 5 THEN angsuran.`jasa` ELSE NULL END)) AS jasa5,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 6 THEN angsuran.`jasa` ELSE NULL END)) AS jasa6,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 7 THEN angsuran.`jasa` ELSE NULL END)) AS jasa7,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 8 THEN angsuran.`jasa` ELSE NULL END)) AS jasa8,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 9 THEN angsuran.`jasa` ELSE NULL END)) AS jasa9,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 10 THEN angsuran.`jasa` ELSE NULL END)) AS jasa10,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 11 THEN angsuran.`jasa` ELSE NULL END)) AS jasa11,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 12 THEN angsuran.`jasa` ELSE NULL END)) AS jasa12,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 1 THEN angsuran.`sisaJasa` ELSE NULL END)) AS sisaJasa1,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 2 THEN angsuran.`sisaJasa` ELSE NULL END)) AS sisaJasa2,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 3 THEN angsuran.`sisaJasa` ELSE NULL END)) AS sisaJasa3,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 4 THEN angsuran.`sisaJasa` ELSE NULL END)) AS sisaJasa4,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 5 THEN angsuran.`sisaJasa` ELSE NULL END)) AS sisaJasa5,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 6 THEN angsuran.`sisaJasa` ELSE NULL END)) AS sisaJasa6,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 7 THEN angsuran.`sisaJasa` ELSE NULL END)) AS sisaJasa7,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 8 THEN angsuran.`sisaJasa` ELSE NULL END)) AS sisaJasa8,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 9 THEN angsuran.`sisaJasa` ELSE NULL END)) AS sisaJasa9,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 10 THEN angsuran.`sisaJasa` ELSE NULL END)) AS sisaJasa10,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 11 THEN angsuran.`sisaJasa` ELSE NULL END)) AS sisaJasa11,
				GROUP_CONCAT((CASE Month(angsuran.tanggal) WHEN 12 THEN angsuran.`sisaJasa` ELSE NULL END)) AS sisaJasa12,
				Month(angsuran.tanggal) as bulanAngsuran, `angsuran`.* FROM `user` JOIN `peminjaman` ON `user`.`idUser` = `peminjaman`.`idUser` JOIN `angsuran` ON `angsuran`.`idpeminjaman` = `peminjaman`.`idpeminjaman` WHERE YEAR(peminjaman.tanggal) = '$tahun' AND `idPekerjaan` = '$unit_kerja'";
				return $this->db->query($sql)->result();
		// $this->db->select('user.*');
		// $this->db->select('peminjaman.nominal');
		// $this->db->select('peminjaman.tanggal');
		// $this->db->select('Month(angsuran.tanggal) as bulanAngsuran');
		// $this->db->select('angsuran.*');
		// $this->db->from('user');
		// $this->db->where('YEAR(peminjaman.tanggal)',$tahun);
		// $this->db->where('idPekerjaan',$unit_kerja);
		// $this->db->join('peminjaman', 'user.idUser = peminjaman.idUser');
		// $this->db->join('angsuran', 'angsuran.idpeminjaman = peminjaman.idpeminjaman');
		// $query = $this->db->get();
  //       return $query->result();
	}
	 
}

?>