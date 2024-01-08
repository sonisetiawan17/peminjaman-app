<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'menu' => [[
		'icon' => 'fa fa-th-large',
		'title' => 'Beranda',
		'url' => '/superadmin/dashboard',
	],[
		'icon' => 'fa fa-user',
		'title' => 'Data User',
		'url' => '/superadmin/users',
	],[
		'icon' => 'fa fa-file-alt',
		'title' => 'Data Master',
		'url' => '#',
		'caret' => true,
		'sub_menu' => [[
			'url' => '/superadmin/jadwal',
			'title' => 'Jadwal',
      ],[
			'url' => '/superadmin/fasilitas',
			'title' => 'Fasilitas',
      ],[
			'url' => '/superadmin/instansi',
			'title' => 'Instansi',
      ],[
			'url' => '/superadmin/alat-pendukung',
			'title' => 'Alat Pendukung',
      ],[
			'url' => '/superadmin/blok',
			'title' => 'Blok Ruangan',
      ],[
			'url' => '/superadmin/bidang-kegiatan',
			'title' => 'Bidang Kegiatan',
      ]], 
	],[
		'icon' => 'fa fa-folder',
		'title' => 'Data Permohonan',
		'url' => '#',
        'caret' => true,
		'sub_menu' => [[
			'url' => '',
			'title' => 'Buat Permohonan',
      ],[
			'url' => '',
			'title' => 'Histori Permohonan',
      ]],
      ],[
		'icon' => 'fa fa-print',
		'title' => 'Laporan',
		'url' => '',
	]]
];
