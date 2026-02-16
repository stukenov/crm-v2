<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nodes;

class NodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nodes::create([
            'xfields' => "nooo",
        ]);
    }
}
