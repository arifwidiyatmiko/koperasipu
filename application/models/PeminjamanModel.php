<?php 

/**
 * 
 */
class PeminjamanModel extends CI_Model
{
	
	function getPinjamanList()
	{
		$sql = 'SELECT idPeminjaman, date_format(p.tanggal, "%d-%m-%Y")  as tanggalPeminjaman, nominal, jumlahBulan, u.namaLengkap as nama, alamat
		FROM peminjaman as p
		LEFT JOIN user as u ON p.idUser = u.idUser
		';
		return $this->db->query($sql);
	}

	function getNominal()
	{
		$sql = 'SELECT nominal FROM peminjaman WHERE idPeminjaman = "'.$id.'" ';
		return $this->db->query($sql)->row();
	}

	function pembayaranAction($id,  $nom){
		
	}

}





?>