<?php
class M_kategori_artikel extends CI_Model{

    public function ambil(){
        return $this->db->get('kategori_artikel');
    }

    public function input_ka($data){
        return $this->db->insert('kategori_artikel', $data);
    }

    public function getDataWhere($katart){
        $this->db->where('kd_kategori_artikel', $katart);
        return $this->db->get('kategori_artikel');
    }

    public function ubah_ka($katart, $data){
        $this->db->where('kd_kategori_artikel', $katart);
        return $this->db->update('kategori_artikel', $data);
    }
}