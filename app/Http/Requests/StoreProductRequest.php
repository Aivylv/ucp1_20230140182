<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Ubah menjadi true agar semua user (yang sudah login) bisa mengaksesnya
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        // Pindahkan rules dari Controller ke sini
        return [
            'name' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id', //Tambahkan baris ini agar data dari dropdown diizinkan lewat dan tervalidasi
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
        ];
    }

    /**
     * (Opsional) Custom pesan error agar lebih ramah pengguna
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama produk wajib diisi.',
            'quantity.required' => 'Kuantitas tidak boleh kosong.',
            'price.required' => 'Harga produk harus diisi.',
            'user_id.required' => 'Pemilik produk harus dipilih.',
        ];
    }
}