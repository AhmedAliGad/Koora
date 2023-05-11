<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\SelectedResource;
use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function cities()
    {
        $cities = City::get(['id', 'name_en']);

        return SelectedResource::collection($cities);
    }

    public function areas(Request $request)
    {
        $areas = Area::where('city_id', $request->city)->get(['id', 'name_en']);

        return SelectedResource::collection($areas);
    }
}
