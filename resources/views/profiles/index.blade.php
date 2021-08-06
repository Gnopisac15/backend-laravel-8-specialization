@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<br><br>
    <div class="alert alert-danger alert-block mr-5 ml-5">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
    </div>
@endif
<div class="container ml-5 mr-5 pl-5">
    <div class="row p-5 ml-5 mr-5">   
        <div class="col-3 ">
            <br><br><br>
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100" alt="">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">       
                <div  class="d-flex align-items-center pb-4">
                    <h1>{{$user->username; }}</h1>
                    @if(auth()->user()->id != $user->id)
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @endif
                </div>
                @can('update', $user->profile)
            <a href="/posts/create" class="btn btn-outline-primary">Add New Post</a>
            @endcan
            </div>  
            @can('update', $user->profile)
            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            <div class="row color4 pl-2 pt-3 pb-2">
                <div class="pr-4"><strong>{{$user->posts->count()}}</strong> Posts</div>
                <div class="pr-4"><strong>{{$user->profile->followers->count() }}</strong> Followers </div>
                <div class="pr-4"><strong>{{ $user->following->count() }}</strong> Following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description}}</div>
            <div> <a href="#">{{$user->profile->url}}</a></div>

            <div class="justify-content-end pt-5">
               @can('update', $user->profile)
               <a href="/order/{{ $user->id }}/view-order" class="btn btn-outline-dark">View Order</a>
               <a href="/order/{{ $user->id }}/view-order-notification" class="btn btn-outline-dark">View Order Notification</a>
               @endcan
            </div>
        </div>

    </div>

      <hr><br>

    <div class="row mr-5 ml-5">
        @foreach($user->posts as $post )
        <div class="col-4">
            <div class="card p-2 color3">
                <a href="/posts/{{ $post->id}}"><img src="/storage/{{ $post->image }}" class="w-100"></a>
                <hr>
                <div class="color4 no-padding pr-4 pl-4 pt-2">
                    <h4 class="text-capitalize text-center"><strong>{{ $post->caption }}</strong></h4> 
                    <span class="text-sm">@ : {{ $post->created_at }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br><br>
</div>
@endsection
