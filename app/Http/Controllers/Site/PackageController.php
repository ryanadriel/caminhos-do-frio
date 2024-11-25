<?php

namespace App\Http\Controllers\Site;

use App\Models\Package;

class PackageController extends StandardController
{
    protected $model;

    public function __construct(Package $package)
    {
        $this->model = $package;
    }
}
