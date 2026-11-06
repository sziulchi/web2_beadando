<?php

namespace App\Http\Controllers;

use App\Models\Gp;
use App\Models\Result;
use Illuminate\Support\Facades\DB;

class DiagramController extends Controller
{
    /**
     * Diagram menü: Chart.js diagramok az adatbázis adataiból (Eloquent ORM).
     */
    public function index()
    {
        // 1. Top 10 pilóta futamgyőzelmek (pos = 1) szerint
        $topWinners = Result::where('pos', 1)
            ->select('did', DB::raw('COUNT(*) as wins'))
            ->groupBy('did')
            ->orderByDesc('wins')
            ->limit(10)
            ->with('driver')
            ->get();

        // 2. Futamgyőzelmek a pilóták nemzetisége szerint
        $winsByNationality = Result::where('pos', 1)
            ->with('driver')
            ->get()
            ->groupBy(fn ($result) => $result->driver->nationality)
            ->map->count()
            ->sortDesc();

        // 3. Nagydíjak száma évtizedenként
        $gpsByDecade = Gp::all()
            ->groupBy(fn ($gp) => (intdiv((int) substr($gp->date, 0, 4), 10) * 10) . '-es évek')
            ->map->count()
            ->sortKeys();

        return view('diagram', [
            'winnerLabels'      => $topWinners->map(fn ($r) => $r->driver->name)->values(),
            'winnerData'        => $topWinners->pluck('wins')->values(),
            'nationalityLabels' => $winsByNationality->keys(),
            'nationalityData'   => $winsByNationality->values(),
            'decadeLabels'      => $gpsByDecade->keys(),
            'decadeData'        => $gpsByDecade->values(),
        ]);
    }
}