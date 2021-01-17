<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_auth extends CI_Model {

    public function cek_login()
    {
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db
                       ->where('username', $username)
                       ->where('password', $password)
                       ->limit(1)
                       ->get('tb_user');

        if ($result->num_rows() > 0) {
            return $result->row();
        }else{
            return array();
        }
    }
    
    public function tampil_data()
    {
        return $this->db->get('tb_user');
    }

    public function tampil_data_user_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM tb_user WHERE id = $id");
        return $query->result_object();
    }

    public function edit_user($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

}

/* End of file Model_auth.php */

?>