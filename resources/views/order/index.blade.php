@extends('layouts.app')
@section('content')


<div class="container bg-light p-5">

    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="">List of orders</h1>
            <div class="row">
                <div class="col-12">
                    @include('shared.validation-errors')
                </div>
            </div>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Product Type</th>
                        <th scope="col">Products</th>
                        <th scope="col">Note</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>

                        <td>{{ $order->first_name}}</td>
                        <td>{{ $order->last_name}}</td>
                        <td>{{ $order->address}}</td>
                        <td>{{ $order->phone_number}}</td>
                        <td>{{ $order->email}}</td>
                        <td>{{ $order->quantity}}</td>
                        <td>{{ $order->product_type_id}}</td>
                        <td>{{ $order->product_id}}</td>
                        <td>{{ $order->note}}</td>

                        <td>

                        </td>

                    </tr>
                    @endforeach


                </tbody>

            </table>
            <div class="text-center">
                {{ $orders->links() }}
            </div>

        </div>
    </div>


</div>
</div>

</div>
@endsection