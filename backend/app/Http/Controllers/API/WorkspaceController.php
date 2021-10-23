<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Part;
use App\Models\PartWorkspaces;
use Illuminate\Http\Request;
use App\Models\Workspace;
use App\Models\User;
use App\Models\UserWorkspaces;
use Illuminate\Support\Facades\DB;

class WorkspaceController extends Controller
{
    /**
     * indexメソッドはサンプルで作った。今は1件のworkspaceを取得して返す。
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // リクエストしたユーザー情報を返す
        $token = $request->bearerToken();
        if (empty($token)) {
            abort(401);
        }
        $user = User::where("remember_token", $token)->first();
        if (!empty($user)) {
            $member_id = DB::table('user_workspaces')->where('user_id', $user->id)->first()->id;
            return [
                "user" => $user,
            ];
        } else {
            abort(401);
        }
        // try {
        //     $workspace = Workspace::first();
        //     $result = [
        //         'result' => true,
        //         'workspace_id' => $workspace->id,
        //         'workspace_name' => $workspace->name
        //     ];
        // } catch(\Exception $e) {
        //     $result = [
        //         'result' => false,
        //         'error' => [
        //             'message' => [$e->getMessage()]
        //         ],
        //     ];
        //     return $this->resConversionJson($result, $e->getCode());
        // }
        // return $this->resConversionJson($result);
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
        // $token = $request->bearerToken();
        // if (empty($token)) {
        //     abort(401);
        // }
        // $user = User::where("remember_token", $token)->first();
        // if (empty($user)) {
        //     abort(401);
        // }

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

    /**
     * POST:
    *- {
    *  name:String
    *  members:[int,int,int]
    *  parts:[
    *    {
    *      name:String,
    *      members:[int,int,int]
    *    }
    *  ]
    *}
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
