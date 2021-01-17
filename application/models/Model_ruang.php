<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_ruang extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('tb_ruang');
    }

    public function tampil_data_ruang_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM tb_ruang WHERE id_ruang = $id");
        return $query->result_object();
    }

    public function tampil_data_ruangan()
    {
        return $this->db->get('tb_ruang')->result_array();
    }

    public function tambah_ruang($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_ruang($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function find($id)
    {
        $result = $this->db->where('id_ruang', $id)
            ->limit(1)
            ->get('tb_ruang');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_ruang($id_ruang)
    {
        $result = $this->db->where('id_ruang', $id_ruang)->get('tb_ruang');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function get_ruang_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_ruang');
        $this->db->like('kode_ruang', $keyword);
        $this->db->or_like('uraian_ruang', $keyword);
        return $this->db->get()->result();
    }

    public function search(){
        $keyword=$this->input->post('keyword');
        $this->db->like('uraian_ruang',$keyword);
        $this->db->or_like('kode_ruang', $keyword);
        $this->db->or_like('lantai', $keyword);
        $this->db->or_like('pj_ruang', $keyword);
        return $this->db->get('tb_ruang')->result();
    }
}

/* End model_ruang.php */
