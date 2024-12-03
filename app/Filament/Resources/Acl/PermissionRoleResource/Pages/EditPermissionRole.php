<?php

namespace App\Filament\Resources\Acl\PermissionRoleResource\Pages;

use App\Filament\Resources\Acl\PermissionRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPermissionRole extends EditRecord
{
    protected static string $resource = PermissionRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
