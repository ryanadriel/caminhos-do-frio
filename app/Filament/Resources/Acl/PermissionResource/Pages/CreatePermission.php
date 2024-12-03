<?php

namespace App\Filament\Resources\Acl\PermissionResource\Pages;

use App\Filament\Resources\Acl\PermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePermission extends CreateRecord
{
    protected static string $resource = PermissionResource::class;
}
