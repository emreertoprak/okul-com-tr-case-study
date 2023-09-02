<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','phone_number'];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
