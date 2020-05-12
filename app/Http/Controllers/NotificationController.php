<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function list(){

       $notiproduct = Product::select('name','quantity')->where('quantity','<=','10')->get();

       return view('resources.notification.index',compact('notiproduct'));

    }
}
