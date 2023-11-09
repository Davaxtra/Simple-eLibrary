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
                <textarea type="text" name="judul" class="form-control" rows="3" style="resize: none;" placeholder="Judul" required></textarea>
            </div>
            <div class="col">
                <div class="row mb-3">
                    <div class="col">
                        <select class="form-control" name="fakultas" id="fakultas">
                            <option value="">Pilih Fakultas</option>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control" name="prodi" id="prodi">
                            <option value="">Pilih Prodi</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus" require>
                    </div>
                    <div class="col">
                        <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" require>
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
