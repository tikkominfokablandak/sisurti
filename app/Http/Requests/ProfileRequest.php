<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nip' => 'numeric',
            'nik' => 'numeric',
            'no_hp' => 'numeric',
            'foto' => 'mimes:jpeg,png,jpg | max:2048',
            'password' => 'confirmed',
        ] + ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    protected function store()
    {
        return [
            'username' => 'min:5 | unique:users',
            'email' => 'email | max:255 | unique:users'
        ];
    }

    protected function update()
    {
        return [
            'username' => ['min:5', Rule::unique('users')->ignore($this->user)],
            'email' => ['email','max:255', Rule::unique('users')->ignore($this->user)],
        ];
    }

    public function messages()
    {
        return [
            'username.min' => 'Nama Pengguna harus diisi minimal :min karakter!',
            'password.min' => 'Kata Sandi harus diisi minimal :min karakter!',
            'foto.max' => 'Foto harus diisi maksimal 2 MB!',
            'nip.numeric' => 'NIP hanya boleh diisi angka!',
            'nik.numeric' => 'NIK hanya boleh diisi angka!',
            'no_hp.numeric' => 'Nomor Seluler hanya boleh diisi angka!',
            'foto.mimes' => 'Format Foto yang dipilih harus .JPG, .PNG, .JPEG!',
            'email' => 'Email hanya boleh diisi menggunakan format email!',
            'password.confirmed' => 'Konfirmasi Kata Sandi tidak cocok.',
            'username.unique' => 'Username sudah terdaftar',
            'email.unique' => 'Email sudah terdaftar.',
        ];
    }
}
