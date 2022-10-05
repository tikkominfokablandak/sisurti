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
            'nama_opd' => 'unique:opds',
            'singkatan' => 'unique:opds'
        ];
    }

    public function update()
    {
        return [
            'nama_opd' => ['min:5'],
            'singkatan' => ['min:3']
        ];
    }

    public function messages()
    {
        return [
            'nama_opd.unique' => 'Nama OPD sudah terdaftar',
            'singkatan.unique' => 'Singkatan sudah terdaftar'
        ];
    }
}
