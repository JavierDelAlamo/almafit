namespace App\Providers;

use App\Filament\Widgets\CustomAccountWidget;
use Filament\Providers\FilamentServiceProvider as ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Registra los widgets personalizados.
     *
     * @return void
     */
    public function boot(): void
    {
        parent::boot();

        // Registra tu widget personalizado
        \Filament\Facades\Filament::registerWidgets([
            CustomAccountWidget::class,
        ]);
    }
}
