<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $reservations = auth()->user()->reservations()
            ->latest()
            ->get();

        return view('student.dashboard', [
            'reservations' => $reservations,
        ]);
    }
}