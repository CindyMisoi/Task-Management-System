<?php

namespace App\Http\Controllers;
use App\Models\Task; // Import the Task model
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;



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
    //  show a specific task
    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        return response()->json($task);
    }
    // update a task
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $validator = Validator::make($request->all(), Task::$rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }

        // Only update the fields that are intended to be updated
        $task->update([
            'title' => $request->input('title'),
            'status' => $request->input('status'),
            'due_date' => $request->input('due_date'),
        ]);

        return response()->json($task);
    }

    // delete a task
    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }


}