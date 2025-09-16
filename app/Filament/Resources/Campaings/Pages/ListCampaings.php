<?php

namespace App\Filament\Resources\Campaings\Pages;

use App\Filament\Resources\Campaings\CampaingResource;
use App\Models\Campaign;
use App\Models\Channel;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCampaings extends ListRecords
{
    protected static string $resource = CampaingResource::class;

    protected function getHeaderActions(): array
    {
        $camping = Channel::query()->doesntHave('camping')->get();

        if(!$camping->isEmpty()){
            return [
                Actions\CreateAction::make(),
            ];
        }
        return [];
    }
}
