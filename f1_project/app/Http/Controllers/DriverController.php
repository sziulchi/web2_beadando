<?php

namespace App\Http\Controllers;
use App\Models\Driver;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::orderBy('name')->paginate(20);
        return view('crud.index', ['drivers' => $drivers]);
    }

    public function create()
    {
        return view('crud.create');
    }

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

    public function edit(Driver $driver)
    {
        return view('crud.edit', ['driver' => $driver]);
    }

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

    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('crud.index')->with('success', 'Pilot deleted successfully.');
    }
}
