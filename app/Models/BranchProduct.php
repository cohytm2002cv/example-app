<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BranchProduct extends Model
{
    use HasFactory;
    protected $table='branch_product';

    public function product()
    {   
        return $this->belongsTo(product::class);
    }
    public function branchs()
    {
        return $this->belongsTo(Branchs::class);
    }
    protected $fillable = [
        'product_id', // Add product_id to the fillable array
        'branchs_id',
        'qty',
    ];

}
