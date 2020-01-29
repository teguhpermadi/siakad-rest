<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Rombel extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rombel_model');
    } 

    /*
     * Listing of rombel
     */
    function index()
    {
        $data['rombel'] = $this->Rombel_model->get_all_rombel();
        
        $data['_view'] = 'rombel/index';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('rombel/index',$data);
        $this->load->view('template/footer',$data);
    }

    /*
     * Adding a new rombel
     */
    function add()
    {   
        $data['siswa'] = $this->Rombel_model->get_all_siswa();
        $data['kelas'] = $this->Rombel_model->get_all_kelas();

        $this->load->library('form_validation');

		$this->form_validation->set_rules('id_tahun','Id Tahun','required');
		$this->form_validation->set_rules('id_kelas','Id Kelas','required');
		$this->form_validation->set_rules('id_siswa','Id Siswa','required');
		
		if($this->form_validation->run())     
        {   
            $params = array();
            $id_tahun = $this->input->post('id_tahun');
            $id_kelas = $this->input->post('id_kelas');
            $id_siswa = $this->input->post('id_siswa[]');

            foreach($id_siswa as $siswa){
                array_push($params, [
                    'id_tahun' => $id_tahun,
                    'id_kelas' => $id_kelas,
                    'id_siswa' => $siswa
                ]);
            }

            // print_r($params);
            
            $this->Rombel_model->add_rombel($params);
            $this->session->set_flashdata('berhasil', 'Anda berhasil menambahkan data id kelas <strong>'.$params['id_kelas'].'</strong>');
            redirect('rombel/index');
        }
        else
        {
			$this->load->model('Tahun_pelajaran_model');
			$data['all_tahun_pelajaran'] = $this->Tahun_pelajaran_model->get_all_tahun_pelajaran();

			$this->load->model('Kelas_model');
			$data['all_kelas'] = $this->Kelas_model->get_all_kelas();
            
            $data['_view'] = 'rombel/add';
            $this->load->view('template/header',$data);
            $this->load->view('template/sidebar',$data);
            $this->load->view('rombel/add',$data);
            $this->load->view('template/footer',$data);
        }
    }  

    /*
     * Editing a rombel
     */
    function edit($id)
    {   
        // check if the rombel exists before trying to edit it
        $data['rombel'] = $this->Rombel_model->get_rombel($id);
        
        if(isset($data['rombel']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('id_tahun','Id Tahun','required');
			$this->form_validation->set_rules('id_kelas','Id Kelas','required');
			$this->form_validation->set_rules('id_siswa','Id Siswa','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'id_tahun' => $this->input->post('id_tahun'),
					'id_kelas' => $this->input->post('id_kelas'),
					'id_siswa' => $this->input->post('id_siswa'),
                );

                $this->Rombel_model->update_rombel($id,$params);      
                $this->session->set_flashdata('berhasil', 'Anda berhasil mengubah data id kelas <strong>'.$params['id_kelas'].'</strong>');
                redirect('rombel/index');
            }
            else
            {
				$this->load->model('Tahun_pelajaran_model');
				$data['all_tahun_pelajaran'] = $this->Tahun_pelajaran_model->get_all_tahun_pelajaran();

				$this->load->model('Kelas_model');
				$data['all_kelas'] = $this->Kelas_model->get_all_kelas();

                $data['_view'] = 'rombel/edit';
                $this->load->view('template/header',$data);
                $this->load->view('template/sidebar',$data);
                $this->load->view('rombel/edit',$data);
                $this->load->view('template/footer',$data);
            }
        }
        else
            show_error('The rombel you are trying to edit does not exist.');
    } 

    /*
     * Deleting rombel
     */
    function remove($id)
    {
        $rombel = $this->Rombel_model->get_rombel($id);

        // check if the rombel exists before trying to delete it
        if(isset($rombel['id']))
        {
            $this->session->set_flashdata('hapus', 'Anda berhasil menghapus data id rombel <strong>'.$rombel['id'].'</strong>');
            $this->Rombel_model->delete_rombel($id);
            redirect('rombel/index');
        }
        else
            show_error('The rombel you are trying to delete does not exist.');
    }

    function tes()
    {
        $params = array();
            $id_tahun = $this->input->post('id_tahun');
            $id_kelas = $this->input->post('id_kelas');
            $id_siswa = $this->input->post('id_siswa[]');

            foreach($id_siswa as $siswa){
                array_push($params, [
                    'id_tahun' => $id_tahun,
                    'id_kelas' => $id_kelas,
                    'id_siswa' => $siswa
                ]);
            }

            $this->db->insert_batch('rombel', $params);
    }
    
}