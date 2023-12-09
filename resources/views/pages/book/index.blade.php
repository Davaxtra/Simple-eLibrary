<x-AppLayout>
    @if (Auth()->user()->type == "admin" )
    <div class="flex align-items-center justify-content-between">
        <h1 class="text-xl font-bold mb-3">List Book</h1>
        <div class="mr-">
            <form method="get">
                <input class="w-52 ml-auto mb-3 h-10 py-1 pl-9 pr-4 text-sm text-coolGray-500 font-medium placeholder-coolGray-400 focus:outline-none border border-coolGray-200 rounded-lg shadow-xls" type="text" name="search" value="{{ request()->get('search') }}">
                <button class="btn btn bg-blue-500 hover:bg-blue-600 text-white font-semibold mb-1" type="submit">Search</button><a href="{{ route('book.create') }}" class="btn btn-primary ml-5 shadow-xls"><i class="fa-solid fa-plus"></i></a>
            </form>
            <a href="">Export Excel</a>
        </div>

    </div>


    @else
    <div class="flex align-items-center justify-content-between">
        <h1 class="text-xl font-bold mb-3">List Book</h1>
        <form method="get">
            <input class="w-52 ml-auto mb-3 h-10 py-1 pl-9 pr-4 text-sm text-coolGray-500 font-medium placeholder-coolGray-400 focus:outline-none border border-coolGray-200 rounded-lg shadow-xls" type="text" name="search" value="{{ request()->get('search') }}">
            <button class="btn bg-blue-500 hover:bg-blue-600 text-white font-semibold mb-1" type="submit">Search</button>
        </form>
    </div>
    @endif


    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    <div class="overflow-auto rounded-lg shadow hidden md:block">
        <table class="w-full">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
                <tr>@if (Auth()->user()->type == "admin" )
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">No</th>
                    <th class="w-1/6 p-3 text-sm font-semibold tracking-wide text-left">Nama</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Judul</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Fakultas</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Prodi</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Action</th>
                    @else
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">No</th>
                    <th class="w-1/6 p-3 text-sm font-semibold tracking-wide text-left">Nama</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Judul</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Fakultas</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Prodi</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @if ($books->count() > 0)
                @foreach ($books as $book)
                <tr class="bg-white-900 hover:bg-gray-100">
                    <td class="p-3 text-blue-500 font-bold">{{ $loop->iteration }}</td>
                    <td class="p-3 text-gray-700 font-semibold">{{ $book->nama }} </br> {{ $book->npp }}</td>
                    <td class="p-3 text-sm font-semibold text-gray-700">{{ $book->judul }} </br>No. Urut :
                        {{ $book->no_urut }}
                    </td>
                    <td class="p-3 text-sm text-gray-700">{{ $book->fakultas->name }}</td>
                    <td class="p-3 text-sm text-gray-700">{{ $book->prodi->name }}</td>

                    @if (Auth()->user()->type == "admin" )
                    <td class="p-3 text-sm text-gray-700">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('book.show', $book->id) }}" type="button" class="p-2 tracking-wider bg-green-200 rounded-lg"><i class="fa-solid fa-magnifying-glass"></i></a>
                            <a href="{{ route('book.edit', $book->id) }}" type="button" class="p-2 tracking-wider bg-yellow-200 rounded-lg ml-1"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('book.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 tracking-wider bg-red-500 rounded-lg ml-1"><i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                    @else
                    @endif
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="p-3 text-sm text-gray-700 whitespace-nowrap" colspan="10">Books Not Found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    @if ($books->count() > 0)
    @foreach ($books as $book)
    <div class="block space-y-4 md:hidden">

        <div class="bg-white space-y-3 p-4 rounded-lg shadow">
            <div class="flex justify-between space-x-2 text-sm">
                <div class="flex items-center space-x-3">
                    <a href="#" class="text-blue-500 font-bold hover:underline">{{ $loop->iteration }}</a>
                    <div class="text-gray-500 font-semibold">{{ $book->nama }}</div>
                    <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-gray-800 bg-gray-200 rounded-lg bg-opacity-50">{{ $book->npp }}</span>
                </div>
                <div class="text-xs my-1"></div>
                @if (Auth()->user()->type == "admin" )
                <div @click.away="open = false" class="relative ml-auto" x-data="{ open: false }">
                    <button @click="open = !open">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 w-full origin-top-right rounded-md shadow-lg md:w-48">
                        <div class="absolute bg-white p-2 origin-top-right rounded-md shadow">
                            <a class="block rounded-lg text-sm font-semibold" href="{{ route('book.show', $book->id) }}">Detail</a>
                            <a class="mt-2 block rounded-lg text-sm font-semibold" href="{{ route('book.edit', $book->id) }}">Edit</a>
                            <form action="{{ route('book.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="mt-2 block rounded-lg text-sm font-semibold">Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                @endif
            </div>
            <div class="text-xs my-1">{{ $book->fakultas->name }}</div>
            <div class="text-sm font-semibold text-gray-700">
                <a href="{{ route('book.show', $book->id) }}">{{ $book->judul }}</a>
            </div>
            <div class="text-sm text-black">
                <div class="flex justify-between">
                    <div class="">No. Urut : {{ $book->no_urut }}</div>
                </div>
            </div>
        </div>

        @endforeach
        @else
        <div>stol</div>
        @endif

    </div>


</x-AppLayout>