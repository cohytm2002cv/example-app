<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

use Illuminate\Http\UploadedFile ;

class product extends Model
{
    protected $table = 'Product';
    public $timestamps=false;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Category::class,'cateid');
    }
    protected $fillable = ['Pname', 'price','cateid','img']; // Các trường có thể gán

    public function images()
    {
        return $this->hasMany(ImageModel::class,'Product_id');
    }
    public function branchproducts()
    {
        return $this->hasMany(BranchProduct::class,'product_id');
    }


}
