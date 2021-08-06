@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@section('content')
<div class="container">
<br><br>

@if ($message = Session::get('success'))
<br><br>
    <div class="alert alert-danger alert-block mr-5 ml-5">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
    </div>
@endif

    <div class="row">
        <div class="col-6">
            <div>
                <div class="d-flex">
                    <img src="{{ $post->user->profile->profileImage() }}" alt="" class="rounded-circle w-100" style="max-width:40px; max-height:40px;">
                    <div class="pl-2">
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}"><span class="">{{ $post->user->username }}</span></a> 
                    </span><br>
                 <span> {{ $post->created_at }} </span>
                </div>
                </div>
                <br>
            </div>
                <center><strong><p class="h2 text-capitalize color5 p-2">{{ $post->caption }}</p></strong></center>
            <div class="card">
                <img src="/storage/{{ $post->image }}" class="w-100" alt="">
            </div> 
                <div class="pt-5">
                    @if(auth()->user()->id == $post->user->id)
                        <center><a href="/delete/{{$post->id}}" class="btn btn-danger w-50">Delete Post</a></center>
                    @endif
                    @if(auth()->user()->id != $post->user->id)
                    <center><a href="/posts/{{$post->id}}/order" class="btn color1 hover1 w-50 font-weight-bold">Order Here</a></center>
                    @endif
                </div>                         
        </div>
        <!-- Adding comments per posts -->
        <div class="col-6" style="padding-top:100px">
            <div class="color5">
                <strong>More information: </strong> <span class="h5 pl-2">{{ $post->details }} </span>
                    <br>
                <strong>Price: </strong> <span class="h5 pl-2"> PhP {{ $post->price }} </span>
            </div>
            <br><hr><br>
            <div class="card color3">
               <div class="card-body">
                <h5>Display Comments</h5>
                    @include('posts.partials.replies', ['comments' => $post->comments, 'post_id' => $post->id])
                <hr />
               </div>
            </div>
            <br>
            <div class="card color">
               <div class="card-body">
                <h5>Leave a comment</h5>
                <form method="post" action="{{ route('comment.add') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="comment" class="form-control" required/>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-outline-dark py-0" style="font-size: 0.8em;" value="Add Comment" />
                    </div>
                </form>
               </div>
            </div>
            
        </div>
    </div>
@endsection
