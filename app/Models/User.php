<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Contracts\Auth\Authenticatable;



class User extends Model
{
    use HasFactory;
    protected $table='Users';
    protected $fillable = ['username', 'email', 'pass'];

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'User', 'id', 'id');

    }
}
