<?php
class BackController extends CI_Controller{
    
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

        $this->load->view('back/template/header', $data);
        $this->load->view('back/'.$page, $data);
        $this->load->view('back/template/footer', $data);
    }
}