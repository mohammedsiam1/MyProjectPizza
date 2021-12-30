@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">All coustomers</li>
                    </ol>
                </nav>

                <div class="card ">
                    <div class="card-header">order
                        <a style="float:right;" href="{{ route('user.order') }}"><button class="bnt btn-secondary btn-sm" style="margin-left: 5px;">View Order</button></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">User</th>
                                    <th scope="col">Phone/Email</th>
                                    <th scope="col">Date/Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{  $customer->name}}</td>
                                        <td >{{  $customer->email}}</td>
                                        <td>{{\Carbon\Carbon::parse ($customer->	created_at)->format('M d Y')}}</td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
