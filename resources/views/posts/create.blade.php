@extends('layouts.app')

@section('content')
<div class="container">
<br><br><br><br>
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
        <form action="/posts" method="post" enctype="multipart/form-data">
        @csrf
            <div class="card color3 p-5">
                <center>
                    <h1>Add New Post</h1>
                    <div class="col-4"><hr style="background-color:black; height:2px"></div>
                
                </center>   
                <br>     
                <div class="form-group row">
                    <label for="caption">Caption</label>
                    <input 
                    type="text" 
                    id="caption"
                    class="form-control @error('caption') is-invalid @enderror"
                    name="caption" 
                    value="{{old('caption')}}"
                    autocomplete="caption" autofucos>
                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>            
                    @enderror            
                </div>
                
                <div class="form-group row">
                    <label for="details">Additional details</label>
                    <textarea cols="30" rows="5" type="text" 
                        id="details"
                        class="form-control @error('details') is-invalid @enderror"
                        name="details" 
                        value="{{old('details')}}"
                        autocomplete="details" autofucos>
                    </textarea>
                    @error('details')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>            
                    @enderror            
                </div>

                <div class="form-group row">
                    <label for="price">Price</label>
                    <input 
                    type="number" 
                    id="price"
                    class="form-control @error('price') is-invalid @enderror"
                    name="price" 
                    value="{{old('price')}}"
                    autocomplete="price" autofucos>
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>            
                    @enderror            
                </div>

                <div class="row">
                    <label for="image">Post Image</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                </div>

                @error('image')
                    <span>
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                <br><br>
                <center>             
                    <button type="submit" class="btn btn-outline-primary">Add New Post</button>
                    </center> 

            </div>
        
        </form>
        </div>
    <div class="col-2">
            <img src="img/order.png" alt="" class="w-100 border-left">
            </div>
            </div>
</div>
@endsection
