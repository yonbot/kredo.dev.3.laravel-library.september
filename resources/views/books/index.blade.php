@extends('layouts.app')

@section('title', 'Books')

@section('content')
<div class="container">
  <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row justify-content-center mt-3 mb-3 w-75 mx-auto">
      <span class="h3 fw-bold">Add new book</span>
    </div>
    <div class="row justify-content-center mt-3 mb-3 w-75 mx-auto">
      <div class="col">
        <label for="title" class="form-label fw-bold">Title</label>
        <input type="text" name="title" id="title" class="form-control"
          placeholder="Add title">
        @error('title')
          <p class="text-danger small">
            {{ $message }}
          </p>
        @enderror
      </div>
    </div>
    <div class="row justify-content-center mt-3 mb-3 w-75 mx-auto">
      <div class="col">
        <label for="year" class="form-label fw-bold">Year Published</label>
        <input type="number" name="year" id="year" class="form-control"
          placeholder="YYYY">
        @error('year')
          <p class="text-danger small">
            {{ $message }}
          </p>
        @enderror
      </div>
      <div class="col">
        <label for="author" class="form-label fw-bold">Author</label>
        <select class="form-select" name="author" id="author">
          <option value="" selected>ANONYMOUS</option>
          @foreach ($all_authors as $author)
            <option value="{{ $author->id }}">{{ $author->name }}</option>
          @endforeach
        </select>
        @error('author')
          <p class="text-danger small">
            {{ $message }}
          </p>
        @enderror
      </div>
    </div>
    <div class="row justify-content-center mt-3 mb-3 w-75 mx-auto">
      <div class="col">
        <label for="image" class="form-label fw-bold">Cover Photo (optional)</label>
        <input type="file" name="image" id="image" class="form-control"
          aria-describedby="image-info">
        @error('image')
          <p class="text-danger small">
            {{ $message }}
          </p>
        @enderror
      </div>
      <div class="col">
        <label for="btn-add" class="form-label">&nbsp;</label><br>
        <button type="submit" class="btn btn-success w-100"><i class="fa-solid fa-plus"></i> Add</button>
      </div>
    </div>
    <div class="row justify-content-center mt-3 mb-3 w-75 mx-auto">
      <div class="form-text" id="image-info">
        Acceptable formats are jpeg, jpg, png, gif only.<br>
        Maximum file size is 1048kB.
      </div>
    </div>
  </form>

  <hr>

  @if($all_books)
    <div class="row justify-content-center w-75 mb-0 mx-auto">
      <div class="h4">List of books</div>
    </div>
    <div class="row justify-content-center w-75 mx-auto px-3">
      <table class="table table-bordered 
        table-sm
        w-100">
        <tbody class="align-middle">
          @foreach ($all_books as $book)
            <tr>
              <td style="width: 70%" class="p-2 fw-bold">
                <a href="{{ route('book.show', $book->id) }}" class="">{{ $book->title }}</a>
              </td>
              <td style="width: 15%" class="text-center">
                <a href="" class="btn btn-outline-warning border-0"><i class="fa-solid fa-file-pen"></i></a>
              </td>
              <td style="width: 15%" class="text-center">
                <a href="" class="btn btn-outline-danger border-0"><i class="fa-solid fa-trash-can"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <div class="row justify-content-center w-75 mb-0 mx-auto">
      <div class="h4">No books yet</div>
    </div>
  @endif

</div>
@endsection
