<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Kelas extends REST_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kelas_model', 'kelas');
    }

    public function index_get()
    {
        $id = $this->get('id');
        
        // cek id
        if($id === null){
            // jika tidak ada id yang dikirim tampilkan semua data
            $kelas = $this->kelas->getKelas();
        } else {
            // jika ada id yang dikirim tampilkan data berdasarkan id
            $kelas = $this->kelas->getKelas($id);
        }
        
        // tampilkan responnya
        if($kelas)
        {
            // jika data ditemukan
            $this->response([
                'status' => true,
                'data' => $kelas
            ], REST_Controller::HTTP_OK);
        } else {
            // jika data tidak ditemukan
            $this->response([
                'status' => false,
                'message' => 'Data not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');
        // cek id
        if($id === null){
            // jika tidak ada id yang dikirim tampilkan semua data
            $this->response([
                'status' => false,
                'message' => 'id invalid'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if( $this->kelas->deleteKelas($id) > 0)
            {
                // id ditemukan
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_OK);
            } else {
                // id tidak ditemukan
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'id' => $this->post('id'),
            'namaLengkap' => $this->post('namaLengkap')
        ];

        if( $this->kelas->createKelas($data) > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'new kelas has been created'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to create new data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');

        $data = [
            'namaLengkap' => $this->put('namaLengkap')
        ];

        if( $this->kelas->updateKelas($data, $id) > 0)
        {
            $this->response([
                'status' => true,
                'id' => $id,
                'message' => 'kelas has been updated'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}