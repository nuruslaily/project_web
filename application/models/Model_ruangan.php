<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ruangan extends CI_Model {

    public function tampil_data(){
        return $this->db->get('tb_ruang');
    }

    public function tampil_data_barang()
    {
        $query = $this->db->query("SELECT * FROM tb_barang b JOIN tb_ruang r ON b.id_ruang=r.id_ruang");
        return $query->result_object();
    }

    public function tampil_data_barang_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM tb_barang b JOIN tb_ruang r ON b.id_ruang=r.id_ruang WHERE b.id_barang = $id");
        return $query->result_object();
    }

    public function get_ruang_keyword($keyword){
        $this->db->select('*');
			$this->db->from('tb_ruang');
			$this->db->like('kode_ruang',$keyword);
			$this->db->or_like('uraian_ruang',$keyword);
			return $this->db->get()->result();
    }  

    public function data_lobby(){
        $query = $this->db->query("SELECT * FROM tb_barang b JOIN tb_ruang r ON b.id_ruang=r.id_ruang WHERE b.id_ruang = 1");
        return $query->result_object();
    } 

    public function data_perpustakaan(){
        $query = $this->db->query("SELECT * FROM tb_barang b JOIN tb_ruang r ON b.id_ruang=r.id_ruang WHERE b.id_ruang = 2");
        return $query->result_object();
    }

    public function data_ipds(){
        $query = $this->db->query("SELECT * FROM tb_barang b JOIN tb_ruang r ON b.id_ruang=r.id_ruang WHERE b.id_ruang = 3");
        return $query->result_object();
    }

    public function data_tu(){
        $query = $this->db->query("SELECT * FROM tb_barang b JOIN tb_ruang r ON b.id_ruang=r.id_ruang WHERE b.id_ruang = 4");
        return $query->result_object();
    }

    public function data_tehnis(){
        $query = $this->db->query("SELECT * FROM tb_barang b JOIN tb_ruang r ON b.id_ruang=r.id_ruang WHERE b.id_ruang = 5");
        return $query->result_object();
    }

    public function data_kepala(){
        $query = $this->db->query("SELECT * FROM tb_barang b JOIN tb_ruang r ON b.id_ruang=r.id_ruang WHERE b.id_ruang = 6");
        return $query->result_object();
    }

    public function data_rapat(){
        $query = $this->db->query("SELECT * FROM tb_barang b JOIN tb_ruang r ON b.id_ruang=r.id_ruang WHERE b.id_ruang = 7");
        return $query->result_object();
    }

    public function data_ksk(){
        $query = $this->db->query("SELECT * FROM tb_barang b JOIN tb_ruang r ON b.id_ruang=r.id_ruang WHERE b.id_ruang = 8");
        return $query->result_object();
    }

    public function data_gudang(){
        $query = $this->db->query("SELECT * FROM tb_barang b JOIN tb_ruang r ON b.id_ruang=r.id_ruang WHERE b.id_ruang = 9");
        return $query->result_object();
    }

}

?>