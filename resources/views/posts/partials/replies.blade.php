@foreach($comments as $comment)
<div class="display-comment">
    @if (Auth::user()->name == $comment->user->name)
        <div class="d-flex border-bottom">
            <img src="{{ $comment->user->profile->profileImage() }}" alt="" class="rounded-circle w-100" style="max-width:40px; max-height:40px;">
            <div class="pl-2">
                <span class="font-weight-bold">
                    <a href="/profile/{{ $comment->user->id }}"><span class=""><strong>You</strong></span></a> 
                </span><br>
                <span class="text-truncate font-italic">{{ $comment->created_at }}</span>
            </div>
        </div>
           
    @else
        <div class="d-flex">
                    <img src="{{ $comment->user->profile->profileImage() }}" alt="" class="rounded-circle w-100" style="max-width:40px; max-height:40px;">
                    <div class="pl-2">
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $comment->user->id }}"><span class=""> <strong>{{ $comment->user->name }}</strong></span></a> 
                    </span><br>
                 <span class="text-truncate font-italic"> {{ $comment->created_at }}</span>
            </div>
        </div>
    @endif
    <p class="p-2 ml-5 color3 h5 font-weight-bold border-bottom border-dark">{{ $comment->comment }}</p>
    <a href="" id="reply"></a>
    <form method="post" action="{{ route('reply.add') }}" class=" justify-content-right">
        @csrf


            <div class="form-group ml-5">
                        <span><input type="text" name="comment" class="form-control" required/>
                        <input type="hidden" name="post_id" value="{{ $post_id }}" />
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                        <input type="submit" class="btn btn-dark btn-sm hover1" style="nargin-right:0 !important;" value="Reply" /></span>
            </div>

    </form>
    @include('posts.partials.replies', ['comments' => $comment->replies])
</div>
@endforeach 