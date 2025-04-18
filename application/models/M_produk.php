<?php
class M_produk extends CI_Model{

    public function ambil(){
        return $this->db->get('produk');
    }

    public function input_pro(){
		$kode_unik = 'pro-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $tgl = date('ymd');

        $params = array(
			'kd_produk' => $kode_unik,
			'nm_produk' => $this->input->post('nm_produk'),
            'kategori_produk' => $this->input->post('kategori_produk'),
			'gambar_produk' => $this->upload->data('file_name'),
            'harga_produk' => $this->input->post('harga_produk'),
            'deskripsi_produk' => $this->input->post('deskripsi_produk'),
            'petunjuk_produk' => $this->input->post('petunjuk_produk'),
            'tanggal_produk' => $tgl,
            'link_tokped' => $this->input->post('link_tokped'),
            'link_shopee' => $this->input->post('link_shopee'),
		);

		$this->db->insert('produk', $params);
    }

    public function getDataWhere($pro){
        $this->db->where('kd_produk', $pro);
        return $this->db->get('produk');
    }

    public function ubah_pro(){
        $params = array(
			'kd_produk' => $this->input->post('kd_produk'),
			'nm_produk' => $this->input->post('nm_produk'),
            'kategori_produk' => $this->input->post('kategori_produk'),
            'harga_produk' => $this->input->post('harga_produk'),
            'deskripsi_produk' => $this->input->post('deskripsi_produk'),
            'petunjuk_produk' => $this->input->post('petunjuk_produk'),
            'tanggal_produk' => date('ymd'),
            'link_tokped' => $this->input->post('link_tokped'),
            'link_shopee' => $this->input->post('link_shopee'),
		);

		if($this->upload->data('file_name') != null){
			$params['gambar_produk'] = $this->upload->data('file_name');
		}
		$this->db->where('kd_produk', $this->input->post('kd_produk'));
		$this->db->update('produk', $params);
    }

	public function hapus_pro($pro){
		$this->db->where('kd_produk',$pro);
		return $this->db->delete('produk');
	}
}
