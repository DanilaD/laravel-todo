<?php

namespace Database\Seeders;

use App\Models\SettingsProject;
use Illuminate\Database\Seeder;

class SettingsProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = "Project";
        for($i = 1; $i < 10; $i++) {
            SettingsProject::firstOrCreate(['name' => $name .' ' . $i]);
        }
    }
}
