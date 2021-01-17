<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kendaraan extends CI_Model {

    public function tampil_data(){
        return $this->db->get('tb_kendaraan');
    }

    public function tampil_data_kendaraan_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM tb_kendaraan WHERE id_kendaraan = $id");
        return $query->result_object();
    }

    public function tambah_kendaraan($data,$table){
        $this->db->insert($table,$data);
    }

    public function edit_kendaraan($where,$table){
       return $this->db->get_where($table,$where);
    }

    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function find($id){
        $result = $this->db->where('id_kendaraan', $id)
                        ->limit(1)
                        ->get('tb_kendaraan');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }

    public function detail_kendaraan($id_kendaraan)
    {
        $result =$this->db->where('id_kendaraan', $id_kendaraan)->get('tb_kendaraan');
        if($result->num_rows() > 0){
            return $result->result();
        } else{
            return false;
        }
    }
    public function search(){
        $keyword=$this->input->post('keyword');
        $this->db->like('nopol',$keyword);
        $this->db->or_like('kode_kendaraan', $keyword);
        $this->db->or_like('tipe_kendaraan', $keyword);
        $this->db->or_like('merk_kendaraan', $keyword);
        return $this->db->get('tb_kendaraan')->result();
    }
}

/* End model_kendaraan.php */

?>