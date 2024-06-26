<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ResfulController extends ResourceController
{
    protected $format = 'json';
    protected function responseHasil($code, $status, $data)
    {
        return $this->respond([
            'code' => $code,
            'status' => $status,
            'data' => $data
        ]);
    }
}
