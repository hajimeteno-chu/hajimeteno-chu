<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PartsTableSeeder::class,
            UsersTableSeeder::class,
            WorkspaceTableSeeder::class,
            PartWorkspacesTableSeeder::class,
            UserWorkspacesTableSeeder::class,
            TodoTableSeeder::class,
        ]);
    }
}
