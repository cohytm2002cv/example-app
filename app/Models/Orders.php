<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Orders extends Model
{
    use HasFactory;
    protected $table='Orders';
    public function OrderDetails()
{
    return $this->hasMany(OrderDetails::class, 'Order_id');
}
}
