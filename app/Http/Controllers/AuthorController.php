<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_authors = $this->author->latest()->get();

        return view('authors.index')->with('all_authors', $all_authors);
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
        # 1. Validate the request
        $request->validate([
            'author' => 'required|max:50'
        ]);

        # 2. Save the request/form data to the database
        $this->author->name = $request->author;
        $this->author->save();

        # 3. Redirect back to the homepage
        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = $this->author->findOrFail($id);

        return view('authors.edit')->with('author', $author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'author' => 'required|max:50'
        ]);

        $author = $this->author->findOrFail($id);
        $author->name = $request->author;
        $author->save();

        return redirect()->route('author.index');
    }

    public function delete($id)
    {
        $author = $this->author->findOrFail($id);

        return view('authors.delete')->with('author', $author);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->author->destroy($id);

        return redirect()->route('author.index');
    }
}
