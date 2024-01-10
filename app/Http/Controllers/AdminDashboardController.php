<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $permohonan = DB::table('permohonan')
            ->join('users', 'users.id', '=', 'permohonan.id_user')
            ->join('instansi', 'instansi.id_instansi', '=', 'permohonan.id_instansi')
            ->get();

        return view('admin.dashboard');
    }

    public function dataPemohon()
    {
        $permohonan = DB::table('permohonan')
            ->join('users', 'users.id', '=', 'permohonan.id_user')
            ->join('instansi', 'instansi.id_instansi', '=', 'permohonan.id_instansi')
            ->get();

        return view('admin.data-pemohon', compact('permohonan'));
    }

    public function show($id_permohonan)
    {
        $permohonan = DB::table('permohonan')
            ->join('users', 'users.id', '=', 'permohonan.id_user')
            ->join('instansi', 'instansi.id_instansi', '=', 'permohonan.id_instansi')
            ->find($id_permohonan);

        return view('admin.lihat-data-pemohon', compact('permohonan'));
    }

    public function index_instansi()
    {
        $instansi = Instansi::get();

        return view('admin.data-instansi', compact('instansi'));
    }
}
