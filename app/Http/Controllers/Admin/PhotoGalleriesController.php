<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PhotoGalleryRequest;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoGalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo_galleries = PhotoGallery::paginate(10);

        return view('admin.photo_galleries.index', compact('photo_galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photo_galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PhotoGalleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoGalleryRequest $request)
    {
        $check = PhotoGallery::where('title', $request->input('title'))->first();
        if ($check) {
            PhotoGallery::create($request->input() + [
                    'slug' => str_replace(' ', '-', $request->input('title')). time(),
                    'image_path' => $request->file('image')->store('photo_galleries', 'public')
                ]);
        } else {
            PhotoGallery::create($request->input() + [
                    'slug' => str_replace(' ', '-', $request->input('title')),
                    'image_path' => $request->file('image')->store('photo_galleries', 'public')
                ]);
        }


        return redirect()->route('admin.photo_galleries.index')->with('success', 'Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function show(PhotoGallery $photoGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(PhotoGallery $photoGallery)
    {
        return view('admin.photo_galleries.edit', compact('photoGallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function update(PhotoGalleryRequest $request, PhotoGallery $photoGallery)
    {
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($photoGallery->image);
            $photoGallery->update($request->input() + [
                    'image_path' => $request->file('image')->store('photo_galleries', 'public')
                ]);
            return redirect()->route('admin.photo_galleries.index')->with('success', 'Updated Successfully');
        } else {
            $photoGallery->update($request->input());

            return redirect()->route('admin.photo_galleries.index')->with('success', 'Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotoGallery $photoGallery)
    {
        $photoGallery->delete();

        return redirect()->route('admin.photo_galleries.index')->with('success', 'Deleted Successfully');
    }
}
