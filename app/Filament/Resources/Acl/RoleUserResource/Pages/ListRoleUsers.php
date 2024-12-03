<?php

namespace App\Filament\Resources\Acl\RoleUserResource\Pages;

use App\Filament\Resources\Acl\RoleUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoleUsers extends ListRecords
{
    protected static string $resource = RoleUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
