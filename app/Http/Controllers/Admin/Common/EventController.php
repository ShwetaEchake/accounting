<?php

namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Requests\Admin\Common\{StoreEventRequest, UpdateEventRequest};

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.common.events')->with(['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            Event::create(Arr::only($input, Event::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Event created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Event');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        if ($event) {
            $response = [
                'result' => 1,
                'event' => $event,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $event->update(Arr::only($input, Event::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Event updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Event');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        try {
            DB::beginTransaction();
            $event->delete();
            DB::commit();
            return response()->json(['success' => 'Event deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Event');
        }
    }
}
