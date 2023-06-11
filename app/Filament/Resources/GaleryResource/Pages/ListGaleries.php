<?php

namespace App\Filament\Resources\GaleryResource\Pages;

use App\Filament\Resources\GaleryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGaleries extends ListRecords
{
    protected static string $resource = GaleryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
