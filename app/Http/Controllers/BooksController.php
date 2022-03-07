<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //TODO: Maybe add pagination, will do it from vue now since I'm lazy.
        $query = Book::where('user_id', Auth::id());
        return $query->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookRequest $request)
    {
        return Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'release_date' => Carbon::parse($request->release_date),
            'user_id' => Auth::id(),
            'user_profile_id' => $request->profile_id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Book::find($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $book = Book::find($id);
        if($book->user_id != Auth::id() || $book->user_profile_id != $request->profile_id) {
            return response()->json([
                'message' => 'You are not authorized to delete this book.'
            ], 403);
        }
        Book::destroy($id);
        return response()->json([
            'message' => 'Book deleted.'
        ], 200);
    }
}
