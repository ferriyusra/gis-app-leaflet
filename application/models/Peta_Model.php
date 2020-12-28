<?php

class Peta_Model extends CI_Model
{
	public function ambilDataToko()
	{
		return $this->db->get('toko')->result_array();
	}
	public function ambilDataTokoBeranda()
	{
		return $this->db->get('toko', 3)->result_array();
	}

	public function tambahDataToko($data)
	{

		$this->db->insert('toko', $data);
	}

	public function ambilTokoId($id_toko)
	{
		return $this->db->get_where('toko', ['id_toko' => $id_toko])->row_array();
	}

	public function ubahDataToko($data)
	{
		$this->db->where('id_toko', $this->input->post('id_toko'));
		$this->db->update('toko', $data);
	}

	public function hapusTokoId($id_toko)
	{
		$this->db->where('id_toko', $id_toko);
		$this->db->delete('toko');
	}

	public function ambilDataKonten()
	{
		return $this->db->get('produk')->result_array();
	}

	public function ambilDataKontenJoin()
	{
		$this->db->select('*');
		$this->db->from('toko');
		$this->db->join('produk', 'toko.id_toko = produk.id_toko');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function ambilDataPendirijoin()
	{
		$this->db->select('*');
		$this->db->from('toko');
		$this->db->join('pendiri', 'toko.id_toko = pendiri.id_toko');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function tambahDataPendiri($data)
	{
		$this->db->insert('pendiri', $data);
	}
	public function ambilPendiriId($id)
	{
		return $this->db->get_where('pendiri', ['id_pendiri' => $id])->row_array();
	}

	public function ambilDataPendiriJoinUbah()
	{
		$query = "SELECT DISTINCT `toko`.`id_toko`, `toko`.`nama_toko`
		FROM `toko` JOIN `pendiri`
		ON `toko`.`id_toko` = `pendiri`.`id_toko` ";

		return $query_result = $this->db->query($query)->result_array();
	}


	public function ambilDataKontenJoinUbah()
	{
		$query = "SELECT DISTINCT `toko`.`id_toko`, `toko`.`nama_toko`
		FROM `toko` JOIN `produk`
		ON `toko`.`id_toko` = `produk`.`id_toko` ";

		return $query_result = $this->db->query($query)->result_array();
	}

	public function tambahDataKonten($data)
	{
		$this->db->insert('produk', $data);
	}

	public function ambilKontenId($id)
	{
		return $this->db->get_where('produk', ['id' => $id])->row_array();
	}

	public function ambilProduk($id_toko)
	{
		return $this->db->get_where('produk', ['id_toko' => $id_toko])->result_array();
	}
	public function ambilPendiri($id_toko)
	{
		return $this->db->get_where('pendiri', ['id_toko' => $id_toko])->result_array();
	}

	public function ambilProdukDetail($id)
	{
		return $this->db->get_where('produk', ['id' => $id])->result_array();
	}

	public function detailProdukTampil($produkData)
	{
		$this->db->select('*');
		$this->db->where('id', $produkData);
		$res2 = $this->db->get('produk');
		return $res2;
	}
	public function ubahDataKonten($data)
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('produk', $data);
	}
	public function ubahDataPendiri($data)
	{
		$this->db->where('id_pendiri', $this->input->post('id'));
		$this->db->update('pendiri', $data);
	}

	public function hapusPendiriId($id_pendiri)
	{
		$this->db->where('id_pendiri', $id_pendiri);
		$this->db->delete('pendiri');
	}


	public function hapusKontenId($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('produk');
	}

	public function hitungTokoModel()
	{
		$query = $this->db->query('SELECT * FROM toko');
		return $query->num_rows();
	}

	public function hitungProdukModel()
	{
		$query = $this->db->query('SELECT * FROM produk');
		return $query->num_rows();
	}
}
