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
$routes->get('/', 'Frontend::index');
$routes->get('/login-admin', 'Frontend::loginAdmin', ['filter' => 'Admin']);
$routes->get('/login', 'Frontend::login');
$routes->get('/pinjam-buku', 'Frontend::pinjamBuku');
$routes->get('/pinjam-buku/pinjam-berhasil/cetak-pinjaman/(:segment)', 'Frontend::cetakPinjaman/$1');
$routes->get('/pinjam-buku/pinjam-berhasil', 'Frontend::pinjamBerhasil');
$routes->get('/detail-buku/(:segment)', 'Frontend::detailBuku/$1');
$routes->get('/semua-buku', 'Frontend::semuaBuku');
$routes->get('/tampil', 'Frontend::tampilKategori');
$routes->get('/register', 'Frontend::register');
$routes->get('/lupa-password', 'Frontend::lupaPassword');
$routes->get('/ubah-password', 'Frontend::ubahPassword');
$routes->get('admin/dashboard', 'Backend::dashboard', ['filter' => 'Tamu']);
$routes->get('admin/tambah-petugas', 'Backend::tambahPetugas', ['filter' => 'Petugas']);
$routes->get('admin/data-petugas', 'Backend::dataPetugas', ['filter' => 'Petugas']);
$routes->get('admin/data-buku', 'Backend::dataBuku', ['filter' => 'Tamu']);
$routes->get('admin/data-anggota', 'Backend::dataAnggota', ['filter' => 'Tamu']);
$routes->get('admin/tambah-buku', 'Backend::tambahBuku',['filter' => 'Tamu']);
$routes->get('admin/edit-buku/(:segment)', 'Backend::editBuku/$1',['filter' => 'Tamu']);
$routes->get('admin/data-pinjaman', 'Backend::dataPinjaman',['filter' => 'Tamu']);

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
