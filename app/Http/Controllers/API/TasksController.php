<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\SettingsResource;
use App\Http\Resources\API\WorkingHoursResource;
use App\Models\Setting;
use App\Models\WorkingHour;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * @OA\Get(
     *      path="/settings",
     *      operationId="get_settings_list",
     *      tags={"Settings"},
     *      summary="App General Settings",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="not found"
     *      ),
     *     )
     */
    public function settings()
    {
        $settings = Setting::first();

        return new SettingsResource($settings);
    }

    /**
     * @OA\Get(
     *      path="/working_hours",
     *      operationId="get_working_hours_list",
     *      tags={"Settings"},
     *      summary="App Working Hours",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="not found"
     *      ),
     *     )
     */
    public function workingHours()
    {
        $today = Carbon::today()->format('l');
        $day = WorkingHour::where('day', $today)->first();

        return (new WorkingHoursResource($day))->additional([
            'system_time' => Carbon::now()->format('H:i'),
            'system_is_active' => (Carbon::now()->format('H:i') >= $day->from && Carbon::now()->format('H:i') <= $day->to),
            ]);
    }
}
