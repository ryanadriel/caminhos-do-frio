<?php

namespace App\Filament\Resources\Acl\PermissionRoleResource\Pages;

use App\Filament\Resources\Acl\PermissionRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePermissionRole extends CreateRecord
{
    protected static string $resource = PermissionRoleResource::class;
}
