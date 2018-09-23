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
	}
	public function index()
	{
		$data['peminjaman'] = $this->PeminjamanModel->getPinjamanList()->result();
		$data['anggota'] = $this->UserModel->getUserList('ANGGOTA')->result();
		// print_r($this->session->userdata('users'));die();
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
	public function submit()
	{
		$data = $this->input->post(NULL, TRUE);
		// $data = $this->input->post();
		// $data = $_POST[];
		header('Content-Type: application/json');
		// print_r($data);
		if (array_key_exists('pelunasan',$data)) {
			# code...
			$this->PeminjamanModel->lunasin($data['pelunasanId']);
		}
		unset($data['pelunasan']);
		unset($data['pelunasanId']);
		unset($data['persentaseJaminan']);
		// print_r($data);die();
		$this->PeminjamanModel->usulanPeminjaman($data);
		echo json_encode(array('status'=>1));
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
		$data['ref_peminjaman'] = $this->Ref_JenispeminjamanModel->getAll();
		$data['minmax'] = $this->Ref_jaminanPeminjaman->minmax()[0];
		// print_r($data['minmax']);die();
		// print_r($data['ref_peminjaman']->result());die();
		$this->load->view('header');
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

	public function approvePengajuan($id,$status){
		// $pengajuan = $this->PeminjamanModel->getPengajuanID($id)->result_array()[0];
		$pengajuan = $this->PeminjamanModel->getPengajuanIdUsulanPeminjaman($id)->result_array()[0];

		unset($pengajuan['idUsulanPeminjaman']);		
		$data = $pengajuan;
		$this->PeminjamanModel->InsertPeminjaman($data);
		$this->PeminjamanModel->statusPengajuan($id,$status);
		redirect('Peminjaman','refresh');
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
		$nominal = $this->input->post("sisa_nominal") - $this->input->post("bayar_angsuran");
		$jasa = $this->input->post("bayar_jasa");
		// print_r($angsuran);die();
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
}
