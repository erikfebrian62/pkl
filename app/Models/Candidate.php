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
        'wakil',
        'class',
        'jurusan',
        'visi',
        'misi',
    ];
}
