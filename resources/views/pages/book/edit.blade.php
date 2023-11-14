@extends('layouts.app')

@section('body')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <h1 class="mb-0">Edit Book</h1>
    <hr />
    <form action="{{ route('book.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
       <div class="row mb-3">
            <div class="col">
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $book->nama }}">
            </div>
            <div class="col">
                <input type="text" name="npp" class="form-control" placeholder="NPP" value="{{ $book->npp }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <textarea type="text" name="judul" class="form-control" style="resize: none; height: 144px;" placeholder="Judul">{{ $book->judul }}</textarea>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <div class="col">
                        <select class="form-select" name="fakultas" id="fakultas" required>
                            <option selected value="{{ $book->fakultas->id }}">{{ $book->fakultas->name }}</option>
                                @foreach ($fakultas as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-select" name="prodi" id="prodi" required>
                            <option value="{{ $book->prodi->id }}">{{ $book->prodi->name }}</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        
                        <select class="form-select" name="jenis_buku" id="jenis_buku" required>
                            <option selected value="{{ $book->jenis_buku }}">{{ $book->jenis_book->name }}</option>
                            @foreach ($jenis as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="col">
                        <input type="text" name="no_urut" class="form-control" placeholder="No. Urut" value="{{ $book->no_urut }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" name="angkatan" class="form-control" placeholder="Angkatan-Tahun Lulus" value="{{ $book->angkatan }}">
                    </div>
                    <div class="col">
                        <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="{{ $book->keterangan }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </form>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>

   $(document).ready(function(){
    
    $("#fakultas").change(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    const fakId = $(this).val();

    $.ajax({
        type: "POST",
        url: "{{url ('prodis') }}",
        data: {
            fakultasId: fakId,
        },
        success: function (result) {
            $("#prodi").empty();
            $("#prodi").append(
                '<option selected disable value="">Pilih Prodi</option>'
            );

            if (result && result?.status === "success") {
                result?.data?.map((prodi) => {
                    const prodis = `<option value='${prodi?.id}'> ${prodi?.name} </option>`;
                    $("#prodi").append(prodis);
                });
            }
        },
        error: function (result) {
            console.log("error", result);
        },
    });
});

    });
</script>