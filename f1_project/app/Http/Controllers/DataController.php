<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Gp;
use App\Models\Result;

class DataController extends Controller
{
    public function index()
    {
        $gps = Gp::orderByDesc('date')
            ->paginate(10, ['*'], 'gps_page')
            ->withQueryString()
            ->fragment('gps');

        $drivers = Driver::orderBy('name')
            ->paginate(10, ['*'], 'drivers_page')
            ->withQueryString()
            ->fragment('drivers');

        $results = Result::with(['driver', 'gp'])
            ->orderByDesc('date')
            ->orderBy('pos')
            ->paginate(10, ['*'], 'results_page')
            ->withQueryString()
            ->fragment('results');

        return view('data', [
            'gps' => $gps,
            'drivers' => $drivers,
            'results' => $results,
        ]);
    }
}