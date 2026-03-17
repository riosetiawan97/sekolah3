<?php
class M_login extends CI_Model{
    function cekadmin($u,$p){
        $this->db->where('pengguna_username', $u);
        $this->db->where('pengguna_password', md5($p));
        $hasil = $this->db->get('tbl_pengguna');
        return $hasil;
    }

}
