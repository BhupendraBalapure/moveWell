<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'service' => 'nullable|string|max:255',
            'preferred_date' => 'nullable|date',
            'preferred_time' => 'nullable|string|max:20',
            'message' => 'nullable|string',
        ]);

        Appointment::create($request->only('name', 'phone', 'email', 'service', 'preferred_date', 'preferred_time', 'message'));

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Appointment request sent successfully!']);
        }

        return redirect()->route('home')->with('success', 'Appointment request sent successfully!');
    }
}
