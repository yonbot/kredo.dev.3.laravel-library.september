@extends('layouts.app')

@section('title', 'Authors')

@section('content')
<div class="container">
  <form action="{{ route('author.store') }}" method="post">
    @csrf

    <div class="row justify-content-center mt-3 mb-3 w-75 mx-auto">
      <div class="col-10">
        <label for="author" class="form-label fw-bold">Authors</label>
        <input type="text" name="author" id="author" class="form-control"
          placeholder="Add new author">
      </div>
      <div class="col-2">
        <label for="btn-add" class="form-label">&nbsp;</label><br>
        <button type="submit" class="btn btn-success w-100"><i class="fa-solid fa-plus"></i> Add</button>
      </div>
    </div>
  </form>

  <div class="row justify-content-center w-75 mx-auto p-3">
    <table class="table table-bordered 
      table-sm
      w-100">
      <tbody class="align-middle">
        @foreach ($all_authors as $author)
          <tr>
            <td style="width: 70%" class="p-2 fw-bold">
              <span class="">{{ $author->name }}</span>
            </td>
            <td style="width: 15%" class="text-center">
              <a href="{{ route('author.edit', $author->id) }}" class="btn btn-outline-warning border-0"><i class="fa-solid fa-file-pen"></i></a>
            </td>
            <td style="width: 15%" class="text-center">
              <a href="{{ route('author.delete', $author->id) }}" class="btn btn-outline-danger border-0"><i class="fa-solid fa-trash-can"></i></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection