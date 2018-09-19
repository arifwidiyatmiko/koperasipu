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
	public function getId($id)
	{
		$sql = "SELECT jaminan.idJaminan, jaminan.Nama as umur, ref_jaminanbulan.*  FROM `jaminan` INNER JOIN `ref_jaminanbulan` on ref_jaminanbulan.idJaminan = jaminan.idJaminan WHERE jaminan.ID = '$id' ";
		return $this->db->query($sql);
	}
	public function getByUmur($value='')
	{
		$this->db->where('Nama', $value);
		return $this->db->get('jaminan')->num_rows();
	}
	public function minmax()
	{
		$sql = 'SELECT min(Nama) as kecil,max(Nama) as besar FROM jaminan';
		return $this->db->query($sql)->result();
	}
	public function update($data)
	{
		$this->db->set('Persentase',$data['persentase']);
		$this->db->where('ID', $data['id']);
		$this->db->update('ref_jaminanbulan');
	}
	public function cekJaminan($value)
	{
		$sql = 'SELECT jaminan.Nama as umur, ref_jaminanbulan.Nama as bulan, ref_jaminanbulan.Persentase as persentase FROM `ref_jaminanbulan` INNER JOIN `jaminan` on jaminan.idJaminan = ref_jaminanbulan.idJaminan WHERE jaminan.Nama = '.$value['umur'].' AND ref_jaminanbulan.Nama = "'.$value['Nama'].'" ';
		return $this->db->query($sql)->result();
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