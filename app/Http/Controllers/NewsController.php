<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::where('is_announcement', false)
            ->offset(0)
            ->limit(10)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('news.main', [
            'news' => $news,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = News::findOrFail($id);
        $data->visit = $data->visit + 1;
        $data->save();

        $news = News::where('id', '!=', $id)
            ->offset(0)
            ->limit(3)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('news.info', [
            'data' => $data,
            'news' => $news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = News::findOrFail($id);
        $data->update($request->all());
        $data->save();

        return json_encode($data->favorite);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
