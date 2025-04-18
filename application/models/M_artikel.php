<?php
class M_artikel extends CI_Model{

    public function ambil(){
        return $this->db->get('artikel');
    }

    public function input_art(){
		$kode_unik = 'art-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $tgl = date('ymd');

        $params = array(
			'kd_artikel' => $kode_unik,
			'judul_artikel' => $this->input->post('judul_artikel'),
            'kategori_artikel' => $this->input->post('kategori_artikel'),
			'thumbnail_artikel' => $this->upload->data('file_name'),
            'isi_artikel' => $this->input->post('isi_artikel'),
            'tanggal_artikel' => $tgl
		);

		$this->db->insert('artikel', $params);
    }

    public function getDataWhere($art){
        $this->db->where('kd_artikel', $art);
        return $this->db->get('artikel');
    }

    public function ubah_art(){
        $params = array(
			'kd_artikel' => $this->input->post('kd_artikel'),
			'judul_artikel' => $this->input->post('judul_artikel'),
            'kategori_artikel' => $this->input->post('kategori_artikel'),
            'isi_artikel' => $this->input->post('isi_artikel'),
            'tanggal_artikel' => date('ymd')
		);

		if($this->upload->data('file_name') != null){
			$params['thumbnail_artikel'] = $this->upload->data('file_name');
		}
		$this->db->where('kd_artikel', $this->input->post('kd_artikel'));
		$this->db->update('artikel', $params);
    }

	public function hapus_art($art){
		$this->db->where('kd_artikel',$art);
		return $this->db->delete('artikel');
	}
}
