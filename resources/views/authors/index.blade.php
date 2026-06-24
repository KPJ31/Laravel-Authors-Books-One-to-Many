@extends('layouts.app')

@section('main-content')
    <div class="row pt-5">
        <div class="col-9 mx-auto">
            <a class="btn btn-primary" href="{{ route('authors.create') }}">Create</a>
            <a class="btn btn-primary" href="{{ route('books.index') }}">Books Table</a>
            <div class="card p-4 shadow">
                <h1 class="text-center mb-3 fw-bold">Authors Table</h1>
            <table class="table table-bordered border-dark">
                <thead>
                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Books</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($authors as $author)
                        <tr>
                            <th scope="row">{{ $author->id }}</th>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->email }}</td>
                            <td>
                                @forelse($author->books as $book)
                                    <div>{{ $book->title }}</div>
                                @empty
                                    <span class="text-muted">No books</span>
                                @endforelse
                            </td>
                            <td>
                                <a href="{{ route('authors.show', $author->id) }}" class="btn btn-primary btn-sm">Show</a>
                                <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No authors found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection
