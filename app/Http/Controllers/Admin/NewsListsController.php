<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\NewsList;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = NewsList::paginate(10);

        return view('admin.news_lists.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::pluck('name', 'id');

        return view('admin.news_lists.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NewsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        NewsList::create($request->input() + [
                'slug' => str_slug($request->input('title'). time()),
                'image' => $request->file('image')->store('news_lists', 'public')
            ]);

        return redirect()->route('admin.news_lists.index')->with('success', 'Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsList  $newsList
     * @return \Illuminate\Http\Response
     */
    public function show(NewsList $newsList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  NewsList  $newsList
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsList $newsList)
    {
        $teams = Team::pluck('name', 'id');

        return view('admin.news_lists.edit', compact('newsList','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NewsRequest $request
     * @param  NewsList  $newsList
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, NewsList $newsList)
    {
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($newsList->image);
            $newsList->update($request->input() + [
                    'slug' => str_slug($request->input('title'). time()),
                    'image' => $request->file('image')->store('news_lists', 'public')
                ]);

            return redirect()->route('admin.news_lists.index')->with('success', 'Updated Successfully');
        } else {
            $newsList->update($request->input() + [
                'slug' => str_slug($request->input('title'). time())
                ]);

            return redirect()->route('admin.news_lists.index')->with('success', 'Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  NewsList  $newsList
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsList $newsList)
    {
        $newsList->delete();

        return redirect()->route('admin.news_lists.index')->with('success', 'Deleted Successfully');
    }
}
