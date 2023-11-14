@extends('layouts.app')

@section('body')

    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Book</h1>
        <a href="{{ route('book.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Book</a>
    </div>
    <hr />

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="card-body">
    <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th style="width:15%">Nama</th>
                    <th style="width:45%">Judul</th>
                    <th style="width:20%">Fakultas</th>
                    <th style="width:20%">Prodi</th>
                    
                    <th width="">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($books->count() > 0)
                @foreach ($books as $book)
                    <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $book->nama }} </br> {{ $book->npp }}</td>
                    <td class="align-middle">{{ $book->judul }} </br>No. Urut : {{ $book->no_urut }}</td>
                    <td class="align-middle">{{ $book->fakultas->name }}</td>
                    <td class="align-middle">{{ $book->prodi->name }}</td>
                
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            
                            <a href="{{ route('book.show', $book->id) }}" type="button" class="btn btn-success"><i class="fa-solid fa-magnifying-glass"></i></a>
                            <a href="{{ route('book.edit', $book->id) }}" type="button" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('book.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="btn btn-danger p-0">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i>
                                    </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="10">Books Not Found</td>
                </tr>
                @endif
            </tbody>

        </table>
</div>
@endsection
