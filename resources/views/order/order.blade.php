@extends('layouts.app')

@section('content')
<div class="container">
    <br><br>
    <center>
        <h1>Order Details</h1><br>
    </center>

    @if ($message = Session::get('success'))
    <br><br>
        <div class="alert alert-danger alert-block mr-5 ml-5">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
            <img src="img/order.png" alt="" class="w-100 border-left">
            </div>
        <div class="col-6">
            <form action="/order/{{$post->id}}" method="post" >
            @csrf
                <div class="color3 p-5">
                    <strong><p class="h1 text-capitalize">{{ $post->caption }}</p></strong>
                    <div class="form-group row">
                        <input 
                        type="hidden" 
                        id="user_post_id"
                        class="form-control @error('user_post_id') is-invalid @enderror"
                        name="user_post_id" 
                        value="{{$post->user_id}}"
                        autocomplete="user_post_id" autofucos>

                        @error('user_post_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror   
                    </div>
                    <div class="form-group row">
                        <label for="fname">Full Name</label>
                        <input 
                        type="text" 
                        id="fname"
                        class="form-control @error('fname') is-invalid @enderror"
                        name="fname" 
                        value="{{old('fname')}}"
                        autocomplete="fname" autofucos>

                        @error('fname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror   
                    </div>
                    <div class="form-group row">
                        <label for="address">Address</label>
                        <input 
                        type="text" 
                        id="address"
                        class="form-control @error('address') is-invalid @enderror"
                        name="address" 
                        value="{{old('address')}}"
                        autocomplete="address" autofucos>

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror   
                    </div>
                    <div class="form-group row">
                        <label for="contact">Contact</label>
                        <input 
                        type="text" 
                        id="contact"
                        class="form-control @error('contact') is-invalid @enderror"
                        name="contact" 
                        value="{{old('contact')}}"
                        autocomplete="contact" autofucos>

                        @error('contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror   
                    </div>
                    <div class="form-group row">
                        <label for="price">Price</label>
                        <input 
                        type="text" 
                        id="price"
                        class="form-control @error('price') is-invalid @enderror"
                        name="price" 
                        value="{{$post->price}}"
                        autocomplete="price" readonly >

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror   
                    </div>
                    <div class="form-group row">
                        <label for="qty">Quantity</label>
                        <input 
                        type="text" 
                        id="qty"
                        class="form-control @error('qty') is-invalid @enderror"
                        name="qty" 
                        value="{{old('qty')}}"
                        autocomplete="qty" autofucos>

                        @error('qty')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror   
                    </div><br>
                    <center><button type="submit" class="btn btn-dark w-50">Add Order</button></center>
                </div>
            </form>
        </div>
    </div>
    <div class="col-2"></div>
</div>
@endsection
