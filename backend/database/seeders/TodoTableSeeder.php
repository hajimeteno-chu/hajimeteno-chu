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
                'part_id' => 1,
                'user_id' => 1,
                'title' => 'work1',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 1,
                'part_id' => 1,
                'user_id' => 2,
                'title' => 'work2',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 1,
                'part_id' => 1,
                'user_id' => 3,
                'title' => 'work3',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 1,
                'part_id' => 1,
                'user_id' => 1,
                'title' => 'work4',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 1,
                'part_id' => 1,
                'user_id' => 2,
                'title' => 'work5',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 1,
                'part_id' => 1,
                'user_id' => 1,
                'title' => 'work6',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 2,
                'part_id' => 1,
                'user_id' => 1,
                'title' => 'work7',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 2,
                'part_id' => 1,
                'user_id' => 1,
                'title' => 'work8',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 2,
                'part_id' => 1,
                'user_id' => 1,
                'title' => 'work9',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 2,
                'part_id' => 1,
                'user_id' => 2,
                'title' => 'work10',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
            [
                'workspace_id' => 2,
                'part_id' => 1,
                'user_id' => 2,
                'title' => 'work11',
                'description' => 'APIのエンドポイントとリクエストデータを整理する。',
                'status' => 1
            ],
        ]);
    }
}
