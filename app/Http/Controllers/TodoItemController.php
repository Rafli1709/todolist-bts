<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use App\Http\Requests\StoreTodoItemRequest;
use App\Http\Requests\UpdateTodoItemRequest;

class TodoItemController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoItemRequest $request)
    {
        $todoItem = TodoItem::create($request->all());
        return response()->json($todoItem, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TodoItem $todoItem)
    {
        $todoItem->load('sub_todo_items');
        return response()->json($todoItem, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoItemRequest $request, TodoItem $todoItem)
    {
        $todoItem->update($request->all());
        return response()->json($todoItem, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TodoItem $todoItem)
    {
        $todoItem->delete();
        return response()->noContent();
    }
}
