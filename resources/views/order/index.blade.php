@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-6 d-flex align-items-center">
            <table class="table table-dark table-hover table-bordered" id="order-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Product type</th>
                        <th scope="col">Product ID</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach()

                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection