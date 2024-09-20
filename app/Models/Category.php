<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Tentukan atribut yang bisa diisi secara massal
    protected $fillable = ['name'];

    /**
     * Mendefinisikan relasi One-to-Many dengan Book.
     * Sebuah Category dapat memiliki banyak Books.
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
