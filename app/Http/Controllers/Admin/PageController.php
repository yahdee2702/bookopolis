<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Order;

class PageController extends Controller
{
    public function index() {
        $activities = Activity::query()->with(['admin'])->orderBy('created_at', 'desc')->limit(10)->get();
        $orders = Order::query()->with(['user', 'book'])->get();

        return view("pages.admin.index", compact(['activities', 'orders']));
    }
}
