<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opd;
use Validator;
use Alert;
use App\Http\Requests\OpdRequest;
use Illuminate\Support\Str;

class OPDController extends Controller
{
    public function select(Request $request)
    {
        $opd = [];

        if ($request->has('q')) {
            $search = $request->q;
            $opd = Opd::select("id", "nama_opd")
                ->Where('nama_opd', 'LIKE', "%$search%")
                ->get();
        } else {
            $opd = Opd::limit(10)->get();
        }
        return response()->json($opd);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opd = Opd::select('opds.*')->orderBy('id', 'desc')->get();

        return view(
            'adminkab.opd.index',
            [
                'opd' => $opd
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminkab.opd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OpdRequest $request)
    {
        $validated = $request->validated();

        $opd = $request->all();

        $opd['nama_opd'] = $request->nama_opd;
        $opd['singkatan'] = $request->singkatan;
        $opd['alamat'] = $request->alamat;

        Opd::create($opd);

        alert()->success('Sukses', 'Data OPD baru berhasil ditambahkan');

        return redirect('opd');
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
        $opd = Opd::select('opds.*')->where('id', $id)->first();

        return view(
            'adminkab.opd.edit',
            [
                'opd' => $opd
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
    public function update(OpdRequest $request, $id)
    {
        $validated = $request->validated();

        $opds = Opd::findOrfail($id);

        $opd = $request->all();

        $opds->update($opd);

        return redirect()->route('opd.index')->with('success', 'Perubahan data berhasil di simpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Opd::find($id)->delete();

        return redirect()->route('opd.index')->with('success', 'Data Berhasil di hapus.');
    }
}
