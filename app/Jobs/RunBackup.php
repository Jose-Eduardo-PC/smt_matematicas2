<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;

class RunBackup implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Antes de iniciar el backup
        Cache::put('backup-status', 'El backup está en progreso...', now()->addMinutes(10));

        // Realiza el backup
        Artisan::call('backup:run');

        // Después de que el backup se haya completado
        Cache::put('backup-status', 'El backup se ha completado.', now()->addMinutes(10));
        Cache::put('backup-completed-at', now(), now()->addMinutes(10));
    }
}
