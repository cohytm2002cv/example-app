<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fav extends Model
{
    use HasFactory;
    protected $table ='fav';
    protected $fillable = ['user_id', 'product_id', 'favP','name','price'];

}
