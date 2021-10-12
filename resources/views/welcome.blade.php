@extends('layouts.app') @section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>

<div class="row d-flex justify-content-center align-items-center">
    <div class="
            col-12 col-md-6
            bg-danger
            rounded
            justify-content-center
            align-items-center
            p-3
        ">
        <h1 class="text-uppercase text-center">Create order</h1>
        <div class="container col-12 bg-dark rounded p-1">
        {!! Form::open(['route' => 'store.order', 'method' => 'post']) !!}
   
        
                <div class="form-row d-flex flex-wrap">
                    <div class="col-12 col-md-6 px-1">
                        <label for="inputname">Name</label>
                        <input name='Name' type="name" class="form-control" id="inputname" placeholder="Name" required />
                    </div>
                    <div class="col-12 col-md-6 px-1">
                        <label for="inputsurname">Surname</label>
                        <input name='Surname' type="surname" class="form-control" id="inputsurname" placeholder="Surname" required />
                    </div>
                </div>
                <div class="form-row d-flex flex-wrap">
                    <div class="col-12 col-md-8 px-1">
                        <label class="form-label" for="inputaddress">Address</label>
                        <input name='Address'  type="text" id="inputaddress" class="form-control" placeholder="Address" required />
                    </div>
                    <div class="col-12 col-md-4 px-1">
                        <label class="form-label" for="typeNumber">Number</label>
                        <input name='Number' type="number" id="typeNumber" class="form-control" placeholder="Number" required />
                    </div>
                </div>
                <div class="col-12 px-1">
                    <div class="form-group">
                        <label for="selectwoodType">Select wood type</label>
                        <select name="wood_type" class="form-control" id="selectwoodType">
                            <option value="" selected disabled>
                                Choose one
                            </option>
                            @foreach ($typesOfWood as $typeOfWood)
                            <option value="{{$typeOfWood->id}}">{{$typeOfWood->name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-12 px-1">
                    <div class="form-group">
                        <label for="selectwoodType">Select categories</label>
                        <select name="category" class="form-control" id="selectwoodType">
                            <option value="" selected disabled>
                                Choose one
                            </option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                           
                        </select>
                    </div>
                </div>
                <div class="form-row d-flex flex-wrap">
                    <div class="col-12 px-1 mb-3">
                        <label class="form-label" for="inputnote">Note</label>
                        <textarea name='Note' class="form-control" id="inputnote" rows="4" placeholder="Note" required></textarea>
                    </div>
                </div>
           <div class="d-flex justify-content-end pt-3">
            <button type="submit" class="btn btn-dark">Submit</button>
           </div>
            {!! Form::close() !!}
        </div>
        
    </div>
</div>
> @endsection