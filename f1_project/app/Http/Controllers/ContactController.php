<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name'    => 'required|string|min:2|max:100',
                'email'   => 'required|email|max:255',
                'subject' => 'required|string|min:3|max:150',
                'message' => 'required|string|min:10|max:2000',
            ],
            [
                'required' => 'A(z) :attribute mező kitöltése kötelező.',
                'email'    => 'Érvényes e-mail címet adj meg.',
                'min'      => 'A(z) :attribute legalább :min karakter legyen.',
                'max'      => 'A(z) :attribute legfeljebb :max karakter lehet.',
            ],
            [
                'name'    => 'név',
                'email'   => 'e-mail',
                'subject' => 'tárgy',
                'message' => 'üzenet',
            ]
        );

        Message::create($validated);

        return redirect()->route('contact')
            ->with('success', 'Köszönjük, az üzenetedet elküldtük!');
    }
}