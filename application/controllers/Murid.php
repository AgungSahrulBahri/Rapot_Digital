<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murid extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Nilai');
	}	

	public function index()
	{
	$data['content'] = $this->db->get('tb_nilai');
	$data['rombel'] = $this->M_Nilai->get_data('tb_rombel')->result();
    $data['jenis'] = $this->M_Nilai->get_data('tb_jenis')->result();
    $data['kategori'] = $this->M_Nilai->get_data('tb_kategori')->result();


		$this->load->view('page/halutamasiswa',$data);
	} 

	public function nilai()
	{
		$this->load->view('siswa/nilai');
	}

	public function jenis()
	{
		$this->load->view('siswa/jenis');
	}
	public function hasil()
	{
		$jenis = $this->uri->segment(3);
		$nis = $this->session->userdata('username');
		$data['hasil'] = $this->db->query("SELECT * FROM tb_siswa,tb_nilai,tb_mapel WHERE tb_mapel.id_mapel = tb_nilai.id_mapel and tb_siswa.nis = tb_nilai.nis and tb_siswa.nis = $nis and tb_nilai.id_jenis = $jenis and tb_nilai.id_kategori = 1 ")->result();
		$data['hasil2'] = $this->db->query("SELECT * FROM tb_siswa,tb_nilai,tb_mapel WHERE tb_mapel.id_mapel = tb_nilai.id_mapel and tb_siswa.nis = tb_nilai.nis and tb_siswa.nis = $nis and tb_nilai.id_jenis = $jenis and tb_nilai.id_kategori = 2 ")->result();


		$this->load->view('siswa/hasil',$data);
	}

	public function absensi()
	{
		$this->load->view('siswa/absensi');
	}

	public function hasilabsen()
	{
		$sem = $this->uri->segment(3);
		$nis = $this->session->userdata('username');
		$data['hasil'] = $this->db->query("SELECT * FROM tb_siswa,tb_absensi,tb_rombel WHERE tb_siswa.id_rombel = tb_rombel.id_rombel and tb_siswa.nis = tb_absensi.nis and tb_siswa.nis = $nis and tb_absensi.id_semester = $sem")->result();

		$this->load->view('siswa/hasilabsen',$data);
	}

	public function raport()
	{
		$this->load->view('siswa/raport');
	}

	public function hasilraport()
	{
		$nis = $this->session->userdata('username');
        $sem = $this->uri->segment(3);
        // var_dump($nis);
		// die;
        

        $data['content'] = $this->db->query("SELECT * FROM tb_siswa,tb_rombel WHERE tb_siswa.id_rombel = tb_rombel.id_rombel  and tb_siswa.nis = $nis");
        $data['sem'] = $this->db->query("SELECT * FROM tb_semester,tb_absensi,tb_siswa where tb_absensi.id_semester = tb_semester.id_semester and tb_absensi.nis = tb_siswa.nis and tb_semester.id_semester = $sem and tb_siswa.nis = $nis");    
        $data['upd'] = $this->db->query("SELECT * FROM tb_semester,tb_siswa,tb_upd WHERE tb_siswa.nis = tb_upd.nis and tb_semester.id_semester = tb_upd.semester and tb_semester.id_semester = $sem and tb_upd.nis = $nis");  
        $data['prestasi'] = $this->db->query("SELECT * FROM tb_semester,tb_siswa,tb_prestasi WHERE tb_siswa.nis = tb_prestasi.nis and tb_semester.id_semester = tb_prestasi.semester and tb_semester.id_semester = $sem and tb_siswa.nis = $nis");  

        $sintakjenis = "SELECT * FROM tb_mapel,tb_siswa,tb_rombel,tb_nilai WHERE tb_mapel.id_mapel = tb_nilai.id_mapel and tb_siswa.nis = tb_nilai.nis and tb_siswa.id_rombel = tb_rombel.id_rombel AND tb_nilai.id_jenis";
        $sintakkategori = "and tb_siswa.nis = $nis and tb_nilai.id_kategori";

        

        // SEMESTER 1
        $data['uh1p'] = $this->db->query("$sintakjenis = 1 $sintakkategori = 1")->result();
        $data['uh2p'] = $this->db->query("$sintakjenis = 2 $sintakkategori = 1")->result();
        $data['uh3p'] = $this->db->query("$sintakjenis = 3 $sintakkategori = 1")->result();
        $data['uh4p'] = $this->db->query("$sintakjenis = 4 $sintakkategori = 1")->result();
        $data['utsp'] = $this->db->query("$sintakjenis = 9 $sintakkategori = 1")->result();
        $data['uasp'] = $this->db->query("$sintakjenis = 10 $sintakkategori = 1")->result();
        $data['uh1k'] = $this->db->query("$sintakjenis = 1 $sintakkategori = 2")->result();
        $data['uh2k'] = $this->db->query("$sintakjenis = 2 $sintakkategori = 2")->result();
        $data['uh3k'] = $this->db->query("$sintakjenis = 3 $sintakkategori = 2")->result();
        $data['uh4k'] = $this->db->query("$sintakjenis = 4 $sintakkategori = 2")->result();
        $data['utsk'] = $this->db->query("$sintakjenis = 9 $sintakkategori = 2")->result();
        $data['uask'] = $this->db->query("$sintakjenis = 10 $sintakkategori = 2")->result();

        // SEMESTER 2

        $data['uh5p'] = $this->db->query("$sintakjenis = 5 $sintakkategori = 1")->result();
        $data['uh6p'] = $this->db->query("$sintakjenis = 6 $sintakkategori = 1")->result();
        $data['uh7p'] = $this->db->query("$sintakjenis = 7 $sintakkategori = 1")->result();
        $data['uh8p'] = $this->db->query("$sintakjenis = 8 $sintakkategori = 1")->result();
        $data['utspg'] = $this->db->query("$sintakjenis = 11 $sintakkategori = 1")->result();
        $data['ukkp'] = $this->db->query("$sintakjenis = 12 $sintakkategori = 1")->result();
        $data['uh5k'] = $this->db->query("$sintakjenis = 5 $sintakkategori = 2")->result();
        $data['uh6k'] = $this->db->query("$sintakjenis = 6 $sintakkategori = 2")->result();
        $data['uh7k'] = $this->db->query("$sintakjenis = 7 $sintakkategori = 2")->result();
        $data['uh8k'] = $this->db->query("$sintakjenis = 8 $sintakkategori = 2")->result();
        $data['utskg'] = $this->db->query("$sintakjenis = 11 $sintakkategori = 2")->result();
        $data['ukkk'] = $this->db->query("$sintakjenis = 12 $sintakkategori = 2")->result();


        $this->load->view('siswa/hasilraport', $data);
	}

}