<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Carbon;

class CreateUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create User Administrator command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->ask('What is your email?');
        $password = $this->secret('What is your password?');

        $name = $this->ask('What is your name?') ?? 'John Doe';

        if (empty($email) || empty($password)) {
            $this->error('Email and password are required');
        }

        User::create([
            'email'             => $email,
            'password'          => $password,
            'name'              => $name,
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
