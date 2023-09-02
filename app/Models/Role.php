<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    const USER_ROLES = [
        "admin" => 1,
        "user" => 2
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
