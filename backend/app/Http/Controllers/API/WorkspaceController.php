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
        $workspaceIds = [];
        foreach($userWorkspaces as $userWorkspace) {
            $partWorkspaceIds[] = $userWorkspace['part_workspace_id'];
        }

        $partWorkspaces = PartWorkspaces::whereIn('id', $partWorkspaceIds)->get();
        foreach($partWorkspaces as $partWorkspace) {
            $workspaceIds[] = $partWorkspace['workspace_id'];
        }

        $workspaces = Workspace::whereIn('id', $workspaceIds)->get();
        $todo_controller = app()->make('App\Http\Controllers\API\TodoController');
        foreach ($workspaces as $workspace) {
            $pwIds = [];
            $result[$workspace['id']]['id'] = $workspace['id'];
            $result[$workspace['id']]['name'] = $workspace['name'];
            $pws = PartWorkspaces::where('workspace_id', $workspace['id'])->get();
            foreach($pws as $pw) {
                $pwIds[] = $pw['id'];
            }
            $member_count = UserWorkspaces::whereIn('part_workspace_id', $pwIds)->get();
            $result[$workspace['id']]['member_count'] = $member_count->groupBy('user_id')->count();
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

    public function show($id, Request $request) {
        // ユーザーチェック
        $token = $request->bearerToken();
        if (empty($token)) {
            abort(401);
        }
        $user = User::where('remember_token', $token)->first();
        if (empty($user)) {
            abort(401);
        }
        $userWorkspaces = UserWorkspaces::where('user_id', $user['id'])->get();
        if (empty($userWorkspaces)) {
            abort(401);
        }
        // 返却値を生成
        $result = [];
        $workspace = Workspace::find($id);
        $partWorkspaces = PartWorkspaces::where('workspace_id', $id)->get();
        $partWorkspaceIds = [];
        foreach($partWorkspaces as $partWorkspace) {
            $partWorkspaceIds[] = $partWorkspace['id'];
        }
        $userWorkspaces = UserWorkspaces::whereIn('part_workspace_id', $partWorkspaceIds)->get();
        $members = [];
        foreach ($userWorkspaces as $userWorkspace) {
            $partWorkspace = PartWorkspaces::where('id', $userWorkspace['part_workspace_id'])->first();
            $part = Part::find($partWorkspace['part_id']);
            $members[$userWorkspace['id']]['name'] = $part['name'];
            $user = User::find($userWorkspace['user_id']);
            $members[$userWorkspace['id']]['user'] = $user;
        }
        $partWorkspaces = PartWorkspaces::where('workspace_id', $id)->get();
        foreach($partWorkspaces as $partWorkspace) {
            $partIds[] = $partWorkspace['part_id'];
        } 
        $partIds = array_unique($partIds);
        $partList = Part::whereIn('id', $partIds)->get();
        foreach($partList as $part) {
            $partNameList[] = $part['name'];
        }
        $result = [
            'workspace' => $workspace,
            'partList' => $partNameList,
            'member' => $members
        ];
        return $result;
    }
}
