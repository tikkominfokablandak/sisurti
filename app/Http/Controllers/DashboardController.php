<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Unitkerja;
use App\Models\Opd;
use App\Models\Jabatan;
use App\Models\User;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\Disposisi;
use App\Models\Log_surat;
use App\Models\Jenissurat;
use App\Models\Tujuan;
use App\Models\Tembusan;
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
    //dashboard count adminkab
    $opd = Opd::count();
    $unitkerja = Unitkerja::count();
    $jabatan = Jabatan::count();
    $pengguna = User::count();

    //dashboard count adminsurat
    $suratmasuk = SuratMasuk::count();
    $suratkeluar = SuratKeluar::count();
    $disposisi = Disposisi::count();
    
    $logsuratmasuk = Log_surat::count();

    $templatesurat = Jenissurat::count();
    $tujuan = Tujuan::count();
    $tembusan = Tembusan::count();

    //dashboard count untuk user
    

    if( Auth::user()->id_role == '1') {
        return view('adminkab.index',
                compact('opd','unitkerja','jabatan','pengguna')
                );
    } else if (Auth::user()->id_role == '2') {
        return view('adminopd.index');
    } else if (Auth::user()->id_role == '3') {
        return view('adminsurat.index',
                compact('suratmasuk','suratkeluar','disposisi','logsuratmasuk','templatesurat','tujuan','tembusan')
                );
    } else if (Auth::user()->id_role == '4') {
        return view('user.index',
                compact('suratmasuk','disposisi')     
                );
            // } else if (Auth::user()->id_role == '4') {
            //     return view('user.index',
            //             compact('suratmasuk','disposisi')     
            //             );            
    } else if (Auth::user()->id_role == '5') {
        return view('TNDE.admin.dashboard');
    // } else {
    //     return view('assistant.dashboard');
    }
}
}
