<?php

namespace App\Http\Controllers;
<<<<<<< Updated upstream
=======
use App\Mail\ProductMail;
use App\Models\Product;
>>>>>>> Stashed changes

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function list(){
<<<<<<< Updated upstream
=======
        $notiproduc = [];
       $notiproduct = Product::select('name','quantity')->where('quantity','<=','10')->get();
       $notiproduc = $notiproduct;

       if ($notiproduct){
           Mail::to("esig@gmail.com")->send(new ProductMail($notiproduct));
       }
       return view('resources.notification.index',compact('notiproduct'));
>>>>>>> Stashed changes

    }
}
