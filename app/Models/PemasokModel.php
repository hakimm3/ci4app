<?php

namespace App\Models;

use CodeIgniter\Model;

class PemasokModel extends Model
{

    protected $table = 'pemasok';
    protected $primaryKey = 'id_pemasok';
    protected $useSoftDeletes = true;
    protected $useAutoIncrement = false;

    protected $allowedFields = ['id_pemasok', 'nama_pemasok', 'alamat', 'phone', 'email', 'jabatan'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
