<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opd;
use App\Models\Unitkerja;
use App\Models\Jabatan;

use App\Http\Controllers\OPDController;


class AdminKabController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    // {
    //     return view('adminkab.index');
    // }
    
    {
        // $test = DB::table("SELECT * FROM `opds`");

        // $count = $test->count();
        
        $opd = Opd::count();
        $unitkerja = Unitkerja::count();
        $jabatan = Jabatan::count();
        $pengguna = Pengguna::count();

        return view('adminkab.index', compact('test','unitkerja','jabatan','pengguna')); 

        // $opd = Opd::where('alamat', '=', null)->get();

        // return view('adminkab.index')->with('opd', $opd);
    }
}
