<?php

namespace App\Http\Controllers;
use App\Models\Driver;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::orderBy('name')->paginate(20);
        return view('crud.index', ['drivers' => $drivers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:F,N',
            'birth_date' => 'nullable|date',
            'nationality' => 'required|string|max:255',
        ]);
        Driver::create($validate);

        return redirect()->route('crud.index')->with('success', 'Pilot uploaded successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        return view('crud.edit', ['driver' => $driver]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:F,N',
            'birth_date' => 'nullable|date',
            'nationality' => 'required|string|max:255',
        ]);
        $driver->update($validate);
        return redirect()->route('crud.index')->with('success', 'Pilot updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('crud.index')->with('success', 'Pilot deleted successfully.');
    }
}
