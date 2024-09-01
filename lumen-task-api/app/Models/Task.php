<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'status', 'due_date'];
    protected $dates = ['due_date','created_at','updated_at', 'deleted_at']; 
    
    // make it public for other files outside class to access
    public static $rules = [
        'title' => 'required|max:255',
        'description' => 'nullable|max:255',
        'status' => 'required|in:pending,completed',
        'due_date' => 'required|date|after:today'
    ];
}
