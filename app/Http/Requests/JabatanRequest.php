<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JabatanRequest extends FormRequest
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
            'nama_jabatan' => 'nullable'
        ] + ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    public function store()
    {
        return [
            'nama_jabatan' => 'unique:jabatans|max:128|required'
        ];
    }

    public function update()
    {
        return [
            'nama_jabatan' => 'max:128|required'
        ];
    }

    public function messages()
    {
        return[
            'nama_jabatan.unique' => 'Nama Jabatan sudah terdaftar',
            'nama_jabatan.max' => 'Batas maksimal adalah 128 karakter'
        ];
    }
}
