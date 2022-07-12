@extends('layouts.master')

@section('title', 'Detail Category')

@section('content')

    <div class="container mt-5">
        <div class="col-4 m-auto">
    <div class="card">
            <div class="card-header text-center">
                <h3>Category Detail</h3>
            </div>
            <div class="card-body p-4">
            <h4>{{ $category->name }}</h4>
            
            <a href="/categories" class="btn btn-outline-secondary d-grid mt-5">Go Home</a>
            </div>
        </div>
        </div>
    </div>
@endsection