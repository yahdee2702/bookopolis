<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Utils\BookGenres;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request) {
        $newRelease = Book::query()->orderBy('desc')->limit(3)->get();
        $bestSeller = Book::query()->withCount('orders')->orderBy('orders_count', 'desc')->limit(3)->get();

        return view('pages.index', compact(['newRelease', 'bestSeller']));
    }
}
