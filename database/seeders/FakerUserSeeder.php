<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FakerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = $this->command->getOutput()->ask('What is your email?');
        if ($email === null) {
            $this->command->getOutput()->error('You did not enter email');
            return;
        }

        $password = $this->command->getOutput()->ask('What is your password?');
        if ($password === null) {
            $this->command->getOutput()->error('You did not enter password');
            return;
        }

        $username = $this->command->getOutput()->ask('What is your username?');
        if ($username === null) {
            $this->command->getOutput()->error('You did not enter name');
            return;
        }

        $user = User::where('email', $email)->first();
        if ($user instanceof User) {
            $this->command->getOutput()->error('email already exist');
            return;
        }

        User::create([
            'email' => $email,
            'password' => Hash::make($password),
            'name' => $username,
        ]);
        $this->command->getOutput()->success('User created successfully');
    }
}
