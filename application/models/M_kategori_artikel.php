<?php
class M_kategori_artikel extends CI_Model{

    public function ambil(){
        return $this->db->get('kategori_artikel');
    }

    public function input_ka(){
        $params = array(
			'kd_kategori_artikel' => $this->input->post('kd_kategori_artikel'),
			'nm_kategori_artikel' => $this->input->post('nm_kategori_artikel'),
			'gambar_kategori_artikel' => $this->upload->data('file_name')
		);

		$this->db->insert('kategori_artikel', $params);
    }

    public function getDataWhere($katart){
        $this->db->where('kd_kategori_artikel', $katart);
        return $this->db->get('kategori_artikel');
    }

    public function ubah_ka(){
        $params = array(
			'kd_kategori_artikel' => $this->input->post('kd_kategori_artikel'),
			'nm_kategori_artikel' => $this->input->post('nm_kategori_artikel')
		);

		if($this->upload->data('file_name') != null){
			$params['gambar_kategori_artikel'] = $this->upload->data('file_name');
		}
		$this->db->where('kd_kategori_artikel', $this->input->post('kd_kategori_artikel'));
		$this->db->update('kategori_artikel', $params);
    }

	public function hapus_ka($katart){
		$this->db->where('kd_kategori_artikel',$katart);
		return $this->db->delete('kategori_artikel');
	}
}