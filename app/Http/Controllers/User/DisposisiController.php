<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\User;
use Auth;

class DisposisiController extends Controller
{
    public function disposisi($id)
    {
        $suratmasuk = SuratMasuk::join('jenissurats', 'suratmasuks.id_jenissurat', 'jenissurats.id')
        ->join('users', 'suratmasuks.id_create', 'users.id')
        ->select('suratmasuks.*', 'users.nama', 'jenissurats.jenis_surat')
        ->find($id);

        $tujuandisposisi = User::join('jabatans', 'users.id_jabatan', 'jabatans.id')
        ->where('users.id_opd', Auth::user()->id_opd)
        ->get();

        return view('user.suratmasuk.disposisi', [
            'suratmasuk' => $suratmasuk,
            'tujuandisposisi' => $tujuandisposisi
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.disposisi.index');
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
