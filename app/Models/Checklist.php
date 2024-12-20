<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = ['title'];

    public function todo_items()
    {
        return $this->hasMany(TodoItem::class);
    }
}
