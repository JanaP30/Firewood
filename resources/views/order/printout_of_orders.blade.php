@extends('layouts.app')
@section('content')

<div class="card mb-3">
  <div class="card-body">
    <h5 class="card-title">List of orders</h5>
    

    <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone number</th>
      <th scope="col">Quantity</th>
      <th scope="col">Product Type</th>
      <th scope="col">Products</th>
      <th scope="col">Note</th>
    

    </tr>
  </thead>
  <tbody>
      @foreach($printoutOfOrders as $printoutOfOrder)
   <tr>

      <td >{{ $printoutOfOrder->first_name}}</td>
      <td >{{ $printoutOfOrder->last_name}}</td>
      <td >{{ $printoutOfOrder->address}}</td>
      <td >{{ $printoutOfOrder->phone_number}}</td>
      <td >{{ $printoutOfOrder->quantity}}</td>
      <td >{{ $printoutOfOrder->product_type_id}}</td>
      <td >{{ $printoutOfOrder->product_id}}</td>
      <td >{{ $printoutOfOrder->note}}</td>
     
    
      <td>
 
      </td>
     
     

    </tr>
    @endforeach

   
  </tbody>

</table>
  <div class="text-center">
      {{ $printoutOfOrders->links() }}
    </div>

  </div>
</div>











