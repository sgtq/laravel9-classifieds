<?php

namespace Database\Seeders;

use App\Models\Condition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Condition::create([
            'name' => 'New',
            'slug' => Str::slug('New')
        ]);
        Condition::create([
            'name' => 'Used',
            'slug' => Str::slug('Used')
        ]);
        Condition::create([
            'name' => 'Like New',
            'slug' => Str::slug('Like New')
        ]);
    }
}
