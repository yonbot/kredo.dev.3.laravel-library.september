@extends('layouts.app')

@section('title', 'Book Show')

@section('content')
<div class="container">
  <div class="row justify-content-center w-75 mx-auto">
    <div class="card p-0">
      <div class="card-header">
        <div class="row">
          <div class="col d-flex align-items-center">
            <span class="h4 mt-2">Book Preview</span>
          </div>
          <div class="col text-end">
            <a href="" class="btn btn-warning text-end fw-bold">Back</a>
            <a href="" class="btn btn-warning text-end fw-bold">Edit this book</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-4">
            <img src="{{ asset('/storage/images/' . $book->cover_photo) }}" 
              alt="{{ $book->cover_photo }}" class="w-100 shadow">
          </div>
          <div class="col-8">
            <div>
              {{ $book->title }}
            </div>
            <div>
              @if($book->author_id)
                by {{ $book->author->name }}
              @else
                anonymus
              @endif
            </div>
            <div>
              Published in {{ $book->year_published }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
