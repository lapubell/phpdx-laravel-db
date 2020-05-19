<?php

namespace App\Http\Controllers;

use App\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * show a listing of all the libraries
     *
     * @return view
     */
    public function index()
    {
        $libraries = Library::paginate();

        return view("library.index", ['l' => $libraries]);
    }

    public function show($id)
    {
        $library = Library::with("books")->findOrFail($id);

        return view("library.show", ['l' => $library]);
    }
}
