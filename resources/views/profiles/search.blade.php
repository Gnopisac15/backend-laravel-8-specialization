@extends('layouts.app')

@section('content')
<div class="container">
<br><br><br>
<div class="row">
    <div class="col-5">
    <br><br><br>
    @foreach($user as $search)
    <div class="mb-4 ">
        <div class="row pl-5 d-flex">
            <img src="{{ $search->profile->profileImage() }}" class="rounded-circle w-100" style="max-width:70px; max-height:70px;" alt="">
            <div>
            <a href="/profile/{{$search->profile->user->id}}"><h4 class="">{{$search->username;}}</h4></a>
           <div class="color3 p-1"> <span> {{$search->posts->count()}}   Posts</span> |
            <span> {{$search->profile->followers->count()}}   Followers</span> | 
            <span> {{$search->following->count()}}   Following</span>
            </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
    <div class="col-7 mt-3 pt-5">
    <img src="img/search-img.png" class="w-100 mt-5 border-left" alt=""></div>
</div>
</div>
@endsection
