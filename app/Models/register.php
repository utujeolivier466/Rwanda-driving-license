<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class register extends Model
{
    protected $table = 'admin';
    protected $fillable = [
        'adminName',
        'adminPassword'
    ];
}
