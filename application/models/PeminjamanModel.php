<?php 

/**
 * 
 */
class PeminjamanModel extends CI_Model
{
	
	function getPinjamanList()
	{
		$sql = 'SELECT u.*, u.idUser as UserID, p.*,SUM(a.nominalBayar) as bayar, date_format(p.tanggal, "%d-%m-%Y")  as tanggalPeminjaman
		FROM peminjaman as p
		INNER JOIN angsuran as a on a.idPeminjaman = p.idPeminjaman
		LEFT JOIN user as u ON p.idUser = u.idUser';
		return $this->db->query($sql);
	}
	public function peminjamanByUser($value='')
	{
		$sql = 'SELECT * FROM `peminjaman` WHERE idUser = "'.$value.'" ORDER BY sisaPeminjaman DESC';
		return $this->db->query($sql)->result();
	}
	//detail per pinjaman
	function getDetailPeminjaman($id)
	{
		$sql = 'SELECT a.*, date_format(a.tanggal, "%d-%m-%Y")  as tanggalAngsuran
		FROM peminjaman as p
		INNER JOIN angsuran as a on a.idPeminjaman = p.idPeminjaman
		LEFT JOIN user as u ON p.idUser = u.idUser
		WHERE p.idPeminjaman =  "'.$id.'"';
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