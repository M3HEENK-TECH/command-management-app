<?php

namespace App\Models;


use App\Mail\ProductMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\Self_;

class Product extends Model
{
    use SoftDeletes;
    use Notifiable;

    protected $primaryKey = "id";

    protected $table = "products";

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['total_sales_price'];

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

    public static function sendAlertNotification(){
        $notiproduct = Product::select('name','quantity')->where('quantity','<=','10')->get();
        if ($notiproduct){
            Mail::to("danielndam9@gmail.com")->send(new ProductMail($notiproduct));
        }
    }

    public static function notifications(){
        return self::query()->select(['name',"quantity"])->where('quantity','<=','10')->get();
    }

    public static function maxSale(){
        $products = self::query()
        ->whereMonth('products.created_at',now()->month)
        ->whereYear('products.created_at',now()->year)
        ->withCount("sales")->get();
        $product_with_max_sales = [];
        foreach ($products as $key =>  $product){
            if ($key < 10 && $product->sales->count() == $products->max("sales_count") ){
                $product_with_max_sales[] = $product;
            }
        }
        return $product_with_max_sales;
    }

    public static function minSale(){
        $products = self::query()
            ->whereMonth('products.created_at',now()->month)
            ->whereYear('products.created_at',now()->year)
            ->withCount("sales")->get();
        $P = [];
        foreach ($products as $key => $product){
            if ($key < 10 && $product->sales->count() == $products->min("sales_count") ){
                $P[] = $product;
            }
        }
        return $P;
    }

    public static function maxSaleByTotalPrce(){

        $products = self::query()
            ->whereMonth('products.created_at',now()->month)
            ->whereYear('products.created_at',now()->year)
            ->with("sales")->get();
        $product_with_total_sale_price = collect();
         foreach ($products as $i_product){
             $i_product->total_sales_price = $i_product->sales->sum("quantity") * $i_product->unity_price;
             $product_with_total_sale_price->add($i_product)   ;
         }
         /*dd($product_with_total_sale_price->last()->total_sales_price,
             $product_with_total_sale_price->last()->sales->sum("quantity"),
             $product_with_total_sale_price->last()->unity_price,
             $product_with_total_sale_price->max("total_sales_price")
         );*/
        $product_with_max_sales = [];
        foreach ($product_with_total_sale_price as $key =>  $j_product){
            if ($key < 10 && $j_product->total_sales_price
                    == $product_with_total_sale_price->max("total_sales_price") ){
                $product_with_max_sales[] = $j_product;
            }
        }
        return $product_with_max_sales;
    }

    public static function minSaleByTotalPrce(){
        $products = self::query()
            ->whereMonth('products.created_at',now()->month)
            ->whereYear('products.created_at',now()->year)
            ->with("sales")->get();
        $product_with_total_sale_price = collect();
        foreach ($products as $i_product){
            $i_product->total_sales_price = $i_product->sales->sum("quantity") * $i_product->unity_price;
            $product_with_total_sale_price->add($i_product)   ;
        }
        /*dd($product_with_total_sale_price->last()->total_sales_price,
            $product_with_total_sale_price->last()->sales->sum("quantity"),
            $product_with_total_sale_price->last()->unity_price,
            $product_with_total_sale_price->max("total_sales_price")
        );*/
        $product_with_max_sales = [];
        foreach ($product_with_total_sale_price as $key =>  $j_product){
            if ($key < 10 && $j_product->total_sales_price
                == $product_with_total_sale_price->min("total_sales_price") ){
                $product_with_max_sales[] = $j_product;
            }
        }
        return $product_with_max_sales;
    }



}
