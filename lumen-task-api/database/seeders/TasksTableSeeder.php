<?php

namespace Database\Seeders;
use App\Models\Task; // Import the Task model
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            Task::create([
                'title' => 'Task 1',
                'status' => 'pending',
                'due_date' => '2023-07-26',
            ]);
    
            Task::create([
                'title' => 'Task 2',
                'status' => 'completed',
                'due_date' => '2023-07-27',
            ]);
    
            Task::create([
                'title' => 'Task 3',
                'status' => 'pending',
                'due_date' => '2023-07-28',
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    
}
