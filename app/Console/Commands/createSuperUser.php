<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class createSuperUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:superuser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Superuser';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $first_name = $this->ask('Enter First Name');
        $last_name = $this->ask('Enter Last Name');
        $email = $this->ask('Enter Email');
        $phone_number = $this->ask('Enter Phone Number');
        $password = $this->secret('Enter Password');
        $repassword = $this->secret('Re-Enter Password');

        if ($password !== $repassword) {
            $this->error('Password mismatch');
            // return "Password mismatch";

        }

        User::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone_number' => $phone_number,
            'password' => bcrypt($password),
            'account_type' => 'superuser',
            'is_superuser' => true,
            'is_admin' => true,
            'is_staff' => true,
            'is_active' => true,
        ]);

        $this->info("Superuser $first_name $last_name Created");

    }
}
