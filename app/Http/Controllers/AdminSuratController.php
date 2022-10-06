<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminSuratController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$users = User::count();
        //$count = DB::table('opds')->get()->count();
        $count = User::count();
        
        //return view ("adminsurat.index ", compact('users'));
        return view ('adminsurat.index', ['count' => $count]);
    }
}
