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
        'misi_1',
        'misi_2',
        'misi_3',
        'misi_4',
        'misi_5',
        'misi_6',
        'misi_7',
        'misi_8',
        'misi_9',
        'misi_10',
    ];

    public function vote()
    {
        return $this->hasMany(Vote::class);
    }
}
