<?php
class M_kategori_produk extends CI_Model{

    public function ambil(){
        return $this->db->get('kategori_produk');
    }

    public function input_kp(){
        $params = array(
			'kd_kategori_produk' => $this->input->post('kd_kategori_produk'),
			'nm_kategori_produk' => $this->input->post('nm_kategori_produk'),
			'gambar_kategori_produk' => $this->upload->data('file_name')
		);

		$this->db->insert('kategori_produk', $params);
    }

    public function getDataWhere($katpro){
        $this->db->where('kd_kategori_produk', $katpro);
        return $this->db->get('kategori_produk');
    }

    public function ubah_kp(){
        $params = array(
			'kd_kategori_produk' => $this->input->post('kd_kategori_produk'),
			'nm_kategori_produk' => $this->input->post('nm_kategori_produk')
		);

		if($this->upload->data('file_name') != null){
			$params['gambar_kategori_produk'] = $this->upload->data('file_name');
		}
		$this->db->where('kd_kategori_produk', $this->input->post('kd_kategori_produk'));
		$this->db->update('kategori_produk', $params);
    }

	public function hapus_kp($katpro){
		$this->db->where('kd_kategori_produk',$katpro);
		return $this->db->delete('kategori_produk');
	}
}
