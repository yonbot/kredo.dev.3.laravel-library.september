@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3 w-50 mx-auto">
        <div class="col">
            <a href="{{ route('author.index') }}" class="text-decoration-none">
                <div class="border py-5 text-center">
                    <span class="h1 text-primary fw-bold">Authors 6</span>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('book.index') }}" class="text-decoration-none">
                <div class="border py-5 text-center">
                    <span class="h1 text-success fw-bold">Books 10</span>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
