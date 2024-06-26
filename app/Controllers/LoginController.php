<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\MemberModel;
use App\Controllers\ResfulController;

class LoginController extends ResfulController
{
    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $model = new MemberModel();
        $member = $model->where(['email' => $email])->first();
        
        if (!$member) {
            return $this->responseHasil(400, false, "Email tidak ditemukan");
        }
        
        if (!password_verify($password, $member['password'])) {
            return $this->responseHasil(400, false, "Password tidak valid");
        }

        $login = new LoginModel();
        $auth_key = $this->RandomString();
        $login->save([
            'member_id' => $member['id'],
            'auth_key' => $auth_key
        ]);

        $data = [
            'token' => $auth_key,
            'user' => [
                'id' => $member['id'],
                'email' => $member['email'],
            ]
        ];

        return $this->responseHasil(200, true, $data);
        
    }

    private function RandomString($length = 100)
    {
        $karakter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $panjang_karakter = strlen($karakter);
        $str = '';

        for ($i = 0; $i < $length; $i++) {
            $str .= $karakter[rand(0, $panjang_karakter - 1)];
        }

        return $str;
    }
}
