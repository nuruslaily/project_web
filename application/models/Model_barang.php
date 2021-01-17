<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_barang extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('tb_barang');
    }

    public function tampil_ruang()
    {
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

    public function get_data($id)
    {
        $this->db->like('id_ruang',$id);
        return $this->db->get('tb_barang');
    }

    public function getData_Ruang($id)
    {
        $this->db->like('id_ruang',$id);
        return $this->db->get('tb_ruang');
    }

    public function tambah_barang($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_barang($where, $table)
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
        $result = $this->db->where('id_barang', $id)
            ->limit(1)
            ->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_barang($id_barang)
    {
        $result = $this->db->where('id_barang', $id_barang)->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function get_barang_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->like('nama_barang', $keyword);
        $this->db->or_like('kode_barang', $keyword);
        return $this->db->get()->result();
    }

    public function search(){
        $keyword=$this->input->post('keyword');
        $this->db->like('nama_barang',$keyword);
        $this->db->or_like('kode_barang', $keyword);
        $this->db->or_like('keadaan', $keyword);
        return $this->db->from('tb_barang')
          ->join('tb_ruang', 'tb_ruang.id_ruang=tb_barang.id_ruang')
          ->get()
          ->result();
    }

}

/* End model_barang.php */
