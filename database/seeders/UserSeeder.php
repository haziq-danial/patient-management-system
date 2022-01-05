<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Medical;
use App\Models\Technician;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medicals = User::factory()->count(5)->medical()->create();
        $technicians = User::factory()->count(5)->technician()->create();
        $admins = User::factory()->count(2)->admin()->create();

        foreach ($medicals as $medical) {
            Medical::factory()->create([
                'user_id' => $medical->user_id
            ]);
            $medical->assignRole('medical');
        }

        foreach ($technicians as $technician) {
            Technician::factory()->create([
                'user_id' => $technician->user_id
            ]);
            $technician->assignRole('technician');
        }

        foreach ($admins as $admin) {
            Admin::factory()->create([
                'user_id' => $admin->user_id
            ]);
            $admin->assignRole('admin');
        }
    }
}
