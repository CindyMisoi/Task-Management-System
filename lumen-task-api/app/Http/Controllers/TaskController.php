<?php

namespace App\Http\Controllers;
use App\Models\Task; // Import the Task model
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;



class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //show all tasks
    public function index(Request $request)
    {
        // initialization of the query
        $query = Task::query();

        // status parameter is checked if present in the query string, if present filter only tasks with matching status
        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }

        // duedate parameter is checked if present in the query string, if present filter only tasks with matching duedates
        if ($dueDate = $request->query('due_date')) {
            $query->whereDate('due_date', $dueDate);
        }

        // if a search parameter is present in the request query string filter to only include tasks with a title that contains the search term.
        if ($search = $request->query('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        $tasks = $query->paginate(10); // Pagination

        return response()->json($tasks);
    }

}