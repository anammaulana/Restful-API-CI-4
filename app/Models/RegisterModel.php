<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    protected $table = 'member';
    protected $allowedFields = ['nama', 'email', 'password'];

}