<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProfile extends Model
{
    protected $table = 'tbl_profile';
    protected $primaryKey = 'id_profile';
    protected $allowedFields = ['id_profile', 'id_user', 'profile_foto', 'profile_wa'];

}
