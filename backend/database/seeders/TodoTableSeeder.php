<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo')->insert([
            [
                'workspace_id' => 1,
                'assign_id' => 1,
                'assign' => 'person',
                'title' => 'work1',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 1,
                'assign_id' => 2,
                'assign' => 'person',
                'title' => 'work2',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 1,
                'assign_id' => 3,
                'assign' => 'person',
                'title' => 'work3',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 1,
                'assign_id' => 1,
                'assign' => 'part',
                'title' => 'work4',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 1,
                'assign_id' => 2,
                'assign' => 'part',
                'title' => 'work5',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 1,
                'assign_id' => 1,
                'assign' => 'workspace',
                'title' => 'work6',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 2,
                'assign_id' => 1,
                'assign' => 'person',
                'title' => 'work7',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 2,
                'assign_id' => 1,
                'assign' => 'person',
                'title' => 'work8',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 2,
                'assign_id' => 1,
                'assign' => 'part',
                'title' => 'work9',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 2,
                'assign_id' => 2,
                'assign' => 'workspace',
                'title' => 'work10',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 2,
                'assign_id' => 2,
                'assign' => 'workspace',
                'title' => 'work11',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
        ]);
    }
}
