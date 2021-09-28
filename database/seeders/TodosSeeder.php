<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;
class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Todo::factory()->count(3)->create();
    }
}
