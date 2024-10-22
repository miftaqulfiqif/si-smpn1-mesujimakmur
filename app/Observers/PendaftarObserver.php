<?php

namespace App\Observers;

use App\Models\Pendaftar;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PendaftarObserver
{
    /**
     * Handle the Pendaftar "created" event.
     */

    public function creating(Pendaftar $pendaftar): void
    {
        // Halt execution if kuota is 0
        if ($pendaftar->periode->kuota == 0) {
            return;
        }
    }
    public function created(Pendaftar $pendaftar): void
    {
        $periode = $pendaftar->periode;
        $periode->update(['jml_pendaftar' => $periode->jml_pendaftar + 1, 'kuota' => $periode->kuota - 1]);
        $pendaftar->statuss()->create(['status' => 'pending', 'catatan' => 'Pendaftaran belum direview oleh pengelola']);
        Log::info("Notification create by: " . $pendaftar->user);
        Notification::make()
            ->title('Pendaftaran baru perlu direview')
            ->actions([
                Action::make('view')
                    ->url(route('filament.admin.resources.pendaftars.view', $pendaftar->id)),
            ])
            ->sendToDatabase($pendaftar->user);
    }

    /**
     * Handle the Pendaftar "updated" event.
     */
    public function updated(Pendaftar $pendaftar): void
    {
        //
    }

    /**
     * Handle the Pendaftar "deleted" event.
     */
    public function deleted(Pendaftar $pendaftar): void
    {
        $pendaftar->periode->update(['jml_pendaftar' => $pendaftar->periode->jml_pendaftar - 1]);
    }

    /**
     * Handle the Pendaftar "restored" event.
     */
    public function restored(Pendaftar $pendaftar): void
    {
        //
    }

    /**
     * Handle the Pendaftar "force deleted" event.
     */
    public function forceDeleted(Pendaftar $pendaftar): void
    {
        //
    }
}
