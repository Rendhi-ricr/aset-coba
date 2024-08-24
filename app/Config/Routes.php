<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Panel\Home::index');

$routes->get('login', 'Auth::index'); // Menampilkan halaman login
$routes->post('login', 'Auth::login'); // Menangani proses login

$routes->get('register', 'Auth::tambah'); // Menampilkan halaman registrasi
$routes->post('register', 'Auth::register'); // Menangani proses registrasi

$routes->get('logout', 'Auth::logout');



// $routes->group("panel/home", function ($routes) {
//     $routes->get('/', 'Panel\Home::index');
//     // $routes->post('fetch-publish', 'Panel\Agenda::fetchAgendaPublish');
//     // $routes->post('fetch-draft', 'Panel\Agenda::fetchAgendaDraft');
//     // $routes->post('fetch-trash', 'Panel\Agenda::fetchAgendaTrash');
//     // $routes->match(["get", "post"], "tambah", "Panel\Gedung::tambah");
//     // $routes->match(["get", "post"], "(:segment)", "Panel\Gedung::edit/$1");
//     // // $routes->match(["get", "post"], "(:any)/edit", "Panel\Agenda::edit/$1");
//     // // $routes->post('trash-selected', 'Panel\Agenda::trashSelected');
//     // // $routes->get('(:any)/trash', 'Panel\Agenda::trash/$1');
//     // // $routes->get('(:any)/restore', 'Panel\Agenda::restore/$1');
//     // // $routes->get('(:any)/remove', 'Panel\Agenda::remove/$1');
// });

$routes->group("panel/gedung", function ($routes) {
    $routes->get('/', 'Panel\Gedung::index');
    // $routes->post('fetch-publish', 'Panel\Agenda::fetchAgendaPublish');
    // $routes->post('fetch-draft', 'Panel\Agenda::fetchAgendaDraft');
    // $routes->post('fetch-trash', 'Panel\Agenda::fetchAgendaTrash');
    $routes->match(["get", "post"], "tambah", "Panel\Gedung::tambah");
    // $routes->match(["get", "post"], "(:segment)", "Panel\Gedung::edit/$1");
    // // $routes->match(["get", "post"], "(:any)/edit", "Panel\Agenda::edit/$1");
    // // $routes->post('trash-selected', 'Panel\Agenda::trashSelected');
    // // $routes->get('(:any)/trash', 'Panel\Agenda::trash/$1');
    // // $routes->get('(:any)/restore', 'Panel\Agenda::restore/$1');
    // // $routes->get('(:any)/remove', 'Panel\Agenda::remove/$1');
});


$routes->group("panel/ruangan", function ($routes) {
    $routes->get('/', 'Panel\Ruangan::index');
    // $routes->post('fetch-publish', 'Panel\Agenda::fetchAgendaPublish');
    // $routes->post('fetch-draft', 'Panel\Agenda::fetchAgendaDraft');
    // $routes->post('fetch-trash', 'Panel\Agenda::fetchAgendaTrash');
    $routes->match(["get", "post"], "tambah", "Panel\Ruangan::tambah");
    $routes->match(["get", "post"], "(:segment)", "Panel\Ruangan::edit/$1");
    // $routes->match(["get", "post"], "(:any)/edit", "Panel\Agenda::edit/$1");
    // $routes->post('trash-selected', 'Panel\Agenda::trashSelected');
    // $routes->get('(:any)/trash', 'Panel\Agenda::trash/$1');
    // $routes->get('(:any)/restore', 'Panel\Agenda::restore/$1');
    // $routes->get('(:any)/remove', 'Panel\Agenda::remove/$1');
});

$routes->group("panel/kategori", function ($routes) {
    $routes->get('/', 'Panel\Kategori::index');
    // $routes->post('fetch-publish', 'Panel\Agenda::fetchAgendaPublish');
    // $routes->post('fetch-draft', 'Panel\Agenda::fetchAgendaDraft');
    // $routes->post('fetch-trash', 'Panel\Agenda::fetchAgendaTrash');
    $routes->match(["get", "post"], "tambah", "Panel\Kategori::tambah");
    // $routes->match(["get", "post"], "(:segment)", "Panel\Kategori::edit/$1");
    // $routes->match(["get", "post"], "(:any)/edit", "Panel\Agenda::edit/$1");
    // $routes->post('trash-selected', 'Panel\Agenda::trashSelected');
    // $routes->get('(:any)/trash', 'Panel\Agenda::trash/$1');
    // $routes->get('(:any)/restore', 'Panel\Agenda::restore/$1');
    // $routes->get('(:any)/remove', 'Panel\Agenda::remove/$1');
});

$routes->group("panel/barang", function ($routes) {
    $routes->get('/', 'Panel\Barang::index');
    // $routes->post('fetch-publish', 'Panel\Agenda::fetchAgendaPublish');
    // $routes->post('fetch-draft', 'Panel\Agenda::fetchAgendaDraft');
    // $routes->post('fetch-trash', 'Panel\Agenda::fetchAgendaTrash');
    $routes->match(["get", "post"], "tambah", "Panel\Barang::tambah");
    // $routes->match(["get", "post"], "(:segment)", "Panel\Barang::edit/$1");
    // $routes->match(["get", "post"], "(:any)/edit", "Panel\Agenda::edit/$1");
    // $routes->post('trash-selected', 'Panel\Agenda::trashSelected');
    // $routes->get('(:any)/trash', 'Panel\Agenda::trash/$1');
    // $routes->get('(:any)/restore', 'Panel\Agenda::restore/$1');
    // $routes->get('(:any)/remove', 'Panel\Agenda::remove/$1');
});

$routes->group("panel/aset", function ($routes) {
    $routes->get('/', 'Panel\Aset::index');
    // $routes->post('fetch-publish', 'Panel\Agenda::fetchAgendaPublish');
    // $routes->post('fetch-draft', 'Panel\Agenda::fetchAgendaDraft');
    // $routes->post('fetch-trash', 'Panel\Agenda::fetchAgendaTrash');
    $routes->match(["get", "post"], "tambah", "Panel\Aset::tambah");
    // $routes -> get('(:num)', "Panel\Aset::getRuanganByGedung/$1");
    // $routes->match(["get", "post"], "(:segment)", "Panel\Barang::edit/$1");
    // $routes->match(["get", "post"], "(:any)/edit", "Panel\Agenda::edit/$1");
    // $routes->post('trash-selected', 'Panel\Agenda::trashSelected');
    // $routes->get('(:any)/trash', 'Panel\Agenda::trash/$1');
    // $routes->get('(:any)/restore', 'Panel\Agenda::restore/$1');
    // $routes->get('(:any)/remove', 'Panel\Agenda::remove/$1');
});

$routes->group("panel/peminjaman", function ($routes) {
    $routes->get('/', 'Panel\Peminjaman::index');
    // $routes->post('fetch-publish', 'Panel\Agenda::fetchAgendaPublish');
    // $routes->post('fetch-draft', 'Panel\Agenda::fetchAgendaDraft');
    // $routes->post('fetch-trash', 'Panel\Agenda::fetchAgendaTrash');
    $routes->match(["get", "post"], "tambah", "Panel\Peminjaman::tambah");
    $routes->post('ubah/(:num)', 'Panel\Peminjaman::ubah/$1');
    // $routes->match(["get", "post"], "(:segment)", "Panel\Barang::edit/$1");
    // $routes->match(["get", "post"], "(:any)/edit", "Panel\Agenda::edit/$1");
    // $routes->post('trash-selected', 'Panel\Agenda::trashSelected');
    // $routes->get('(:any)/trash', 'Panel\Agenda::trash/$1');
    // $routes->get('(:any)/restore', 'Panel\Agenda::restore/$1');
    // $routes->get('(:any)/remove', 'Panel\Agenda::remove/$1');
});

$routes->group("panel/pengaduan", function ($routes) {
    $routes->get('/', 'Panel\Pengaduan::index');
    // $routes->post('fetch-publish', 'Panel\Agenda::fetchAgendaPublish');
    // $routes->post('fetch-draft', 'Panel\Agenda::fetchAgendaDraft');
    // $routes->post('fetch-trash', 'Panel\Agenda::fetchAgendaTrash');
    $routes->match(["get", "post"], "tambah", "Panel\Pengaduan::tambah");
    $routes->post('ubah/(:num)', 'Panel\Pengaduan::ubah/$1');
    // $routes->match(["get", "post"], "(:segment)", "Panel\Barang::edit/$1");
    // $routes->match(["get", "post"], "(:any)/edit", "Panel\Agenda::edit/$1");
    // $routes->post('trash-selected', 'Panel\Agenda::trashSelected');
    // $routes->get('(:any)/trash', 'Panel\Agenda::trash/$1');
    // $routes->get('(:any)/restore', 'Panel\Agenda::restore/$1');
    // $routes->get('(:any)/remove', 'Panel\Agenda::remove/$1');
});

$routes->group("user/peminjaman", function ($routes) {
    $routes->get('/', 'User\Peminjaman::index');
    $routes->match(["get", "post"], "tambah", "User\Peminjaman::tambah");
    // $routes->match(["get", "post"], "(:segment)", "User\Peminjaman::edit/$1");
    $routes->get('print', 'User\Peminjaman::print');
});
