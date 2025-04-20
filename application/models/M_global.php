<?php
class M_global extends CI_Model{

	//bagian Logo
    public function ambil_lg(){
        return $this->db->get('logo');
    }

    public function input_lg(){
		$kode_unik = 'logo-'.date('ymd').'-'.substr(md5(rand()),0,10);

        $params = array(
			'kd_logo' => $kode_unik,
			'gambar_logo' => $this->upload->data('file_name')
		);

		$this->db->insert('logo', $params);
    }

    public function getDataWhere($lg){
        $this->db->where('kd_logo', $lg);
        return $this->db->get('logo');
    }

    public function ubah_lg(){
        $params = array(
			'kd_logo' => $this->input->post('kd_logo')
		);

		if($this->upload->data('file_name') != null){
			$params['gambar_logo'] = $this->upload->data('file_name');
		}
		$this->db->where('kd_logo', $this->input->post('kd_logo'));
		$this->db->update('logo', $params);
    }

	public function hapus_lg($lg){
		$this->db->where('kd_logo',$lg);
		return $this->db->delete('logo');
	}

	public function ambil_kw(){
        return $this->db->get('keyword');
    }

    public function input_kw($data){
        return $this->db->insert('keyword', $data);
    }

	public function getDataWhere2($kw){
        $this->db->where('kd_keyword', $kw);
        return $this->db->get('keyword');
    }

    public function ubah_kw($kw, $data){
        $this->db->where('kd_keyword', $kw);
        return $this->db->update('keyword', $data);
    }

	public function hapus_kw($kw){
		$this->db->where('kd_keyword',$kw);
		return $this->db->delete('keyword');
	}
}
