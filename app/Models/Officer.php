<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'name',
        'position',
    ];
}
