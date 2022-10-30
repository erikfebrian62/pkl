<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'ketua',
        'kelas_ketua',
        'jurusan_ketua',
        'wakil',
        'kelas_wakil',
        'jurusan_wakil',
        'visi',
        'misi',
    ];
}
