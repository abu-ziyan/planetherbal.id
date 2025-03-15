<?php
class M_kategori_produk extends CI_Model{

    public function ambil(){
        return $this->db->get('kategori_produk');
    }

    public function input_kp($data){
        return $this->db->insert('kategori_produk', $data);
    }

    public function getDataWhere($katpro){
        $this->db->where('kd_kategori_produk', $katpro);
        return $this->db->get('kategori_produk');
    }

    public function ubah_kp($katpro, $data){
        $this->db->where('kd_kategori_produk', $katpro);
        return $this->db->update('kategori_produk', $data);
    }

	public function hapus_kp($katpro){
		$this->db->where('kd_kategori_produk',$katpro);
		return $this->db->delete('kategori_produk');
	}
}