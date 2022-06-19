@extends('layouts.master')

@section('title', 'Home Page')


@section('content')

@foreach ($posts as $post)
<div>
    <h3>{{ $post->title }}</h3>
    <p>{{ date('M d, Y', strtotime($post['updated_at'])) }} by author</p>
    <p class="mt-4">{{ $post->body }}</p>
    <div class="d-flex justify-content-between">
        <a href="/posts/{{ $post->id }}" class="btn btn-outline-info">View Detail</a>
        <div class="d-flex justify-content-end">
            <a href="/posts/{{ $post->id }}/edit/" class="btn btn-outline-success">Edit</a>
            <form action="/posts/{{ $post->id }}" method="POST" onsubmit="return confirm('Are you sure to delete?')">
                @method('DELETE')
                <!-- <input type="hidden" name="_method" value="DELETE">  -->
                @csrf
                <button type="submit" class="btn btn-outline-danger ms-2">Delete</button>
            </form>
        </div>
    </div>
</div>
<hr>
@endforeach

@endsection