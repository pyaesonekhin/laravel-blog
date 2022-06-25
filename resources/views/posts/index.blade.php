@extends('layouts.master')

@section('title', 'Home Page')


@section('content')


@if(session('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('success') }};
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

@endif

@foreach ($posts as $post)
<div>
<a href="/posts/{{ $post->id }}"><h3>{{ $post->title }}</h3></a>
    <!-- <p>{{ $post->created_at->format('M d, Y') }} by author</p> -->
    <p>{{ $post->created_at->diffforHumans() }} by author</p>
    <p class="mt-4">{{ $post->body }}</p>

    @auth
    <div class="d-flex justify-content-end">
        
            <a href="/posts/{{ $post->id }}/edit/" class="btn btn-outline-success">Edit</a>
            <form action="/posts/{{ $post->id }}" method="POST" onsubmit="return confirm('Are you sure to delete?')">
                @method('DELETE')
                <!-- <input type="hidden" name="_method" value="DELETE">  -->
                @csrf
                <button type="submit" class="btn btn-outline-danger ms-2">Delete</button>
            </form>
        
    </div>
    @endauth
</div>
<hr>
@endforeach

@endsection