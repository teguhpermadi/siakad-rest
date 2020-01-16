<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index ()
    {
        $this->load->view('template/header');
        $this->load->view('administrator/login');
        $this->load->view('template/footer');
    }

    public function prosesLogin(){
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if($this->form_validation->run == FALSE){
            $this->load->view('template/header');
            $this->load->view('administrator/login');
            $this->load->view('template/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = MD5($password);

            $cek = $this->login_model->cek_login($user, $pass);

            // jika username dan password cocok
            if($cek->num_rows() > 0){
                foreach($cek->result() as $ck){
                    $sess_data['username'] = $ck->username;
                    $sess_data['email'] = $ck->email;
                    $sess_data['level'] = $ck->level;

                    $this->session->set_userdata($sess_data);
                }
                if($sess_data['level'] == 'admin'){
                    redirect('administrator/dashboard');
                } else {
                    $this->session->set_flashdata('pesan', 'maaf username dan password salah');
                    redirect('administrator/auth');
                }
            } else {
                $this->session->set_flashdata('pesan', 'maaf username dan password salah');
                redirect('administrator/auth');
            }

        }
    }
}