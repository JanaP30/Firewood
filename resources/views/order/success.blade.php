@extends('layouts.app')
@content
<div class="container bg-light p-5">

    <div class="row">
        <div class="col-12">
            <h1>Success!</h1>
            <p>You have successfully placed your order, with ID: {{ $order->id }}</p>
            
        </div>
    </div>
</div>