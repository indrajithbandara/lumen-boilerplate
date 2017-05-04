<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller {
    /**
     * GET /books
     * @return \Illuminate\Http\Response
     */
    public function index() {
       // return [
       //     ['title' => 'War of the Worlds'],
       //     ['title' => 'A Wrinkle in Time']
       // ];
       $books = Book::all();
       return response()->json($books);
    }

    /**
     * Get the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $book = Book::where('id', $id)->get();
		if(!empty($book)) {
            return response()->json($book);
        } else {
            return response()->json(['status' => 'fail']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Book::destroy($id)){
             return response()->json(['status' => 'success']);
        }  else {
            return response()->json(['status' => 'fail']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        $this->validate($request, [
	        'title' => 'required',
	        'description' => 'required',
	        'author' => 'required'
	    ]);

        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->save();
        return response()->json(['status' => 'success']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
        $this->validate($request, [
	        'title' => 'required',
	        'description' => 'required',
	        'author' => 'required'
	    ]);

        $book = Book::find($id);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->save();
        return response()->json(['status' => 'success']);
    }
}