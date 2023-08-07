<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {
    
    public function get($username){
        $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('tb_ps')->row(); // Untuk mengeksekusi dan mengambil data hasil query

        return $result;
    }

    public function update_password($user_id, $new_password) {
        $data = array(
            'password' => $new_password // Simpan password baru dengan format hash MD5
        );

        $this->db->where('id_ps', $user_id);
        $this->db->update('tb_ps', $data);
        return $this->db->affected_rows() > 0; // Mengembalikan true jika proses update berhasil
    }

    public function verify_password($user_id, $password) {
        $this->db->select('password');
        $this->db->from('tb_ps');
        $this->db->where('id_ps', $user_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $user_data = $query->row();
            $hashed_password = $user_data->password;
           
            return $password === $hashed_password; // Membandingkan password dengan format hash MD5
        }

        return false;
    }
}
