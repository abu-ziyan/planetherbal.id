<?php
class FrontController extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('M_kategori_produk');
        $this->load->model('M_kategori_artikel');
		$this->load->model('M_artikel');
		$this->load->model('M_produk');
		$this->load->model('M_banner_beranda');
		$this->load->model('M_global');
    }

    public function index() {
        $data['kategori_artikel'] = $this->M_kategori_artikel->tarikData();
		$data['kategori_produk'] = $this->M_kategori_produk->tarikData();

        $this->load->view('front/template/header', $data);
        $this->load->view('front/index', $data);
        $this->load->view('front/template/footer', $data);
    }

    public function halaman($page){
        if($this->load->view('front/'.$page,'',TRUE) === '') {

        }else{
            if($page === "index"):
                $title = 'Planet Herbal Indonesia | Toko Herbal no. 1 di Indonesia';
            else:
                $title = 'Planet Herbal Indonesia | Toko Herbal no. 1 di Indonesia';
            endif;
        }

        $data['title'] = $title;
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
		
		$this->load->view('front/template/header', $data);
        $this->load->view('front/'.$page, $data);
        $this->load->view('front/template/footer', $data);
    }
}