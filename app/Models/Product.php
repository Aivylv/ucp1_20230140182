<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'kategori_id', //Menambahkan 'kategori_id' agar field ini diizinkan untuk diisi data saat form disubmit
        'name',
        'quantity',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori() //Mengubah nama fungsi menjadi tunggal "kategori" karena 1 produk hanya milik 1 kategori
    {
        return $this->belongsTo(Kategori::class); //Mendefinisikan balikan relasi belongsTo ke model Kategori
    }
}