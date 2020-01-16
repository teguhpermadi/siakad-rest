<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mapel extends REST_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mapel_model', 'mapel');
    }

    public function index_get()
    {
        $id = $this->get('id');
        
        // cek id
        if($id === null){
            // jika tidak ada id yang dikirim tampilkan semua data
            $mapel = $this->mapel->getMapel();
        } else {
            // jika ada id yang dikirim tampilkan data berdasarkan id
            $mapel = $this->mapel->getMapel($id);
        }
        
        // tampilkan responnya
        if($mapel)
        {
            // jika data ditemukan
            $this->response([
                'status' => true,
                'data' => $mapel
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
            if( $this->mapel->deleteMapel($id) > 0)
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
            'nama' => $this->post('nama')
        ];

        if( $this->mapel->createMapel($data) > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'new mapel has been created'
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
            'nama' => $this->put('nama')
        ];

        if( $this->mapel->updateMapel($data, $id) > 0)
        {
            $this->response([
                'status' => true,
                'id' => $id,
                'message' => 'mapel has been updated'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}