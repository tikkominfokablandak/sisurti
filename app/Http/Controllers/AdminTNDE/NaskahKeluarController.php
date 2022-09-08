<?php

namespace App\Http\Controllers\AdminTNDE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jenissurat;
use App\Models\Tujuan;
use Auth;
use App\Models\Tembusan;
use App\Models\Verifikator;
use App\Models\Tandatangan;
use App\Http\Requests\SuratKeluarRequest;
use App\Models\SuratKeluar;
use LogSurat;
use App\Models\Log_surat;
use Storage;
use Carbon\Carbon;
use Illuminate\Support\Str;

class NaskahKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('TNDE.naskah-keluar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenissurat = Jenissurat::get();

        $internal = Tujuan::join('users', 'users.id', 'tujuans.id_internal')
                        ->join('jabatans','users.id_jabatan','jabatans.id')
                        ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
                        ->join('opds','unitkerjas.id_opd','opds.id')
                        ->select('users.*', 'tujuans.*', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
                        ->where('tujuans.id_create', Auth::user()->id)
                        ->where('jenis_tujuan', '=', 'INTERNAL')
                        ->orderBy('users.nama', 'asc')
                        ->get();

        $tembusan = Tembusan::join('users', 'users.id', 'tembusans.id_user')
                        ->join('jabatans','users.id_jabatan','jabatans.id')
                        ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
                        ->join('opds','unitkerjas.id_opd','opds.id')
                        ->select('users.*', 'tembusans.*', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
                        ->where('tembusans.id_create', Auth::user()->id)
                        ->orderBy('users.nama', 'asc')
                        ->get();

        $eksternal = Tujuan::where('tujuans.id_create', Auth::user()->id)
                        ->where('jenis_tujuan', '=', 'EKSTERNAL')
                        ->orderBy('tujuans.nama_tujuan', 'asc')
                        ->get();

        $verifikator = Verifikator::join('users', 'users.id', 'verifikators.id_user')
                        ->join('jabatans','users.id_jabatan','jabatans.id')
                        ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
                        ->join('opds','unitkerjas.id_opd','opds.id')
                        ->select('users.*', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
                        ->where('verifikators.id_create', Auth::user()->id)
                        ->orderBy('users.nama', 'asc')
                        ->get();

        $tandatangan = Tandatangan::join('users', 'users.id', 'tandatangans.id_user')
                        ->join('jabatans','users.id_jabatan','jabatans.id')
                        ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
                        ->join('opds','unitkerjas.id_opd','opds.id')
                        ->select('users.*', 'tandatangans.*', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
                        ->where('tandatangans.id_create', Auth::user()->id)
                        ->orderBy('users.nama', 'asc')
                        ->get();

        return view('TNDE.naskah-keluar.create', [
            'jenissurat' => $jenissurat,
            'internal' => $internal,
            'tembusan' => $tembusan,
            'eksternal' => $eksternal,
            'verifikator' => $verifikator,
            'tandatangan' => $tandatangan
        ]);
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
        //
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
