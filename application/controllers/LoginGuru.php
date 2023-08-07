<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginGuru extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('GuruModel');
		$this->load->library('form_validation');

	}

	public function index(){
		
		$this->load->view('loginguru'); // Load view login.php
	}

	public function login(){
		$username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
		$password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5

		$user = $this->GuruModel->get($username); // Panggil fungsi get yang ada di UserModel.php

		if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
			$this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata
			redirect('LoginGuru'); // Redirect ke halaman login
		}else{
			if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
				$session = array(
					'authenticated'=>true, // Buat session authenticated dengan value true
					'username'=>$user->username,  // Buat session username
					'nama_guru'=>$user->nama_guru,
					'id_mapel' =>$user->id_mapel,
					'nip' =>$user->nip // Buat session authenticated
				);

				$this->session->set_userdata($session); // Buat session sesuai $session
				redirect('Nilai'); // Redirect ke halaman welcome
			}else{
				$this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
				redirect('LoginGuru'); // Redirect ke halaman login
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy(); // Hapus semua session
		redirect('/'); // Redirect ke halaman login
	}

	function change_password(){
		$username=$this->session->userdata('username');
		$x['user']=$this->GuruModel->get($username);
		$this->load->view('guru/change_password',$x);
	}

    public function update_password() {
        // Validasi input form
        $this->form_validation->set_rules('old_password', 'Old Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        $username=$this->session->userdata('username');
		$x['user']=$this->GuruModel->get($username);
        $user_object = $x['user'];
        $id_ps = $user_object->nip;

		

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('guru/change_password');
        } else {
            $user_id = $id_ps; // Gantikan dengan ID user yang sesuai
            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password');

            // Verifikasi password lama
            if ($this->GuruModel->verify_password($user_id, md5($old_password))) {
                // Update password baru
                $this->GuruModel->update_password($user_id, md5($new_password));

                // Tampilkan pesan sukses atau lakukan redirect ke halaman sukses
                // echo "Password updated successfully!";
                $this->session->set_flashdata('simpan', 'Password updated successfully!');
                redirect('LoginGuru/change_password/');
            } else {
                // Tampilkan pesan error atau lakukan redirect kembali ke halaman form
                // echo "Invalid old password!";
                $this->session->set_flashdata('hapus', 'Invalid old password!');
                redirect('LoginGuru/change_password/');
            }
        }
    }
}
