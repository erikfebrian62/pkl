<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'candidate_id'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
