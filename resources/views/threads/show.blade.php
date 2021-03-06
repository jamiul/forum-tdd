@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    <a href="#">{{ $thread->creator->name }}</a>
                    posted:
                    {{ $thread->title }}</div>

                <div class="card-body">
                    {{$thread->body}}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            @foreach($thread->replies as $reply)
                @include('threads.reply')
            @endforeach
        </div>
    </div>

    @if(auth()->check())
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <form action="{{$thread->path().'/replies'}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="col-form-label">{{ __('Reply') }}</label>
                    <textarea name="body" class="form-control" placeholder="Have Something to Say" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Post</button>
            </form>
        </div>
    </div>
    @else
    <p class="text-center">Please  <a href="{{route('login')}}">sign in</a> to participate in this discussion</p>
    @endif
</div>
@endsection
