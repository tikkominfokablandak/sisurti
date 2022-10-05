<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UnitkerjaRequest extends FormRequest
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
            'induk_unitkerja' => 'nullable'
        ] + ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    public function store()
    {
        return [
            'nama_unitkerja' => 'max:32|unique:unitkerjas'
        ];
    }

    public function update()
    {
        return [
            'nama_unitkerja' => 'min:3'
        ];
    }

    public function messages()
    {
        return[
            'nama_unitkerja.unique' => 'Nama Unit Kerja sudah terdaftar'
        ];
    }
}
