@servers(['localhost' => '127.0.0.1'])

@task('rebuild', ['on' => ['localhost']])
    php artisan migrate:fresh
    php artisan db:seed
@endtask
