<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AssignAvatarToUsersSeeder extends Seeder
{
    public function run(): void
    {
        $avatars = ['avatar1.png', 'avatar2.png', 'avatar3.png', 'avatar4.png', 'avatar5.png'];

        User::whereNull('avatar')->each(function ($user) use ($avatars) {
            $user->update([
                'avatar' => $avatars[array_rand($avatars)]
            ]);
        });
    }
}