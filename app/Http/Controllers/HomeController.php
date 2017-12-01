<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Slide;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() 
    {
        $data['books'] = Book::listNewBooks()->limit(config('index.number.number_newbook_index'))->get();
        $data['slides'] = Slide::listSlides()->get();
        $data['categories'] = Category::listCategories();
        $data['publishers'] = Publisher::listPublishers();
        $data['authors'] = Author::listAuthors();

        return view('index', $data);
    }

    public function showNewbook()
    {
        $data['newBooks'] = Book::listNewBooks()->limit(config('index.number.number_newbook'))->get();
        $data['categories'] = Category::listCategories();
        $data['publishers'] = Publisher::listPublishers();
        $data['authors'] = Author::listAuthors();

        return view('newbooks', $data);
    }

    public function store()
    {
        $data['books'] = Book::listNewBooks()->get();
        $data['categories'] = Category::listCategories();
        $data['publishers'] = Publisher::listPublishers();
        $data['authors'] = Author::listAuthors();

        return view('store', $data);
    }
}
