@extends('layouts.app')
@section('content')
<div class="container">
    <x-space>
        

    </x-space>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status')}}
            </div>
            @endif

            @foreach ($spaces as $space)
            <div class="card">                
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $space->title }}
                     @if ($space->user_id == Auth::user()->id)
                     <form action="{{ route('space.destroy', $space->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you Sure ?')" class="float-right btn btn-danger btn-sm">Delete</button>
                    <a href="{{ route('space.edit', $space->id)}}" class="text-white btn btn-info float-right btn-sm">Edit</a>
                    </form>
                     @endif
                    </h5>
                    <h6 class="card-subtitles">{{ $space->address }}</h6>
                    <p class="card-text">{{ $space->description }}</p>
                <a href="#" onclick="openDirection({{ $space->latitude }}, {{ $space->longitude }}, {{ $space->id }})" class="card-link">Direction</a>                    
                </div>
            </div>                
            @endforeach
        </div>      
    </div>
    <div class="row justify-content-center">
        {{ $spaces->links() }}
    </div>
</div>
    
@endsection