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
	}
	public function index()
	{
		$data['peminjaman'] = $this->PeminjamanModel->getPinjamanList()->result();
		// print_r($this->session->userdata('users'));die();
		$this->load->view('header');
		$this->load->view('peminjaman',$data);
		// $this->load->view('sidebar');
		//$this->load->view('peminjaman');
		$this->load->view('footer');
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
		echo json_encode($data);
	}
	public function cekPeminjaman($value='')
	{
		$jml = 0;
		$data = $this->PeminjamanModel->peminjamanByUser($value);
		foreach ($data as $key) {
			$jml =+ $key->sisaPeminjaman;
		}
		header('Content-Type: application/json');
		echo json_encode(array('jumlah'=>$jml,'data'=>$data));
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


	public function pembayaran($id){
		$data['bayar'] = $this->PeminjamanModel->getSisaPeminjaman($id);
		$this->load->view('header');
		$this->load->view('pembayaran',$data);
		$this->load->view('footer');
	}

	public function submitPembayaran($id){
		$angsuran = array('idPeminjaman' => $id, 'nominalBayar' => $this->input->post("bayar_angsuran"), 'jasa' => $this->input->post("bayar_jasa") ,'tanggal'=>date('Y-m-d H:i:s'));
		$nominal = $this->input->post("sisa_nominal") - $this->input->post("bayar_angsuran");
		$this->PeminjamanModel->updatePembayaran($id,$nominal);
		$this->PeminjamanModel->insertPembayaran($angsuran);
		redirect('peminjaman');
		// print_r($nominal); die();

	}

}
