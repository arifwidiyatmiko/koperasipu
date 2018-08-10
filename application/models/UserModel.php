<?php 

/**
 * 
 */
class UserModel extends CI_Model
{
	
	function getUser($Value)
	{
		$this->db->where($Value);
		return $this->db->get('user');
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