<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\grade;

class candidate extends Model
{
    protected $table = 'candidate';
    protected $fillable = [
        'firstName',
        'secondName',
        'gender',
        'dof',
        'examDate',
        'phoneNumber',
    ];
    public function grade()
    {
        return $this->hasOne(grade::class, 'candidateNationalId');
    }
}
