<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Models\Opd;
use App\Models\Unitkerja;
use App\Http\Requests\JabatanRequest;

class JabatanController extends Controller
{
    public function select(Request $request)
    {
        $jabatan = [];
        $unitkerjaID = $request->unitkerjaID;
        if ($request->has('q')) {
            $search = $request->q;
            $jabatan = Jabatan::select("id", "nama_jabatan")
                ->where('id_unitkerja', $unitkerjaID)
                ->Where('nama_jabatan', 'LIKE', "%$search%")
                ->get();
        } else {
            $jabatan = Jabatan::where('id_unitkerja', $unitkerjaID)->limit(10)->get();
        }
        return response()->json($jabatan);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::select('jabatans.*', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
                    ->leftJoin('opds', 'jabatans.id_opd', '=', 'opds.id')
                    ->leftJoin('unitkerjas', 'jabatans.id_unitkerja', '=', 'unitkerjas.id')
                    ->get();

        return view('adminkab.jabatan.index', [
            'jabatan' => $jabatan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opd = Opd::OrderBy('nama_opd', 'asc')->get();

        $unitkerja = Unitkerja::orderBy('nama_unitkerja', 'asc')->get();

        return view('adminkab.jabatan.create', [
            'opd' => $opd,
            'unitkerja' => $unitkerja
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JabatanRequest $request)
    {
        $validated = $request->validated();

        $jabatan = $request->all();

        $jabatan['id_opd'] = $request->opd;

        Jabatan::create($jabatan);

        alert()->success('Sukses', 'Data Jabatan baru berhasil ditambahkan.');

        return redirect('jabatan');
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
        $jabatan = Jabatan::select('jabatans.*', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
                    ->leftJoin('opds', 'jabatans.id_opd', '=', 'opds.id')
                    ->leftJoin('unitkerjas', 'jabatans.id_unitkerja', '=', 'unitkerjas.id')
                    ->where('jabatans.id',$id)
                    ->first();
 
        $opd = Opd::OrderBy('nama_opd', 'asc')->get();

        $unitkerja = Unitkerja::OrderBy('nama_unitkerja', 'asc')->get();

        return view('adminkab.jabatan.edit', 
            [
                'jabatan' => $jabatan,
                'opd' => $opd,
                'unitkerja' => $unitkerja
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JabatanRequest $request, $id)
    {
        $validated = $request->validated();

        $jabatans = Jabatan::findOrfail($id);

        $jabatan = $request->all();

        $jabatans->update($jabatan);

        return redirect()->route('jabatan.index')
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
        //
    }
}
