@extends('layouts.app') 
@section('content')


<div class="container content bg-light p-5">

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
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="first_name">Name</label>
                        <!-- {{ Form::text('first_name', 'Name', ['id' => 'first_name', 'class' => 'form-control']) }} -->
                        <input name='first_name' type="text" class="form-control" id="first_name" placeholder="Name (required)" required>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="last_name">Last name</label>
                        <input name='last_name' type="text" class="form-control" id="last_name" placeholder="Last name (required)" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="address">Address</label>
                        <input name='address' type="text" id="address" class="form-control" placeholder="Address (required)" required />
                    </div>
                
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="phone_number">Phone number</label>
                        <input name='phone_number' type="tel" id="phone_number" pattern="^\d{3}-\d{3}-\d{4}$" class="form-control" placeholder="Phone number (xxx-xxx-xxx)" required />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="wood_category_id"></label>
                        <select name="wood_category_id" class="form-select" id="wood_category_id">
                            <option value="" selected disabled>
                                Select product
                            </option>
                            @foreach ($products as $one_product)
                            <option value="{{$one_product->id}}">{{$one_product->name}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">

                    <div class="form-group">
                        <label for="product_type_id"></label>
                        <select name="product_type_id" class="form-select" id="product_type_id">
                            <option value="" selected disabled>
                                Select product type
                            </option>
                            @foreach ($productTypes as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity" required>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="note"></label>
                            <textarea name='note' class="form-control" id="note" rows="4" placeholder="Insert delivery note here (required)" required></textarea>
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