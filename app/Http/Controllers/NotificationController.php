<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Mail\ProductMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function list(){
       $notiproduct = Product::select('name','quantity')->where('quantity','<=','10')->get();

       if ($notiproduct){
           Mail::to("esig@gmail.com")->send(new ProductMail($notiproduct));
       }
       return view('resources.notification.index',compact('notiproduct'));


    }
}
