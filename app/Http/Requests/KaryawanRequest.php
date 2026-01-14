<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KaryawanRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'gender'      => 'required',
            'alamat'      => 'required|string', 
            'position_id' => 'required|exists:positions,id', 
            'division_id' => 'required|exists:divisions,id', 
            'salary'      => 'required|numeric|min:0',
        ];
    }

    
    public function messages(): array
    {
        return [
            'name.required' => 'Nama karyawan wajib diisi.',
            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'alamat.required' => 'Alamat wajib diisi.',
            'position_id.required' => 'Posisi wajib dipilih.',
            'division_id.required' => 'Divisi wajib dipilih.',
            'salary.required' => 'Gaji wajib diisi.',
            'salary.numeric' => 'Gaji harus berupa angka.',
        ];
    }
}