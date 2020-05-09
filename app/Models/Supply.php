<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supply extends Model
{

    use SoftDeletes;

    protected $primaryKey = "id";

    protected $table = "supplies";

    protected $fillable = [
        "quantity",
        "price",
        "product_id",
        "provider_id",
        "confirmed_at",
    ];

    public function provider(){
        return $this->belongsTo(provider::class,"provider_id","id");
    }

    public function product(){
        return $this->belongsTo(product::class,"product_id","id");
    }
}
