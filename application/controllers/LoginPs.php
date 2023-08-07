<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginPs extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('PsModel');
	}

	public function index(){
		
		$this->load->view('loginps'); // Load view login.php
	}

	public function login(){
		$username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
		$password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5

		

		$user = $this->PsModel->get($username); // Panggil fungsi get yang ada di UserModel.php

		if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
			$this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata
			redirect('loginPs'); // Redirect ke halaman login
		}else{
			if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
				$session = array(
					'authenticated'=>true, // Buat session authenticated dengan value true
					'username'=>$user->username,  // Buat session username
					'id_rombel'=>$user->id_rombel, // Buat session authenticated
					'nama_ps'=>$user->nama_ps // Buat session authenticated

				);

				$this->session->set_userdata($session); // Buat session sesuai $session
				redirect('Ps/absensi'); // Redirect ke halaman welcome
			}else{
				$this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
				redirect('LoginPs'); // Redirect ke halaman login
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy(); // Hapus semua session
		redirect('/'); // Redirect ke halaman login
	}
}
