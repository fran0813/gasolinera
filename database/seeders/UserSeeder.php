<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use TCG\Voyager\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrNew(['email' => 'administrador@administrador.com']);
        if (!$user->exists) {
            $role = Role::where('name', 'administrador')->firstOrFail();

            $user->fill([
                'name' => __('Administrador'),
                'password' => Hash::make('secret'),
                'remember_token' => Str::random(60),
                'role_id' => $role->id,
            ])->save();
        }

        $user = User::firstOrNew(['email' => 'vendedor@vendedor.com']);
        if (!$user->exists) {
            $role = Role::where('name', 'user')->firstOrFail();

            $user->fill([
                'name' => __('Vendedor'),
                'password' => Hash::make('secret'),
                'remember_token' => Str::random(60),
                'role_id' => $role->id,
            ])->save();
        }
    }
}
