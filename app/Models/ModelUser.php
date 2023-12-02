<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table            = 'tbl_user';
    protected $primaryKey       = 'id_user';

    protected $allowedFields    = ['username','password'];

   
}
