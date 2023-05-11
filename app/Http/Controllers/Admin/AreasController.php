<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(City $city)
    {
        if ($city) {
            $areas = Area::where('city_id', $city->id)->get();

            return view('admin.areas.index', compact('city', 'areas'));
        } else {
            return redirect()->route('admin.dashboard')->withErrors('Invalid Data');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(City $city)
    {
        return view('admin.areas.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(City $city, Request $request)
    {
        Area::create($request->input() + ['city_id' => $city->id]);

        return redirect()->route('admin.cities.areas.index', $city->id)->with('success', 'Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city, Area $area)
    {
        return view('admin.areas.edit', compact('city', 'area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city, Area $area)
    {
        $area->update($request->input());

        return redirect()->route('admin.cities.areas.index', $city->id)->with('success', 'Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city, Area $area)
    {
        if (count($area->users)) {
            return redirect()->back()->withErrors('Can\'t delete this city because related users, Please Deactivate !');
        } else {
            $area->delete();

            return redirect()->route('admin.cities.areas.index', $city->id)->with('success', 'Deleted Successfully !');
        }
    }
}
