@extends('layouts.app')

@section('content')

<div class="container">
@if ($message = Session::get('success'))
<br><br>
    <div class="alert alert-danger alert-block mr-5 ml-5">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
    </div>
@endif
<br>
   
    @foreach($posts as $post)
    <br><br>

    <div class="row color3 ml-5 mr-5">
        <div class="col-5 pl-5">
            <a href="/posts/{{ $post->id}}">
            
                <img src="/storage/{{ $post->image }}" class="align-items-center w-100" alt="">    
            </a>
        </div>
        <div class="col-1"></div>
        <div class="col-6 pt-5">
            <div class="row">
                <div class="d-flex">
                    <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width:60px; max-height:60px;" alt="">
                </div>
                <div class="pt-2 pl-2">
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}"><span class="">{{ $post->user->username }}</span></a> 
                    </span>
                    <p>@ {{ $post->created_at }} </p>
                </div>
            </div> 
                <hr><br> 
                MENU:
            <h3 class="pl-5 text-capitalize"> <strong>{{$post->caption}}</strong> </h3>
            <br><br>
            <center>
                <a href="/posts/{{ $post->id}}">
                    <button type="submit" class="btn color2 hover1 text-dark w-75">
                        <strong> Show More </strong>
                    </button>
                </a>
            </center>
        </div>
    </div>
    @endforeach

    <br><br>

  

    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-center pb-5">
            {{ $posts->Links('pagination::bootstrap-4') }}
        </div>
    </div>
    
</div>
@endsection
