<?php
class M_pengguna extends CI_Model{
    public function validasi_masuk($username, $password){
        $data = array(
            'id_pengguna' => $username,
            'sandi_pengguna' => sha1($password)
        );
        return $this->db->get_where('pengguna', $data);
    }
}