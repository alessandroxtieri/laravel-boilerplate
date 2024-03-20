<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote.')->dailyAt('08:30');

Schedule::command('backup:run')->description('Run backup.')->dailyAt('02:00');
Schedule::command('backup:clean')->description('Clean backups.')->dailyAt('02:15');
