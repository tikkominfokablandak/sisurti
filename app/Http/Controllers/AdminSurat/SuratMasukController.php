<?php

namespace App\Http\Controllers\AdminSurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jenissurat;
use App\Models\Tujuan;
use App\Models\Tembusan;
use Auth;
use App\Models\SuratMasuk;
use Alert;
use LogSurat;
use App\Models\Log_surat;
use Illuminate\Support\Str;
use App\Models\Disposisi;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratmasuk = SuratMasuk::where('id_create', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('adminsurat.suratmasuk.index', [
            'suratmasuk' => $suratmasuk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenissurat = Jenissurat::get();

        $tujuan = Tujuan::join('users', 'tujuans.id_internal', 'users.id')
            ->join('roles', 'users.id_role', 'roles.id')
            ->join('jabatans', 'users.id_jabatan', 'jabatans.id')
            ->join('unitkerjas', 'jabatans.id_unitkerja', 'unitkerjas.id')
            ->join('opds', 'unitkerjas.id_opd', 'opds.id')
            ->select('users.nama', 'roles.nama_role', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja', 'users.id')
            ->orderBy('users.nama', 'asc')
            ->where('tujuans.jenis_tujuan', 'INTERNAL')
            ->where('tujuans.id_create', Auth::user()->id)
            ->get();

        $tembusan = Tembusan::join('users', 'tembusans.id_user', 'users.id')
            ->join('roles', 'users.id_role', 'roles.id')
            ->join('jabatans', 'users.id_jabatan', 'jabatans.id')
            ->join('unitkerjas', 'jabatans.id_unitkerja', 'unitkerjas.id')
            ->join('opds', 'unitkerjas.id_opd', 'opds.id')
            ->select('users.nama', 'roles.nama_role', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
            ->orderBy('users.nama', 'asc')
            ->where('tembusans.id_create', Auth::user()->id)
            ->get();

        return view('adminsurat.suratmasuk.create', [
            'jenissurat' => $jenissurat,
            'tujuan' => $tujuan,
            'tembusan' => $tembusan
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
        $suratmasuk = new SuratMasuk;

        $suratmasuk->nama_pengirim = $request->nama_pengirim;
        $suratmasuk->jabatan_pengirim = $request->jabatan_pengirim;
        $suratmasuk->instansi_pengirim = $request->instansi_pengirim;
        $suratmasuk->id_jenissurat = $request->id_jenissurat;
        $suratmasuk->sifat_surat = $request->sifat_surat;
        $suratmasuk->tingkat_urgen = $request->tingkat_urgen;
        $suratmasuk->no_surat = $request->no_surat;

        $suratmasuk->tgl_surat = $request->tgl_surat;
        $suratmasuk->tgl_diterima = $request->tgl_diterima;

        $suratmasuk->perihal = $request->perihal;
        $suratmasuk->isi = $request->isi;

        // $file = $request->file('file_surat');
        // $destinationPath = public_path('storage/' . Auth::user()->id . '/suratmasuk/');
        // $nama = 'sm-' . str_random(10) . '.pdf';
        // $file->move($destinationPath, $nama);
        // $file->storeAs('public/'. Auth::user()->id . '/suratmasuk/'. $nama);
        // Storage::disk('local')->put($destinationPath . '/' . $nama , $request->file);

            $file = $request->file('file_surat');
            $nama = 'sm-' . str_random(10) . '.pdf';
            $extension = $file->getClientOriginalExtension();
            Storage::putFileAs('public/'.Auth::user()->id.'/suratmasuk', $request->file('file_surat'), $nama);

        $suratmasuk->file_surat = $nama;

        $suratmasuk->id_tujuan = $request->id_tujuan;
        $suratmasuk->id_status = 1;
        $suratmasuk->id_create = Auth::user()->id;

        $suratmasuk->save();

        $id_sm = $suratmasuk->id;
        $id_sk = NULL;
        $id_tujuan = $suratmasuk->id_tujuan;
        $id_pengirim = NULL;
        $id_tembusan = NULL;
        $id_verifikator = NULL;
        $id_ttd = NULL;
        $id_disposisi = NULL;
        $disp_ket = NULL;
        $disp_pesan = NULL;
        $id_status = 1;
        $id_create = $suratmasuk->id_create;

        LogSurat::createLog($id_sm, $id_sk, $id_tujuan, $id_pengirim, $id_tembusan, $id_verifikator, $id_ttd, $id_disposisi, $disp_ket, $disp_pesan, $id_status, $id_create);

        alert()->success('Sukses', 'Surat masuk baru berhasil disimpan.');

        return redirect()->route('surat-masuk.index');
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

        $log_surat = Log_surat::join('users', 'logsurats.id_tujuan', 'users.id')
            // ->join('disposisis', 'logsurats.id_disposisi', 'disposisis.id')
            ->join('suratmasuks', 'logsurats.id_sm', 'suratmasuks.id')
            ->join('jenissurats', 'suratmasuks.id_jenissurat', 'jenissurats.id')
            ->join('jabatans', 'users.id_jabatan', 'jabatans.id')
            ->join('unitkerjas', 'jabatans.id_unitkerja', 'unitkerjas.id')
            ->join('opds', 'unitkerjas.id_opd', 'opds.id')
            ->select('logsurats.*', 'suratmasuks.read', 'users.nama', 'suratmasuks.nama_pengirim', 'suratmasuks.jabatan_pengirim', 'suratmasuks.instansi_pengirim', 'suratmasuks.file_surat', 'suratmasuks.perihal', 'jenissurats.jenis_surat', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
            ->where('logsurats.id_sm', $id)
            ->orderBy('logsurats.id', 'desc')
            ->get();

        $disposisi = Disposisi::join('logsurats', 'disposisis.id', 'logsurats.id_disposisi')
            ->join('suratmasuks', 'logsurats.id_sm', 'suratmasuks.id')
            ->join('users', 'disposisis.id_disp_ke', 'users.id')
            ->join('jabatans', 'users.id_jabatan', 'jabatans.id')
            ->join('unitkerjas', 'jabatans.id_unitkerja', 'unitkerjas.id')
            ->join('opds', 'unitkerjas.id_opd', 'opds.id')
            ->select('disposisis.*', 'users.nama', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
            ->where('logsurats.id_sm', $id)
            ->orderBy('disposisis.id', 'asc')
            ->get();

        return view('adminsurat.suratmasuk.detail', [
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
        $suratmasuk = SuratMasuk::join('jenissurats', 'suratmasuks.id_jenissurat', 'jenissurats.id')
            ->join('users', 'suratmasuks.id_tujuan', 'users.id')
            ->join('jabatans', 'users.id_jabatan', 'jabatans.id')
            ->join('unitkerjas', 'jabatans.id_unitkerja', 'unitkerjas.id')
            ->join('opds', 'unitkerjas.id_opd', 'opds.id')
            ->select('suratmasuks.*', 'jenissurats.jenis_surat', 'users.nama', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
            ->findOrFail($id);

        $jenissurat = Jenissurat::get();

        $tujuan = Tujuan::join('users', 'tujuans.id_internal', 'users.id')
            ->join('roles', 'users.id_role', 'roles.id')
            ->join('jabatans', 'users.id_jabatan', 'jabatans.id')
            ->join('unitkerjas', 'jabatans.id_unitkerja', 'unitkerjas.id')
            ->join('opds', 'unitkerjas.id_opd', 'opds.id')
            ->select('users.nama', 'roles.nama_role', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja', 'users.id')
            ->orderBy('users.nama', 'asc')
            ->where('tujuans.jenis_tujuan', 'INTERNAL')
            ->where('tujuans.id_create', Auth::user()->id)
            ->get();

        return view('adminsurat.suratmasuk.edit', [
            'suratmasuk' => $suratmasuk,
            'jenissurat' => $jenissurat,
            'tujuan' => $tujuan,
        ]);
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
        $suratmasuk = SuratMasuk::findOrFail($id);

        $suratmasuk->nama_pengirim = $request->nama_pengirim;
        $suratmasuk->jabatan_pengirim = $request->jabatan_pengirim;
        $suratmasuk->instansi_pengirim = $request->instansi_pengirim;
        $suratmasuk->id_jenissurat = $request->id_jenissurat;
        $suratmasuk->sifat_surat = $request->sifat_surat;
        $suratmasuk->tingkat_urgen = $request->tingkat_urgen;
        $suratmasuk->no_surat = $request->no_surat;

        // Carbon::createFromFormat('l, d F Y', $request->tgl_surat)->format('Y-m-d');
        // $tgl_surat = date('Y-m-d ', strtotime($request->tgl_surat));
        // $suratmasuk->tgl_surat = $request->filled('tgl_surat') ? date('Y-m-d', strtotime($request->input('tgl_surat'))) : NULL;
        // $suratmasuk->tgl_surat = $tgl_surat;

        if($request->tgl_surat == NULL) {
            
        } else {
            $suratmasuk->tgl_surat = $request->tgl_surat;
        }

        if($request->tgl_diterima == NULL) {
            
        } else {
            $suratmasuk->tgl_diterima = $request->tgl_diterima;
        }

        $suratmasuk->perihal = $request->perihal;
        $suratmasuk->isi = $request->isi;

            if($request->file('file_surat') == NULL) {
                $suratmasuk->file_surat = $suratmasuk->file_surat;
            } else {
                $file = $request->file('file_surat');
                $nama = 'sm-' . str_random(10) . '.pdf';
                $extension = $file->getClientOriginalExtension();
                Storage::putFileAs('public/'.Auth::user()->id.'/suratmasuk', $request->file('file_surat'), $nama);

                $suratmasuk->file_surat = $nama;
            }

        $suratmasuk->id_tujuan = $request->id_tujuan;
        $suratmasuk->id_status = 1;
        $suratmasuk->id_create = Auth::user()->id;

        $suratmasuk->update();

        alert()->success('Sukses', 'Surat masuk berhasil diperbarui.');

        return redirect()->route('surat-masuk.index');
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

    public function unduh($id)
    {
        $file = SuratMasuk::findOrFail($id);

        // return response()->file('storage/sm/'.$file->file);
        return response()->download(storage_path('storage/' . Auth::user()->id . '/suratmasuk/' . $file));
    }

    public function kirim($id)
    {
        $suratmasuk = SuratMasuk::findOrfail($id);

        $suratmasuk->id_status = 2;

        $suratmasuk->update();

        $id_sm = $suratmasuk->id;
        $id_sk = NULL;
        $id_tujuan = $suratmasuk->id_tujuan;
        $id_pengirim = NULL;
        $id_tembusan = NULL;
        $id_verifikator = NULL;
        $id_ttd = NULL;
        $id_disposisi = NULL;
        $disp_ket = NULL;
        $disp_pesan = NULL;
        $id_status = 2;
        $id_create = Auth::user()->id;

        LogSurat::createLog($id_sm, $id_sk, $id_tujuan, $id_pengirim, $id_tembusan, $id_verifikator, $id_ttd, $id_disposisi, $disp_ket, $disp_pesan, $id_status, $id_create);

        alert()->success('Sukses', 'Surat masuk berhasil dikirim ke Kepala OPD.');

        return redirect()->back();
    }
}
