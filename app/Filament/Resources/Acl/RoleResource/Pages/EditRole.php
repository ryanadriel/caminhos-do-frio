<?php

namespace App\Filament\Resources\Acl\RoleResource\Pages;

use App\Filament\Resources\Acl\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
