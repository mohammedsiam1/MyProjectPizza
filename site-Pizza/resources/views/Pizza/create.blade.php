
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div style="background: rgba(245, 129, 129, 0.329)" class="card-header">Menu</div>
                    <div class="card-body">
                        <ul class="list-group">
                        <a href="{{ route('index') }}" class="list-group-item list-group-item-action">View</a>
                        <a href="" class="list-group-item list-group-item-action">Create</a>
                        <br>
                        @if (count($errors)>0)
                        <div class="alert alert-danger">

                        @foreach ($errors->all() as $error )
                   <p> {{ $error }}</p>
                        @endforeach
                    </div>
                        @endif
                        </ul>
                    </div>
                </div>



            </div>

            <div class="col-md-8">
                <div class="card">
                    <div style="background: rgba(238, 206, 206, 0.795)" class="card-header">Pizza</div>


                    <form action="{{ route('Pizza.store')  }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name of pizza</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="name of pizza">
                            </div>
                            <div class="form-group">
                                <label for="description">Description of pizzza</label>
                                <textarea class="form-control" value="{{ old('description') }}" name="description"></textarea>
                            </div>
                            <div class="form-inline ">
                                <label>Pizza price($)</label>
                                <input type="number"min="1" name="small_pizza_price" value="{{ old('small_pizza_price') }}" class="form-control" placeholder="small pizza price">
                                    <br>
                                <input type="number" min="1" name="medium_pizza_price" value="{{ old('medium_pizza_price') }}" class="form-control" placeholder="medium pizza price">
                                    <br>
                                <input type="number"min="1" name="large_pizza_price" value="{{ old('large_pizza_price') }}" class="form-control" placeholder="large pizza price">
                                    <br>

                            </div>
                            <div class="form-group">
                                <label for="description">Category</label>
                                <select class="form-control" name="category" value="{{ old('category') }}">
                                    <option value=""></option>
                                    <option value="vegetarian">Vegetarian Pizza</option>
                                    <option value="nonvegetarian">Non vegetarian Pizza</option>
                                    <option value="traditional">Traditional Pizza</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" name="image" value="{{ old('image') }}">
                            </div>
                            <div style="margin-top: 10px" class="form-group text-center">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
