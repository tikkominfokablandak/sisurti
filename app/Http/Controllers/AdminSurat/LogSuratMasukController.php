<?php

namespace App\Http\Controllers\AdminSurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Log_surat;
use App\Models\SuratMasuk;
use App\Models\Disposisi;
use Auth;

class LogSuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratmasuk = SuratMasuk::join('users','suratmasuks.id_create','users.id')
        ->join('jabatans','users.id_jabatan','jabatans.id')
        ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
        ->join('opds','unitkerjas.id_opd','opds.id')
        ->select('suratmasuks.*', 'users.nama', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
        ->where('suratmasuks.id_create', Auth::user()->id)
        ->orderBy('suratmasuks.created_at', 'desc')
        ->get();

        return view('adminsurat.logsuratmasuk.index', [
            'suratmasuk' => $suratmasuk
        ])->with('logsuratmasuk',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suratmasuk = SuratMasuk::join('jenissurats', 'suratmasuks.id_jenissurat', 'jenissurats.id')
        ->join('users', 'suratmasuks.id_create', 'users.id')
        ->select('suratmasuks.*', 'users.nama', 'jenissurats.jenis_surat')
        ->find($id);

        $log_surat = Log_surat::join('tujuans', 'logsurats.id_tujuan', 'tujuans.id')
        ->join('users', 'tujuans.id_internal', 'users.id')
        ->join('suratmasuks', 'logsurats.id_sm', 'suratmasuks.id')
        ->join('jenissurats', 'suratmasuks.id_jenissurat', 'jenissurats.id')
        ->join('jabatans','users.id_jabatan','jabatans.id')
        ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
        ->join('opds','unitkerjas.id_opd','opds.id')
        ->select('logsurats.*', 'users.nama', 'suratmasuks.nama_pengirim', 'suratmasuks.jabatan_pengirim', 'suratmasuks.instansi_pengirim', 'suratmasuks.file_surat', 'suratmasuks.perihal', 'jenissurats.jenis_surat', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
        ->where('logsurats.id_sm', $id)
        ->orderBy('logsurats.id', 'desc')
        ->get();

        $disposisi = Disposisi::join('logsurats', 'disposisis.id', 'logsurats.id_disposisi')
        ->join('suratmasuks', 'logsurats.id_sm', 'suratmasuks.id')
        ->join('tujuans', 'logsurats.id_tujuan', 'tujuans.id')
        ->join('users', 'disposisis.id_create', 'users.id')
        ->join('jabatans','users.id_jabatan','jabatans.id')
        ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
        ->join('opds','unitkerjas.id_opd','opds.id')
        ->select('disposisis.*', 'users.*', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
        ->where('logsurats.id_sm', $id)
        ->whereNotNull('logsurats.id_disposisi')
        ->get();

        return view('adminsurat.logsuratmasuk.detail', [
            'suratmasuk' => $suratmasuk,
            'log_surat' => $log_surat,
            'disposisi' => $disposisi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
