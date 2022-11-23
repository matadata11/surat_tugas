<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['pptk']                          = 'master/Pptk';

$route['pegawai']                       = 'master/Pegawai';
$route['add-pegawai']                   = 'master/Pegawai/store';
$route['edit-pegawai']                  = 'master/Pegawai/updated';
$route['remove-pegawai/(:num)']         = 'master/Pegawai/deleted';
$route['import-inputan']                = 'master/Pegawai/import_excel';

// data pptk
$route['add-pptk']                      = 'master/Pptk/store';
$route['updated-pptk']                  = 'master/Pptk/updated';
$route['remove-pptk/(:num)']            = 'master/Pptk/deleted';

// surat_tugas
$route['Surat']                         = 'surat_tugas/Surat_tugas';
$route['add-surat']                     = 'surat_tugas/Surat_tugas/store';
$route['edit-anggota']                  = 'surat_tugas/Surat_tugas/updated';
$route['remove-surat/(:num)']     	    = 'surat_tugas/Surat_tugas/destroy';
$route['cetak-surat']                   = 'report/St';

$route['Dashboard']                     = 'Dashboard';

$route['patch']                         = 'patch/Master_patch';
$route['patching']                      = 'patch/Master_patch/patchsystem';
$route['assets']                        = 'patch/Master_patch/patchassets';

$route['checkdulu']            	        = 'auth/login/checklogin';
$route['checkgtk']            	        = 'auth/login/checkgtk';
$route['keluaraja']            	        = 'auth/login/logout';

$route['default_controller']            = 'login';
$route['404_override']                  = 'My404';
$route['translate_uri_dashes']          = FALSE;
