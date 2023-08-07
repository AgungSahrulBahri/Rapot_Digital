<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TuModel extends CI_Model {
    
    public function get($username){
        $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('tb_tu')->row(); // Untuk mengeksekusi dan mengambil data hasil query

        return $result;
    }
    function insertDataSiswa($data){
        $this->db->insert('tb_siswa', $data);
    }
    function insertDataPrestasi($data){
        $this->db->insert('tb_prestasi', $data);
    }
    function insertDataUPD($data){
        $this->db->insert('tb_upd', $data);
    }
    function insertDataAbs($data){
        $this->db->insert('tb_absensi', $data);
    }
    function insertDataNilai($data){
        $this->db->insert_batch('tb_nilai', $data);
    }
    function insertDataPs($data){
        $this->db->insert('tb_ps', $data);
    }
    function insertDataGuru($data){
        $this->db->insert('tb_guru', $data);
    }
    function insertDataGuruMapel($data){
        $this->db->insert_batch('tb_guru_mapel', $data);
    }
    function getDataPsDetail($id_ps){
        $this->db->where('id_ps', $id_ps);
        $query = $this->db->get('tb_ps');
        return $query->row();
    }
    function updateDataPs($id_ps, $data){
        $this->db->where('id_ps', $id_ps);
        $this->db->update('tb_ps', $data);
    }
    function updateDataMapel($id_mapel, $data){
        $this->db->where('id_mapel', $id_mapel);
        $this->db->update('tb_mapel', $data);
    }
    function getDataSiswaDetail($nis){
        $this->db->where('nis', $nis);
        $query = $this->db->get('tb_siswa');
        return $query->row();
    }
    function getDataMapelDetail($id_mapel){
        $this->db->where('id_mapel', $id_mapel);
        $query = $this->db->get('tb_mapel');
        return $query->row();
    }
    function updateDataSiswa($nis, $data){
        $this->db->where('nis', $nis);
        $this->db->update('tb_siswa', $data);
    }
    function getDataOrtuDetail($nis){
        $this->db->where('nis', $nis);
        $query = $this->db->get('tb_ortu');
        return $query->row();
    }
    function updateDataOrtu($nis, $data){
        $this->db->where('nis', $nis);
        $this->db->update('tb_ortu', $data);
    }
    function insertDataOrtu($data){
        $this->db->insert('tb_ortu', $data);
    }
    function insertDataMapel($data){
        $mapel = $this->db->insert('tb_mapel', $data);
        return $this->db->insert_id();
    }
    function getDataGuruMapelDetail($id_mapel){
        $query = $this->db->query("SELECT * FROM tb_guru_mapel,tb_mapel WHERE tb_mapel.id_mapel = $id_mapel and tb_guru_mapel.id_mapel = $id_mapel");
        return $query->row();
    }
    function getDataGuruDetail($nip){
        // $this->db->where('nip', $nip);
        // var_dump($id_mapel);
        // die;
        $this->db->where('nip', $nip);
        $query = $this->db->get('tb_guru');
        return $query->row();
        
    }
    function updateDataGuru($nip, $data){
        $this->db->where('nip', $nip);
        $this->db->update('tb_guru', $data);
    }
    function updateDataGuruMapel($id, $data){
        $this->db->where('id_mapel', $id);
        $this->db->update('tb_guru_mapel', $data);
    }
    public function delete_mapel($id_mapel)

    {

        return $this->db->delete('tb_mapel', array('id_mapel' => $id_mapel));

    }
    public function delete_ortu($nis)

    {

        return $this->db->delete('tb_ortu', array('nis' => $nis));

    }
    public function delete_guru($nip)

    {
        // $query = $this->db->query("SELECT * FROM tb_guru_mapel WHERE nip = $nip")->row();
        
        $data['guru_mapel'] = $this->db->delete('tb_guru', array('nip' => $nip));
        // $data['guru'] = $this->db->delete('tb_guru', array('nip' => $query->nip));

        return $data;
    }
    public function delete_gurumapel($id_mapel)

    {
        // $query = $this->db->query("SELECT * FROM tb_guru_mapel WHERE id_mapel = $id_mapel")->row();
        
        $data['guru_mapel'] = $this->db->delete('tb_guru_mapel', array('id_mapel' => $id_mapel));
        // $data['guru'] = $this->db->delete('tb_guru', array('nip' => $query->nip));

        return $data;
    }
    public function delete_siswa($nis)

    {

        return $this->db->delete('tb_siswa', array('nis' => $nis));

    }
    public function delete_nilai($nis)

    {

        return $this->db->delete('tb_nilai', array('nis' => $nis));

    }	

     public function update_password($user_id, $new_password) {
        $data = array(
            'password' => $new_password // Simpan password baru dengan format hash MD5
        );

        $this->db->where('id_tu', $user_id);
        $this->db->update('tb_tu', $data);
        return $this->db->affected_rows() > 0; // Mengembalikan true jika proses update berhasil
    }

    public function verify_password($user_id, $password) {
        $this->db->select('password');
        $this->db->from('tb_tu');
        $this->db->where('id_tu', $user_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $user_data = $query->row();
            $hashed_password = $user_data->password;
           
            return $password === $hashed_password; // Membandingkan password dengan format hash MD5
        }

        return false;
    }
}
