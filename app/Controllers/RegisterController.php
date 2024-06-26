<?php

namespace App\Controllers;

use App\Controllers\ResfulController;
use App\Models\RegisterModel;
class RegisterController extends ResfulController
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
            // return $this->respondCreated([
            //     'status' => true,
            //     'pesan' => 'Registrasi Berhasil',
            //     'data' => $data
            // ]);
             return $this->responseHasil(200, true, $data);
        } else {
            return $this->fail('Registrasi Gagal', 500);
        }
    }
}
