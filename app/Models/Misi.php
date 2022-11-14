<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Misi extends Model
{
    use HasFactory;

    public $table = 'misi';

    protected $fillable = [
        'candidate_id', 
        'misi'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
