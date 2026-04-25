<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id', //Tambahkan baris ini agar data dari dropdown diizinkan lewat dan tervalidasi
            'quantity' => 'sometimes|required|integer|min:0',
            'price' => 'sometimes|required|numeric|min:0',
            'user_id' => 'sometimes|required|exists:users,id',
        ];
    }
}