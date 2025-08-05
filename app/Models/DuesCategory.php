<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuesCategory extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'period',
        'nominal',
        'status',
    ];
    public function duesMember()
    {
        return this->hasMany(DuesMember::class);
    }
}
