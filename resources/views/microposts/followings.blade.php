@extends('layouts.app')

@section('content')
<ul class="media-list">
@foreach ($microposts as $micropost)
    <?php $user = $micropost->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $micropost->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($micropost->content)) !!}</p>
            </div>
            <div>
                @if (Auth::user()->id == $micropost->user_id)
                    {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
                @if (Auth::user()->id !== $micropost->user_id)
                   @include('post_follow.follow_button', ['micropost' => $micropost])

                   {{-- {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!} --}}
                       {{-- {!! Form::submit('Follow', ['class' => 'btn btn-primary btn-xs']) !!} --}}
                   {{-- {!! Form::close() !!} --}}
                   
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
@endsection
{!! $microposts->render() !!}