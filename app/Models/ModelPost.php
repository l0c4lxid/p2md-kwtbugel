<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPost extends Model
{
    protected $table = 'tbl_post';
    protected $primaryKey = 'id_post';
    protected $allowedFields = ['id_user', 'judul_post', 'foto_post', 'pembuat_post', 'tanggal_post', 'isi_post'];

}
