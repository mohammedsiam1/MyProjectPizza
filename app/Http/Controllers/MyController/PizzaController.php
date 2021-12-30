<?php

namespace App\Http\Controllers\MyController;

use App\Models\Pizza;
use App\triets\imagetrits;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PizzaStoreRequset;
use App\Http\Requests\PizzaUpdateRequest;

class PizzaController extends Controller
{
    use imagetrits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pizzas=Pizza::paginate(10);
return view('Pizza.index',compact('Pizzas'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPizza()
    {
        return view('Pizza.create');
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePizza(PizzaStoreRequset $request)
    {
        $path=$this->saveimag($request->image,'folderimge');
Pizza::create([
    'name'=>$request->name,
    'description'=>$request->description,
    'small_pizza_price'=>$request->small_pizza_price,
    'medium_pizza_price'=>$request->medium_pizza_price,
    'large_pizza_price'=>$request->large_pizza_price,
    'category'=>$request->category,
    'image'=>$path,
]);
    return redirect()->route('index')->with(['messages'=>'Pizza added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPizza($id)
    {
       $Pizza=Pizza::find($id);
       return view('Pizza.edit',compact('Pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePizza(PizzaUpdateRequest $request, $id)
    {
        $Pizza=Pizza::select('id','name','description','small_pizza_price','medium_pizza_price',
        'large_pizza_price','category','image')->find($id);

        if($request->has('image')){
            $path=$this->saveimag($request->image,'folderimge');
        }else{
            $path=$Pizza->image;

        }

        if(!$Pizza)
        return redirect()->back();
       // $lan->update($request->all());
        $Pizza->update([
          'name'=>$request->name,
          'description'=>$request->description,
          'small_pizza_price'=>$request->small_pizza_price,
          'medium_pizza_price'=>$request->medium_pizza_price,
          'small_pizza_price'=>$request->small_pizza_price,
          'large_pizza_price'=>$request->large_pizza_price,
          'category'=>$request->category,
          'image'=>$path,
         ]);

       /*  $Pizza=Pizza::find($id);
        $Pizza=new Pizza;
        $Pizza->name=$request->name;
        $Pizza->description=$request->description;
        $Pizza->small_pizza_price=$request->small_pizza_price;
        $Pizza->medium_pizza_price=$request->medium_pizza_price;
        $Pizza->large_pizza_price=$request->large_pizza_price;
        $Pizza->category=$request->category;
        $Pizza->image=$path;
        $Pizza->save();*/
    return redirect()->route('index')->with(['messages'=>'Pizza Update successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyPizza($id)
    {
       Pizza::find($id)->delete;
    return redirect()->route('index')->with(['messages'=>'Pizza Delete successfully']);

    }
}
