<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Opd;
use App\Models\Unitkerja;
use App\Models\Jabatan;
use Hash;
use Validator;
use Alert;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $user = User::join('roles', 'users.id_role', 'roles.id')
        ->join('jabatans', 'users.id_jabatan', 'jabatans.id')
        ->join('unitkerjas', 'jabatans.id_unitkerja', 'unitkerjas.id')
        ->join('opds', 'unitkerjas.id_opd', 'opds.id')
        ->select('users.*', 'roles.nama_role', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
        ->where('users.id', Auth::id())
        ->first();

        return view('profil.index', compact('user'));
    }

    public function edit($id)
    {
        $role = Role::orderBy('id', 'asc')->get();

        $user = User::join('roles', 'users.id_role', 'roles.id')
            ->join('jabatans', 'users.id_jabatan', 'jabatans.id')
            ->join('unitkerjas', 'jabatans.id_unitkerja', 'unitkerjas.id')
            ->join('opds', 'unitkerjas.id_opd', 'opds.id')
            ->select('users.*', 'roles.nama_role', 'jabatans.nama_jabatan', 'opds.nama_opd', 'unitkerjas.nama_unitkerja')
            ->where('users.id', $id)
            ->first();

        return view(
            'profil.edit',
            [
                'role' => $role,
                'user' => $user,
            ]
        );
    }

    public function update(ProfileRequest $request, $id)
    {
        $validated = $request->validated();

        $users = User::findOrfail($id);

        $user = $request->all();

        if ($request->password == NULL) {
            $user['password'] = $users->password;
        } else {
            $user['password'] = Hash::make($request->password);
        }

        if ($request->file('foto') == NULL) {
            $user['foto'] = $users->foto;
        } else {
            $file = $request->file('foto');
            $nama = $user['username'];
            $extension = $file->getClientOriginalExtension();
            $namabaru = $nama . '.' . $extension;
            Storage::putFileAs('public/img/profil/', $request->file('foto'), $namabaru);

            $user['foto'] = $namabaru;
        }

        $user['username'] = Str::lower($request->username);
        $user['email'] = Str::lower($request->email);
        $user['id_create'] = Auth::user()->id;

        $users->update($user);

        return redirect()->route('profil.index')
            ->with('success', 'Perubahan data berhasil di simpan.');
    }
}
