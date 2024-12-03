<?php

namespace App\Filament\Resources\Acl\PermissionRoleResource\Pages;

use App\Filament\Resources\Acl\PermissionRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPermissionRoles extends ListRecords
{
    protected static string $resource = PermissionRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
