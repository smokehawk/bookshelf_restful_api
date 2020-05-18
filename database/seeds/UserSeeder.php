<?php

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
        $role = factory(App\UsersRole::class)->states('admin')->create();
        factory(App\User::class, 2)->create()->each(function ($user) use ($role) {
            $user->role()->associate($role);
            $user->save();
        });
        $role = factory(App\UsersRole::class)->states('moderator')->create();
        factory(App\User::class, 2)->create()->each(function ($user) use ($role) {
            $user->role()->associate($role);
            $user->save();
        });
        factory(App\User::class, 2)->create();
    }
}
