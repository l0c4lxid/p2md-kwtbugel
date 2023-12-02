<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelReview extends Model
{
    protected $table = 'tbl_review';
    protected $primaryKey = 'id_review';

    protected $allowedFields = ['id_user', 'nama_review', 'isi_review', 'pekerjaan_review', 'foto_review'];

}
