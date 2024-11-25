<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StandardController extends Controller
{
    public function getAll()
    {
        $results = $this->model->where('deleted_at', null)
            ->where('status', '1')
            ->get();

        return $results;
    }

}
