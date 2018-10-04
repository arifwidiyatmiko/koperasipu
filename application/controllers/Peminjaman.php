<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PeminjamanModel');
		if (!$this->session->userdata('users_koperasi')) {
			redirect('Auth','refresh');
		}
		$this->load->model('Ref_jaminanPeminjaman');
		$this->load->model('UserModel');
		$this->load->model('SimpananModel');
	}
	public function index()
	{
		$data['peminjaman'] = $this->PeminjamanModel->getPinjamanList()->result();
		$data['anggota'] = $this->UserModel->getUserList('ANGGOTA')->result();
		// print_r($data['peminjaman']);die();
		$this->load->view('header');
		$this->load->view('Peminjaman/peminjaman_index',$data);
		// $this->load->view('sidebar');
		//$this->load->view('peminjaman');
		$this->load->view('footer');
	}

	public function tambah($value='')
	{
		# code...
	}

	public function detail_peminjaman($id){
		$data['detail'] = $this->PeminjamanModel->getDetailPeminjaman($id)->result();
		$this->load->view('header');
		$this->load->view('detail_peminjaman',$data);
		$this->load->view('footer');
	}

	public function cek_jaminan($umur,$bulan)
	{
		# code...
		$where = array('umur' => $umur );
		if ($bulan <= 10) {
			$where['Nama'] = '10 Bulan';
		}else if($bulan >= 24){
			$where['Nama'] = '24 Bulan';
		}else if ($bulan > 10 && $bulan <= 15) {
			$where['Nama'] = '15 Bulan';
		}else if ($bulan > 15 && $bulan <= 20) {
			$where['Nama'] = '20 Bulan';
		}
		$data = $this->Ref_jaminanPeminjaman->cekJaminan($where);
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	public function submit($id='')
	{
		$data = $this->input->post(NULL, TRUE);
		$status = false;
		header('Content-Type: application/json');
		// print_r($data);die();
		$simpan = $this->SimpananModel->getSimpananIdUser($data['idUser'])[0];
		// print_r($simpan);die();
		 // INI BUAT CEK SALDO. JANGAN DI HAPUS

		if ($data['kePeminjaman'] != 0) {
			$idSimpanan = $simpan['idSimpanan'];
			$saldoBaru = $simpan['saldo'] + ($data['kePeminjaman']/2);
			if ($simpan['max_saldokem'] == NULL) {
				$simpan['max_saldokem'] = 0;
			}
			$simpanan = array('idSimpanan' => $idSimpanan, 'nominalBayar' => ($data['kePeminjaman']/2),'tagihanBayar' => ($data['kePeminjaman']/2), 'saldoTerakhir' => $saldoBaru, 'saldokemTerakhir' => $simpan['max_saldokem'], 'tanggal'=>date('Y-m-d H:i:s'));
			$this->SimpananModel->updateSimpanan($idSimpanan,$saldoBaru,$simpan['max_saldokem'],date('Y-m-d H:i:s'));
			$this->SimpananModel->insertSimpanan($simpanan);
		}

		
		// print_r($simpanan);die();
		if (array_key_exists('pelunasan',$data)) {
			# code...
			$this->PeminjamanModel->lunasin($data['pelunasanId']);
		}
		$jasa = 0;$nominal=$data['nominal'];
		for ($i=0; $i < $data['jumlahBulan'] ; $i++) { 
			$jasa += $nominal*$data['persentasePeminjaman']/100;
			$nominal -= $nominal*$data['persentasePeminjaman']/100;
		}
		$data['jasa'] = round($jasa);
		unset($data['pelunasan']);
		unset($data['kePeminjaman']);
		unset($data['pelunasanId']);
		unset($data['persentaseJaminan']);
		// print_r($data);die();
		// $idPeminjaman = 1;
		$idPeminjaman = $this->PeminjamanModel->InsertPeminjaman($data);
		$tanggalTagihan = date_create(date('Y-m-d'));
		$arr = array('idPeminjaman' => $idPeminjaman,'nominalBayar'=>0,'tagihanBayar'=>0 ,'tanggal'=>date('Y-m-d h:i:s'),'jasa'=>0,'tagihanJasa'=>0,'sisaPeminjaman'=>0,'sisaJasa'=>0);

		$arr = [];$jasa = 0;$nominal=$data['nominal'];$nom = $data['nominal'];
		for ($i=0; $i < $data['jumlahBulan'] ; $i++) { 
			$ang['idPeminjaman'] = $idPeminjaman;
			$ang['nominalBayar'] = 0;

			$tagihanBayar = $nominal*$data['persentasePeminjaman']/100;
			// $nominal = $nominal-$tagihanBayar;
			$ang['tagihanBayar'] = $tagihanBayar;
			$ang['tanggal'] = date('Y-m-d h:i:s');
			date_add($tanggalTagihan,date_interval_create_from_date_string("1 month"));
			$ang['tanggalTagihan'] = $tanggalTagihan->format('Y-m-d');
			$ang['statusBayar'] = 0;
			$jasa = $nom*$data['persentasePeminjaman']/100;
			$nom -= $jasa;
			$ang['jasa'] = $jasa; //belum

			$ang['tagihanJasa'] = 0;  //belum
			$ang['sisaPeminjaman'] = 0;
			$ang['sisaJasa'] =  0;
			$ang['kodePerkiraan'] = 1024;
			array_push($arr,$ang);
		}
		// print_r($arr);die();
		$this->PeminjamanModel->angsuranLooping($arr);
		// if ($this->session->userdata('users_koperasi')->role != 'ANGGOTA') {
		// 	# code...
		// 	$status = $this->approvePengajuanReturn($idUsulanPeminjaman,1);
		// }
		echo json_encode(array('status'=>1));
		
		
	}
	public function approvePengajuan($id,$status){
		// $pengajuan = $this->PeminjamanModel->getPengajuanID($id)->result_array()[0];
		$pengajuan = $this->PeminjamanModel->getPengajuanIdUsulanPeminjaman($id)->result_array()[0];

		unset($pengajuan['idUsulanPeminjaman']);		
		$data = $pengajuan;
		$data['tanggal'] = date("Y-m-d",strtotime($data['tanggal']));
		// print_r($data);die();
		$this->PeminjamanModel->InsertPeminjaman($data);
		// print_r($data);die();
		$this->PeminjamanModel->updateStatusPengajuan($id,$status);
		// $angsuranKosong = array('idPeminjaman' =>$id ,'nominalBayar'=>0, );
		// $this->PeminjamanModel->InsertPembayaran($angsuranKosong);
		redirect('Peminjaman','refresh');
	}
	public function approvePengajuanReturn($id,$status){
		// $pengajuan = $this->PeminjamanModel->getPengajuanID($id)->result_array()[0];
		$pengajuan = $this->PeminjamanModel->getPengajuanIdUsulanPeminjaman($id)->result_array()[0];

		unset($pengajuan['idUsulanPeminjaman']);		
		$data = $pengajuan;
		$data['tanggal'] = date("Y-m-d",strtotime($data['tanggal']));
		// print_r($data);die();
		$this->PeminjamanModel->InsertPeminjaman($data);
		// print_r($data);die();
		$this->PeminjamanModel->updateStatusPengajuan($id,$status);
		return true;
		// $angsuranKosong = array('idPeminjaman' =>$id ,'nominalBayar'=>0, );
		// $this->PeminjamanModel->InsertPembayaran($angsuranKosong);
		// redirect('Peminjaman','refresh');
	}

	public function cekPeminjaman($value='')
	{
		$jml = 0;
		$data = $this->PeminjamanModel->peminjamanByUser($value,0);
		foreach ($data as $key) {
			$jml =+ $key->sisaPeminjaman;
		}
		header('Content-Type: application/json');
		echo json_encode(array('jumlah'=>$jml,'data'=>$data));
	}
	public function peminjamanAdmin($value='')
	{
		redirect('Peminjaman/pengajuan/'.$this->input->post('namaAnggota'),'refresh');
	}
	public function pengajuan($value='')
	{
		$this->load->model('Ref_JenispeminjamanModel');
		if ($value != '') {
			$data['anggota'] = $this->UserModel->getUser(array('idUser'=>$value));
		}
		$data['ref_peminjaman'] = $this->Ref_JenispeminjamanModel->getAll();
		$data['minmax'] = $this->Ref_jaminanPeminjaman->minmax()[0];
		$data['saldo'] = $this->SimpananModel->getSimpananIdUser($value);
		if (!empty($data['saldo'])) {
			// echo "string";die();
			$data['saldo'] = $data['saldo'][0]['saldo'];
		}else{
			$data['saldo'] = 0;
		}
		// print_r($data['saldo']);die();
		// print_r($data['ref_peminjaman']->result());die();
		// $this->load->view('header');
		if ($value != '') {
			$this->load->view('header',$data);
			// $this->load->view('Peminjaman/tambahPeminjaman_admin',$data);
		}
		else{
			$this->load->view('header');
			
		}
		$this->load->view('pengajuan_peminjaman',$data);
		$this->load->view('footer');
	}

	public function PengajuanAdmin(){
		$data['pengajuan'] = $this->PeminjamanModel->getPengajuan()->result();
		// print_r($this->session->userdata('users'));die();
		$this->load->view('header');
		$this->load->view('pengajuan_admin',$data);
		$this->load->view('footer');
	}


	public function pembayaran($id){
		$data['bayar'] = $this->PeminjamanModel->getSisaPeminjaman($id);
		// print_r($data['bayar']);die();
		$this->load->view('header');
		$this->load->view('pembayaran',$data);
		$this->load->view('footer');
	}

	public function submitPembayaran($id){

		$angsuran = array('idPeminjaman' => $id, 'nominalBayar' => $this->input->post("bayar_angsuran"),'tagihanBayar' => $this->input->post("tagihanBayar"), 'jasa' => $this->input->post("bayar_jasa") ,'tagihanJasa' => $this->input->post("tagihanJasa") ,'tanggal'=>date('Y-m-d H:i:s'));
		$data = $this->PeminjamanModel->getPeminjamanId($id)->result_array()[0];
		// echo json_encode($data);die();
		$nominal = $this->input->post("sisa_nominal") - $this->input->post("bayar_angsuran");
		$jasa = $data['jasa'] - $this->input->post("bayar_jasa");
		// print_r($angsuran);die();
		// echo $jasa;die();
		$this->PeminjamanModel->updatePembayaran($id,$nominal,$jasa);
		$this->PeminjamanModel->insertPembayaran($angsuran);
		redirect('peminjaman');
		// print_r($nominal); die();

	}

	public function kwitansiJaminan($id){
		$data['kwitansi'] = $this->PeminjamanModel->getKwitansi($id)->result()[0];
		// print_r($data['kwitansi']);die();
		$this->load->view('header');
		$this->load->view('Report/kwitansi_jaminan',$data);
		$this->load->view('footer');
	}

	public function kwitansiPenerimaan($id){
		$data['kwitansi'] = $this->PeminjamanModel->getKwitansi($id)->result()[0];
		// print_r($data['kwitansi']);die();
		$this->load->view('header');
		$this->load->view('Report/kwitansi_penerimaan',$data);
		$this->load->view('footer');
	}

	public function kwitansiPelunasan($id){
		$data['kwitansi'] = $this->PeminjamanModel->getKwitansi($id)->result()[0];
		// print_r($data['kwitansi']);die();
		$this->load->view('header');
		$this->load->view('Report/kwitansi_pelunasan',$data);
		$this->load->view('footer');
	}

	public function kwitansiTotal($id){
		$data['kwitansi'] = $this->PeminjamanModel->getKwitansi($id)->result()[0];
		// print_r($data['kwitansi']);die();
		$this->load->view('header');
		$this->load->view('Report/kwitansi_total',$data);
		$this->load->view('footer');
	}

	public function kwitansiBayar($id){
		$data['kwitansi'] = $this->PeminjamanModel->getKwitansiBayar($id)->result()[0];
		// print_r($data['kwitansi']);die();
		$this->load->view('header');
		$this->load->view('Report/kwitansi_pembayaran',$data);
		$this->load->view('footer');
	}
}
