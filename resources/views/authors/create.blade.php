@extends('layouts.app')

@section('main-content')
    <div class="row pt-5">
        <div class="col-5 mx-auto">
            <div class="card p-4 shadow">
                <h1 class="mb-4 text-center fw-bold"> Author Create Form</h1>
                <form action="{{ route('authors.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <lable for="name" class="form-label">Name: </lable>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control" placeholder="Full Name" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control"  placeholder="xxxxx@xxxx.xxx" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="reset" class="btn btn-secondary">Clear</button>                          
                        <a class="btn btn-primary" href="{{ route('authors.index') }}">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection