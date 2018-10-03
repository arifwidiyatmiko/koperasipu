<?php 

/**
 * 
 */
class SimpananModel extends CI_Model
{
	
	function getSimpanan()
	{
		$sql = 'SELECT u.*,s.*, date_format(s.tanggal, "%d-%m-%Y")  as tanggal
		FROM simpanan as s 
		LEFT JOIN user as u on s.idUser = u.noAnggota
		';
		return $this->db->query($sql);
	}

	function getSimpananId($id)
	{
		$sql = 'SELECT *, date_format(tanggal, "%d-%m-%Y")  as tanggal
		FROM simpanan
		WHERE idSimpanan =  "'.$id.'"
		';
		return $this->db->query($sql)->row();
	}

	function updateSimpanan($id, $saldo, $saldo_kematian, $tgl){
		$this->db->set('saldo',$saldo);
		$this->db->set('saldo_iuran_kematian',$saldo_kematian);
		$this->db->set('tanggal',$tgl);
		$this->db->where('idSimpanan',$id);
		$this->db->update('simpanan');
	}

	function InsertSimpanan($bayar){
		$this->db->insert('bayar_simpanan', $bayar);
	}

	function getDetailSimpanan($id)
	{
		$sql = 'SELECT *, date_format(tanggal, "%d-%m-%Y")  as tanggal
		FROM bayar_simpanan
		WHERE idSimpanan =  "'.$id.'"
		';
		return $this->db->query($sql);
	}

}





?>