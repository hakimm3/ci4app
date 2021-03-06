<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->group('', ['filter' => 'LevelCheck'], function ($routes) {
    $routes->get('/Pages/pengguna', 'Pages::pengguna');
    $routes->get('/pengguna', 'Pages::pengguna');
    $routes->get('/Auth/register', 'Auth::register');
    $routes->get('/Pages/details_pengguna/(:any)', 'Pages::details_pengguna/$1');
    $routes->get('/Pages/edit_pengguna/(:any)', 'Pages::edit_pengguna/$1');
});

$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
    // Add all routes need protectted by this filter

    $routes->get('/', 'Pages::dashboard');
    $routes->get('/karyawan', 'Manage::karyawan');
    $routes->get('/pemasok', 'Manage::pemasok');
    $routes->get('/konsumen', 'Manage::konsumen');

    $routes->get('/tambah_karyawan', 'Manage::tambah_karywan');

    $routes->get('/Pages', 'Pages::dashboard');
    $routes->get('/beranda', 'Pages::dashboard');
    $routes->get('/stokmenipis', 'Pages::stokmenipis');
    $routes->get('/Pages/stokmenipis', 'Pages::stokmenipis');
    $routes->get('/manajemenbarang', 'Pages::manajemenbarang');
    $routes->get('/Pages/manajemenbarang', 'Pages::manajemenbarang');
    $routes->get('/pengguna', 'Pages::pengguna');
    $routes->get('/Pages/pengguna', 'Pages::pengguna');
    $routes->get('/Pages/manajemenkategori', 'Pages::manajemenkategori');
    $routes->get('/kategori', 'Pages::manajemenkategori');


    $routes->get('/transaksimasuk', 'Transaksi::barangmasuk');
    $routes->get('/transaksikeluar', 'Transaksi::barangkeluar');
    $routes->get('/tambahtransaksimasuk', 'Transaksi::tambahbarangmasuk');
    $routes->get('/tambahtransaksikeluar', 'Transaksi::tambahbarangkeluar');


    $routes->get('/laporanbarangmasuk', 'Laporan::laporanbarangmasuk');
    $routes->get('/laporanbarangkeluar', 'Laporan::laporanbarangkeluar');
    $routes->get('/laporankonsumen', 'Laporan::laporankonsumen');
    $routes->get('/laporanpemasok', 'Laporan::laporanpemasok');



    // _________________________________________________________________________

    $routes->get('/Pages/details_barang/(:any)', 'Pages::details_barang/$1');
    $routes->get('/Pages/details_barang2/(:any)', 'Pages::details_barang2/$1');
    $routes->get('/Pages/details_pengguna/(:any)', 'Pages::details_pengguna/$1');

    $routes->get('/Pages/tambahbarang', 'Pages::tambahbarang');
    $routes->get('/Pages/tambahkategori', 'Pages::tambahkategori');

    $routes->get('/Pages/edit_barang/(:any)', 'Pages::edit_barang/$1');
    $routes->get('/Pages/edit_barang2/(:any)', 'Pages::edit_barang2/$1');
    $routes->get('/Pages/edit_pengguna/(:any)', 'Pages::edit_pengguna/$1');
    $routes->get('/Pages/edit_kategori/(:any)', 'Pages::edit_kategori/$1');

    $routes->get('/Pages/hapus_barang/(:any)', 'Pages::hapus_barang/$1');
    $routes->get('/Pages/hapus_barang2/(:any)', 'Pages::hapus_barang2/$1');
    $routes->get('/Pages/hapus_kategori/(:any)', 'Pages::hapus_kategori/$1');
});

$routes->group('', ['filter' => 'AlreadyLogin'], function ($routes) {
    $routes->get('/Auth/login', 'Auth::login');
    $routes->get('/auth/login', 'Auth::login');
});



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
