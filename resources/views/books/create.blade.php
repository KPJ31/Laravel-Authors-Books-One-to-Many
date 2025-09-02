@extends('layouts.app')

@section('main-content')
    <div class="row pt-5">
        <div class="col-5 mx-auto">
            <div class="card p-4 shadow">
                <h1 class="mb-4 text-center fw-bold">Book Form</h1>
                <form action="{{ route('books.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <lable for="title" class="form-label">Title: </lable>
                        <input id="title" name="title" type="text" value="{{ old('title') }}" class="form-control" placeholder="Book Title" required>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label">Year:</label>
                        <input id="year" name="year" type="number" value="{{ old('year') }}" class="form-control"  placeholder="yyyy" min="1000" max="9999" required>
                        @error('year')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="author_id" class="form-label">Author:</label>
                        <select id="author_id" name="author_id" class="form-control" required>
                            <option value="">Select Author</option>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('author_id') 
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="reset" class="btn btn-secondary">Clear</button>                          
                        <a class="btn btn-primary" href="{{ route('books.index') }}">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection