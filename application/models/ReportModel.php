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
		$this->db->from('user');
		$this->db->where('YEAR(tanggal)',$tahun);
		$this->db->where('idPekerjaan',$unit_kerja);
		$this->db->join('peminjaman', 'user.idUser = peminjaman.idUser', 'left');
		$query = $this->db->get();
        return $query->result();
	}
	 
}





?>