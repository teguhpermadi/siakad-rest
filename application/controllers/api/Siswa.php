<?php
header('Access-Control-Allow-Origin: *'); // tambahkan ini agar tidak error di angular
header("Access-Control-Allow-Methods: GET, OPTIONS"); // tambahkan ini agar tidak error di angular

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Siswa extends REST_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model', 'siswa');
    }

    public function index_get()
    {
        $id = $this->get('id');
        $detilSiswa = $this->get('detilSiswa');
        
        // cek id
        if($id === null && $detilSiswa === null){
            // jika tidak ada id yang dikirim tampilkan semua data
            $siswa = $this->siswa->getSiswa();
        } else if($id === null && $detilSiswa == 'yes'){
            // jika tidak ada id yang dikirim dan detilSiswa mengirim 'yes' tampilkan semua data detil siswa
            $siswa = $this->siswa->getDetilSiswa();
        } else if($id != null && $detilSiswa == 'yes'){
            // jika ada id yang dikirim dan detilSiswa mengirim 'yes' tampilkan semua data detil siswa
            $siswa = $this->siswa->getDetilSiswa($id);
        }
        else {
            // jika ada id yang dikirim tampilkan data berdasarkan id
            $siswa = $this->siswa->getSiswa($id);
        }
        
        // tampilkan responnya
        if($siswa)
        {
            // jika data ditemukan
            $this->response([
                'status' => true,
                'data' => $siswa
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
            if( $this->siswa->deleteSiswa($id) > 0)
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

        if( $this->siswa->createSiswa($data) > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'new siswa has been created'
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

        if( $this->siswa->updateSiswa($data, $id) > 0)
        {
            $this->response([
                'status' => true,
                'id' => $id,
                'message' => 'siswa has been updated'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}