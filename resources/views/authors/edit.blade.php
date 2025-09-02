@extends('layouts.app')

@section('main-content')
<div class="row pt-5">
    <div class="col-5 mx-auto">
        <div class="card p-4 shadow">
            <h1 class="mb-4 text-center fw-bold">Edit Author</h1>
            <form action="{{ route('authors.update', $author->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input id="name" name="name" type="text" value="{{ $author->name }}" class="form-control" required>
                    @error('name') 
                        <span class="text-danger">{{ $message }}</span> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input id="email" name="email" type="email" value="{{ $author->email }}" class="form-control" required>
                    @error('email') 
                        <span class="text-danger">{{ $message }}</span> 
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="book" class="form-label">Books:</label>
                    <lable class="form-label">
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
                    <button type="submit" class="btn btn-success">Update</button>
                    <a class="btn btn-primary" href="{{ route('authors.index') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
