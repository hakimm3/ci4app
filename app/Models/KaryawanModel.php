<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{

    protected $table      = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $useSoftDeletes = true;
    protected $useAutoIncrement = false;

    protected $allowedFields = ['id_karyawan', 'nama_karyawan', 'alamat', 'phone', 'email', 'jabatan'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
