<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\candidate;

class grade extends Model
{
    protected $table = 'grade';
    protected $fillable=[
        'candidateNationalId',
        'licenseExamCategory',
        'obtainedmarks_20',
        'decision'
    ];
    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidateNationalId');
    }
}
