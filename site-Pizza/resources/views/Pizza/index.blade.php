
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Menu</div>
                    <div class="card-body">
                        <ul class="list-group">
                        <a href="{{ route('index') }}" class="list-group-item list-group-item-action">View</a>
                        <a href="{{ route('Pizza.index') }}" class="list-group-item list-group-item-action">Create</a>
                        <a href="{{ route('user.order') }}" class="list-group-item list-group-item-action">User order</a>
                        <br>
                        @if (Session::has('messages'))
                        <div style="background: #3bc90385; font-weight: bold;text-align: center;
                        align-items: center;" class="alert alert-success" role="alert">
                            {{ Session::get('messages') }}
                        </div>
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div  style="background: rgba(238, 206, 206, 0.342)" class="card-header">All Pizza

                        <a href="{{ route('Pizza.index') }}">
                            <button class="btn btn-success" style="float: right">Add pizza</button>
                        </a>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">S.price</th>
                                    <th scope="col">M.price</th>
                                    <th scope="col">L.price</th>
                                    <th style="color: rgb(0, 17, 255)" scope="col">Edit</th>
                                    <th style="color: red" scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
 @if (count($Pizzas)>0)
@foreach ($Pizzas as $Pizza )
                        <tr>
                            <th scope="row">{{  $loop->index+1}}</th>
                            <td><img class="rounded-circle" src="{{asset('folderimge/'.$Pizza ->image )  }}" width="60"></td>
                            <td>{{ $Pizza->name }}</td>
                            <td>{{ $Pizza->description }}</td>
                            <td>{{ $Pizza->category }}</td>
                            <td>{{ $Pizza->small_pizza_price }}</td>
                            <td>{{ $Pizza->medium_pizza_price }}</td>
                            <td>{{ $Pizza->large_pizza_price }}</td>
                            <td><a href="{{ route('Pizza.edit',$Pizza->id) }}"><button class="btn btn-primary">Edit</button></a></td>
                            <td><button  onclick="deleteEmplooy({{ $Pizza->id }})" type="submit" class="btn btn-danger btn-xs " >Delete</button></td>
                    </tr>
    @endforeach
    @else
    <p>No Pizza Show</p>
    @endif
                            </tbody>
                        </table>
                        {{ $Pizzas->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('frountend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frountend/js/js.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteEmplooy(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )

                }
              })
        }

    </script>

@endsection
