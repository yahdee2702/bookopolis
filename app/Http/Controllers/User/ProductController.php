<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private function pagingCalculate(int $page, int $total, int $size = 20, int $maxPages = 5) {
        $totalPages = ceil($total / $size);
        $startIndex = max(1, $page - floor($maxPages / 2));
        $endIndex = min($startIndex + $maxPages - 1, $totalPages);

        $pages = [];
        for ($i = $startIndex; $i <= $endIndex; $i++) array_push($pages, $i);

        if (count($pages) <= 0) array_push($pages, 1);

        return [
            "totalPages" => $totalPages,
            "pages" => $pages,
        ];
    }

    public function index(Request $request)
    {
        $productQuery = Book::query();

        $page = $request->query('page', 1);
        $search = $request->query('search');
        $category = $request->query('category');

        if ($search)
            $productQuery = $productQuery
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('author', 'like', '%' . $search . '%');

        if ($category && $category != "all")
            $productQuery = $productQuery->where('genre', 'like', $category);

        $productLength = $productQuery->get()->count();
        $products = $productQuery->simplePaginate(10, "*", "page", $page)->items();

        $paging = $this->pagingCalculate(
            $page, $productLength, 10
        );

        return view('pages.store', compact(['products', 'paging']));
    }

    public function show(Request $request, Book $book)
    {
        return view('pages.view', compact('book'));
    }

    public function buy(Request $request, Book $book)
    {
        $validated = $request->validate([
            'quantity' => 'required|digits_between:1,' . $book->stocks,
        ]);

        $quantity = $validated['quantity'];

        $user = auth('user')->user();

        $order = new Order();
        $order->fill([
            'amount' => $quantity,
            'status' => 'success',
        ]);

        $order->user()->associate($user);
        $order->book()->associate($book);

        $order->save();

        $book->stocks -= $quantity;

        $book->timestamps = false;
        $book->save();
        $book->timestamps = true;

        return back();
    }
}
