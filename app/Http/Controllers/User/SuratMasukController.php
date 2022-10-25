<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tujuan;
use Auth;
use App\Models\SuratMasuk;
use Alert;
use LogSurat;
use App\Models\Log_surat;
use Illuminate\Support\Str;
use App\Models\Disposisi;
use App\Models\User;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->pangkat == "Eselon II") {
            $suratmasuk = SuratMasuk::where('suratmasuks.id_tujuan', Auth::user()->id)
            ->where('suratmasuks.id_status', '<>', '1')
            ->orderby('suratmasuks.id', 'desc')
            ->get();
        } else {
            $suratmasuk = SuratMasuk::join('logsurats', 'suratmasuks.id', 'logsurats.id_sm')
            ->join('disposisis', 'logsurats.id_disposisi', 'disposisis.id')
            ->select('suratmasuks.*')
            ->where('suratmasuks.id_tujuan', Auth::user()->id)
            ->orWhere('disposisis.id_disp_ke', Auth::user()->id)
            ->where('suratmasuks.id_status', '<>', '1')
            ->orderby('suratmasuks.id', 'desc')
            ->get();
        }

        return view('user.suratmasuk.index', [
            'suratmasuk' => $suratmasuk
        ])->with('no',1);
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
    public function detail($id)
    {
        $smread = SuratMasuk::where('id', $id)->first();

        $smread->read = "READ";
        $smread->update();

        $suratmasuk = SuratMasuk::join('jenissurats', 'suratmasuks.id_jenissurat', 'jenissurats.id')
        ->join('users', 'suratmasuks.id_create', 'users.id')
        ->select('suratmasuks.*', 'users.nama', 'jenissurats.jenis_surat')
        ->find($id);

        $log_surat = Log_surat::join('users', 'logsurats.id_tujuan', 'users.id')
        // ->join('disposisis', 'logsurats.id_disposisi', 'disposisis.id')
        ->join('suratmasuks', 'logsurats.id_sm', 'suratmasuks.id')
        ->join('jenissurats', 'suratmasuks.id_jenissurat', 'jenissurats.id')
        ->join('jabatans','users.id_jabatan','jabatans.id')
        ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
        ->join('opds','unitkerjas.id_opd','opds.id')
        ->select('logsurats.*', 'suratmasuks.read', 'users.nama', 'suratmasuks.nama_pengirim', 'suratmasuks.jabatan_pengirim', 'suratmasuks.instansi_pengirim', 'suratmasuks.file_surat', 'suratmasuks.perihal', 'jenissurats.jenis_surat', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
        ->where('logsurats.id_sm', $id)
        ->orderBy('logsurats.id', 'desc')
        ->get();

        $disposisi = Disposisi::join('logsurats', 'disposisis.id', 'logsurats.id_disposisi')
        ->join('suratmasuks', 'logsurats.id_sm', 'suratmasuks.id')
        ->join('users', 'disposisis.id_disp_ke', 'users.id')
        ->join('jabatans','users.id_jabatan','jabatans.id')
        ->join('unitkerjas','jabatans.id_unitkerja','unitkerjas.id')
        ->join('opds','unitkerjas.id_opd','opds.id')
        ->select('disposisis.*', 'users.nama', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
        ->where('logsurats.id_sm', $id)
        ->orderBy('disposisis.id', 'asc')
        ->get();

        return view('user.suratmasuk.detail', [
            'suratmasuk' => $suratmasuk,
            'log_surat' => $log_surat,
            'disposisi' => $disposisi
        ]);
    }

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

    public function disposisi($id)
    {
        $suratmasuk = SuratMasuk::join('jenissurats', 'suratmasuks.id_jenissurat', 'jenissurats.id')
        ->join('users', 'suratmasuks.id_create', 'users.id')
        ->select('suratmasuks.*', 'users.nama', 'jenissurats.jenis_surat')
        ->find($id);

        $tujuandisposisi = User::join('jabatans', 'users.id_jabatan', 'jabatans.id')
        ->join('opds', 'jabatans.id_opd', 'opds.id')
        ->select('users.*', 'jabatans.nama_jabatan', 'opds.nama_opd')
        ->where('users.id_opd', Auth::user()->id_opd)
        ->get();

        return view('user.suratmasuk.disposisi', [
            'suratmasuk' => $suratmasuk,
            'tujuandisposisi' => $tujuandisposisi
        ]);
    }

    public function kirimdisposisi(Request $request, $id)
    {
        $smread = SuratMasuk::where('id', $id)->first();
        $smread->read = "UNREAD";
        $smread->id_status = 5;
        $smread->update();

        $disposisi = new Disposisi;
        $disposisi->id_disp_ke = $request->id_disp_ke;
        $disposisi->disp_ket = $request->disp_ket;
        $disposisi->disp_pesan = $request->disp_pesan;
        $disposisi->id_status = 5;
        $disposisi->id_create = Auth::user()->id;
        $disposisi->save();

        $id_sm = $smread->id;
        $id_sk = NULL;
        $id_tujuan = $disposisi->id_disp_ke;
        $id_pengirim = NULL;
        $id_tembusan = NULL;
        $id_verifikator = NULL;
        $id_ttd = NULL;
        $id_disposisi = $disposisi->id;
        $disp_ket = $disposisi->disp_ket;
        $disp_pesan = $disposisi->disp_pesan;
        $id_status = 5;
        $id_create = $disposisi->id_create;

        LogSurat::createLog($id_sm, $id_sk, $id_tujuan, $id_pengirim, $id_tembusan, $id_verifikator, $id_ttd, $id_disposisi, $disp_ket, $disp_pesan, $id_status, $id_create);

        alert()->success('Sukses','Surat berhasil disposisi.');

        return redirect('/suratmasuk');
    }
}
