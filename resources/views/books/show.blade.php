@extends('layouts.app')

@section('main-content')
    <div class="row pt-5">
        <div class="col-5 mx-auto">
            <div class="card p-4 shadow">
                <h1 class="mb-4 text-center fw-bold">Book Details</h1>
                <div class="mb-3">
                    <b class="fs-5">Book Title:</b>
                    <lable class="fs-5">{{ $book->title }}</lable>
                </div>

                <div class="mb-3">
                    <b class="fs-5">Year:</b>
                    <lable class="fs-5">{{ $book->year }}</lable>
                </div>

                <div class="mb-3">
                    <b class="fs-5">Author:</b>
                    <lable class="fs-5">{{ $book->author->name }}</lable>
                </div>


                <div class="text-center">
                    <a class="btn btn-primary" href="{{ route('books.index') }}">Back</a>
                    <a class="btn btn-secondary" href="{{ route('books.edit', $book->id) }}">Edit</a>
                </div>
            </div>
        </div>
    </div>

@endsection