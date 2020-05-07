<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use SoftDeletes;
    use Notifiable;


    protected $primaryKey = "id";

    protected $table = "products";

    protected $fillable = [
            "name",
            "quantity",
            "price",
            "unity",
            "unity_price",
            "description",
            "created_at",
            "updated_at"
    ];

    public function sales(){
        return $this->hasMany(Sale::class,"product_id","id");
    }

    public function supplies(){
        return $this->hasMany(Supply::class,"product_id","id");
    }
}
