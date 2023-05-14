<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpcommingMatchRequest;
use App\Models\Team;
use App\Models\UpcomingMatch;

class UpcomingMatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upcoming_matches = UpcomingMatch::paginate(10);

        return view('admin.upcoming_matches.index', compact('upcoming_matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::pluck('name', 'id');

        return view('admin.upcoming_matches.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UpcommingMatchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpcommingMatchRequest $request)
    {
        UpcomingMatch::create($request->input());

        return redirect()->route('admin.upcoming_matches.index')->with('success', 'Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  UpcomingMatch  $upcomingMatch
     * @return \Illuminate\Http\Response
     */
    public function show(UpcomingMatch $upcomingMatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  UpcomingMatch  $upcomingMatch
     * @return \Illuminate\Http\Response
     */
    public function edit(UpcomingMatch $upcomingMatch)
    {
        $teams = Team::pluck('name', 'id');

        return view('admin.upcoming_matches.edit', compact('upcomingMatch', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpcommingMatchRequest  $request
     * @param  \App\Models\UpcomingMatch  $upcomingMatch
     * @return \Illuminate\Http\Response
     */
    public function update(UpcommingMatchRequest $request, UpcomingMatch $upcomingMatch)
    {
        $upcomingMatch->update($request->input());

        return redirect()->route('admin.upcoming_matches.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  UpcomingMatch  $upcomingMatch
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpcomingMatch $upcomingMatch)
    {
        $upcomingMatch->delete();

        return redirect()->route('admin.upcoming_matches.index')->with('success', 'Deleted Successfully');
    }
}
