<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'discipline'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
