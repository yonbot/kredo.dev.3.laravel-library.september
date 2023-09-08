<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'public/images/';

    private $book;
    private $author;

    public function __construct(Book $book, Author $author)
    {
        $this->book = $book;
        $this->author = $author;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_books = $this->book->latest()->get();
        $all_authors = $this->author->get();

        return view('books.index')
            ->with('all_books', $all_books)
            ->with('all_authors', $all_authors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'year'  => 'required|numeric',
            'author' => 'max:50',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:1048'
            // mimes = Multipurpose Internet Mail ExtentionS
        ]);

        $this->book->title = $request->title;
        $this->book->year_published	= $request->year;
        if ($request->author == '') {
            $this->book->author_id = null;
        } else {
            $this->book->author_id = $request->author;
        }
        $this->book->cover_photo = $this->saveImage($request);
        $this->book->save();

        # 3. Redirect back to the homepage
        return redirect()->route('book.index');
    }

    private function saveImage($request)
    {
        // Change the name of the image to the CURRENT TIME 
        // to avoid overwriting/deleting
        $image_name = time() . "." . $request->image->extension();
        // $image_name = 215205.jpg

        // SAVE the image inside the storage/app/public/images folder
        // self → PostController
        // :: → scope operator
        $request->image->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);

        return $image_name;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->book->findOrFail($id);

        return view('books.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
