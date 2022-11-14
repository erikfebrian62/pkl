<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visi extends Model
{
    use HasFactory;

    public $table = 'visi';

    protected $fillable = [
        'candidate_id', 
        'visi'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
