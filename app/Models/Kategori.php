<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public $timestamps = true; //Diubah menjadi true karena kita sudah menambahkan timestamps di file migrasi

    protected $fillable = [
        'name' //Menghapus 'product_id' dari array ini karena kolom tersebut sudah tidak ada
    ];

    public function products() //Mengubah nama fungsi menjadi jamak "products" dan menggunakan hasMany karena 1 kategori memiliki banyak produk
    {
        return $this->hasMany(Product::class); //Mendefinisikan relasi one-to-many ke model Product
    }
}