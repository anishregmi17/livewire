<div>
    <input wire:model="title" type="text" placeholder="Task Title">
    @error('title')
        <span class="error">{{ $message }}</span>
    @enderror

    <textarea wire:model="description" placeholder="Task Description"></textarea>

    <button wire:click="create">Create Task</button>

    @foreach ($tasks as $task)
        <div>
            <input wire:model="title" type="text">
            <textarea wire:model="description"></textarea>
            <button wire:click="update">Update</button>
            <button wire:click="delete">Delete</button>
        </div>
    @endforeach
</div>
