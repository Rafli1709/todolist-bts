<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Http\Requests\StoreChecklistRequest;
use App\Http\Requests\UpdateChecklistRequest;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checklists = Checklist::with(['todo_items' => function ($query) {
            $query->whereNull('parent_id')->with('sub_todo_items');
        }])->get();
        return response()->json($checklists, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChecklistRequest $request)
    {
        $checklist = Checklist::create($request->validated());
        return response()->json($checklist, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Checklist $checklist)
    {
        $checklist->load('todo_items.sub_todo_items');
        return response()->json($checklist, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChecklistRequest $request, Checklist $checklist)
    {
        $checklist->update($request->validated());
        return response()->json($checklist, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checklist $checklist)
    {
        $checklist->delete();
        return response()->noContent();
    }
}
