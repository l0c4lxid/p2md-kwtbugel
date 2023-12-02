<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProduk extends Model
{
    protected $table = 'tbl_produk';
    protected $primaryKey = 'id_produk';

    protected $allowedFields = ['id_user', 'nama_produk', 'harga_normal', 'harga_diskon', 'foto_produk'];

}
