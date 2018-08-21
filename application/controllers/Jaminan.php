<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jaminan extends CI_Controller {

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
		
		if (!$this->session->userdata('users_koperasi')) {
			redirect('Auth','refresh');
		}
		$this->load->model('Ref_jaminanPeminjaman');
	}
	public function index()
	{
		$data['jaminan'] = $this->Ref_jaminanPeminjaman->getAll()->result();
		$this->load->view('header');
		// $this->load->view('sidebar');
		$this->load->view('jaminan',$data);
		$this->load->view('footer');
	}
	public function tambah()
	{
		// if ($this->Ref_jaminanPeminjaman->getByUmur($this->input->post('umur'))) {
		// 	# code...
		// }
		$umur = array('Nama' => $this->input->post('umur') );
		// print_r($umur);die();
		$id_jaminan = $this->Ref_jaminanPeminjaman->insert($umur);
		// print_r($id_jaminan);die();
		$ref_jaminan = array(
							array('Nama' => '10 Bulan','Persentase'=>$this->input->post('10bulan'),'idJaminan'=>$id_jaminan),
							array('Nama' => '15 Bulan','Persentase'=>$this->input->post('15bulan'),'idJaminan'=>$id_jaminan),
							array('Nama' => '20 Bulan','Persentase'=>$this->input->post('20bulan'),'idJaminan'=>$id_jaminan),	
							array('Nama' => '24 Bulan','Persentase'=>$this->input->post('24bulan'),'idJaminan'=>$id_jaminan),
						);
		$this->Ref_jaminanPeminjaman->insert_refjaminan($ref_jaminan);
		redirect('Jaminan','refresh');
	}
}
