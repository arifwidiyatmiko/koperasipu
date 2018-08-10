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
}





?>