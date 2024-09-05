<?php

namespace App\Interfaces;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Support\Collection;

interface TaskRepositoryInterface
{
    public function getList(): Collection;

    public function show(Task $task): Task;

    public function store(StoreTaskRequest $request): Task;

    public function delete(Task $task): bool;

    public function updateData(UpdateTaskRequest $request, Task $task): bool;
}
