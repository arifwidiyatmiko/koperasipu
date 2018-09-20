<?php 

/**
 * 
	TABEL PEMINJAMAN ATRIBUT STATUS 
	0: BELUM LUNAS
	1 : LUNAS

	TABEL USULAN PEMINJAMAN ATRIBUT STATUS
	0 : PENDING
	1 : APPROVED
	2 : REJECTED


 */
class PeminjamanModel extends CI_Model
{

	function getPinjamanList()
	{
		$sql = 'SELECT u.*,p.*,u.namaLengkap, a.idPeminjaman, SUM(a.nominalBayar) as bayar, SUM(a.jasa) as jasa, date_format(p.tanggal, "%d-%m-%Y")  as tanggalPeminjaman
		FROM angsuran as a
		LEFT JOIN peminjaman as p on p.idPeminjaman = a.idPeminjaman
		LEFT JOIN user as u on p.idUser = u.idUser
		GROUP BY p.idPeminjaman
		';
		return $this->db->query($sql);
	}
	public function peminjamanByUser($value,$statusLunas='')
	{
		if ($statusLunas == '') {
			$sql = 'SELECT * FROM `peminjaman` WHERE idUser = "'.$value.'" ORDER BY sisaPeminjaman DESC';
		}else{
			$sql = 'SELECT * FROM `peminjaman` WHERE idUser = "'.$value.'" AND status = "'.$statusLunas.'"ORDER BY sisaPeminjaman DESC';
		}
		return $this->db->query($sql)->result();
	}
	//detail per pinjaman
	function getDetailPeminjaman($id)
	{
		$sql = 'SELECT a.*, date_format(a.tanggal, "%d-%m-%Y")  as tanggalAngsuran
		FROM peminjaman as p
		INNER JOIN angsuran as a on a.idPeminjaman = p.idPeminjaman
		LEFT JOIN user as u ON p.idUser = u.idUser
		WHERE p.idPeminjaman =  "'.$id.'"';
		return $this->db->query($sql);
	}

	public function getPeminjam($tahun, $unit_kerja)
	{
		$this->db->select('user.*');
		$this->db->select('peminjaman.nominal');
		$this->db->from('user');
		$this->db->where('YEAR(tanggal)',$tahun);
		$this->db->where('idPekerjaan',$unit_kerja);
		$this->db->join('peminjaman', 'user.idUser = peminjaman.idUser', 'left');
		$query = $this->db->get();
        return $query->result();
	}

	function getSisaPeminjaman($id)
	{
		$sql = 'SELECT * FROM peminjaman WHERE idPeminjaman = "'.$id.'" ';
		return $this->db->query($sql)->row();
	}

	function InsertPembayaran($angsuran){
		$this->db->insert('angsuran', $angsuran);
	}

	function usulanPeminjaman($value='')
	{
		$this->db->insert('usulan_peminjaman',$value);
	}
	public function getUsulanPeminjaman($idUser)
	{
		$this->db->where('idUser', $idUser);
		return $this->db->get('usulan_peminjaman');
	}

	function getPengajuanAll()
	{
		# code...
		return $this->db->get('usulan_peminjaman');
	}
	public function updateStatusPengajuan($id,$status)
	{
		$this->db->set('status',$status);
		$this->db->where('idUsulanPeminjaman', $id);
		$this->db->update('usulan_peminjaman');
	}
	public function getUsulanPeminjamanId($id)
	{
		$this->db->where('idUsulanPeminjaman', $id);
		return $this->db->get('usulan_peminjaman');
	}
	public function usulan_to_peminjaman($array)
	{
		$this->db->insert('peminjaman',$array);
	}

	function lunasin($id)
	{
		$this->db->set('sisaPeminjaman',0);
		$this->db->set('status',1);
		$this->db->where('idPeminjaman', $id);
		$this->db->update('peminjaman');
	}

	function updatePembayaran($id, $nominal, $jasa){
		$this->db->set('sisaPeminjaman',$nominal);
		$this->db->set('jasa',$jasa);
		$this->db->where('idPeminjaman',$id);
		$this->db->update('peminjaman');
	}

	function getPengajuan(){
		$sql = 'SELECT u.*, date_format(u.tanggal, "%d-%m-%Y") as tanggal, user.*
				FROM usulan_peminjaman as u
				LEFT JOIN user ON u.idUser = user.idUser';
		return $this->db->query($sql);
	}

	function getPengajuanID($id){
		$sql = 'SELECT u.*, date_format(u.tanggal, "%d-%m-%Y") as tanggal
				FROM usulan_peminjaman as u
				WHERE u.idUser = "'.$id.'" ';
		return $this->db->query($sql);
	}

	function InsertPeminjaman($data){
		$this->db->insert('peminjaman',$data);
	}

}





?>