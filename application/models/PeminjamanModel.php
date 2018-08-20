<?php 

/**
 * 
 */
class PeminjamanModel extends CI_Model
{
	
	function getPinjamanList()
	{
		$sql = 'SELECT u.*, p.*,SUM(angsuran.nominalBayar) as bayar, date_format(p.tanggal, "%d-%m-%Y")  as tanggalPeminjaman
		FROM peminjaman as p
		INNER JOIN angsuran on angsuran.idPeminjaman = p.idPeminjaman
		LEFT JOIN user as u ON p.idUser = u.idUser';
		return $this->db->query($sql);
	}

	function getSisaPeminjaman($id)
	{
		$sql = 'SELECT * FROM peminjaman WHERE idPeminjaman = "'.$id.'" ';
		return $this->db->query($sql)->row();
	}

	function InsertPembayaran($angsuran){
		$this->db->insert('angsuran', $angsuran);
	}

	function updatePembayaran($id, $nominal){
		$this->db->set('sisaPeminjaman',$nominal);
		$this->db->where('idPeminjaman',$id);
		$this->db->update('peminjaman');
	}


}





?>