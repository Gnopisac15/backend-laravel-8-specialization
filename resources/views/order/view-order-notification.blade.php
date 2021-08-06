@extends('layouts.app')

<style>
      .card-horizontal {
          display: flex;
          flex: 1 1 auto;
      }
      .sm-padding {
        box-sizing: content-box !important;
      }

      .nopadding {
        padding:0 !important;
      }
</style>

@section('content')

<div class="container align-items-center">

    <h1 class="text-center mt-5 mb-5">LISTS OF ORDERS</h1>

    <div class="row">
      @foreach($orderNotif as $orders)
        <div class="card color3 mb-4 nopadding col-5 ml-5" style="width: 33rem;">
          <div class="card-horizontal">
            <div class="img-square-wrapper nopadding col-4">
              <img class="w-100 h-100 rounded-left" src="/storage/{{ $orders->post->image }}" alt="Card image cap">
            </div>
            <div class="card-body col-7 sm-padding">
              <span>Customer name: </span> <span class="h4 text-capitalize">{{$orders->fname}}</span><br>
              <span class="text-capitalize">Address: {{$orders->address}}</span>
              <hr>
              <span class="">Menu: <strong>{{$orders->post->caption}}</strong></span> <br>
              <span>Price: {{$orders->post->price}}</span><br>
              <span>Quantity: {{$orders->qty}}</span><br>
              <span>Amount: {{$orders->post->price*$orders->qty}}</span>
              <br><br>
              <!-- <a href="/status/order/{{$orders->id}}" class="btn btn-danger  btn-sm">Cancel</a> -->

              <form action="/status/order/{{$orders->id}}" method="post" >
                
                @csrf
                @method('PATCH')
                <!-- <a href="/delete/order/{{$orders->id}}" class="btn btn-danger  btn-sm">Cancel</a> -->
                <input 
                type="hidden" 
                    id="status"
                    class="form-control"
                    name="status" 
                    value="0"
                > 

                @if($orders->status == "1")
                  <button type="submit" class="btn btn-outline-primary">Accept</button>
                @endif
                @if($orders->status == "0")
                  <button  class="btn btn-success" disabled>Delivered</button>
                @endif
                </form>
            </div>
          </div>
        </div>
    @endforeach
    </div>
  </div>

@endsection