<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{

    /**
     * @var string CARD_SESSION_KEY
     */
    public const CARD_SESSION_KEY =  "card_sales";

    public const CARD_SESSION_FIELDS =  ["product", "product_id", "quantity"];

    protected $primaryKey = "id";

    protected $table = "sales";

    protected $fillable = [
        "quantity",
        "product_id",
        "user_id",
    ];

    public const UPDATED_AT = null;


    public function product(){
        return $this->belongsTo(Product::class,"product_id","id");
    }

    public function cashier(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    public static function insertSaleFromSession() : bool {
        $session_sales = session()->get(self::CARD_SESSION_KEY);
        if ( empty($session_sales) ) {
            return false;
        }
        # Mysql transaction to secure queries
        DB::transaction( function () use ($session_sales){

            foreach ($session_sales as $session_sale){
                $product = Product::query()
                    ->where("id",$session_sale['product_id'])
                    ->first();
                if ( $session_sale['quantity']  > $product->quantity  ) {
                    DB::rollBack();
                    return false;
                }
                $sale =  self::query()->create([
                    "quantity" => $session_sale['quantity'] ,
                    "product_id" => $session_sale['product_id'],
                    "user_id" => auth()->id()
                ]);
                $product->update([
                    "quantity" => $product->quantity - $session_sale['quantity']
                ]);
            }

        });
        session()->remove(self::CARD_SESSION_KEY);
        return  true;

    }


}
