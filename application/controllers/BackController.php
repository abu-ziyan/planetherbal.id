<?php
class BackController extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('M_kategori_produk');
        $this->load->model('M_kategori_artikel');
		$this->load->model('M_artikel');
		$this->load->model('M_produk');
		$this->load->model('M_banner_beranda');
		$this->load->model('M_global');
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
		$data['artikel'] = $this->M_artikel->ambil()->result();
		$data['produk'] = $this->M_produk->ambil()->result();
		$data['banner_beranda'] = $this->M_banner_beranda->ambil()->result();
		$data['logo'] = $this->M_global->ambil_lg()->result();
		$data['keyword'] = $this->M_global->ambil_kw()->result();
		//$data['mitra'] = $this->M_global->ambil_mtr()->result();
		//$data['lokasi'] = $this->M_global->ambil_lks()->result();		
		$data['kategori_artikel'] = $this->M_kategori_artikel->tarikData();
		$data['kategori_produk'] = $this->M_kategori_produk->tarikData();
		
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
				$this->session->set_flashdata('pesan', 'Data gagal diubah!');
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
				$this->session->set_flashdata('pesan', 'Data gagal diubah!');
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
		$config['file_name']		= 'imgpro-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		if(@$_FILES['gambar_produk']['name'] != null) {
			if($this->upload->do_upload('gambar_produk')) {
				$post['gambar_produk'] = $this->upload->data('file_name');
				$this->M_produk->input_pro($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('pesan', 'Data berhasil dimasukkan!');
					redirect('back/produk1');
				}
			}else{
				$this->session->set_flashdata('pesan', 'Data gagal dimasukkan!');
				redirect('back/produk1');
			}
		}else{
			$post['gambar_produk'] = null;
			$this->M_produk->input_pro($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('pesan', 'Data berhasil dimasukkan!');
				redirect('back/produk1');
			}
		}
	}

    public function edit_pro($pro){
		$data['produk'] = $this->M_produk->getDataWhere($pro)->row();
		$data['kategori_produk'] = $this->M_kategori_produk->tarikData();
        $this->load->view('back/template/header', $data);
        $this->load->view('back/produk3', $data);
        $this->load->view('back/template/footer', $data);
	}

    public function ubah_pro(){
		$config['upload_path']		= './assets/images/produk/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['file_name']		= 'imgpro-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		if(@$_FILES['gambar_produk']['name'] != null) {
			if($this->upload->do_upload('gambar_produk')) {
				$post['gambar_produk'] = $this->upload->data('file_name');
				$this->M_produk->ubah_pro($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
					redirect('back/produk1');
				}
			}else{
				$this->session->set_flashdata('pesan', 'Data gagal diubah!');
				redirect('back/produk1');
			}
		}else{
			$post['gambar_produk'] = null;
			$this->M_produk->ubah_pro($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
				redirect('back/produk1');
			}
		}
	}

    public function hapus_pro($pro){
		$delete = $this->M_produk->hapus_pro($pro);

		if($delete){
			$this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
			redirect('back/produk1');
		}else{
			echo "Gagal";
		}
	}

	public function input_art(){
		$config['upload_path']		= './assets/images/thumbnail/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['file_name']		= 'picthumb-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		if(@$_FILES['thumbnail_artikel']['name'] != null) {
			if($this->upload->do_upload('thumbnail_artikel')) {
				$post['thumbnail_artikel'] = $this->upload->data('file_name');
				$this->M_artikel->input_art($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('pesan', 'Data berhasil dimasukkan!');
					redirect('back/artikel1');
				}
			}else{
				$this->session->set_flashdata('pesan', 'Data gagal dimasukkan!');
				redirect('back/artikel1');
			}
		}else{
			$post['thumbnail_artikel'] = null;
			$this->M_artikel->input_art($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('pesan', 'Data berhasil dimasukkan!');
				redirect('back/artikel1');
			}
		}
	}

    public function edit_art($art){
		$data['artikel'] = $this->M_artikel->getDataWhere($art)->row();
		$data['kategori_artikel'] = $this->M_kategori_artikel->tarikData();
        $this->load->view('back/template/header', $data);
        $this->load->view('back/artikel3', $data);
        $this->load->view('back/template/footer', $data);
	}

    public function ubah_art(){
		$config['upload_path']		= './assets/images/thumbnail/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['file_name']		= 'picthumb-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		if(@$_FILES['thumbnail_artikel']['name'] != null) {
			if($this->upload->do_upload('thumbnail_artikel')) {
				$post['thumbnail_artikel'] = $this->upload->data('file_name');
				$this->M_artikel->ubah_art($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
					redirect('back/artikel1');
				}
			}else{
				$this->session->set_flashdata('pesan', 'Data gagal diubah!');
				redirect('back/artikel1');
			}
		}else{
			$post['thumbnail_artikel'] = null;
			$this->M_artikel->ubah_art($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
				redirect('back/artikel1');
			}
		}
	}

    public function hapus_art($art){
		$delete = $this->M_artikel->hapus_art($art);

		if($delete){
			$this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
			redirect('back/artikel1');
		}else{
			echo "Gagal";
		}
	}

	public function input_bh(){
		$config['upload_path']		= './assets/images/banner/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['file_name']		= 'imgbh-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		if(@$_FILES['gambar_banner_beranda']['name'] != null) {
			if($this->upload->do_upload('gambar_banner_beranda')) {
				$post['gambar_banner_beranda'] = $this->upload->data('file_name');
				$this->M_banner_beranda->input_bh($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('pesan', 'Data berhasil dimasukkan!');
					redirect('back/banner_beranda1');
				}
			}else{
				$this->session->set_flashdata('pesan', 'Data gagal dimasukkan!');
				redirect('back/banner_beranda1');
			}
		}else{
			$post['gambar_banner_beranda'] = null;
			$this->M_banner_beranda->input_bh($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('pesan', 'Data berhasil dimasukkan!');
				redirect('back/banner_beranda1');
			}
		}
	}

    public function edit_bh($bh){
		$data['banner_beranda'] = $this->M_banner_beranda->getDataWhere($bh)->row();
        $this->load->view('back/template/header', $data);
        $this->load->view('back/banner_beranda3', $data);
        $this->load->view('back/template/footer', $data);
	}

    public function ubah_bh(){
		$config['upload_path']		= './assets/images/banner/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['file_name']		= 'imgbh-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		if(@$_FILES['gambar_banner_beranda']['name'] != null) {
			if($this->upload->do_upload('gambar_banner_beranda')) {
				$post['gambar_banner_beranda'] = $this->upload->data('file_name');
				$this->M_banner_beranda->ubah_bh($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
					redirect('back/banner_beranda1');
				}
			}else{
				$this->session->set_flashdata('pesan', 'Data gagal diubah!');
				redirect('back/banner_beranda1');
			}
		}else{
			$post['gambar_banner_beranda'] = null;
			$this->M_banner_beranda->ubah_bh($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
				redirect('back/banner_beranda1');
			}
		}
	}

    public function hapus_bh($bh){
		$delete = $this->M_banner_beranda->hapus_bh($bh);

		if($delete){
			$this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
			redirect('back/banner_beranda1');
		}else{
			echo "Gagal";
		}
	}

	public function input_lg(){
		$config['upload_path']		= './assets/images/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['file_name']		= 'logo-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		if(@$_FILES['gambar_logo']['name'] != null) {
			if($this->upload->do_upload('gambar_logo')) {
				$post['gambar_logo'] = $this->upload->data('file_name');
				$this->M_global->input_lg($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('pesan', 'Data berhasil dimasukkan!');
					redirect('back/headword1');
				}
			}else{
				$this->session->set_flashdata('pesan', 'Data gagal dimasukkan!');
				redirect('back/headword1');
			}
		}else{
			$post['gambar_logo'] = null;
			$this->M_global->input_lg($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('pesan', 'Data berhasil dimasukkan!');
				redirect('back/headword1');
			}
		}
	}

    public function edit_lg($lg){
		$data['logo'] = $this->M_global->getDataWhere($lg)->row();
        $this->load->view('back/template/header', $data);
        $this->load->view('back/headword3', $data);
        $this->load->view('back/template/footer', $data);
	}

    public function ubah_lg(){
		$config['upload_path']		= './assets/images/';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['file_name']		= 'logo-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		if(@$_FILES['gambar_logo']['name'] != null) {
			if($this->upload->do_upload('gambar_logo')) {
				$post['gambar_logo'] = $this->upload->data('file_name');
				$this->M_global->ubah_lg($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
					redirect('back/headword1');
				}
			}else{
				$this->session->set_flashdata('pesan', 'Data gagal diubah!');
				redirect('back/headword1');
			}
		}else{
			$post['gambar_logo'] = null;
			$this->M_global->ubah_lg($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
				redirect('back/headword1');
			}
		}
	}

    public function hapus_lg($lg){
		$delete = $this->M_global->hapus_lg($lg);

		if($delete){
			$this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
			redirect('back/headword1');
		}else{
			echo "Gagal";
		}
	}

	public function input_kw(){
		$kode_unik = 'key-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$data = array(
			'kd_keyword' => $kode_unik,
			'nm_keyword' => $this->input->post('nm_keyword')
		);

		$input = $this->M_global->input_kw($data);

		if($input){
            $this->session->set_flashdata('pesan', 'Data berhasil dimasukkan!');
			redirect('back/headword1');
		}else{
			echo "Gagal";
		}
	}

	public function edit_kw($kw){
		$data['keyword'] = $this->M_global->getDataWhere2($kw)->row();
        $this->load->view('back/template/header', $data);
        $this->load->view('back/headword5', $data);
        $this->load->view('back/template/footer', $data);
	}

	public function ubah_kw(){
		$data = array(
			'kd_keyword' => $this->input->post('kd_keyword'),
			'nm_keyword' => $this->input->post('nm_keyword')
		);

		$kw= $this->input->post('kd_keyword');
		$update = $this->M_global->ubah_kw($kw, $data);

		if($update){
			$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
			redirect('back/headword1');
		}else{
			echo "Gagal";
		}
	}
    
    public function hapus_kw($kw){
		$this->db->where('kd_keyword',$kw);
		$this->db->delete('keyword');

		redirect('back/headword1');
	}


}

