<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Unitkerja;
use App\Models\Opd;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $opd = Opd::count();
        $unitkerja = Unitkerja::count();

        if( Auth::user()->id_role == '1') {
                return view('adminkab.index', 
                        compact('opd'), 
                        compact('unitkerja')
                );
            } else if (Auth::user()->id_role == '2') {
                return view('adminopd.index');
            } else if (Auth::user()->id_role == '3') {
                return view('adminsurat.index');
            } else if (Auth::user()->id_role == '4') {
                return view('user.index');
            } else if (Auth::user()->id_role == '5') {
                return view('TNDE.admin.dashboard');
            // } else {
            //     return view('assistant.dashboard');
        }

    }
}
