@extends('layouts.app')

@section('main-content')
    <div class="row pt-5">
        <div class="col-5 mx-auto">
            <div class="card p-4 shadow">
                <h1 class="mb-4 text-center fw-bold">Author Details</h1>
                <div class="mb-3">
                    <b class="fs-5">Author Name:</b>
                    <label class="fs-5">{{ $author->name }}</label>
                </div>

                <div class="mb-3">
                    <b class="fs-5">Email:</b>
                    <label class="fs-5">{{ $author->email }}</label>
                </div>

                <div class="mb-3">
                    <b class="fs-5">Books:</b>
                    <div class="fs-5">
                        @forelse($author->books as $book)
                            <div>{{ $book->title }}</div>
                        @empty
                            <span class="text-muted">No books</span>
                        @endforelse
                    </div>
                </div>

                <div class="text-center">
                    <a class="btn btn-primary" href="{{ route('authors.index') }}">Back</a>
                    <a class="btn btn-secondary" href="{{ route('authors.edit', $author->id) }}">Edit</a>
                </div>
            </div>
        </div>
    </div>

@endsection
