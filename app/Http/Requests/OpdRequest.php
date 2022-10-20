<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class OpdRequest extends FormRequest
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
            //
            'alamat' => 'nullable'
        ]+ ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    public function store()
    {
        return [
            'nama_opd' => 'unique:opds|max:128|required',
            'singkatan' => 'unique:opds|max:32|required'
        ];
    }

    public function update()
    {
        return [
            'nama_opd' => 'max:128|required',
            'singkatan' => 'max:32|required'
        ];
    }

    public function messages()
    {
        return [
            'nama_opd.unique' => 'Nama OPD sudah terdaftar',
            'nama_opd.max' => 'Batas maksimal adalah 128 karakter',
            'singkatan.max' => 'Batas maksimal adalah 32 karakter',
            'singkatan.unique' => 'Singkatan sudah terdaftar',
            'nama_opd.unique' => 'Nama OPD sudah terdaftar',
            'singkatan.unique' => 'Singkatan OPD sudah terdaftar',
            'nama_opd.required' => 'Field Nama OPD wajib diisi',
            'singkatan.required' => 'Field Singkatan wajib diisi'
        ];
    }
}
