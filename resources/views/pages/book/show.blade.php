@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Detail Book</h1>
    <hr />
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $book->name }}" readonly>
            </div>
            <div class="col">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" placeholder="Author" value="{{ $book->author }}" readonly>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col stackem">
                <label class="form-label">Year</label>
                <input type="text" name="year" class="form-control mb-1" placeholder="Year" value="{{ $book->year }}" readonly>
                <label class="form-label">Created at</label>
                <input type="text" name="name" class="form-control mb-1" placeholder="Name" value="{{ $book->created_at }}" readonly>
                <label class="form-label">Updated at</label>
                <input type="text" name="author" class="form-control mb-1" placeholder="Author" value="{{ $book->updated_at }}" readonly>

            </div>
            <div class="col">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="7" style="resize: none;" placeholder="Description" readonly>{{ $book->description }}</textarea>
            </div>
        </div>

@endsection
