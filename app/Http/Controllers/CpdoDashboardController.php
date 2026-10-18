<?php

namespace App\Http\Controllers;

use App\Models\Reservation;

class CpdoDashboardController extends Controller
{
    public function index()
    {
        $totalReservations = Reservation::count();

        $pendingReservations = Reservation::where(
            'status',
            'pending'
        )->count();

        $approvedReservations = Reservation::where(
            'status',
            'approved'
        )->count();

        $rejectedReservations = Reservation::where(
            'status',
            'rejected'
        )->count();

        $recentReservations = Reservation::latest()
            ->take(5)
            ->get();

        return view('cpdo.dashboard', compact(
            'totalReservations',
            'pendingReservations',
            'approvedReservations',
            'rejectedReservations',
            'recentReservations'
        ));
    }
}