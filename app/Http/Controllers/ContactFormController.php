<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'service' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($request->only('name', 'phone', 'email', 'service', 'message'));

        return redirect()->route('contact')->with('success', 'Thank you! Your message has been sent successfully.');
    }
}
