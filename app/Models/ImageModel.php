<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\UploadedFile ;

class ImageModel extends Model
{
    use HasFactory;
    protected $table='Image';
    public $timestamps=false;

    protected $fillable = ['name', 'url', 'Product_id']; // Các trường có thể gán


    public function product(): BelongsTo
    {
        return $this->belongsTo(product::class);
    }

}

