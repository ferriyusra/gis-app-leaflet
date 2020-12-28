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

	public function index()
	{
		$data['title'] = 'SIG Dashboard';
		$data['admin'] = $this->db->get_where('admin', ['nama_admin' => $this->session->userdata('nama_admin')])->row_array();
		$data['toko']   = $this->p_model->hitungTokoModel();
		$data['produk']   = $this->p_model->hitungProdukModel();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer');
	}

	public function toko()
	{
		$data['title']  = 'SIG Data Toko';
		$data['toko']   = $this->p_model->ambilDataToko();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('admin/data-toko', $data);
		$this->load->view('template/footer');
	}

	public function tambahToko()
	{
		$data['title'] = 'SIG Tambah Toko';
		$this->form_validation->set_rules('toko', 'Nama Toko', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat Toko', 'required|trim');
		$this->form_validation->set_rules('latitude', 'Latitude', 'required|trim');
		$this->form_validation->set_rules('longitude', 'Longitude', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskrirpsi Toko', 'required|trim');
		$this->form_validation->set_rules('no_telp', 'No Telpon', 'required|numeric|min_length[4]|max_length[12]|trim');
		$this->form_validation->set_rules('jam', 'Jam Toko', 'required|trim');



		$nama_toko        = $this->input->post('toko', true);
		$alamat_toko      = $this->input->post('alamat', true);
		$latitude         = $this->input->post('latitude', true);
		$longitude        = $this->input->post('longitude', true);
		$deskripsi_toko   = $this->input->post('deskripsi', true);
		$no_telp          = $this->input->post('no_telp', true);
		$jam_buka_jam_tutup         = $this->input->post('jam', true);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('admin/tambah-toko');
			$this->load->view('template/footer');
		} else {
			$config['allowed_types']        = 'jpg|png';
			$config['max_size']             = '3072';
			$config['upload_path']          = './assets/img-db/';
			$config['file_name']            = $_FILES['image']['name'];

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('image')) {
				$gambar = $this->upload->data();
				$data = [
					"nama_toko"         => $nama_toko,
					"alamat_toko"       => $alamat_toko,
					"latitude"          => $latitude,
					"longitude"         => $longitude,
					"deskripsi_toko"    => $deskripsi_toko,
					"no_telp"           => $no_telp,
					"jam_buka_jam_tutup" => $jam_buka_jam_tutup,
					"gambar"            => $gambar['file_name']
				];
				$this->p_model->tambahDataToko($data);
				$this->session->set_flashdata('flash', 'Data toko berhasil ditambahkan');
				redirect('admin/toko');
			} else {
				echo $this->upload->display_errors();
			}
		}
	}

	public function ubahToko($id_toko = '')
	{
		$data['title']      = 'SIG Ubah Toko';
		$data['toko']       = $this->p_model->ambilTokoId($id_toko);
		$this->form_validation->set_rules('toko', 'Nama Toko', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat Toko', 'required|trim');
		$this->form_validation->set_rules('latitude', 'Latitude', 'required|trim');
		$this->form_validation->set_rules('longitude', 'Longitude', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskrirpsi Toko', 'required|trim');
		$this->form_validation->set_rules('no_telp', 'No Telpon', 'required|numeric|max_length[12]|trim');
		$this->form_validation->set_rules('jam', 'Jam Toko', 'required|trim');


		$nama_toko        = $this->input->post('toko', true);
		$alamat_toko      = $this->input->post('alamat', true);
		$latitude         = $this->input->post('latitude', true);
		$longitude        = $this->input->post('longitude', true);
		$deskripsi_toko   = $this->input->post('deskripsi', true);
		$no_telp          = $this->input->post('no_telp', true);
		$jam_buka_jam_tutup         = $this->input->post('jam', true);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('admin/ubah-toko', $data);
			$this->load->view('template/footer');
		} else {
			// cek jika ada gambar yg akan diperbarui
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types']        = 'jpg|png';
				$config['max_size']             = '3072';
				$config['upload_path']          = './assets/img-db/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['toko']['gambar'];
					if ($old_image != $_FILES['gambar']['name']) {
						unlink(FCPATH . 'assets/img-db/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$data = [
				"nama_toko"         => $nama_toko,
				"alamat_toko"       => $alamat_toko,
				"latitude"          => $latitude,
				"longitude"         => $longitude,
				"deskripsi_toko"    => $deskripsi_toko,
				"no_telp"           => $no_telp,
				"jam_buka_jam_tutup"          => $jam_buka_jam_tutup
			];
			$this->p_model->ubahDataToko($data);
			$this->session->set_flashdata('flash', 'Data toko berhasil diubah');
			redirect('admin/toko');
		}
	}

	public function hapusToko($id_toko)
	{
		$this->p_model->hapusTokoId($id_toko);
		$this->session->set_flashdata('flash', 'Data toko berhasil dihapus');
		redirect('admin/toko');
	}

	public function produk()
	{
		$data['title']  	= 'SIG Data Produk Toko';

		$data['kontenJoin'] = $this->p_model->ambilDataKontenJoin();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('admin/data-produk', $data);
		$this->load->view('template/footer');
	}


	public function tambahProduk()
	{
		$data['title'] = 'SIG Tambah Produk';
		$this->form_validation->set_rules('id_toko', 'Nama Toko', 'required|trim');
		$this->form_validation->set_rules('produk', 'Nama Produk', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga Produk', 'required|numeric|trim');
		$data['toko']   = $this->p_model->ambilDataToko();
		$data['kontenJoin'] = $this->p_model->ambilDataKontenJoin();

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



	public function peta()
	{
		$data['title']  = 'SIG Peta Lokasi';
		$data['toko']   = $this->p_model->ambilDataToko();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('admin/peta-lokasi', $data);
		$this->load->view('template/footer');
	}

	public function tampilArahLokasi()
	{
		$data['title']  = 'Arah rute Lokasi';
		$data['toko']   = $this->p_model->ambilDataToko();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('admin/arah-lokasi', $data);
		$this->load->view('template/footer');
	}
}
