<?php
class M_banner_beranda extends CI_Model{

    public function ambil(){
        return $this->db->get('banner_beranda');
    }

    public function input_bh(){
		$kode_unik = 'kdbh-'.date('ymd').'-'.substr(md5(rand()),0,10);

        $params = array(
			'kd_banner_beranda' => $kode_unik,
			'gambar_banner_beranda' => $this->upload->data('file_name')
		);

		$this->db->insert('banner_beranda', $params);
    }

    public function getDataWhere($bh){
        $this->db->where('kd_banner_beranda', $bh);
        return $this->db->get('banner_beranda');
    }

    public function ubah_bh(){
        $params = array(
			'kd_banner_beranda' => $this->input->post('kd_banner_beranda')
		);

		if($this->upload->data('file_name') != null){
			$params['gambar_banner_beranda'] = $this->upload->data('file_name');
		}
		$this->db->where('kd_banner_beranda', $this->input->post('kd_banner_beranda'));
		$this->db->update('banner_beranda', $params);
    }

	public function hapus_bh($bh){
		$this->db->where('kd_banner_beranda',$bh);
		return $this->db->delete('banner_beranda');
	}
}
