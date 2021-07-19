<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['admin'] = 'auth';

$route['login'] = 'auth/login';

$route['user/hapus_user/(:any)'] = 'user/hapus/$1';

// master
$route['master/jurusan'] = 'jurusan';
$route['master/tambah_jurusan'] = 'jurusan/tambah';
$route['master/ubah_jurusan/(:any)'] = 'jurusan/ubah/$1';
$route['master/hapus_jurusan/(:any)'] = 'jurusan/hapus/$1';
$route['master/get_jurusan_json'] = 'jurusan/get_jurusan_json';

$route['master/kelas'] = 'kelas';
$route['master/tambah_kelas'] = 'kelas/tambah';
$route['master/ubah_kelas/(:any)'] = 'kelas/ubah/$1';
$route['master/hapus_kelas/(:any)'] = 'kelas/hapus/$1';
$route['master/get_kelas_json'] = 'kelas/get_jurusan_json';

$route['master/siswa'] = 'siswa';
$route['master/tambah_siswa'] = 'siswa/tambah';
$route['master/ubah_siswa/(:any)'] = 'siswa/ubah/$1';
$route['master/hapus_siswa/(:any)'] = 'siswa/hapus/$1';
$route['master/get_siswa_json'] = 'siswa/get_siswa_json';

$route['master/kategori'] = 'kategori';
$route['master/tambah_kategori'] = 'kategori/tambah';
$route['master/ubah_kategori/(:any)'] = 'kategori/ubah/$1';
$route['master/hapus_kategori/(:any)'] = 'kategori/hapus/$1';
$route['master/get_kategori_json'] = 'kategori/get_kategori_json';

$route['master/tahun_ajaran'] = 'tahun_ajaran';
$route['master/tambah_tahun_ajaran'] = 'tahun_ajaran/tambah';
$route['master/ubah_tahun_ajaran/(:any)'] = 'tahun_ajaran/ubah/$1';
$route['master/hapus_tahun_ajaran/(:any)'] = 'tahun_ajaran/hapus/$1';
$route['master/get_tahun_ajaran_json'] = 'tahun_ajaran/get_tahun_ajaran_json';

$route['master/pembayaran'] = 'pembayaran';
$route['master/tambah_pembayaran'] = 'pembayaran/tambah';
$route['master/ubah_pembayaran/(:any)'] = 'pembayaran/ubah/$1';
$route['master/hapus_pembayaran/(:any)'] = 'pembayaran/hapus/$1';
$route['master/get_pembayaran_json'] = 'pembayaran/get_pembayaran_json';
