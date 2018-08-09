<?php 

/**
 * 
 */
class PeminjamanModel extends CI_Model
{
	
	function getPinjamanList()
	{
		$sql = 'SELECT * FROM peminjaman';
		return $this->db->query($sql);
	}
}





?>