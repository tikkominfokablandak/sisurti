<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unitkerja;
use App\Models\Opd;
use App\Http\Requests\UnitkerjaRequest;
use Auth;

class UnitKerjaController extends Controller
{
    public function select(Request $request)
    {
        $unitkerja = [];

        $opdID = $request->opdID;

        if ($request->has('q')) {
            $search = $request->q;
            $unitkerja = Unitkerja::select("id", "nama_unitkerja")
                ->where('id_opd', $opdID)
                ->Where('nama_unitkerja', 'LIKE', "%$search%")
                ->get();
        } else {
            $unitkerja = Unitkerja::where('id_opd', $opdID)->limit(10)->get();
        }
        return response()->json($unitkerja);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitkerja = Unitkerja::select('unitkerjas.*', 'opds.nama_opd')
            ->join('opds', 'unitkerjas.id_opd', '=', 'opds.id')
            ->get();

        return view('adminkab.unitkerja.index', [
            'unitkerja' => $unitkerja
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opd = Opd::orderBy('nama_opd', 'asc')->get();

        return view('adminkab.unitkerja.create', [
            'opd' => $opd
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitkerjaRequest $request)
    {
        $validated = $request->validated();

        $unitKerja = $request->all();

        $unitKerja['nama_unitkerja'] = $request->nama_unitkerja;
        $unitKerja['induk_unitkerja'] = $request->induk_unitkerja;
        $unitKerja['alamat'] = $request->alamat;
        $unitKerja['id_opd'] = $request->id_opd;
        $unitKerja['id_create'] = Auth::user()->id;

        Unitkerja::create($unitKerja);

        alert()->success('Sukses', 'Data Unit Kerja baru berhasil ditambahkan.');

        return redirect('unitkerja');
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
        $unitKerja = Unitkerja::select('unitkerjas.*', 'opds.nama_opd')
            ->join('opds', 'unitkerjas.id_opd', '=', 'opds.id')
            ->where('unitkerjas.id', $id)
            ->first();

        return view('adminkab.unitkerja.edit', [
            'unitkerja' => $unitKerja
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnitkerjaRequest $request, $id)
    {
        $validated = $request->validated();
        $unitkerjas = Unitkerja::findOrfail($id);
        $unitkerja = $request->all();
        $unitkerjas->update($unitkerja);

        return redirect()->route('unitkerja.index')
            ->with('success', 'Perubahan data berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Unitkerja::find($id)->delete();

        return redirect()->route('unitkerja.index')->with('success', 'Data berhasil di hapus.');
    }
}
