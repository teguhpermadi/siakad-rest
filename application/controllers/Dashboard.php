<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('Profil_model');
        $this->load->model('Guru_model');
        $this->load->model('Siswa_model');
        
        if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
	
    }

    public function index ()
    {
        // data profil
        $this->data['profil'] = $this->Profil_model->get_all_profil();
        // hitung datanya
        $this->data['num_rows'] = $this->Profil_model->count_row();
        $this->data['jumlah_guru'] = $this->Guru_model->count_row();
        $this->data['jumlah_siswa'] = $this->Siswa_model->count_row();

        $this->session->set_flashdata('message', 'anda berhasil menginput data');
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('administrator/dashboard', $this->data);
        $this->load->view('template/footer');
        
    }
}