<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepositoryInterface;

class TaskController extends Controller
{
    private $tasks;
    public function __construct(TaskRepositoryInterface $tasks)
    {
        $this->tasks = $tasks;
    }

    public function showAll()
    {
        return response()->json($this->tasks->all(), 200);
    }

    public function store(Request $request)
    {
        $task = $this->tasks->create([
            'title' => $request->title,
            'completed' => $request->completed
        ]);

        return response()->json($task, 201);
    }

    public function show(int $id)
    {
        $task = $this->tasks->find($id);
        if (!$task) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json($task, 200);
    }

    public function update(Request $request, int $id)
    {
        $task = $this->tasks->update($id, [
            'title' => $request->title,
            'completed' => $request->completed
        ]);
        if (!$task) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json($task, 200);
    }

    public function destroy(int $id)
    {
        $ok = $this->tasks->delete($id);
        if (!$ok) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json(null, 204);
    }
}
