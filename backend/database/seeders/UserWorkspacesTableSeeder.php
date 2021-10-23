<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserWorkspacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_workspaces')->insert([
            [
                'user_id' => 1,
                'part_workspace_id' => 1,
            ],
            [
                'user_id' => 1,
                'part_workspace_id' => 4,
            ],
            [
                'user_id' => 2,
                'part_workspace_id' => 2,
            ],
            [
                'user_id' => 3,
                'part_workspace_id' => 3,
            ],
        ]);
    }
}
