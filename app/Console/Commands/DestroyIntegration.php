<?php

namespace App\Console\Commands;

use App\Models\Integration;
use Illuminate\Console\Command;

class DestroyIntegration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'integration:destroy {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Destroy Integrations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $id = $this->argument('id');

        $integration = Integration::findOrFail($id);
        $integration->delete();

        $this->info("Integration with ID '{$id}' deleted successfully.");
    }
}