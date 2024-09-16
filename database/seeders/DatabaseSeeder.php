<?php


namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Mohammad',
            'email' => 'mo_admin@sims.com',
            'is_admin' => '1'
        ]);
        User::factory()->create([
            'name' => 'Khaled',
            'email' => 'kh_admin@sims.com',
            'is_admin' => '1'
        ]);
        User::factory(10)->create();
        Post::factory(12)->create();
    }
}
