@extends('layouts.app')

@section('title', 'Delete Author')

@section('content')
  <div class="container">
    <form action="{{ route('author.destroy', $author->id) }}" method="post">
      @csrf
      @method('DELETE')
  
      <div class="row justify-content-center mt-3 w-75 mx-auto">
        <div class="col text-center">
          <div class="h2 text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Delete Author</div>
          <div>Are you sure you want to delete <span class="fw-bold">{{ $author->name }}</span>?</div>
        </div>
      </div>
      <div class="row justify-content-center mt-3 mb-3 w-75 mx-auto">
        <div class="col">
          <a href="{{ route('author.index') }}" class="btn btn-outline-danger w-100 text-decoration-none fw-bold">Cancel</a>
        </div>
        <div class="col">
          <button type="submit" class="btn btn-danger w-100 fw-bold">Delete</button>
        </div>
      </div>
    </form>
  </div>
@endsection
