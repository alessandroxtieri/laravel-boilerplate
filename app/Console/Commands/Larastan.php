<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class Larastan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'larastan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Static analysis of the code';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $process = Process::run('./vendor/bin/phpstan analyse');

        $this->output->write($process->output());
    }
}
