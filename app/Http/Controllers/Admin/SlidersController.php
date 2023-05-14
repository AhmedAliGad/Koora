<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('priority')->paginate(10);

        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        Slider::create($request->input() + [
                'image_path' => $request->file('image')->store('sliders', 'public')
            ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($slider->image_path);
            $slider->update($request->input() + [
                    'image_path' => $request->file('image')->store('sliders', 'public')
                ]);

            return redirect()->route('admin.sliders.index')->with('success', 'Updated Successfully');
        } else {
            $slider->update($request->input());

            return redirect()->route('admin.sliders.index')->with('success', 'Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'Deleted Successfully');
    }
}
