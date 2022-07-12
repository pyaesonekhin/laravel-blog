@extends('layouts.master')

@section('title', 'Edit Category')

@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Edit A Category</h3>
            </div>
            <div class="card-body">

                <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Edit Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ $category->name }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-outline-primary">Edit</button>
                        <a href="/categories" class="btn btn-outline-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection