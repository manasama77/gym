<?php

namespace Database\Seeders;

use App\RoleType;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\GymPackage;
use App\Models\LogMembership;
use App\Models\Membership;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create new role
        Role::create([
            'name' => RoleType::SUPER_ADMIN->value,
        ]);

        Role::create([
            'name' => RoleType::ADMIN->value,
        ]);

        Role::create([
            'name' => RoleType::USER->value,
        ]);


        User::factory()->create([
            'name'     => 'Super Admin',
            'email'    => 'super_admin@gym.com',
            'password' => bcrypt('password'),
        ])->assignRole(RoleType::SUPER_ADMIN->value);

        User::factory()->create([
            'name'     => 'Admin',
            'email'    => 'admin@gym.com',
            'password' => bcrypt('password'),
        ])->assignRole(RoleType::ADMIN->value);

        $this->call([
            GymPackageSeeder::class,
            InfoGymSeeder::class,
        ]);

        User::factory(10)->create()->each(function ($user) {
            $user->assignRole(RoleType::USER->value);

            Membership::factory()->create([
                'user_id' => $user->id,
            ])->each(function ($membership) {
                $member_type = $membership->member_type;
                $gymPackageFiltered = GymPackage::where('member_type', $member_type)->first()->id;

                LogMembership::factory()->create([
                    'membership_id'  => $membership->id,
                    'gym_package_id' => $gymPackageFiltered,
                ]);
            });
        });
    }
}
