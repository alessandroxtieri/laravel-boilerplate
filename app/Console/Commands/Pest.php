<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class Pest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run tests with Pest';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $process = Process::run('./vendor/bin/pest');

        $this->output->write($process->output());
    }
}
