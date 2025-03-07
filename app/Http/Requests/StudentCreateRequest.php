<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nis' => 'unique:students|max:8',
            'name' => 'max:50|required',
            'gender' => 'required',
            'class_id' => 'required',
            'photo' => 'mimes:jpeg,jpg,png,gif,webp'
        ];
    }

    public function attributes()
    {
        return [
            'class_id' => 'class'
        ];
    }

    public function messages() {
        return [
            'nis.required' => 'nis wajib diisi',
            'nis.max' => 'nis maksimal :max karakter',
            'name.required' => 'nama wajib diisi',
            'gender.required' => 'wajib memilih gender',
            'class_id.required' => 'wajib memilih class',
            'photo.mimes' => 'harus berupa foto/gambar'
        ];
    }
}
