@extends('layouts.app')

@section('main-content')
    <div class="row pt-5">
        <div class="col-5 mx-auto">
            <div class="card p-4 shadow">
                <h1 class="mb-4 text-center fw-bold">Author Details</h1>
                <div class="mb-3">
                    <b class="fs-5">Employee Name:</b>
                    <lable class="fs-5">{{ $author->name }}</lable>
                </div>

                <div class="mb-3">
                    <b class="fs-5">Email:</b>
                    <lable class="fs-5">{{ $author->email }}</lable>
                </div>

                <div class="mb-3">
                    <b class="fs-5">Books:</b>
                    <lable class="fs-5">
                        @if($author->book->count() > 0)
                            <ul class="mb-0">
                                @foreach($author->book as $book)
                                    <li>{{ $book->title }}</li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-muted">No Books</span>
                         @endif
                    </lable>
                </div>


                <div class="text-center">
                    <a class="btn btn-primary" href="{{ route('authors.index') }}">Back</a>
                    <a class="btn btn-secondary" href="{{ route('authors.edit', $author->id) }}">Edit</a>
                </div>
            </div>
        </div>
    </div>

@endsection