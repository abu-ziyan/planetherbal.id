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
		$config['upload_path']		= './assets/images/kategori/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['file_name']		= 'picpro-'.date('ymd').'-'.substr(md5(rand()),0,10);
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
		$config['upload_path']		= './assets/images/kategori/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['file_name']		= 'picpro-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		if(@$_FILES['gambar_kategori_produk']['name'] != null) {
			if($this->upload->do_upload('gambar_kategori_produk')) {
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
		$config['upload_path']		= './assets/images/kategori/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['file_name']		= 'picart-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		if(@$_FILES['gambar_kategori_artikel']['name'] != null) {
			if($this->upload->do_upload('gambar_kategori_artikel')) {
				$post['gambar_kategori_artikel'] = $this->upload->data('file_name');
				$this->M_kategori_artikel->input_ka($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('pesan', 'Data berhasil dimasukkan!');
					redirect('back/kategori_artikel1');
				}
			}else{
				$this->session->set_flashdata('pesan', 'Data gagal dimasukkan!');
				redirect('back/kategori_artikel1');
			}
		}else{
			$post['gambar_kategori_artikel'] = null;
			$this->M_kategori_artikel->input_ka($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('pesan', 'Data berhasil dimasukkan!');
				redirect('back/kategori_artikel1');
			}
		}
	}

	public function edit_katart($katart){
		$data['kategori_artikel'] = $this->M_kategori_artikel->getDataWhere($katart)->row();
        $this->load->view('back/template/header', $data);
        $this->load->view('back/kategori_artikel3', $data);
        $this->load->view('back/template/footer', $data);
	}

    public function ubah_katart(){
		$config['upload_path']		= './assets/images/kategori/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['file_name']		= 'picart-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		if(@$_FILES['gambar_kategori_artikel']['name'] != null) {
			if($this->upload->do_upload('gambar_kategori_artikel')) {
				$post['gambar_kategori_artikel'] = $this->upload->data('file_name');
				$this->M_kategori_artikel->ubah_ka($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('pesan', 'Data berhasil dubah!');
					redirect('back/kategori_artikel1');
				}
			}else{
				$this->session->set_flashdata('pesan', 'Data gagal dimasukkan!');
				redirect('back/kategori_artikel1');
			}
		}else{
			$post['gambar_kategori_artikel'] = null;
			$this->M_kategori_artikel->ubah_ka($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
				redirect('back/kategori_artikel1');
			}
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

	public function input_pro(){
		$config['upload_path']		= './assets/images/produk/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['file_name']		= 'picpro-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		if(@$_FILES['gambar_kategori_produk']['name'] != null) {
			if($this->upload->do_upload('gambar_kategori_produk')) {
				$post['gambar_kategori_produk'] = $this->upload->data('file_name');
				$this->M_kategori_produk->input_kp($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('pesan', 'Data berhasil dimasukkan!');
					redirect('back/produk1');
				}
			}else{
				$this->session->set_flashdata('pesan', 'Data gagal dimasukkan!');
				redirect('back/produk1');
			}
		}else{
			$post['gambar_kategori_produk'] = null;
			$this->M_kategori_produk->input_kp($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('pesan', 'Data berhasil dimasukkan!');
				redirect('back/produk1');
			}
		}
	}

    public function edit_pro($pro){
		$data['kategori_produk'] = $this->M_kategori_produk->getDataWhere($pro)->row();
        $this->load->view('back/template/header', $data);
        $this->load->view('back/produk3', $data);
        $this->load->view('back/template/footer', $data);
	}

    public function ubah_pro(){
		$config['upload_path']		= './assets/images/produk/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['file_name']		= 'picpro-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		if(@$_FILES['gambar_kategori_produk']['name'] != null) {
			if($this->upload->do_upload('gambar_kategori_produk')) {
				$post['gambar_kategori_produk'] = $this->upload->data('file_name');
				$this->M_kategori_produk->ubah_kp($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('pesan', 'Data berhasil dubah!');
					redirect('back/produk1');
				}
			}else{
				$this->session->set_flashdata('pesan', 'Data gagal dimasukkan!');
				redirect('back/produk1');
			}
		}else{
			$post['gambar_kategori_produk'] = null;
			$this->M_kategori_produk->ubah_kp($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
				redirect('back/produk1');
			}
		}
	}

    public function hapus_pro($pro){
		$delete = $this->M_kategori_produk->hapus_kp($pro);

		if($delete){
			$this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
			redirect('back/produk1');
		}else{
			echo "Gagal";
		}
	}

}
