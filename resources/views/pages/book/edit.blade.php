@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Edit Book</h1>
    <hr />
    <form action="{{ route('book.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $book->nama }}">
            </div>
            <div class="col">
                <label class="form-label">NPP</label>
                <input type="text" name="npp" class="form-control" placeholder="NPP" value="{{ $book->npp }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Year</label>
                <input type="text" name="year" class="form-control mb-1" placeholder="Year" value="{{ $book->year }}">
            </div>
            <div class="col">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="7" style="resize: none;" placeholder="Description">{{ $book->description }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning" type="submit">Update</button>
            </div>
        </div>
    </form>
@endsection
