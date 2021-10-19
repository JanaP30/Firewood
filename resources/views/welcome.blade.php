@extends('layouts.app') 
@section('content')


<div class="container bg-light p-5">

    <div class="row">
        <!-- {!! Form::open(['url' => '/store-order', 'method' => 'post']) !!} -->
        {{ Form::model($order, ['route' => ['order.store']]) }} 
        <div class="col-12 mt-3">
            <h1 class="">Create order</h1>
            <div class="row">
                <div class="col-12">
                    @include('shared.validation-errors')
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="first_name">Name</label>
                        <!-- {{ Form::text('first_name', 'Name', ['id' => 'first_name', 'class' => 'form-control']) }} -->
                        <input name='first_name' type="text" class="form-control" id="first_name" placeholder="Please insert your name" required />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="last_name">Surname</label>
                        <input name='last_name' type="text" class="form-control" id="last_name" placeholder="Surname" required />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label" for="address">Address</label>
                        <input name='address' type="text" id="address" class="form-control" placeholder="Address" required />
                    </div>
                
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label" for="phone_number">Phone Number</label>
                        <input name='phone_number' type="text" id="phone_number" class="form-control" placeholder="Number" required />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="combination_id">Select product</label>
                        <select name="combination_id" class="form-select" id="product_id">
                            <option value="" selected disabled>
                                Choose one
                            </option>
                            @foreach ($combinations as $combination)
                            <option value="{{$combination->id}}">{{$combination->product->name .  '-' . $combination->productType->name}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" required>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label" for="note">Note</label>
                            <textarea name='note' class="form-control" id="note" rows="4" placeholder="Insert delivery note here." required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-end my-3">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </div>
            </div>
        </div>   
        {!! Form::close() !!}
    </div>                
        
</div><!-- end container -->
@endsection