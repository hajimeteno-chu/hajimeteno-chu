<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkspaceTableSeeder extends Seeder
{
    /**
     * workspacesテーブルに1件だけ登録
     *
     * @return void
     */
    public function run()
    {
        DB::table('workspaces')->insert([
            'name' => 'HelloWorkspace',
        ]);
    }
}
