<?php

namespace Wewowweb\Trubar\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trubar:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Trubar';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->comment('Running migrations...');
        $this->call('migrate');
        $this->info('Trubar was installed successfully.');
    }
}
