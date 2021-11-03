@extends('layout')
 @section('content')

 <div class="col-2">
    <a href="/grade" class="btn btn-dark" >Back </a>
 </div>
 <div class= "card">
 

     <div class="row">
        <div class="col-6">
            <p>Name</p>
        </div>
        <div class="col-6">
            <p><strong>{{ $orders->firstName." ".$orders->student->secondName}}</strong></p>

        </div>
     </div>
     <div class="row">
        <div class="col-6">
            <p>Address</p>
        </div>
        <div class="col-6">
            <p><strong>{{ $orders->address}}</strong></p>

        </div>
     </div>
     <div class="row">
        <div class="col-6">
            <p>Phone number</p>
        </div>
        <div class="col-6">
            <p><strong>{{ $orders->phone_number}}</strong></p>

        </div>
     </div>
     <div class="row">
        <div class="col-6">
            <p>Email</p>
        </div>
        <div class="col-6">
            <p><strong>{{ $orders->email}}</strong></p>

        </div>
     </div>
     <div class="row">
        <div class="col-6">
            <p>Quantity</p>
        </div>
        <div class="col-6">
            <p><strong>{{ $orders->quantity}}</strong></p>

        </div>
     </div>
     <div class="row">
        <div class="col-6">
            <p>Product type</p>
        </div>
        <div class="col-6">
            <p><strong>{{ $orders->product_type_id}}</strong></p>

        </div>
     </div>
     <div class="row">
        <div class="col-6">
            <p>Product</p>
        </div>
        <div class="col-6">
            <p><strong>{{ $orders->product_id}}</strong></p>

        </div>
     </div>
     <div class="row">
        <div class="col-6">
            <p>Note</p>
        </div>
        <div class="col-6">
            <p><strong>{{ $orders->note}}</strong></p>

        </div>
     </div>
     <div class="row">
        <div class="col-6">
            <p>Order</p>
        </div>
        <div class="col-6">
            <p><strong>{{ $orders->getOrders()}}</strong></p>

        </div>
     </div>
     
     </div>
     

 </div>

       