<?php 

/**
 * 
 */
class Ref_JenispeminjamanModel extends CI_Model
{
	
	function getAll()
	{
		return $this->db->get('ref_jenispeminjaman');
	}

	public function getUserList($where='')
	{
		if ($where != '') {
			$this->db->where('role', $where);
		}
		return $this->db->get('user');
	}
}





?>