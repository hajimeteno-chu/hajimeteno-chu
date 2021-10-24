<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Part;
use App\Models\PartWorkspaces;
use Illuminate\Http\Request;
use App\Models\Workspace;
use App\Models\User;
use App\Models\UserWorkspaces;

class WorkspaceController extends Controller
{
    /**
     * indexメソッドはサンプルで作った。今は1件のworkspaceを取得して返す。
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $token = $request->bearerToken();
        if (empty($token)) {
            abort(401);
        }
        $user = User::where('remember_token', $token)->first();
        if (empty($user)) {
            abort(401);
        }

        // リクエストユーザーがmemberに属しているかチェック
        $userWorkspaces = UserWorkspaces::where('user_id', $user['id'])->get();
        if (empty($userWorkspaces)) {
            abort(401);
        }

        // ここから下で返却値を生成
        $result = [];
        $partWorkspaceIds = [];
        foreach($userWorkspaces as $userWorkspace) {
            $partWorkspaceIds[] = $userWorkspace['part_workspace_id'];
        }
        $workspaces = Workspace::whereIn('id', $partWorkspaceIds)->get();
        $todo_controller = app()->make('App\Http\Controllers\API\TodoController');
        foreach ($workspaces as $workspace) {
            $result[$workspace['id']]['id'] = $workspace['id'];
            $result[$workspace['id']]['name'] = $workspace['name'];
            $result[$workspace['id']]['member_count'] = UserWorkspaces::whereIn('part_workspace_id', $partWorkspaceIds)->count();
            $todo = $todo_controller->index($workspace['id']);
            $result[$workspace['id']]['progress'] = $todo['progress'];
        }
        return $result;
    }

    private function resConversionJson($result, $statusCode=200)
    {
        if(empty($statusCode) || $statusCode < 100 || $statusCode >= 600){
            $statusCode = 500;
        }
        return response()->json($result, $statusCode, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token = $request->bearerToken();
        if (empty($token)) {
            abort(401);
        }
        $user = User::where('remember_token', $token)->first();
        if (empty($user)) {
            abort(401);
        }

        // Workspaceの作成
        $workspace = new Workspace;
        $workspace->name = $request->input('name');
        $workspace->save();
        $workspace->id;

        // partの登録
        $parts_arr = $request->input('parts');
        foreach ($parts_arr as $part) {
            $part_id = -1;
            $p = Part::query()->where('name', $part['name'])->first();
            // 今までにないPartだったら新規登録
            if (empty($p)) {
                $new_part = new Part;
                $new_part->name = $part['name'];
                $new_part->save();
                $part_id = $new_part->id;
            } else {
                $part_id = $p->id;
            }

            $partworkspace = new PartWorkspaces;
            $partworkspace->part_id = $part_id;
            $partworkspace->workspace_id = $workspace->id;
            $partworkspace->save();

            $member_arr = $part['members'];
            foreach ($member_arr as $member_id) {
                $new_member = new UserWorkspaces;
                $new_member->part_workspace_id = $partworkspace->id;
                $new_member->user_id = $member_id;
                $new_member->save();
            }
        }
        return ['workspace_id' => $workspace->id];
    }
}
