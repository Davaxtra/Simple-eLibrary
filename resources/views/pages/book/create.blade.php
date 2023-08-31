@extends('layouts.app')

@section('body')

    <h1 class="mb-0">Add Book</h1>
    <hr />
    <form action="{{ route('book.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="col">
                <input type="text" name="author" class="form-control" placeholder="Author" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="year" class="form-control" placeholder="Year" required>
            </div>
            <div class="col">
                <textarea type="text" name="description" class="form-control" placeholder="Description" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </form>
@endsection
