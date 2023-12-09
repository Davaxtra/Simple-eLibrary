<x-AppLayout>
    <h1 class="text-xl font-bold mb-2">Detail Book</h1>

    <!-- tampilan desktop -->
    <div class="hidden md:block">
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $book->nama }}" readonly>
            </div>
            <div class="col">
                <label class="form-label">NPP</label>
                <input type="text" name="author" class="form-control" placeholder="NPP" value="{{ $book->npp }}" readonly>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col stackem">
                <label class="form-label">Fakultas</label>
                <input type="text" name="fakultas" class="form-control mb-1" placeholder="Fakultas" value="{{ $book->fakultas->name }}" readonly>
                <label class="form-label">Prodi</label>
                <input type="text" name="name" class="form-control mb-1" placeholder="Prodi" value="{{ $book->prodi->name }}" readonly>
                <label class="form-label">Jenis Buku</label>
                <input type="text" name="author" class="form-control mb-1" placeholder="Jenis Buku" value="{{ $book->jenis_book->name }}" readonly>

            </div>
            <div class="col">
                <label class="form-label">Judul</label>
                <textarea name="judul" class="form-control" rows="7" style="resize: none;" placeholder="Judul" readonly>{{ $book->judul }}</textarea>
            </div>
        </div>
        <div class="row mb-b">
            <div class="col stackem">
                <label for="" class="form-label">Dosen Pembimbing</label>
                <input type="text" name="keterangan" class="form-control mb-1" placeholder="Keterangan" value="{{ $book->keterangan }}">
            </div>
            <div class="col">
                <label class="form-label">Created at</label>
                <input type="text" name="name" class="form-control mb-1" placeholder="Name" value="{{ $book->created_at }}" readonly>
                <label class="form-label">Updated at</label>
                <input type="text" name="author" class="form-control mb-1" placeholder="Author" value="{{ $book->updated_at }}" readonly>
            </div>
        </div>
    </div>

    <!-- tampilan mobile meren -->
    <div class="block bg-white rounded-lg shadow p-4 px-4 md:hidden">
        <div class="flex justify-content-between">
            <div class="font-semibold text-gray-900">{{ $book->nama }}</div>
            <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-blue-800 bg-blue-200 rounded-lg bg-opacity-50">{{ $book->npp }}</span>
        </div>
        <div class="text-xs my-1">{{ $book->fakultas->name }} - {{ $book->prodi->name }}</div>
        <div class="mt-2 text-sm text-gray-700">
            <a href="{{ route('book.show', $book->id) }}">{{ $book->judul }}</a>
        </div>
        <div class="text-sm mt-2 text-gray-700 font-medium">Dosen Pembimbing : {{ $book->keterangan }} - No Urut : {{ $book->no_urut }}</div>
        <div class="text-sm mt-2 text-gray-700 font-medium">Tahun Lulus : {{ $book->angkatan }}</div>
        <div class="text-sm mt-2 text-gray-700 font-medium">Dibuat Pada : {{ $book->created_at }}</div>
        <div class="text-sm mt-2 text-gray-700 font-medium">Diupdate Pada : {{ $book->updated_at }}</div>
    </div>
</x-AppLayout>