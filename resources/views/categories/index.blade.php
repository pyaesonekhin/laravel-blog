@extends('layouts.master')

@section('title', 'Home')



@section('content')

    <div class="container mt-5">
        @foreach ($categories as $category)
            <div>
                <h3>{{ $category->name }}</h3>
                         
                
                <div class="d-flex justify-content-between">
                    <a href="/categories/{{ $category->id }}" class="btn btn-outline-info">View Detail</a>
                    <div class="d-flex justify-content-end">
                    <a href="/categories/{{ $category->id }}/edit/" class="btn btn-outline-success">Edit</a>
                    <form action="/categories/{{ $category->id }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure to delete?')">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger ms-2">Delete</button>
                    </form>
                    </div>
                </div>
            </div>       
            <hr>
        @endforeach
       
    </div> 

@endsection