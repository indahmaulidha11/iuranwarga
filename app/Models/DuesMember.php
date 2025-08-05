<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuesMember extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'user_id',
        'dues_category_id',
    ];
    public function user()
    {
        return this->belongsTo(User::class);
    }
    public function duesCategory()
    {
        return this->belongsTo(DuesCategory::class);
    }
    public function payments()
    {
        return this->hasMany(Payment::class);
    }
}
