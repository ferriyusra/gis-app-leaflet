<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Peta_Model', 'p_model');
	}
	public function index()
	{
		$data['title'] = "SIG Peta Penyebaran";
		$data['toko']   = $this->p_model->ambilDataTokoBeranda();

		$this->load->view('template-user/header', $data);
		$this->load->view('user/beranda', $data);
		$this->load->view('template-user/footer');
	}
	public function petaToko()
	{
		$data['title'] = "Peta Penyebaran Toko";
		$data['toko']   = $this->p_model->ambilDataToko();

		$this->load->view('template-user/header', $data);
		$this->load->view('user/peta-toko', $data);
		$this->load->view('template-user/footer');
	}

	public function daftarToko()
	{
		$data['title'] = "Daftar Toko";
		$data['toko']   = $this->p_model->ambilDataToko();

		$this->load->view('template-user/header', $data);
		$this->load->view('user/daftar-toko', $data);
		$this->load->view('template-user/footer');
	}

	public function tokoDetail($id_toko = '')
	{
		$data['title'] = "Detail Toko";
		$data['toko']  = $this->p_model->ambilTokoId($id_toko);
		$data['produk'] = $this->p_model->ambilProduk($id_toko);
		$data['pendiri'] = $this->p_model->ambilPendiri($id_toko);

		$this->load->view('template-user/header', $data);
		$this->load->view('user/detail-toko', $data);
		$this->load->view('template-user/footer');
	}




	public function detailProduk()
	{

		$produkData = $this->input->post('produkData');

		if (isset($produkData) and !empty($produkData)) {
			$records = $this->p_model->detailProdukTampil($produkData);
			$output = '';
			foreach ($records->result_array() as $row) {
				$output .=
					'
						<div class="container-fluid">
						<div class="row">
						  <div class="col-md-3">
							<img  src="' . base_url() . 'assets/img-konten/' . $row["gambar_produk"] . '" class="img-fluid rounded-circle" />
						  </div>
						  <div class="col-md">
						  <ul class="list-group">
					
						  <li class="list-group-item">
						  <strong>Nama Oleh-Oleh :</strong>
						  <h4>' . $row["nama_produk"] . '</h4></li>
						  <li class="list-group-item">
							  <strong>Harga :</strong>
							  <p> Rp.' . number_format($row["harga"]) . '</p>
						
						  </li>
						  <li class="list-group-item">
							  <strong>Deskripsi : </strong>
							  ' . $row["deskripsi"] . '
						  </li>
					  </ul>
						  </div>
						</div>
					  </div>';
			}
			echo $output;
		} else {
			exit();
		}
	}
}
