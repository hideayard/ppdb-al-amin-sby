<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'controllers/RestController.php';
class Infos extends RestController
{
    public function __construct()
    {
        parent::__construct();
    }

    // init function
    public function index_get()
    {
        $this->response([
            'success' => true,
            'rec' => [
                'kategori' => $this->c->get_car_category(),
                'jenis' => $this->c->get_car_models()
            ]
        ], RestController::HTTP_OK);
    }

    // individual Car
    public function car_post()
    {
        $id_jenis = $this->post('id_jenis');
        $this->response([
            'success' => true,
            'rec' => [
                'tipe' => $this->c->get_car_type($id_jenis),
                'warna' => $this->c->get_car_colors($id_jenis),
                'harga' => $this->c->get_car_price($id_jenis),
                'rekom' => $this->c->get_car_recom($id_jenis)
            ]
        ], RestController::HTTP_OK);
    }
}
