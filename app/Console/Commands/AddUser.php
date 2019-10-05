<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AddUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new Admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   $name = $this->ask('Your name');
        $email = $this->ask('Your email');
        $pw = $this->ask('Your password');
        $re_pw = $this->ask('Retype your password');

        while($pw != $re_pw){
          return $re_pw = $this->ask('Password do not match, retype your password:');
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($pw),
        ]);

        return $this->info('A user has successfully been added!', $user->name);
    }
}
