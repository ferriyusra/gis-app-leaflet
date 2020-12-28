<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('nama_admin')) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Maaf tidak ada akses
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
			redirect('auth');
		}
		$this->load->model('Peta_Model', 'p_model');
	}



	public function tambahProduk()
	{
		$data['title'] = 'SIG Tambah Produk';
		$this->form_validation->set_rules('id_toko', 'Nama Toko', 'required|trim');
		$this->form_validation->set_rules('produk', 'Nama Produk', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga Produk', 'required|numeric|trim');
		$data['pendiri']   = $this->p_model->ambilDataToko();
		$data['pendiriJoin'] = $this->p_model->ambilDataKontenJoin();

		$id_toko 		= $this->input->post('id_toko', true);
		$produk        	= $this->input->post('produk', true);
		$deskripsi      = $this->input->post('deskripsi', true);
		$harga          = $this->input->post('harga', true);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('admin/tambah-produk', $data);
			$this->load->view('template/footer');
		} else {
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['max_size']             = '2048';
			$config['upload_path']          = './assets/img-konten/';
			$config['file_name']            = $_FILES['image']['name'];

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('image')) {
				$gambar = $this->upload->data();
				$data = [
					"id_toko"			=> $id_toko,
					"gambar_produk"     => $gambar['file_name'],
					"nama_produk"       => $produk,
					"deskripsi"      	=> $deskripsi,
					"harga"          	=> $harga
				];
				$this->p_model->tambahDataKonten($data);
				$this->session->set_flashdata('flash', 'Data produk berhasil ditambahkan');
				redirect('admin/produk');
			} else {
				echo $this->upload->display_errors();
			}
		}
	}


	public function ubahProduk($id = '')
	{
		$data['title'] 			= 'SIG Ubah Konten';
		$data['konten']      	= $this->p_model->ambilKontenId($id);
		$data['kontenJoin'] 	= $this->p_model->ambilDataKontenJoinUbah();
		$this->form_validation->set_rules('id_toko', 'Nama Toko', 'required|trim');
		$this->form_validation->set_rules('produk', 'Nama Produk', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga Produk', 'required|numeric|trim');


		$id_toko 		= $this->input->post('id_toko', true);
		$produk        	= $this->input->post('produk', true);
		$deskripsi      = $this->input->post('deskripsi', true);
		$harga          = $this->input->post('harga', true);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('admin/ubah-produk', $data);
			$this->load->view('template/footer');
		} else {
			// cek jika ada gambar yg akan diperbarui
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types']        = 'jpg|png|jpeg';
				$config['max_size']             = '2048';
				$config['upload_path']          = './assets/img-konten/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['konten']['gambar_produk'];

					if ($old_image != $_FILES['konten']['name']) {
						unlink(FCPATH . 'assets/img-konten/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');

					$this->db->set('gambar_produk', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$data = [
				"id_toko"			=> $id_toko,
				"nama_produk"       => $produk,
				"deskripsi"      	=> $deskripsi,
				"harga"          	=> $harga
			];
			$this->p_model->ubahDataKonten($data);
			$this->session->set_flashdata('flash', 'Data produk berhasil diubah');
			redirect('admin/produk');
		}
	}

	public function hapusKonten($id)
	{
		$this->p_model->hapusKontenId($id);
		$this->session->set_flashdata('flash', 'Data produk berhasil dihapus');
		redirect('admin/produk');
	}
}
