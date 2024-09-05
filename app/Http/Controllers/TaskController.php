<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    public function __construct(
        protected TaskRepositoryInterface $taskRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            return response()->json(
                $this->taskRepository->getList(), Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request): JsonResponse
    {
        $task = $this->taskRepository->store($request);

        return response()->json([
            'status' => true,
            'message' => 'Task created successfully.',
            'data' => $task,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): JsonResponse
    {
        try {
            $task = $this->taskRepository->show($task);

            return response()->json($task, Response::HTTP_OK);
        } catch (\Exception $e) {
            // Handle any errors that occur during retrieval
            return response()->json(['status' => false, 'message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task): JsonResponse
    {
        $this->taskRepository->updateData($request, $task);

        return response()->json([
            'status' => true,
            'message' => 'Task updated successfully.',
        ], Response::HTTP_OK);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): JsonResponse
    {
        try {
            // Find the Task by ID and delete it
            $this->taskRepository->delete($task);

            return response()->json(['status' => true, 'message' => 'Task deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Return error response
            return response()->json(['status' => false, 'message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
