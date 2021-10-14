<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsumenModel extends Model
{

    protected $table = 'konsumen';
    protected $primaryKey = 'id_konsumen';
    protected $useSoftDeletes = true;
    protected $useAutoIncrement = false;

    protected $allowedFields = ['id_konsumen', 'nama_konsumen', 'alamat', 'phone', 'email', 'jabatan'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
