<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $fillable = [
        'image', 'nama', 'kelas', 'alat','peminjaman', 'pengembalian'
    ];
}
