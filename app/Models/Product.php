<?php

namespace App\Models;

use App\Mail\ProductMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
<<<<<<< Updated upstream
=======
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\Self_;
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
=======

    public static function notifications(){
        $notiproduct = Product::select('name','quantity')->where('quantity','<=','10')->get();
        if ($notiproduct){
            Mail::to("danielndam9@gmail.com")->send(new ProductMail($notiproduct));
        }
        return self::query()->select(['name',"quantity"])->where('quantity','<=','10')->get();
    }
>>>>>>> Stashed changes
}
