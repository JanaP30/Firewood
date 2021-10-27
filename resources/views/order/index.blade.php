@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-6 d-flex justify-content-center">
            <div class="table-responsive">
                <table class="table table-dark table-hover table-bordered hide" id="order-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Product Type ID</th>
                            <th scope="col">Product ID</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Date & Time</th>
                        </tr>
                    </thead>

                    <tbody>

                        {{-- @foreach()
                            
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
            <div id="loader"></div>
        </div>
    </div>
</div>

@endsection