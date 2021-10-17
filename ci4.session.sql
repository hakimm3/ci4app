SELECT barang.nama_barang as barang,
    kategori.nama_kategori as kategori,
    pemasok.nama_pemasok as pemasok,
    konsumen.nama_konsumen as konsumen,
    barang.stok as stok,
    barang.min_stok as min_stok,
    barang.created_at as tanggal_masuk,
    barang.satuan as satuan,
    barang.kondisi as kondisi
from barang
    join kategori on barang.id_kategori = kategori.id_kategori
    join pemasok on barang.id_pemasok = pemasok.id_pemasok
    join konsumen on barang.id_konsumen = konsumen.id_konsumen
where barang.id_barang = '8672c55d-4adc-3069-ae4e-0aa55b3066e0';
SELECT id_barang
FROM barang;
SELECT barang.nama_barang as barang,
    barang.satuan as satuan,
    barang_masuk.created_at as tanggal_masuk,
    barang_masuk.qty as qty,
    pemasok.nama_pemasok as pemasok
FROM barang
    JOIN barang_masuk ON barang.id_barang = barang_masuk.id_barang
    JOIN pemasok On barang.id_pemasok = pemasok.id_pemasok;
SELECT barang.nama_barang as barang,
    barang.kondisi as kondisi,
    kategori.nama_kategori as kategori,
    konsumen.nama_konsumen as konsumen,
    barang_keluar.qty as qty,
    barang_keluar.tanggal_keluar as tanggal_keluar,
    barang.satuan as satuan,
    barang.kondisi as kondisi
from barang
    join kategori on barang.id_kategori = kategori.id_kategori
    join konsumen on barang.id_konsumen = konsumen.id_konsumen
    join barang_keluar on barang.id_barang = barang_keluar.id_barang;
SELECT barang.nama_barang as barang,
    kategori.nama_kategori as kategori,
    konsumen.nama_konsumen as konsumen,
    barang_keluar.qty as qty,
    barang_keluar.id_barang_keluar as id_barang_keluar,
    barang_keluar.tanggal_keluar as tanggal_keluar,
    barang.satuan as satuan
from barang
    join kategori on barang.id_kategori = kategori.id_kategori
    join konsumen on barang.id_konsumen = konsumen.id_konsumen
    join barang_keluar on barang.id_barang = barang_keluar.id_barang;