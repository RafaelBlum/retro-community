<?php

namespace App\Filament\Resources\CampaingResource\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\CampaingResource;
use App\Models\Campaign;
use App\Models\Channel;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCampaings extends ListRecords
{
    protected static string $resource = CampaingResource::class;

    protected function getHeaderActions(): array
    {
        $camping = Channel::query()->doesntHave('campaign')->get();

        if(!$camping->isEmpty()){
            return [
                CreateAction::make(),
            ];
        }
        return [];
    }
}
