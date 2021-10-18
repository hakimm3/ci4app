<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangKeluarModel extends Model
{

    protected $table = 'barang_keluar';
    protected $primaryKey = 'id_barang_keluar';
    protected $useSoftDeletes = true;
    protected $useAutoIncrement = false;

    protected $allowedFields = ['id_barang_keluar', 'tanggal_keluar', 'id_barang', 'qty'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
