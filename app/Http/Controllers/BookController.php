<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
        $books = Book::orderBy('id', 'ASC')->get();
        return view('pages.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fakultas = \DB::table('fakultas')->orderBy('name', 'ASC')->get();
        $data['$fakultas'] = $fakultas;
        return view('pages.book.create', compact('fakultas'));
    }

    public function getProdi(Request $request) {
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
        // dd($request->all());
        Book::create($request->all());

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
        $book = Book::findOrFail($id);
        return view('pages.book.edit', compact('book'));
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
        $book = Book::findOrFail($id);

        $book->update($request->all());
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