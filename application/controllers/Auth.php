<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('nama_admin')) {
			redirect('admin');
		}

		$this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'trim|required');
		$this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data['title']  = 'Masuk Admin';
			$this->load->view('auth/admin-masuk', $data);
		} else {
			//validasi lolos
			$this->_masukAdminProses();
		}
	}


	private function _masukAdminProses()
	{
		$nama_pengguna = $this->input->post('nama_pengguna');
		$password = $this->input->post('password');

		$admin = $this->db->get_where('admin', ['nama_admin' => $nama_pengguna])->row_array();


		if ($admin) {
			if ($password == $admin['kata_sandi']) {
				$data = [
					'nama_admin' => $admin['nama_admin']
				];
				$this->session->set_userdata($data);
				redirect('admin');
			} else {
				// var_dump($admin);
				// die;
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Kata sandi salah...
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Nama pengguna salah...
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>');
			redirect('auth');
		}
	}

	public function keluarAdmin()
	{
		$this->session->unset_userdata('nama_admin');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	Berhasil keluar
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>');
		redirect('User');
	}
}
