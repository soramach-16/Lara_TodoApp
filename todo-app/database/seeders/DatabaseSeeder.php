<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Migrateファイルの不整合が起きたとき用
        $this->call(FoldersTableSeeder::class);
        $this->call(TasksTableSeeder::class);
    }
}
