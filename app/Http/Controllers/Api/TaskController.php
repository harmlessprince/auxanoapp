<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\QueryFilters\CreatedAtFilter;
use App\QueryFilters\DueAtFilter;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = app(Pipeline::class)->send(
            Task::query()
                ->userTasks()
                ->with(
                    'assignedTo:id,first_name,last_name',
                    'createdBy:id,first_name,last_name'
                )
        )->through([
            CreatedAtFilter::class,
            DueAtFilter::class,
        ])->thenReturn()->latest()->paginate(20);

        return $tasks;
    }

    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string']
        ]);
        //Manually fire updating event
        $this->fireUpdatingEvent($task);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return $this->successResponse('Task has been successfully updated');
    }

    public function mark(Request $request, Task $task)
    {
        $this->fireUpdatingEvent($task);
        $task->done = $request->done;
        $task->save();
        $message = $task->done ? 'marked has done' : "marked has not done";
        return $this->successResponse('Task has been successfully '.$message);
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return $this->successResponse('Task has been successfully deleted');
    }

    public function fireUpdatingEvent($task)
    {
        event('eloquent.updating: App\Models\Task', $task);
    }

    public function assign(Request $request, Task $task)
    {
        $this->fireUpdatingEvent($task);
        $task->assigned_to = $request->assigned_to;
        $task->save();
        $name = $task->assignedTo->full_name;
        return $this->successResponse('Task has been successfully assigned to '.$name);
    }
}
