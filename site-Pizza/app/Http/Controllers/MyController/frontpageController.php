<?php

namespace App\Http\Controllers\MyController;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Http\Request;

class frontpageController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->category){
            $pizzas=Pizza::latest()->get();
            return view('frontpage',compact('pizzas'));
        }
        $pizzas=Pizza::where('category',$request->category)->get();
        return view('frontpage',compact('pizzas'));
    }
    public function show($id){
        $pizza=Pizza::find($id);
        return view('show',compact('pizza'));
    }

    public function store(Request $request){
if($request->small_pizza==0 && $request->medium_pizza==0 && $request->large_pizza==0){
    return back()->with('errormessage','please order the pizza');
}
if($request->small_pizza<0 || $request->medium_pizza<0 || $request->large_pizza<0)
return back()->with('errormessage','Non pizza nigative');

Order::create([
'time'=> $request->time,
'date'=> $request->date,
'phone'=> $request->phone,
'small_pizza'=>$request->small_pizza,
'medium_pizza'=>$request->medium_pizza,
'large_pizza'=>$request->large_pizza,
'pizza_id'=>$request->pizza_id,
'user_id'=>auth()->user()->id,
'body'=>$request->body,
]);
return back()->with('message','Your Order successfully added');
    }
}
