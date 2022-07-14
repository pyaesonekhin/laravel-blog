@extends('layouts.master')

@section('title', 'Create Category')

@section('content')

<div class="container mt-5">
  <div class="card">
    <div class="card-header">
      <h3>Create A Category</h3>
    </div>
    <div class="card-body">

      <form action="{{ route('category.store') }}" method="POST">
        @include('categories._form')

        <div class="d-flex justify-content-between">
          <button type="submit" class="btn btn-outline-primary">Create</button>
          <a href="{{ route('category.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection