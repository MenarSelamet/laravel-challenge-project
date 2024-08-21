<?php

namespace App\Console\Commands;

use App\Models\Integration;
use Illuminate\Console\Command;

class StoreIntegration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'integration:store {marketplace} {username} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store Integration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $marketplace = $this->argument('marketplace');
        $username = $this->argument('username');
        $password = $this->argument('password');

        $integration = Integration::create([
            'marketplace' => $marketplace,
            'username' => $username,
            'password' => $password,
        ]);

        $this->info("Integration '{$integration->username}' stored successfully.");
    }
    }