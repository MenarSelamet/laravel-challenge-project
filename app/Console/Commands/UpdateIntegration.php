<?php

namespace App\Console\Commands;

use App\Models\Integration;
use Illuminate\Console\Command;

class UpdateIntegration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'integration:update {id} {marketplace} {username} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Integrations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $id = $this->argument('id');
        $marketplace = $this->argument('marketplace');
        $username = $this->argument('username');
        $password = $this->argument('password');

        $integration = Integration::findOrFail($id);
        $integration->update([
            'marketplace' => $marketplace,
            'username' => $username,
            'password' => $password,
        ]);

        $this->info("Integration '{$integration->username}' updated successfully.");
    }
}
