<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'author', 'registration_number', 'status', 'genre'];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
