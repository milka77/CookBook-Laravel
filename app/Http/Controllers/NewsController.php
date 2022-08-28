<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Brian2694\Toastr\Facades\Toastr;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $my_news = News::orderBy('created_at', 'DESC')->get();

        return view('components/news/news-index', ['my_news' => $my_news]);
    }


    public function adminIndex()
    {
        $my_news = News::paginate(10);

        return view('admin/news/index-news', ['my_news' => $my_news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/news/new-news');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validating data
        $data = request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        auth()->user()->userNews()->create($data);

        Toastr::success('News added successfuly!', 'System message');

        return redirect()->route('news.admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin/news/show-news', ['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin/news/edit-news', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(News $news)
    {
        // Validation of Data
        $data = request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $news->update($data);

        Toastr::success('News updated successfuly!', 'System message');

        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        Toastr::success('News deleted successfuly!', 'System message');

        return redirect()->route('news.index');
    }
}
