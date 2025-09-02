@extends('layouts.app')

@section('main-content')
    <div class="row pt-5">
        <div class="col-9 mx-auto">
            <a class="btn btn-primary" href="{{ route('books.create') }}">Create</a>
            <a class="btn btn-primary" href="{{ route('authors.index') }}">Authors Table</a>
            <div class="card p-4 shadow">
                <h1 class="text-center mb-3 fw-bold">Books Table</h1>
            <table class="table table-bordered border-dark">
                <thead>
                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Year</th>
                        <th scope="col">Author Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                        <tr>
                            <th scope="row">{{ $book->id }}</th>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->year }}</td>
                            <td>{{ $book->author->name }}</td>
                            <td>
                                <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary btn-sm">Show</a>
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection