<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{

    // 
    public function index($workspaceId)
    {
        $todoList = Todo::where("workspace_id", $workspaceId)->get();
        if (empty($todoList)) {
            abort(500);
        }

        // 達成率を計算
        $all = 0;
        $done = 0;
        foreach ($todoList as $todo) {
            if ($todo["status"] == 3) {
                $done++;
            }
            $all++;
        }
        $end = floor($done/$all*100);

        return [
            "end" => $end,
            "todoList" => $todoList
        ];
    }

    public function store($workspaceId, Request $request)
    {
        $todo = new Todo;
        $todo->workspace_id = $workspaceId;
        $todo->part_id = $request->get("part_id");
        $todo->user_id = $request->get("user_id");
        $todo->title = $request->get("title");
        $todo->description = $request->get("description");
        $todo->status = $request->get("status");
        if (!$todo->save()) {
            abort(500);
        }
        return [
            "todo" => $todo
        ];
    }

    public function update($workspaceId, $id, Request $request)
    {
        $todo = Todo::find($id);
        if (empty($todo)) {
            abort(401);
        }
        $todo->workspace_id = $workspaceId;
        $todo->part_id = $request->get("part_id");
        $todo->user_id = $request->get("user_id");
        $todo->title = $request->get("title");
        $todo->description = $request->get("description");
        $todo->status = $request->get("status");
        if (!$todo->save()) {
            abort(500);
        }
        return [
            "todo" => $todo
        ];
    }
}
