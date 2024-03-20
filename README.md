# Laravel Boilerplate di Alessandro Tieri

Questo è un boilerplate Laravel preconfigurato con vari pacchetti utili per iniziare rapidamente lo sviluppo di nuove applicazioni.

## Tema Grafico

- **[AdminBSBMaterialDesign](https://github.com/gurayyarar/AdminBSBMaterialDesign)**

## Pacchetti Installati

- **[barryvdh/laravel-dompdf](https://github.com/barryvdh/laravel-dompdf)**: Per la generazione di file PDF.
- **[elgibor-solution/laravel-database-encryption](https://github.com/elgibor-solution/laravel-database-encryption)**: Per la crittografia dei dati nel database.
- **[laravel/framework](https://github.com/laravel/framework)**: Il framework Laravel stesso.
- **[laravel/tinker](https://github.com/laravel/tinker)**: Console interattiva per Laravel.
- **[laravel/ui](https://github.com/laravel/ui)**: Generazione di autenticazione e scaffolding.
- **[maatwebsite/excel](https://github.com/maatwebsite/Laravel-Excel)**: Importa ed esporta file Excel.
- **[opcodesio/log-viewer](https://github.com/opcodes-io/laravel-log-viewer)**: Visualizzatore di log Laravel.
- **[spatie/laravel-backup](https://github.com/spatie/laravel-backup)**: Backup automatizzati del database e dei file.
- **[spatie/laravel-permission](https://github.com/spatie/laravel-permission)**: Gestione delle autorizzazioni.
- **[yajra/laravel-datatables-oracle](https://github.com/yajra/laravel-datatables)**: Integrare DataTables.

### Pacchetti di sviluppo

- **[barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)**: Barra di debug per Laravel.
- **[fakerphp/faker](https://github.com/fakerphp/faker)**: Generazione di dati falsi per i test.
- **[larastan/larastan](https://github.com/nunomaduro/larastan)**: Static Analyzer per Laravel.
- **[laravel/envoy](https://github.com/laravel/envoy)**: Strumento per la definizione di task SSH.
- **[laravel/pint](https://github.com/laravel/pint)**: Strumenti per il test delle prestazioni Laravel.
- **[laravel/sail](https://github.com/laravel/sail)**: Ambiente di sviluppo Docker per Laravel.
- **[mockery/mockery](https://github.com/mockery/mockery)**: Framework per la creazione di mock in PHP.
- **[nunomaduro/collision](https://github.com/nunomaduro/collision)**: Migliora il gestore delle eccezioni di Laravel.
- **[nunomaduro/phpinsights](https://github.com/nunomaduro/phpinsights)**: Analisi statica del codice PHP.
- **[pestphp/pest](https://github.com/pestphp/pest)**: Framework di testing leggero per PHP.
- **[phpunit/phpunit](https://github.com/sebastianbergmann/phpunit)**: Framework di testing unitario per PHP.
- **[spatie/laravel-ignition](https://github.com/spatie/laravel-ignition)**: Strumento di debug per Laravel.

## Installazione

1. Clona il repository.
2. Esegui `composer install` per installare le dipendenze.
3. Copia il file `.env.example` in `.env` e configurane i dettagli del database.
4. Esegui `php artisan key:generate` per generare una nuova chiave dell'applicazione.
5. Esegui le migrazioni del database con `php artisan migrate`.
6. Puoi avviare il server di sviluppo con `php artisan serve`.

## Contribuire

Se vuoi contribuire, per favore apri una issue prima di inviare una pull request.

## Licenza

Questo boilerplate è distribuito con la licenza MIT.
