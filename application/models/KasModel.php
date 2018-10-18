<?php 

class KasModel extends CI_Model
{

	function getPinjamanList()
	{


		/* $sql = 'SELECT u.*,p.*,u.namaLengkap, a.idPeminjaman, SUM(a.nominalBayar) as bayar, SUM(a.jasa) as jasa, p.jasa as sisaJasa, date_format(p.tanggal, "%d-%m-%Y")  as tanggalPeminjaman */

		$sql = 'SELECT u.*,p.*,u.namaLengkap, a.idPeminjaman, p.jasa as totalSisaJasa, SUM(a.nominalBayar) as bayar, SUM(a.jasa) as jasa, date_format(p.tanggal, "%d-%m-%Y")  as tanggalPeminjaman
		FROM angsuran as a
		LEFT JOIN peminjaman as p on p.idPeminjaman = a.idPeminjaman
		LEFT JOIN user as u on p.idUser = u.idUser
		GROUP BY p.idPeminjaman
		';
		return $this->db->query($sql);
	}
	
	function getKasList()
	{
		$sql = 'SELECT k.*, p.*
				FROM kas as k
				LEFT JOIN kode_perkiraan as p on p.noPerkiraan = k.noPerkiraan
				';
		return $this->db->query($sql);
	}

	function getNoPerkiraanList()
	{
		$sql = 'SELECT  p.*
				FROM kode_perkiraan as p 
				';
		return $this->db->query($sql);
	}

	function InsertKas($kas){
		$this->db->insert('kas', $kas);
	}

}

?>