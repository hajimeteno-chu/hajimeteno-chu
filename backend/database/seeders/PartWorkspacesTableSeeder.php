<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartWorkspacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('part_workspaces')->insert([
            [
                'workspace_id' => 1,
                'part_id' => 1
            ],
            [
                'workspace_id' => 1,
                'part_id' => 2
            ],
            [
                'workspace_id' => 1,
                'part_id' => 3
            ],
            [
                'workspace_id' => 2,
                'part_id' => 1
            ],
            [
                'workspace_id' => 2,
                'part_id' => 2
            ],
            [
                'workspace_id' => 3,
                'part_id' => 1
            ],
            [
                'workspace_id' => 3,
                'part_id' => 2
            ],
        ]);
    }
}
