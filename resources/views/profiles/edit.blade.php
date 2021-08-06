@extends('layouts.app')

@section('content')
<div class="container">
<br><br><br>
    <form action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">

    @csrf
    @method('PATCH')

    <center><h1>Edit Profile</h1></center>
            
    <div class="col-8 offset-2 p-5 border-form">
        
        <div class="form-group row">
            <label for="title" class="font-weight-bold">Nick Name: </label>

            <input 
            type="text" 
            id="title"
            class="form-control color3 @error('title') is-invalid @enderror"
            name="title" 
            value="{{old('title') ??  $user->profile->title}}"
            autocomplete="title" autofucos> 

            @error('title')

            <span class="invalid-feedback" role="alert">

                <strong>{{$message}}</strong>
            
            </span>

        
            @enderror

        
        </div>
        <div class="form-group row">
            <label for="description" class="font-weight-bold">Description</label>
            <textarea name="description" id="" cols="30" rows="5" class="color3 form-control @error('description') is-invalid @enderror"
            name="description" 
            value=""
            autocomplete="description" autofucos>{{old('description') ?? $user->profile->description}}</textarea>
           
            
            @error('description')

            <span class="invalid-feedback" role="alert">

                <strong>{{$message}}</strong>
            
            </span>

        
            @enderror

        
        </div>
  


        <div class="form-group row">
            <label for="url" class="font-weight-bold">URL/Website</label>

            <input 
            type="text" 
            id="url"
            class="color3 form-control @error('url') is-invalid @enderror"
            name="url" 
            value="{{old('url') ?? $user->profile->url}}"
            autocomplete="url" autofucos>

            @error('url')

            <span class="invalid-feedback" role="alert">

                <strong>{{$message}}</strong>
            
            </span>

        
            @enderror

        
        </div>



        <div class="row" class="font-weight-bold">
            <label for="image">Profile Image</label>
            <input type="file" name="image" id="image" class="form-control-file">

        </div>

        @error('image')

                <strong>{{$message}}</strong>

            </span>


        @enderror

        <br><br>
            <center>
                <button type="submit" class="btn btn-dark w-50">Update Profile </button>
            </center>
        </div>

       
    </form>


</div>
@endsection
