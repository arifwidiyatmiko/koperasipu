<?php 

/**
 * 
 */
class Ref_jaminanPeminjaman extends CI_Model
{
	
	function getAll()
	{
		$sql = "SELECT jaminan.idJaminan, jaminan.Nama as umur, ref_jaminanbulan.*  FROM `jaminan` INNER JOIN `ref_jaminanbulan` on ref_jaminanbulan.idJaminan = jaminan.idJaminan";
		return $this->db->query($sql);
	}
	public function getByUmur($value='')
	{
		$this->db->where('Nama', $value);
		return $this->db->get('jaminan')->num_rows();
	}

	public function insert($value='')
	{
		$this->db->insert('jaminan',$value);
		return $this->db->insert_id();
	}
	public function insert_refjaminan($object)
	{
		$this->db->insert_batch('ref_jaminanbulan', $object);
	}
}

?>