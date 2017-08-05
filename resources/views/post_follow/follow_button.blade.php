@if (Auth::user()->id != $user->id) 
    @if (Auth::user()->is_Postfollowing($micropost->id))
        {!! Form::open(['route' => ['post.unfollow', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('解除', ['class' => 'btn btn-danger btn-xs']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['post.follow', $micropost->id]]) !!}
            {!! Form::submit('お気に入り', ['class' => 'btn btn-primary btn-xs']) !!}
        {!! Form::close() !!}
    @endif
@endif