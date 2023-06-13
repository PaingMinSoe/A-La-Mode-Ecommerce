<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Supplier;
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
         User::factory(1)->create();
         Admin::factory(1)->create();
         $this->call([
             BrandSeeder::class,
             CategorySeeder::class,
         ]);
    }
}