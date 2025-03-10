<?php

namespace Database\Seeders;

use App\LogMembershipStatusType;
use App\RoleType;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\GymPackage;
use App\Models\Membership;
use App\Models\LogMembership;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\InfoGymSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\GymPackageSeeder;

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
            'password' => Hash::make('password'),
        ])->assignRole(RoleType::SUPER_ADMIN->value);

        User::factory()->create([
            'name'     => 'Admin',
            'email'    => 'admin@gym.com',
            'password' => Hash::make('password'),
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
                $member_type        = $membership->member_type;
                $gymPackageFiltered = GymPackage::where('member_type', $member_type)->first();

                LogMembership::factory()->create([
                    'membership_id'  => $membership->id,
                    'gym_package_id' => $gymPackageFiltered->id,
                    'price'          => $gymPackageFiltered->price,
                    'duration'       => $gymPackageFiltered->duration,
                    'member_type'    => $gymPackageFiltered->member_type->value,
                    'start_date'     => Carbon::now(),
                    'end_date'       => Carbon::now(),
                    'status'         => LogMembershipStatusType::UNPAID->value,
                ]);
            });
        });
    }
}
