<?php
class BackController extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('M_kategori_produk');
        $this->load->model('M_kategori_artikel');
    }
    
    public function masuk() {
        $data['title'] = "Back End Planet Herbal";

        $this->load->view('back/masuk', $data);
    }

    public function masuk_admin() {
        
        $this->load->model('M_pengguna');

        $username = $this->input->post('id_pengguna');
        $password = $this->input->post('sandi_pengguna');
       
        $validasi = $this->M_pengguna->validasi_masuk($username, $password)->num_rows();
        if($validasi > 0) {
            redirect('back/index');
        }else{
            $this->session->set_flashdata('pesan', 'Username/Password salah');
            redirect('backend');
        }
    }

    public function akses_admin($page){
        if($this->load->view('back/'.$page,'',TRUE) === '') {

        }else{
            if($page === "index"):
                $title = 'Dashboard';
            else:
                $title = ucfirst(str_replace('_',' ',$page));
            endif;
        }

        $data['title'] = "Halaman ".$title;
        $data['kategori_produk'] = $this->M_kategori_produk->ambil()->result();
        $data['kategori_artikel'] = $this->M_kategori_artikel->ambil()->result();

        $this->load->view('back/template/header', $data);
        $this->load->view('back/'.$page, $data);
        $this->load->view('back/template/footer', $data);
    }

    public function input_katpro(){
		$config['upload_path']		= './assets/images';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['file_name']		= 'katpro-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		if(@$_FILES['gambar_kategori_produk']['name'] != null) {
			if($this->upload->do_upload('gambar_kategori_produk')) {
				$post['gambar_kategori_produk'] = $this->upload->data('file_name');
				$this->M_kategori_produk->input_kp($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('pesan', 'Data berhasil dimasukkan!');
					redirect('back/kategori_produk1');
				}
			}else{
				$this->session->set_flashdata('pesan', 'Data gagal dimasukkan!');
				redirect('back/kategori_produk1');
			}
		}else{
			$post['gambar_kategori_produk'] = null;
			$this->M_kategori_produk->input_kp($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('pesan', 'Data berhasil dimasukkan!');
				redirect('back/kategori_produk1');
			}
		}
	}

    public function edit_katpro($katpro){
		$data['kategori_produk'] = $this->M_kategori_produk->getDataWhere($katpro)->row();
        $this->load->view('back/template/header', $data);
        $this->load->view('back/kategori_produk3', $data);
        $this->load->view('back/template/footer', $data);
	}

    public function ubah_katpro(){
		$config['upload_path']		= './assets/images';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['file_name']		= 'katpro-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		if(@$_FILES['gambar_kategori_produk']['name'] != null) {
			if($this->upload->do_upload('gambar_kategori_produk')) {

				$kode = $this->M_kategori_produk->get($this->input->post('kd_kategori_produk'))->row();
				if($kode->gambar_kategori_produk != null) {
					$target_file = './assets/produk/'.$kode->gambar_kategori_produk;
					unlink($target_file);
				}
				$post['gambar_kategori_produk'] = $this->upload->data('file_name');
				$this->M_kategori_produk->ubah_kp($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('pesan', 'Data berhasil dubah!');
					redirect('back/kategori_produk1');
				}
			}else{
				$this->session->set_flashdata('pesan', 'Data gagal dimasukkan!');
				redirect('back/kategori_produk1');
			}
		}else{
			$post['gambar_kategori_produk'] = null;
			$this->M_kategori_produk->ubah_kp($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
				redirect('back/kategori_produk1');
			}
		}
	}

    public function hapus_katpro($katpro){
		$delete = $this->M_kategori_produk->hapus_kp($katpro);

		if($delete){
			$this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
			redirect('back/kategori_produk1');
		}else{
			echo "Gagal";
		}
	}

    public function input_katart(){
		$data = array(
			'kd_kategori_artikel' => $this->input->post('kd_kategori_artikel'),
			'nm_kategori_artikel' => $this->input->post('nm_kategori_artikel')
		);

		$input = $this->M_kategori_artikel->input_ka($data);

		if($input){
            $this->session->set_flashdata('pesan', 'Data berhasil dimasukkan!');
			redirect('back/kategori_artikel1');
		}else{
			echo "Gagal";
		}
	}

	public function edit_katart($katart){
		$data['kategori_artikel'] = $this->M_kategori_artikel->getDataWhere($katart)->row();
        $this->load->view('back/template/header', $data);
        $this->load->view('back/kategori_artikel3', $data);
        $this->load->view('back/template/footer', $data);
	}

    public function ubah_katart(){
		$data = array(
			'kd_kategori_artikel' => $this->input->post('kd_kategori_artikel'),
			'nm_kategori_artikel' => $this->input->post('nm_kategori_artikel')
		);

		$katart = $this->input->post('kd_kategori_artikel');
		$update = $this->M_kategori_artikel->ubah_kar($katart, $data);

		if($update){
			$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
			redirect('back/kategori_artikel1');
		}else{
			echo "Gagal";
		}
	}

    public function hapus_katart($katart){
		$delete = $this->M_kategori_artikel->hapus_ka($katart);

		if($delete){
			$this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
			redirect('back/kategori_artikel1');
		}else{
			echo "Gagal";
		}
	}

}
