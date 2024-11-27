<?php

namespace App\Http\Controllers\Site;

use App\Models\Attraction;
use App\Models\Package;

class PackageController extends StandardController
{
    protected $model, $data;

    public function __construct(Package $package, Attraction $attraction)
    {
        $this->model = $package;
        $this->attraction = $attraction;
    }

    public function descriptionPackage($id) {

        $data = $this->attraction
            ->where('city_id', '=', $id)
            ->get();

        return view('Site.packages.package-description.index', compact('data', 'id'));
    }
}
