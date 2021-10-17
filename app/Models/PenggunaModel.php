<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{

    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $useSoftDeletes = true;
    protected $useAutoIncrement = false;

    protected $allowedFields = ['id_pengguna', 'nama_pengguna', 'alamat', 'phone', 'email', 'username', 'password', 'level'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
