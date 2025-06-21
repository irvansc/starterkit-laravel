<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        echo "➡️ Memulai UserRoleSeeder...\n";

        DB::beginTransaction();

        try {
            // Buat Role
            $role_admin = Role::firstOrCreate(['name' => 'admin']);
            $role_user = Role::firstOrCreate(['name' => 'user']);
            echo "✅ Role admin & user dibuat\n";

            // Buat Permissions
            $permissions = ['create role', 'read role', 'update role', 'delete role'];
            foreach ($permissions as $perm) {
                Permission::firstOrCreate(['name' => $perm]);
            }
            echo "✅ Permissions dibuat\n";

            $role_admin->givePermissionTo($permissions);

            // User default
            $default = [
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'image' => null,
            ];

            // Buat Admin
            $admin = User::firstOrCreate(
                ['email' => 'admin@gmail.com'],
                array_merge($default, [
                    'name' => 'Administrator',
                    'username' => 'admin',
                    'verified' => 1,
                ])
            );
            echo "✅ User admin dibuat\n";

            // Buat user
            $user = User::firstOrCreate(
                ['email' => 'user@gmail.com'],
                array_merge($default, [
                    'name' => 'user',
                    'username' => 'userbaru',
                    'verified' => 1,
                    'phone' => '081234567890',
                    'address' => 'Jl. user',
                ])
            );
            echo "✅ User user dibuat\n";

            // Role assign
            if (!$admin->hasRole('admin')) {
                $admin->assignRole($role_admin);
            }

            if (!$user->hasRole('user')) {
                $user->assignRole($role_user);
            }

            DB::commit();
            echo "🎉 Selesai seeding UserRoleSeeder!\n";
        } catch (\Throwable $th) {
            DB::rollBack();
            dd('❌ Gagal Seeder: ', $th->getMessage());
        }
    }
}
