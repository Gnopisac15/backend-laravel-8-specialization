@extends('layouts.app')

@section('content')
<div class="container">

@foreach($posts as $post)

<div class="row">
    <div class="col-6 offset-3 pt-4 pb-2">
    <a href="/posts/{{ $post->id}}">
    <img src="/storage/{{ $post->image }}" class="w-25" alt="">    
    </a>
    <p>{{$post->caption}}</p>
    <p>
    <span class="font-weight-bold">
    <a href="/profile/{{ $post->user->id }}">
    <span class="text-dark">{{ $post->user->username }}</span>
    </a> 
    </div>

</div>

@endforeach
</div>
@endsection
