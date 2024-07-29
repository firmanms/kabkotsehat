<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;

class FilamentServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Filament::serving(function () {
        //     Filament::registerNavigationItems([
        //         NavigationItem::make('Semua')
        //             ->url(route('filament.back.resources.pengaturan-indikators.index'))
        //             ->icon('heroicon-o-document-text')
        //             ->group('Content')
        //             ->sort(1),

        //         NavigationItem::make('Isi')
        //             ->url(route('filament.back.resources.isi-indikators.index'))
        //             ->icon('heroicon-o-document-text')
        //             ->group('Content')
        //             ->sort(2),
        //     ]);
        // });
    }
}
