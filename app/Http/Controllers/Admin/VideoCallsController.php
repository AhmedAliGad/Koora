<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\VideoCallsResource;
use App\Models\VideoCall;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VideoCallsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        if (auth()->check() && auth()->user()->role == 'agent') {
            $dayQuery = auth()->user()->agentCalls()->whereDate('created_at', Carbon::today())
                           ->get(['id', 'duration_time', 'waiting_time']);
            $query = VideoCall::where([['call_status_id', 1], ['admin_id', auth()->id()]])
                              ->with(['user:id,name'])
                              ->get(['id', 'user_id', 'admin_id', 'call_status_id', 'channel_name']);
            if (count($query)) {
                $calls = $query;
            } else {
                $check = VideoCall::where([['call_status_id', 1], ['admin_id', null]])->orderby('id')->first();
                if ($check) {
                    $check->update(['admin_id' => auth()->id()]);
                    $calls = VideoCall::where('id', $check->id)->get();
                    $this->sendPushNotification('Novo Care', 'New Incoming Call', [auth()->user()->device_token]);
                } else {
                    $calls = $query;
                }
            }

            return VideoCallsResource::collection($calls)->additional([
                'totalCalls' => count($dayQuery),
                'totalDurations' => gmdate("H:i:s", $dayQuery->sum('duration_time'))]);
        } else {
            $calls = VideoCall::with(['user:id,name', 'admin:id,name', 'callStatus:id,name'])
                              ->get(['id', 'user_id', 'admin_id', 'call_status_id', 'channel_name']);

            return VideoCallsResource::collection($calls);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoCall  $videoCall
     * @return \Illuminate\Http\Response
     */
    public function show(VideoCall $videoCall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoCall  $videoCall
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoCall $videoCall)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoCall  $videoCall
     */
    public function update(Request $request, VideoCall $videoCall)
    {
        if ($request->filled('status')) {
            if ($request->get('status') == 'on_progress') {
                $videoCall->update(['call_status_id' => 2]);
                $videoCall->admin()->update(['status' => 'in_call']);
            } elseif ($request->get('status') == 'finished') {
                $videoCall->update(['call_status_id' => 5]);
                $videoCall->admin()->update(['status' => 'active']);
            } else {
                return response()->json(['message' => 'Invalid status'], 422);
            }
            return response()->json(['message' => 'Call updated'], 200);
        } else {
            return response()->json(['message' => 'Invalid status'], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoCall  $videoCall
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoCall $videoCall)
    {
        //
    }
}
