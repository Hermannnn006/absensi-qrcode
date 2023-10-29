<?php

namespace App\Console;

use App\Models\Presence;
use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            //ambil data id mahasiswa yang belum absen
            $idMhs = Mahasiswa::whereDoesntHave('presences', function (Builder $query) {
                 $query->where('created_at', 'like', date('Y-m-d') . '%');
            })->pluck('id');

            //buat data untuk dimasukkan ke tabel presences
            $collection = collect([]);
            foreach($idMhs as $id) {
                $collection->push([
                    'mahasiswa_id' => $id,
                    'presence_status' => 'tidak hadir'
                ]);
            }
            $arrCollections = $collection->toArray();

            //insert data
            foreach($arrCollections as $arr) {
                    Presence::create($arr);
                }
        })->dailyAt('17:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
