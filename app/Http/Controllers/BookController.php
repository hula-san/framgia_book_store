<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Auth;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\CategoryOfBook;
use App\Models\Review;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['listBook'] = Book::with(['author:id,name', 'publisher:id,name'])->paginate(10);
        
        return view('admin.listbook', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchByName(Request $request)
    {
        $data['categories'] = Category::listCategories();
        $data['publishers'] = Publisher::listPublishers();
        $data['authors'] = Author::listAuthors();
        $key = $request->key_word;
        $data['books'] = Book::search('name', $key)->get();   

        return view('search_result', $data);
    }

    public function searchCategory($idCategorie)
    {
        $data['categories'] = Category::listCategories();
        $data['publishers'] = Publisher::listPublishers();
        $data['authors'] = Author::listAuthors();
        $data['books'] = Category::with(['books'])->where('id', $idCategorie)->first();
        $data['books'] = $data['books']->books;

        return view('search_result', $data);
    }

    public function searchPublisher($idPublisher)
    {
        $data['categories'] = Category::listCategories();
        $data['publishers'] = Publisher::listPublishers();
        $data['authors'] = Author::listAuthors();
        $data['books'] = Book::listBookSearch('publisher_id', $idPublisher)->get();

        return view('search_result', $data);
    }

    public function searchAuthor($idAuthor)
    {
        $data['categories'] = Category::listCategories();
        $data['publishers'] = Publisher::listPublishers();
        $data['authors'] = Author::listAuthors();
        $data['books'] = Book::listBookSearch('author_id', $idAuthor)->get();

        return view('search_result', $data);
    }

    public function getBookDetail($id)
    {
        $data['categories'] = Category::listCategories();
        $data['publishers'] = Publisher::listPublishers();
        $data['authors'] = Author::listAuthors();
        $data['book'] = Book::listBookSearch('id', $id)->get()->first();
        $data['reviews'] = Review::where('book_id', $id)->get();

        return view('book_detail', $data);
    }
}
