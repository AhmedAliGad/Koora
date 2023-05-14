<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamRequest;
use App\Models\SocialType;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams= Team::orderBy('points', 'desc')->paginate(10);

        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = SocialType::pluck('name', 'name');

        return view('admin.teams.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        Team::create($request->except(['links', 'slug']) + ['social_links' => $request->get('links'),
                'logo' => $request->file('image')->store('teams', 'public'),
                'slug' => str_replace(' ', '-', $request->get('name_en'))
            ]);

        return redirect()->route('admin.teams.index')->with('success', 'Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $types = SocialType::pluck('name', 'name');

        return view('admin.teams.edit', compact('team', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TeamRequest  $request
     * @param  Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, Team $team)
    {
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($team->image);
            $team->update($request->except('links') + ['social_links' => $request->get('links'),
                    'logo' => $request->file('image')->store('teams', 'public')
                ]);

            return redirect()->route('admin.teams.index')->with('success', 'Updated Successfully');
        } else {
            $team->update($request->except('links') + [
                    'social_links' => $request->get('links'),
                    'slug' => str_replace(' ', '-', $request->get('name_en'))
                ]);

            return redirect()->route('admin.teams.index')->with('success', 'Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('admin.teams.index')->with('success', 'Deleted Successfully');
    }
}
