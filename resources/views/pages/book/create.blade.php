@extends('layouts.app')

@section('body')

    <h1 class="mb-0">Add Book</h1>
    <hr />
    <form action="{{ route('book.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
            </div>
            <div class="col">
                <input type="text" name="npp" class="form-control" placeholder="NPP" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <textarea type="text" name="judul" class="form-control" style="resize: none; height: 144px;" placeholder="Judul" required></textarea>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <div class="col">
                        <select class="form-select" name="fakultas" id="fakultas">
                            <option value="">Pilih Fakultas</option>
                                @foreach ($fakultas as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-select" name="prodi" id="prodi">
                            <option value="">Pilih Prodi</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <select class="form-select" name="jenis_buku" id="jenis_buku">
                            <option value="">Jenis Buku</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" name="no_urut" class="form-control" placeholder="No. Urut" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" name="angkatan" class="form-control" placeholder="Angkatan-Tahun Lulus" required>
                    </div>
                    <div class="col">
                        <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" required>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

   $(document).ready(function(){
    
    $("#fakultas").change(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    const fakultasId = $(this).val();

    $.ajax({
        type: "POST",
        url: "prodis",
        data: {
            fakultas_id: fakultasId,
        },
        success: function (result) {
            $("#prodi").empty();
            $("#prodi").append(
                '<option selected disabled value="">Select</option>'
            );

            if (result && result?.status === "success") {
                result?.data?.map((prodi) => {
                    const prodis = `<option value='${prodis?.id}'> ${prodis?.name} </option>`;
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