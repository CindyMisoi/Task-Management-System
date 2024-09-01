<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'status', 'due_date'];
    protected $dates = ['due_date','created_at','updated_at', 'deleted_at']; 
    
    // make it public for other files outside class to access
    public static $rules = [
        'title' => 'max:255',
        'description' => 'nullable|max:255',
        'status' => 'in:pending,completed',
        'due_date' => 'date|after:today'
    ];
}
