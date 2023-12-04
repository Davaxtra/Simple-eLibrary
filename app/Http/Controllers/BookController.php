<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookTypes;
use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $books = Book::with("fakultas", "prodi", "jenis_book")->get();
        return view('pages.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fakultas = DB::table('fakultas')->orderBy('name', 'ASC')->get();
        $data['$fakultas'] = $fakultas;
        $jenis = DB::table('book_types')->orderBy('name', 'ASC')->get();
        $type['$jenis'] = $jenis;
        return view('pages.book.create', compact('fakultas', 'jenis'));
    }

    public function getProdis(Request $request)
    {
        if ($request->fakultasId) {
            $prodis = Prodi::where('fakultas_id', $request->fakultasId)->get();
            if ($prodis) {
                return response()->json(['status' => 'success', 'data' => $prodis], 200);
            }
            return response()->json(['status' => 'failed', 'message' => 'No frameworks found'], 404);
        }
        return response()->json(['status' => 'failed', 'message' => 'Please select language'], 500);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $books = new Book;
        $books->nama = $request->nama;
        $books->npp = $request->npp;
        $books->judul = $request->judul;
        $books->fakultas_id = $request->fakultas;
        $books->prodi_id = $request->prodi;
        $books->jenis_buku = $request->jenis_buku;
        $books->no_urut = $request->no_urut;
        $books->angkatan = $request->angkatan;
        $books->keterangan = $request->keterangan;
        $books->save();

        return redirect()->route('book.index')->with('success', 'Book Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('pages.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fakultas = Fakultas::orderBy('name', 'asc')->get();
        $jenis = BookTypes::orderBy('name', 'asc')->get();
        $book = Book::with("fakultas", "prodi", "jenis_book")->findOrFail($id);
        return view('pages.book.edit', compact('book', 'fakultas', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $books = Book::findOrFail($id);

        $books->nama = $request->nama;
        $books->npp = $request->npp;
        $books->judul = $request->judul;
        $books->fakultas_id = $request->fakultas;
        $books->prodi_id = $request->prodi;
        $books->jenis_buku = $request->jenis_buku;
        $books->no_urut = $request->no_urut;
        $books->angkatan = $request->angkatan;
        $books->keterangan = $request->keterangan;
        $books->save();
        $books->update();
        return redirect()->route('book.index')->with('success', 'Book Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();
        return redirect()->route('book.index')->with('success', 'Book Deleted');
    }
}
