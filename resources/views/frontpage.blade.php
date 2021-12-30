@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <link href="{{asset('frountend/css/mycss.css')  }}" rel="stylesheet">

                    <div class="card-header">Menu</div>

                    <div class="card-body">

                        <form action="{{ route('frontpage') }}" method="get">
                            <a class="list-group-item list-group-item-action" href="/">Back</a>
                            <input type="submit" value="Vegetarian"        name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Nonvegetarian"     name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Traditional"       name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Peri peri chicken" name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Garlic PRAWN"      name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Chicken & Camembert"name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Loaded pepperoni"   name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Spicy peppy paneer" name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Spicy pepperoni"    name="category" class="list-group-item list-group-item-action">
                            <input type="submit" value="Vegi pepperoni"     name="category" class="list-group-item list-group-item-action">
                        </form>


                    </div>

                </div>
                  <div class="card card-body mt-3">
                    Hello everyone, you will find what makes you happy
                    and what makes you happy in pizza,

                    adhere to the instructions and order
                  <a href=" <a href=" target="_blank">
                    your pizza
                  </a>
                  </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pizza( pizza)</div>

                    <div class="card-body">

                        <div class="row">
                            @forelse ($pizzas as $pizza )
                                <div class="col-md-4 mt-2 text-center" style="border: 1px solid #ccc;">

                                    <img src="{{asset('folderimge/'.$pizza ->image )  }}" class="img-thumbnail" style="border-radius: 100%;height: 40%;width:50%">
                                    <p> {{  $pizza->name}}</p>
                                    <p> {{ $pizza->description}}</p>
                                <a href="{{ route('Pizza.show',$pizza->id) }}">
                                        <button class="btn btn-danger mb-1">Order Now</button>
                                    </a>
                                </div>
                                @empty
                                <p>
                                    no Pizza show
                                </p>
                                @endforelse
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
