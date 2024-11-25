<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $packages;

    public function __construct(PackageController $packages){
        $this->packages = $packages;
    }
    public function index(){
        $packages = $this->packages->getAll();

        return view('site.home.index', compact('packages'));
    }
}
