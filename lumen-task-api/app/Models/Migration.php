<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Migration extends Model
{
    protected $table = 'migrations';

    // Tell Eloquent that the migration column is not a timestamp
    public $timestamps = false;

    protected $fillable = ['migration'];
}