<?php

namespace App\Console\Commands;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SetUpDevEnvironmentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dev:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set up the development environment';

    public User $user;

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
     * @return int
     */
    public function handle()
    {
        $this->info('Setting up development environment');
        $this->MigrateAndSeedDatabase();

        // $this->CreatePersonalAccessClient($user);
        // $this->CreatePersonalAccessToken($user);
        $this->info('All done. Bye!');
    }
    public function MigrateAndSeedDatabase()
    {
        $this->call('migrate:fresh');
        $user = $this->CreateJohnDoeUser();
        $this->call('db:seed');
         $user->assignRole(UserType::SUPER_ADMIN);
    }
    
    public function createJohnDoeUser()
    {
        $this->info('Creating John Doe User');
        $user = User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '09012341234',
            'email' => 'john@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $this->user = $user;
       
        $this->info('John Doe created');
        $this->warn('Email: john@example.com');
        $this->warn('Password: password');
        return $user;
    }

    public function CreatePersonalAccessClient($user)
    {
        $this->call('passport:client', [
            '--personal' => true,
            '--name' => 'Personal Access Client',
            '--user_id' => $user->id
        ]);
    }
    public function CreatePersonalAccessToken($user)
    {
        $token = $user->createToken('Development Token');
        $this->info('Personal access token created successfully.');
        $this->warn("Personal access token:");
        $this->line($token->accessToken);
    }
}
