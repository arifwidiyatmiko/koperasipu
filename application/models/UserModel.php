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

	function getUserID($id)
	{
		$sql = 'SELECT u.*, p.namaLengkap AS namaPasangan
		FROM user AS u
		LEFT JOIN user AS p ON u.idPasangan = p.idUser
		WHERE u.idUser =  "'.$id.'"';
		return $this->db->query($sql);
	}	 

	function update($id, $data)
	{
		$this->db->where('idUser', $id);
		$this->db->update('user', $data); 
	}
}





?>