<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangMasukModel extends Model
{

    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_barang_masuk';
    protected $useSoftDeletes = true;
    protected $useAutoIncrement = false;

    protected $allowedFields = ['id_barang_masuk', 'id_barang', 'id_pengguna', 'qty', 'no_faktur', 'id_kategori'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
