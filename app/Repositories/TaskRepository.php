<?php

namespace App\Repositories;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use Illuminate\Support\Collection;

class TaskRepository extends BaseRepo implements TaskRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(Task::class);
    }

    public function getList(): Collection
    {
        return $this->all();
    }

    public function store(StoreTaskRequest $request): Task
    {
        $data = $request->validated();

        return $this->create($data);
    }

    public function show(Task $task): Task
    {
        return $task;
    }

    public function updateData(UpdateTaskRequest $request, Task $task): bool
    {
        $data = $request->validated();

        return $this->update($data, $task->id);
    }

    public function delete(Task $task): bool
    {
        return $task->delete();
    }
}
