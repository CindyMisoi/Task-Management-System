<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'status', 'due_date'];
    protected $dates = ['due_date','created_at','updated_at', 'deleted_at'];    
    protected $rules = [
        'title' => 'required|unique:tasks|max:255',
        'description' => 'nullable|max:255',
        'status' => 'in:pending,completed',
        'due_date' => 'required|date|after:today'
    ];
}
