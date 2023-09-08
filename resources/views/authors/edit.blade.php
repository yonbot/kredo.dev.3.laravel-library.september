@extends('layouts.app')

@section('title', 'Edit Author')

@section('content')
  <div class="container">
    <form action="{{ route('author.update', $author->id) }}" method="post">
      @csrf
      @method('PATCH')
  
      <div class="row justify-content-center mt-3 w-75 mx-auto">
        <div class="col">
          <label for="author" class="form-label fw-bold">Edit author</label>
          <input type="text" name="author" id="author" class="form-control"
            value="{{ old('name', $author->name) }}">
        </div>
      </div>
      <div class="row justify-content-center mt-3 mb-3 w-75 mx-auto">
        <div class="col">
          <a href="{{ route('author.index') }}" class="btn btn-outline-warning w-100 text-decoration-none fw-bold">Cancel</a>
        </div>
        <div class="col">
          <button type="submit" class="btn btn-warning w-100 fw-bold">Update</button>
        </div>
      </div>
    </form>
  </div>
@endsection
