@servers(['localhost' => '127.0.0.1'])

@task('rebuild', ['on' => ['localhost']])
    php artisan migrate:fresh
    php artisan db:seed
@endtask

@task('clean', ['on' => ['localhost']])
    sudo php artisan ro:cl
    sudo php artisan ca:cl
    sudo php artisan co:cl
    sudo php artisan vi:cl
@endtask
