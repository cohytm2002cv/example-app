<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Category extends Model
{
    protected $table ='ChildCategory';
    public $timestamps=false;
   
    public function cate(): HasOne
    {
        return $this->hasOne(product::class);
    }
}
