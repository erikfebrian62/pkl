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
    ];

    public function vote()
    {
        return $this->hasMany(Vote::class);
    }

    public function votecount()
    {
        return $this->hasMany(Vote::class);
    }

    public function misi()
    {
        return $this->hasMany(Misi::class);
    }

    public function visi()
    {
        return $this->hasMany(Visi::class);
    }

    public function winner()
    {
        return $this->hasOne( Winner::class);
    }
}
