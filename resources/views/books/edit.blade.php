@extends('layouts.app')

@section('main-content')
<div class="row pt-5">
    <div class="col-5 mx-auto">
        <div class="card p-4 shadow">
            <h1 class="mb-4 text-center fw-bold">Edit Book</h1>
            <form action="{{ route('books.update', $book->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input id="title" name="title" type="text" value="{{ $book->title }}" class="form-control" required>
                    @error('title') 
                        <span class="text-danger">{{ $message }}</span> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="year" class="form-label">Year:</label>
                    <input id="year" name="year" type="number" value="{{ $book->year }}" class="form-control"  placeholder="yyyy" min="1000" max="9999" required>
                    @error('year')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author:</label>
                    <lable class="form-label">{{ $book->author->name }}</lable>
                    <input type="hidden" name="author_id" value="{{ $book->author_id }}">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a class="btn btn-primary" href="{{ route('books.index') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
