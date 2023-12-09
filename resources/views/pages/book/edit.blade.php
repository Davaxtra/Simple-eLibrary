<x-AppLayout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <h1 class="text-xl font-bold mb-2">Edit Book</h1>

    <div class="hidden md:block">
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

                <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded-xl" type="submit">Save</button>

            </div>
    </div>
    </form>

    <!-- tampilan mobile anjay -->
    <form action="{{ route('book.update', $book->id) }}" method="POST">
        <div class="block bg-white rounded-lg shadow p-4 px-4 md:hidden">
            @csrf
            @method('PUT')
            <div>
                <label class="text-ml text-gray-900 font-semibold mb-1">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $book->nama }}">
            </div>
            <div class="mt-2">
                <label class="text-ml text-gray-900 font-semibold mb-1">NPP</label>
                <input type="text" name="npp" class="form-control" value="{{ $book->npp }}">
            </div>
            <div class="mt-2">
                <label class="text-ml text-gray-900 font-semibold mb-1">Judul</label>
                <textarea class="form-control resize-none" name="judul" rows="5">{{ $book->judul }}</textarea>
            </div>
            <div class="mt-2">
                <label class="text-ml text-gray-900 font-semibold mb-1">Fakultas & Prodi</label>
                <select class="form-select origin-center" name="fakultas" id="fakultas">
                    <option selected disabled value="{{ $book->fakultas->id }}">{{ $book->fakultas->name }}</option>
                    @foreach ($fakultas as $item)
                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <select class="form-select origin-center" name="prodi" id="prodi" value="{{ $book }}">
                    <option value="{{ $book->prodi->id }}">{{ $book->prodi->name }}</option>
                </select>
            </div>
            <div class="mt-2">
                <label class="text-ml text-gray-900 font-semibold mb-1">Jenis Buku</label>
                <select class="form-select" name="jenis_buku" id="jenis_buku" value="{{ $book }}">
                    <option selected disabled value="">Jenis Buku</option>
                    @foreach ($jenis as $type)
                    <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <label class="text-ml text-gray-900 font-semibold mb-1">Nomor Urut</label>
                <input type="text" name="no_urut" class="form-control" value="{{ $book->no_urut }}">
            </div>
            <div class="mt-2">
                <label class="text-ml text-gray-900 font-semibold mb-1">Angkatan - Tahun Lulus</label>
                <input type="text" name="angkatan" class="form-control" value="{{ $book->angkatan }}">
            </div>
            <div class="mt-2">
                <label class="text-ml text-gray-900 font-semibold mb-1">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ $book->keterangan }}">
            </div>
            <div class="mt-3">
                <button class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-xl" type="submit">Save</button>
            </div>
        </div>
    </form>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            $("#fakultas").change(function() {
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
                    success: function(result) {
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
                    error: function(result) {
                        console.log("error", result);
                    },
                });
            });

        });
    </script>
</x-AppLayout>