<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $announcement = News::where('is_announcement', true)
            ->offset(0)
            ->limit(5)
            ->orderBy('created_at', 'desc')
            ->get();
        $news = News::where('is_announcement', false)
            ->offset(0)
            ->limit(3)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('home', [
            'announcement' => $announcement,
            'news' => $news,
            'quote' => Setting::where('key', 'config-quote')->first(),
        ]);
    }
}
