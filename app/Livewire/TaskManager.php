<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskManager extends Component
{
    public $tasks, $title, $description, $task_id;

    protected $rules = [
        'title' => 'required',
        'description' => 'nullable',
    ];

    public function mount()
    {
        $this->resetInput();
    }

    public function render()
    {
        $this->tasks = Task::all();
        return view('livewire.task-manager');
    }

    public function create()
    {
        $this->validate();

        Task::create([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->resetInput();
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $this->task_id = $id;
        $this->title = $task->title;
        $this->description = $task->description;
    }

    public function update()
    {
        $this->validate();

        $task = Task::find($this->task_id);
        $task->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->resetInput();
    }

    public function delete($id)
    {
        Task::find($id)->delete();
    }

    private function resetInput()
    {
        $this->title = null;
        $this->description = null;
    }
}
