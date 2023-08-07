<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('UserModel');
        $this->load->library('form_validation');
	}

    function index(){
		$username=$this->session->userdata('username');
		$x['user']=$this->UserModel->get($username);
		$this->load->view('change_password',$x);
	}

    public function update_password() {
        // Validasi input form
        $this->form_validation->set_rules('old_password', 'Old Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        $username=$this->session->userdata('username');
		$x['user']=$this->UserModel->get($username);
        $user_object = $x['user'];
        $id_ps = $user_object->id_ps;

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('change_password');
        } else {
            $user_id = $id_ps; // Gantikan dengan ID user yang sesuai
            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password');

            // Verifikasi password lama
            if ($this->UserModel->verify_password($user_id, md5($old_password))) {
                // Update password baru
                $this->UserModel->update_password($user_id, md5($new_password));

                // Tampilkan pesan sukses atau lakukan redirect ke halaman sukses
                // echo "Password updated successfully!";
                $this->session->set_flashdata('simpan', 'Password updated successfully!');
                redirect('User/');
            } else {
                // Tampilkan pesan error atau lakukan redirect kembali ke halaman form
                // echo "Invalid old password!";
                $this->session->set_flashdata('hapus', 'Invalid old password!');
                redirect('User/');
            }
        }
    }

	
}
