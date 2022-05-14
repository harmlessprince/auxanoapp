<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;

class TaskFormModal extends Component
{
    public $users;
    public $title;
    public $description;
    public $assigned_to;
    public $due_date;

    public function render()
    {
        return view('livewire.task-form-modal');
    }

    public function mount()
    {
        $this->users =   User::all(['id', 'first_name', 'last_name']);
    }

    protected function rules()
    {
        // dd($this->due_date);
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'due_date' => ['required', 'date'],
            'assigned_to' => ['nullable', 'integer', 'exists:users,id']
        ];
    }

    public function createTask()
    {
        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'due_at' => $this->due_date,
            'assigned_to' => $this->validate()['assigned_to'] ?: auth()->id(),
            'created_by' => auth()->id(),
        ]);
        return redirect(route('tasks.index'))->with('success', "Task added successfully");
    }
}
