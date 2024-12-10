<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    protected $fillable = ['checklist_id', 'parent_id', 'name', 'is_completed'];

    public function checklist()
    {
        return $this->belongsTo(Checklist::class);
    }

    public function parent()
    {
        return $this->belongsTo(TodoItem::class, 'parent_id');
    }

    public function sub_todo_items()
    {
        return $this->hasMany(TodoItem::class, 'parent_id')->with('sub_todo_items');
    }
}
