<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['laporan']                       = 'public/Laporan';

$route['pptk']                          = 'public/Pptk';

$route['pegawai']                       = 'public/Pegawai';
$route['add-pegawai']                   = 'public/Pegawai/store';
$route['edit-pegawai']                  = 'public/Pegawai/updated';
$route['remove-pegawai/(:num)']         = 'public/Pegawai/deleted';
$route['import-inputan']                = 'public/Pegawai/import_excel';

// data pptk
$route['add-pptk']                      = 'public/Pptk/store';
$route['updated-pptk']                  = 'public/Pptk/updated';
$route['remove-pptk/(:num)']            = 'public/Pptk/deleted';

// surat_tugas
$route['Surat']                         = 'public/Surat_tugas';
$route['add-surat']                     = 'public/Surat_tugas/store';
$route['edit-anggota']                  = 'public/Surat_tugas/updated';
$route['remove-surat/(:num)']     	    = 'public/Surat_tugas/destroy';
$route['cetak-surat']                   = 'report/St';

$route['Dashboard']                     = 'Dashboard';


// rule Admin Sistem

$route['pegawai_a']                     = 'admin/PegawaiA';
$route['add-pegawai_a']                 = 'admin/PegawaiA/store';
$route['edit-pegawai_a']                = 'admin/PegawaiA/updated';
$route['remove-pegawai_a/(:num)']       = 'admin/PegawaiA/deleted';

$route['patch']                         = 'patch/Master_patch';
$route['patch']                         = 'patch/Master_patch';
$route['patching']                      = 'patch/Master_patch/patchsystem';
$route['assets']                        = 'patch/Master_patch/patchassets';

$route['checkdulu']            	        = 'auth/login/checklogin';
$route['checkgtk']            	        = 'auth/login/checkgtk';
$route['keluaraja']            	        = 'auth/login/logout';

$route['default_controller']            = 'login';
$route['404_override']                  = 'My404';
$route['translate_uri_dashes']          = FALSE;
