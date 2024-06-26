<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\RegisterModel;
class RegisterController extends ResourceController
{
    public function register()
    {
        $data = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];

        $model = new RegisterModel();
        if ($model->save($data)) {
            return $this->respondCreated([
                'status' => true,
                'pesan' => 'Registrasi Berhasil',
                'data' => $data
            ]);
        } else {
            return $this->fail('Registrasi Gagal', 500);
        }
    }
}
